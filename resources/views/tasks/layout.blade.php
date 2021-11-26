<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>
<div class="container">
    @if(session('danger'))
        <div class="alert alert-danger">{{session('danger')}}</div>
    @endisset
    @if(session('info'))
        <div class="alert alert-info">{{session('info')}}</div>
    @endisset
</div>
@yield('content')
</body>
</html>
