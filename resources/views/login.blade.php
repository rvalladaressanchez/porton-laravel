<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <form action="/login" method="POST">
        {{ csrf_field() }}
        <input type="text" name="txtUsuario" />
        <input type="password" name="txtPass" />
        <input type="submit" />
    </form>
</body>

</html>
