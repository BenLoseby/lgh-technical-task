<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Technical Assessment</title>

        @include('components.styles.v1-style')
        @include('components.styles.nav')
    </head>
    <body>
        <div class="v1-wrapper">
            <h1><?= __('Business Statistics And Analysis') ?></h1>
            @include('components.nav')
            <div class="card">
                <p><?= __('Welcome to the Technical Assement Statistical Analysis applicaiton. To see the desired statistics, please click on the desired option from the navigation menu above.') ?></p>
                <p><?= __('The goal of this application is to dispay relevant information to the user, in a manner that is both concise and infomrative.') ?></p>
            </div>
        </div>
    </body>
</html>
