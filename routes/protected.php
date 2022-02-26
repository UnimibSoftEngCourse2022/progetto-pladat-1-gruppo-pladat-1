<?php

use Illuminate\Support\Facades\Route;

/*
*   STUDENT
*/
Route::resource('student', \App\Http\Controllers\StudentController::class, ['except'=>['index']]);

Route::get('student/{student}/category', [\App\Http\Controllers\StudentController::class, 'getCategory']);

Route::post('student/{student}/edit', [\App\Http\Controllers\StudentController::class, 'update']);

Route::get('student/{student}/delete', [\App\Http\Controllers\StudentController::class, 'destroy']);

/*
Route::post('student/{student}/addImage', [\App\Http\Controllers\StudentController::class, 'addImage']);

Route::get('student/{student}/getImage', [\App\Http\Controllers\StudentController::class, 'getImage']);
*/

/*
 * EMPLOYER
 */
Route::resource('employer', \App\Http\Controllers\EmployerController::class, ['except'=>['index']]);

Route::post('employer/{employer}/edit', [\App\Http\Controllers\EmployerController::class, 'update']);

Route::get('employer/{employer}/delete', [\App\Http\Controllers\EmployerController::class, 'destroy']);

Route::post('employer/{employer}/addImage', [\App\Http\Controllers\EmployerController::class, 'addImage']);

Route::get('employer/{employer}/getImage', [\App\Http\Controllers\EmployerController::class, 'getImage']);

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

Route::get('request/{placement}/index', [\App\Http\Controllers\RequestController::class, 'indexByPlacement']);

Route::get('student/{student}/requestActive', [\App\Http\Controllers\RequestController::class, 'requestActive']);

Route::get('student/{student}/requestClosed', [\App\Http\Controllers\RequestController::class, 'requestClosed']);


Route::get('/session',[\App\Http\Controllers\SessionController::class, 'dataSession']);