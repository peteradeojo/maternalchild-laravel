<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <nav>
        @auth
            <a href="{{ route('home') }}">Dashboard</a>
            <a href="{{ route('logout') }}">Logout</a>
            <span>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
        @endauth
    </nav>
    @yield('content')
</body>

</html>
