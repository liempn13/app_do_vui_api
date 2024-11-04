<?php

use App\Http\Controllers\TopicsController;
use App\Http\Controllers\UsersController;
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
    return view('welcome');
});

Route::get('/getTopics', [TopicsController::class, 'index']);
Route::get('/getFriends/{idUser}', [UsersController::class, 'getFriends']);
Route::get('/getPlayedHistory/{idUser}', [UsersController::class, 'getPlayedHistory']);

Route::post('/createTopics', [TopicsController::class, 'create']);
Route::post('/deleteTopics', [TopicsController::class, 'delete']);
Route::post('/updateTopics', [TopicsController::class, 'update']);
