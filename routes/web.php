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
})->middleware('auth');

Route::post('/loginCheck', [\App\Http\Controllers\LoginController::class, 'loginCheck']);

Route::post('/registrazioneStudent', [\App\Http\Controllers\RegistrationController::class, 'StudentRegistration']);

Route::post('/registrazioneEmployer', [\App\Http\Controllers\RegistrationController::class, 'EmployerRegistration']);

Route::get('/getCategory', [\App\Http\Controllers\RegistrationController::class, 'getCategory']);

/*
Metodo di appoggio
*/
Route::get('/user', function () {
    return response(User::all()->jsonSerialize(), 200);
});

/*
 * Endpoint delle operazioni dello studente
 */
Route::resource('student', \App\Http\Controllers\StudentController::class);

/*
 * Endpoint delle operazioni di employer
 */
Route::resource('employer', \App\Http\Controllers\EmployerController::class);

/*
 * Endpoint per le operazioni dell'employer sulla creazion/iterazione dei placement
 */
Route::resource('employer.placement', \App\Http\Controllers\PlacementController::class);

/*
 * Endpoint per le operazioni dello studente sulla creazion/iterazione delle richieste
 */
Route::resource('student.request', \App\Http\Controllers\RequestController::class);

Route::get('/session',[\App\Http\Controllers\SessionController::class, 'dataSession'])->middleware('auth');
