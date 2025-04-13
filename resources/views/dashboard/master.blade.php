<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <header>
        @yield('header')
    </header>

    @session ('key')
        <h1>{{ $value }}</h1>
    @endsession

    @if(session('status'))
        {{session('status')}}
    @endif

    @yield('content')

    <section>
        @yield('moreContent')
    </section>
</body>
</html>
