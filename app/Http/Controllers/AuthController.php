<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//agregar mas dependencias
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Mail\LoginAlertMail;

class AuthController extends Controller
{
    // Funciones de nuestro controller
    function showRegister(){
        return view('register');
    }

    function register(Request $request){
        $request->validate([
            'name'=> 'required | string | max:255',
            'email'=> 'required | email | unique:users,email',
            'password'=> 'required | min:8 | confirmed',
        ]);

        // CREAR USUARIO
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
//ENVIAR CORREO
        \Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));

        // REDIRIGIR A LOGIN
        return redirect('/login')->with('success', 'Usuario creado correctamente');
    }

    function showLogin(){
        return view('login');
    }

    function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // ATTEMPT / INTENTO DE LOGIN
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            \Mail::to($user->email)->send(new \App\Mail\LoginAlertMail($user));
            return redirect('/dashboard')->with('success','Bienvenido de nuevo');
        }
        return back()->withErrors(['email'=>"Credenciales incorrectas"])->onlyInput('email');
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
