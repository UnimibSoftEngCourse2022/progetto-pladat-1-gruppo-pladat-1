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

/*
Metodo di appoggio
*/
Route::get('/user', function () {
    return response(User::all()->jsonSerialize(), 200);
});

/*
*   STUDENT
*/
Route::resource('student', \App\Http\Controllers\StudentController::class, ['except'=>['index']]);

Route::get('student/{student}/category', [\App\Http\Controllers\StudentController::class, 'getCategory']);

Route::post('student/{student}/edit', [\App\Http\Controllers\StudentController::class, 'update']);

Route::get('student/{student}/delete', [\App\Http\Controllers\StudentController::class, 'destroy']);
/*
 * EMPLOYER
 */
Route::resource('employer', \App\Http\Controllers\EmployerController::class, ['except'=>['index']]);

Route::post('employer/{employer}/edit', [\App\Http\Controllers\EmployerController::class, 'update']);

Route::get('employer/{employer}/delete', [\App\Http\Controllers\EmployerController::class, 'destroy']);


/*
* PLACEMENT
*/
Route::resource('employer.placement', \App\Http\Controllers\PlacementController::class);

Route::get('employer/{employer}/placementopen', [\App\Http\Controllers\PlacementController::class, 'indexActivePlacement']);

Route::get('employer/{employer}/placementclosed', [\App\Http\Controllers\PlacementController::class, 'indexClosedPlacement']);

Route::get('placement/{category}', [\App\Http\Controllers\SearchController::class, 'searchCategory']);

Route::get('placement/{placement}/byid', [\App\Http\Controllers\SearchController::class, 'searchById']);



/*
*   REQUEST
*/
Route::resource('student.request', \App\Http\Controllers\RequestController::class);

Route::get('/session',[\App\Http\Controllers\SessionController::class, 'dataSession'])->middleware('auth');
