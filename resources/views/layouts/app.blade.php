<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- TinyMCE Editor -->
    
    <script src="https://cdn.tiny.cloud/1/rbtj26zk6ovadqm9r3bqllan8i90zb9nq78e632td2digt61/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#article-editor'
        });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('inc.navbar')
    <div class="container container-mt">
        @include('inc.messages')
        @yield('content')
    </div>
</body>
</html>
