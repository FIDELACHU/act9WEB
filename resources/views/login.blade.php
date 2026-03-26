@extends("layouts.app")

@section("title", "Login")

@section("content")
    <h1>Login</h1>

    @if(session('success'))
        <p>{{session('success')}}</p>
    @endif

    <!-- LISTA DE ERRORES -->
     @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        
        <!-- FORMULARIO -->
    <form method="POST" action="/login">
        @csrf
       
        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
    </form>

    <a href="/register">Go to register</a>
    <a href="/landingpage">Return to landing page</a>


@endsection
