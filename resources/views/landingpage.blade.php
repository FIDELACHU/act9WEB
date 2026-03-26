@extends("layouts.app")

@section("title", "Hola chaval")

@section("content")

    <h2> Bienvenido a mi pagina web hecha con laravel, tiene autentificacion y base de datos de usuarios integrada</h2>
    <h3>inicia sesion! (porfas)</h3>
    <p>En el nav puedes dar clic a algun link si es que no has iniciado sesion para hacerlo</p>
    <p>Ya que hayas iniciado sesion, te mostrara otros enlaces</p>

    <br><label>O si prefieres, aca los tienes</label>
    <a href="/login">LogIn</a>
    <a href="/register">Register</a>
@endsection