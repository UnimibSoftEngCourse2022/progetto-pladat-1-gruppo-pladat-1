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
 * ENDPOINT INDEX
 *
 * Alla richiesta GET all'endpoint '/', viene eseguito il metodo loginPage che torna
 * la pagina di login.
 */
Route::get('/', [\App\Http\Controllers\IndexController::class, 'loginPage']);

/*
 * Alla richiesta GET all'endpoint '/', viene eseguito il metodo registrationPage che torna
 * la pagina di registrazione.
 */
Route::get('/', [\App\Http\Controllers\IndexController::class, 'registrationPage']);

/*
 * ENDPOINT PROFILE
 *
 * questo metodo si occuperà di modificare il profilo
 */
Route::put('/profile/', [\App\Http\Controllers\ProfileController::class, 'updateProfile']);

/*
 * Questo metodo ritorna la home page con i placement aggiornati
 */
Route::post('/profile/', [\App\Http\Controllers\ProfileController::class, 'placementView']);



/*
 * ENDPOINT LOGIN
 *
 * Questo metodo ritorna la pagina di registrazione nel caso in cui l'utente non sia
 * ancora inscritto
 */
Route::get('/login/', [\App\Http\Controllers\LoginController::class, 'registrationPage']);

/*
 * Questo metodo verifica la email e in base alla risposta della verifica.
 *
 * L'idea è che torni un valore che permette a javascript di decidere cosa fare.
 */
Route::get('/login/loginCheck/', [\App\Http\Controllers\LoginController::class, 'loginCheck']);

/*
 * Questo metodo tornerà la pagina profilo del profilo corrispondente
 */
Route::get('/login/access/', [\App\Http\Controllers\LoginController::class, 'profilePage']);