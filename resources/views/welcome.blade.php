<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Technical Assessment</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
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
    </head>
    <body>
        <div class="v1-wrapper">
            <h1><?= __('Business Statistics And Analysis') ?></h1>
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
            <div>
                <p><?= __('Welcome to the Technical Assement Statistical Analysis applicaiton. To see the desired statistics, please click on the desired option from the navigation menu above.') ?></p>
            </div>
        </div>
    </body>
</html>
