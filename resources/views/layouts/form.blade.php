<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link href='{{asset("css/form.css")}}' rel='stylesheet'>
</head>
<body>
    <section>
        <div class='logo'>logo</div>
        <div class='container'>@yield('form')</div>
    </section>
    <footer>
        <div class='container'>@yield('footer')</div>
    </footer>
    <div class='modal'>
        <div class='error-message'>@yield('failures')</div>
    </div>
</body>
</html>




<script src='{{asset("js/index.js")}}'> </script>