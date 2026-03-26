@extends("layouts.app")

@section("title", "Bienvenido")

@section("content")
    <h1>Hola, {{ $user->name}}</h1>
    <p>Bienvenido a la aplicacion Activity 9 😎</p>

@endsection