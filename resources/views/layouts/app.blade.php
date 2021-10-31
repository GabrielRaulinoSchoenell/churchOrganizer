<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link href='{{asset("css/header.css")}}' rel='stylesheet'>
</head>
<body>
    <header>
        <div class='logo'>@yield('logo')</div>
        <div class='user-info'>@yield('user-info')</div>       
    </header>
    <section class='container'>
        <aside>@yield('aside')</aside>
        <section class='content'>@yield('content')</section>
    </section>
</body>
</html>