<html>
<head>
    <meta charset='utf-8'>
    <title>Confirme seu email</title>
    <link href='{{asset("css/confirm.css")}}' rel='stylesheet'>
</head>
<body>
    <section>
        <div class='container'>
            <div class='message'>Enviamos um email para</div>
            <div class='email'>{{$user}}</div>
            <div><a href='https://gmail.com' target='blank'>ir ao gmail</a></div>
    </section>
</body>
</html>