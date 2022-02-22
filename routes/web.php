<?php

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
Route::get('/', [\App\Http\Controllers\LoginController::class, 'homepage']);

Route::get('/login',[\App\Http\Controllers\LoginController::class, 'loginForm']);

Route::post('/loginCheck', [\App\Http\Controllers\LoginController::class, 'loginCheck']);

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


