<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OnRent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        $lookBack = OnRent::whereDate('gen_date', '>=', Carbon::now()->subWeeks(3))->get();
        [$contractsByDate, $quotesByDate, $hireValueByWeek] = $this->getDataFromLookback($lookBack);
        return view('statistics', ['contracts' => $contractsByDate, 'quotes' => $quotesByDate, 'hireValue' => $hireValueByWeek]);
    }

    private function getDataFromLookback($lookBack): array
    {
        [$contracts, $quotes] = $this->getCountData($lookBack);
        $hireData = $this->getWeeklyHireValue($lookBack);

        return [$contracts, $quotes, $hireData];
    }

    private function getCountData($lookBack): array
    {
        $contractData = [];
        $quoteData = [];

        /** @var OnRent $dataByDay */
        foreach ($lookBack as $dataByDay) {
            // Date needed so we can't include this day if not given
            if (!isset($dataByDay->gen_date)) {
                continue;
            }
            
            $date = strtotime($dataByDay->gen_date);
            $date = date('d-m-Y', $date);

            $contractData[$date] = $dataByDay->contracts;
            $quoteData[$date] = $dataByDay->quotes;
        }

        return [$contractData, $quoteData];
    }

    private function getWeeklyHireValue($lookBack): array
    {
        $groupedData = $lookBack->groupBy(
            function($data) { 
                return Carbon::parse($data->gen_date)->format('W') ;
            }
        );
        
        $hireData = [];

        foreach ($groupedData as $databyWeek) {
            foreach ($databyWeek as $data) {
                $date = Carbon::createFromFormat('Y-m-d', $data->gen_date);
                if (!isset($hireData[$date->startOfWeek()->format('d/m/Y')])) {
                    $hireData[$date->startOfWeek()->format('d/m/Y')] = $data->weekly_value;
                } else {
                    $hireData[$date->startOfWeek()->format('d/m/Y')] += $data->weekly_value;
                }
            }
        }

        return $hireData;
    }
}
