@extends("layouts.app")

@section("title", "Alerta sesion")

@section("content")
    <h1>Hola, {{ $user->name}}</h1>
    <p>Se detecto un inicio de sesion en tu cuenta.</p>

@endsection