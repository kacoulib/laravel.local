<?php
// any <> post et get
Route::any('login','AuthController@index');
Route::get('logout','DashboardController@logout');

Route::group(['prefix'=>'admin', 'before'=>'Auth'], function(){
    
    Route::get('dashboard','DashboardController@index');
    Route::post('status','DashboardController@changeStatus');

    Route::get('trash','DashboardController@trash');
    
    Route::Resource('post','PostController');
});

