<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;    //Para las rutas del AuthController


Route::get('/', function () {
    return view('/landingpage');
});


// GET Y POST
Route::get('/register', 
    [AuthController::Class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::Class, 'register']);

// GET Y POST LOGIN
Route::get('/login',
      [AuthController::Class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::Class, 'login']);

// POST LOGOUT
Route::post('/logout',
      [AuthController::Class, 'logout'])->name('logout');

// MIDDLEWARE
Route::middleware('auth')->get('/dashboard',function(){
    return view('dashboard');
})->name('dashboard');


//LANDINGPAGE
Route::get('/landingpage', function () {
    return view('landingpage');
})->name('landingpage');
