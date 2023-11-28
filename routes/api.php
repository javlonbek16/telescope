<?php

use App\Http\Controllers\AboutUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserCertficateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(

    ['middleware' => ['auth:sanctum']],

    function () {
        Route::resource('project', ProjectController::class)->only([
            'index', 'show', 'store', 'update', 'destroy'
        ]);
        Route::resource('about-user', AboutUserController::class)->only([
            'show', 'store', 'update', 'destroy'
        ]);
        Route::get('test', [AboutUserController::class, 'test']);
        Route::resource('certificate', UserCertficateController::class)->only([
            'index', 'show', 'store', 'update', 'destroy'
        ]);
    }
);

Route::resource('about-user', AboutUserController::class)->only([
    'show'
]);

Route::resource('project', ProjectController::class)->only([
    'index', 'show'
]);

Route::resource('certificate', UserCertficateController::class)->only([
    'index', 'show'
]);
