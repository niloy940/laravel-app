<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'niloy')</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">
    <style>
        .is-complete {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    @include('layouts.nav')

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
