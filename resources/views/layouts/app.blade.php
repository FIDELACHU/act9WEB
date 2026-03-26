<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    
    <style>
        body{
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        background: #f2f2f2;
        }
        header{
            top:0;
            padding-top:1px;
            background: #222;
            color: white;
            text-align: center;
        }
        main{
            width: 80%;
            margin: 32px auto;
            padding: 16px;
            background: white;
            border-radius: 10px;
        }
        *{
            line-height:1.5;
        }
        button{
            margin:5px;
            transition: 1s ease;
            border:1px solid;
            border-radius:5px;
            padding:2px;
        }
        button:hover{
            transform: scale(1.1);
        } 
        a{
            text-decoration:none;
            margin:10px;
            transition: 1s ease;
            border:1px solid;
            border-radius:5px;
            padding:2px;
        }
        a:hover{
            background: white;
            padding:5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>
            @auth
                Bienvenido, {{auth()->user()->name}}    
            {{-- otra opcion (gptazo) que el header muestre el titulo de la vista
                @yield("headerTitle") --}}
            @else
                PapuLandia
            @endauth
        </h1>
        <nav>
            <ul>
                @auth
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        @yield("content")
    </main>

</body>
</html>
