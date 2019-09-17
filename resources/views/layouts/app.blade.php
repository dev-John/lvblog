<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <title>{{config('APP_NAME','LVBLOG')}}</title>  <!--pega o nome do .env-->        
    </head>
    <body>
        @yield('content')
    </body>
</html>
