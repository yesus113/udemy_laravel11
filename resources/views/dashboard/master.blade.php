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
    
    @yield('content')

    <section>
        @yield('moreContent')
    </section>
</body>
</html>