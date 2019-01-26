<?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');

    Route::group(['middleware' => 'auth:api'], function (){
        Route::get('/category/{category}/tasks', 'CategoryController@tasks');
        Route::resource('/category', 'CategoryController');
        Route::resource('/task', 'TaskController');
    });


