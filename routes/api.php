<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::group([

  
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'Authcontroller@register');

});

Route::group([
], function ($router) {

    Route::get('ProcessList', 'DoController@ProcessList')->name('ProcessList');
    Route::get('NewDir', 'DoController@NewDir')->name('NewDir');
    Route::get('NewFile', 'DoController@NewFile')->name('NewFile');
    Route::get('DirList', 'DoController@DirList')->name('DirList');
    Route::get('FileList', 'DoController@FileList')->name('FileList');

});
