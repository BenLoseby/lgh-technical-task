<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Statistics</title>

        @include('components.styles.v1-style')
        @include('components.styles.nav')
        @include('components.styles.graphs')

        <!-- Table Includes -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

        <!-- Graph Includes -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.1/echarts.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <div class="v1-wrapper">
            <h1><?= __('Statistics') ?></h1>
            @include('components.nav')

            <div class="card">
                <h2><?= __('Graph Data') ?></h2>
            </div>
            @include('components.graphs')

            <div class="card">
                <h2><?= __('Tabular Data') ?></h2>
            </div>
            @include('components.tables')
        </div>
    </body>
</html>