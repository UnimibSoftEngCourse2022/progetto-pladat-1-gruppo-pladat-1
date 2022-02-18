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

/*
 * ENDPOINT INDEX
 *
 * Alla richiesta GET all'endpoint '/', viene eseguito il metodo loginPage che torna
 * la pagina di login.
 */
Route::get('/', function(){
    return view('welcome');
});

Auth::routes();

Route::resource('student', \App\Http\Controllers\StudentController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'profileView']);

Route::get('/profile/placementList', [\App\Http\Controllers\ProfileController::class, 'placementList']);
