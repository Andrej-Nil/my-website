<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>My website @yield('title', 'My website')</title>
</head>

<body>
{{--<div class="app">--}}
    @yield('content')
{{--</div>--}}
</body>

<script src="{{asset('js/main.js')}}"></script>
</html>
