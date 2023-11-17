<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Statistics</title>

        <style>
            html, body {
                height: 100%;
            }
            h1 {
                color: white;
                background-color: #4d4d4d;
            }
            .v1-wrapper {
                padding: 20px;
            }
            .v1-wrapper h1 {
                display: flex;
                justify-content: center;
            }
            .v1-navigation ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
            }
            .v1-navigation li {
                margin: 5px;
            }
            .graph {
                height: 500px;
            }
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

	    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.1/echarts.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <div class="v1-wrapper">
            <h1><?= __('Statistics') ?></h1>
            <div class="v1-navigation">
                <ul>
                    <li>
                        <a href="<?= Route('listStatistics') . "#graphs"; ?>"><?= __('Graphs') ?></a>
                    </li>
                    <li> 
                        <a href="<?= Route('listStatistics') . "#tables"; ?>"><?= __('Tables') ?></a>
                    </li>
                </ul>
            </div>
            <div id="graphs" class="v1-graphs">
                <h2><?= __('Contracts') ?></h2>
                <div id="bar-graph-contracts" class="graph"></div>
                <h2><?= __('Quotes') ?></h2>
                <div id="bar-graph-quotes" class="graph"></div>
                <h2><?= __('Weekyl Hire Value') ?></h2>
                <div id="line-graph" class="graph"></div>
            </div>
            <div id="tables" class="v1-tables">
                <h2><?= __('Contracts Data') ?></h2>
                <table id="contract-table" class="v1-table">
                    <thead>
                        <tr>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Contract Count') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contracts as $date => $count)
                            <tr class="v1-tr">
                                <td class="v1-td">{{ $date }}</td>
                                <td class="v1-td">{{ $count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h2><?= __('Quotes Data') ?></h2>
                <table id="quote-table" class="v1-table">
                    <thead>
                        <tr>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Contract Count') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quotes as $date => $count)
                            <tr class="v1-tr">
                                <td class="v1-td">{{ $date }}</td>
                                <td class="v1-td">{{ $count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <h2><?= __('Weekly Hire Data') ?></h2>
                <table id="hire-table" class="v1-table">
                    <thead>
                        <tr>
                            <th><?= __('w.c Date') ?></th>
                            <th><?= __('Week Value') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hireValue as $date => $value)
                            <tr class="v1-tr">
                                <td class="v1-td">{{ $date }}</td>
                                <td class="v1-td">{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready( function () {
        $('#contract-table').DataTable();
        $('#quote-table').DataTable();
        $('#hire-table').DataTable();

    } );

    var contractsGraph = document.getElementById('bar-graph-contracts');
    if (contractsGraph) {
        var bars_basic = echarts.init(contractsGraph);
        bars_basic.setOption({
            color: ['#3398DB'],
            tooltip: {
                trigger: 'axis',
                axisPointer: {            
                    type: 'shadow'
                }
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [
                {
                    type: 'category',
                    data: <?php
                        echo(json_encode(array_keys($contracts)));
                    ?>,
                    axisTick: {
                        alignWithLabel: true
                    }
                }
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: [
                {
                    name: 'Contract Count',
                    type: 'bar',
                    barWidth: '20%',
                    data: <?php
                        echo(json_encode(array_values($contracts)));
                    ?>
                }
            ]
        });
    }

    var quptesGraph = document.getElementById('bar-graph-quotes');
    if (quptesGraph) {
        var bars_basic = echarts.init(quptesGraph);
        bars_basic.setOption({
            color: ['#3398DB'],
            tooltip: {
                trigger: 'axis',
                axisPointer: {            
                    type: 'shadow'
                }
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [
                {
                    type: 'category',
                    data: <?php
                        echo(json_encode(array_keys($quotes)));
                    ?>,
                    axisTick: {
                        alignWithLabel: true
                    }
                }
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: [
                {
                    name: 'Contract Count',
                    type: 'bar',
                    barWidth: '20%',
                    data: <?php
                        echo(json_encode(array_values($quotes)));
                    ?>
                }
            ]
        });
    }

    var line_stacked_element = document.getElementById('line-graph');
    if (line_stacked_element) {
        var line_stacked = echarts.init(line_stacked_element);
        line_stacked.setOption({
            animationDuration: 750,
            grid: {
                left: 0,
                right: 20,
                top: 35,
                bottom: 0,
                containLabel: true
            },        
            legend: {
                data: ['test'],
                itemHeight: 8,
                itemGap: 20
            },

            // Add tooltip
            tooltip: {
                trigger: 'axis',
                backgroundColor: 'rgba(0,0,0,0.75)',
                padding: [10, 15],
                textStyle: {
                    fontSize: 13,
                    fontFamily: 'Roboto, sans-serif'
                }
            },
            
            xAxis: [{
                type: 'category',
                boundaryGap: false,
                data:  <?php
                        echo(json_encode(array_keys($hireValue)));
                    ?>,
                axisLabel: {
                    color: '#333'
                },
                axisLine: {
                    lineStyle: {
                        color: '#999'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            }],

            // Vertical axis
            yAxis: [{
                type: 'value',
                axisLabel: {
                    color: '#333'
                },
                axisLine: {
                    lineStyle: {
                        color: '#999'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                },
                splitArea: {
                    show: true,
                    areaStyle: {
                        color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                    }
                }
            }],

            // Add series
            series: [            
                {
                    name: 'Laptop',
                    type: 'line',
                    stack: 'Total',
                    smooth: true,
                    symbolSize: 7,
                    data: <?php
                        echo(json_encode(array_values($hireValue)));
                    ?>,
                    itemStyle: {
                        normal: {
                            borderWidth: 2
                        }
                    }
                }
            ]
        });
    }
</script>