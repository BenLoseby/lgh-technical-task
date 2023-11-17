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
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    </head>
    <body>
    <div class="v1-wrapper">
            <h1><?= __('Statistics') ?></h1>
            <div class="v1-navigation">
                <ul>
                    <li>
                        <a href="<?= Route('listStatistics'); ?>"><?= __('Graphs') ?></a>
                    </li>
                    <li> 
                        <a href="#"><?= __('Tables') ?></a>
                    </li>
                </ul>
            </div>
            <div id="graphs" class="v1-graphs">
                <div id="bar-graph"></div>
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
</script>