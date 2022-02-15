<?php

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
 * Alla richiesta GET all'endpoint '/', viene eseguito il metodo loginPage che torna
 * la pagina di login.
 */
Route::get('/', [\App\Http\Controllers\LoginController::class, 'loginPage']);

/*
 * Questo metodo ritorna la home page con i placement aggiornati
 */
Route::post('/home/', [\App\Http\Controllers\HomePageController::class, 'loadHomePage']);
