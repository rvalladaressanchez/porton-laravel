    <form action="/login" method="POST">
        {{ csrf_field() }}
        <input type="text" name="txtUsuario" />
        <input type="password" name="txtPass" />
        <input type="submit" />
    </form>
