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
    return view('home');
})->name('home');

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/registration', function(){
    return view('registration');
});

Route::get('/profile', function(){
    return view('profile');
})->name('profile');

/*
 * Endpoint per la registrazione di un employer e di uno student
 */
Route::post('/registration/student', [\App\Http\Controllers\RegistrationController::class, 'StudentRegistration']);

Route::post('/registration/employer', [\App\Http\Controllers\RegistrationController::class, 'EmployerRegistration']);

/*
 * Endpoint per la verifica delle credenziali in fase di login
 */
Route::post('/loginCheck', [\App\Http\Controllers\LoginController::class, 'loginCheck'])->name('loginCheck');

/*
 * Endpoint student
 */
Route::post('student/update', [\App\Http\Controllers\StudentController::class, 'update']);

Route::post('student/delete', [\App\Http\Controllers\StudentController::class, 'delete']);

Route::post('student/request/create', [\App\Http\Controllers\StudentController::class, 'createRequest']);

Route::post('student/request/update', [\App\Http\Controllers\StudentController::class, 'updateRequest']);

Route::post('student/request/delete', [\App\Http\Controllers\StudentController::class, 'deleteRequest']);

Route::get('student/request/list', [\App\Http\Controllers\StudentController::class, 'requestList']);

/*
 * Endpoint Employer
 */

