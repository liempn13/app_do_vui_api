<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuestionSetsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(
    UsersController::class
)->group(function () {
    Route::get('', '');
    Route::put('', '');
    Route::post('',);
    Route::delete('', '');
});
Route::controller(
    QuestionSetsController::class
)->group(function () {
    Route::get('/v1/set/{id}', 'getQuestionSet');
    Route::put('', '');
    Route::post('',);
    Route::delete('', '');
});