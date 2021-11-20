<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
</head>
<body>
    <header>
        <div class='container'>@yield('logo')</div>
    </header>
    <section>
        <div class='container curve-border'>@yield('content')</div>
    </section>
</body>
</html>