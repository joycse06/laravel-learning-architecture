<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saphira - A Laravel Demo</title>
    <link rel="stylesheet" href="/vendor/css/bootstrap.css">
    <link rel="stylesheet" href="/vendor/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/vendor/css/font-awesome.css"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/main.css">
</head>
<body>

    @include('layouts.partials.nav')

    <div class="container">
        @include('message.message')

        @yield('content')
    </div>

    <script src="/vendor/js/jquery.js"></script>
    <script src="/vendor/js/bootstrap.js"></script>
    <script>
        $('#flash-overlay-modal').modal();

    </script>
</body>
</html>