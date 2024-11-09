<?php

use App\Http\Controllers\FriendsController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\PlayedHistorysController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuestionSetsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\TopicsController;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () { // Cần đăng nhập và lấy ra token để dùng các chức năng
    Route::controller(
        UsersController::class
    )->group(function () {
        Route::get('/v1/users', 'index'); // Lấy ra toàn bộ danh sách user
        Route::get('/v1/user/info/{id}', 'getUserInfo'); // lấy ra 1 user
        Route::post('/v1/logout', 'logout');
        Route::put('/v1/user/info/update', 'update');
    });
    //
    Route::controller(
        FriendsController::class
    )->group(function () {});
    //
    Route::controller(
        QuestionSetsController::class
    )->group(function () {
        Route::get('/v1/set/{id}', 'getQuestionSet');
        Route::get('/v1/set/details/{id}', 'getQuestionSetDetails');
        Route::put('/v1/set/update', 'update');
        Route::post('/v1/set/create', 'create');
        Route::delete('', '');
    });
    Route::controller(TopicsController::class)->group(function () {
        Route::get('/v1/topics', 'index');
        Route::get('/v1/topic/{id}', '');
        Route::put('/v1/topic/update', 'update');
        Route::post('/v1/topic/create', 'create');
        Route::delete('/v1/topic/delete', 'delete');
    });
    Route::controller(QuestionsController::class)->group(function () {
        Route::get('/v1', '');
        Route::get('/v1/question', '');
        Route::put('/v1/question/update', 'update');
        Route::post('/v1/question/create', 'create');
        Route::delete('/v1/question/delete', 'delete');
    });
    Route::controller(RoomsController::class)->group(function () {
        Route::get('/v1/rooms', 'index');
        Route::put('/v1/room/update', 'update');
        Route::post('/v1/room/create', 'create');
    });
    Route::controller(PlayedHistorysController::class)->group(function () {
        Route::get('/v1', 'index');
        Route::put('/v1', 'update');
        Route::post('/v1', 'create');
    });
    Route::controller(OptionsController::class)->group(function () {
        Route::get('/v1/options/question/{id}', 'getOptionsOfQuestion');
        Route::put('/v1/option/update', 'update');
        Route::post('/v1/option/create', 'create');
        Route::delete('/v1/option/delete', 'delete');
    });
});
Route::controller(UsersController::class)->group(function () {
    Route::post('/v1/user/auth/register', 'create'); // đăng kí
    Route::post('/v1/auth/login/email', 'emailLogin');
    Route::post('/v1/auth/login/phone', 'phoneNumberLogin');
});