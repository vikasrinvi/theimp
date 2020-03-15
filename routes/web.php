<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome'); 
Route::post('/links','LinkController@store')->name('shorten');
Route::get('/{link:code}','LinkController@show')->name('redirect');