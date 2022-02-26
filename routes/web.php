<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return response()->view('index');
})->name('home');

Route::get('/login', function () {
    return response()->view('login');
})->name('login')
->middleware('guest');

Route::get('/registrazione', function () {
    return response()->view('registrazione');
})->middleware('guest');

Route::get('/profile', function () {
    return response()->view('private');
})->name('private')->middleware('auth');

Route::get('/search', function () {
    return response()->view('ricerca');
})->middleware('auth');

Route::post('/loginCheck', [\App\Http\Controllers\LoginController::class, 'loginCheck']);

Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);


Route::post('/registrazioneStudent', [\App\Http\Controllers\RegistrationController::class, 'StudentRegistration']);

Route::post('/registrazioneEmployer', [\App\Http\Controllers\RegistrationController::class, 'EmployerRegistration']);

Route::get('/getCategory', [\App\Http\Controllers\RegistrationController::class, 'getCategory']);
