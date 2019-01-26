<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/{any}', 'SinglePageController@index')
        ->where('any', '.*');

    Route::get('logout', function(){
        Auth::logout();
        return redirect('');
    });

//    Route::get('/', function () {
//        return view('welcome');
//    });
