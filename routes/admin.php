<?php

Route::get('/', 'BlogController@index');
Route::get('single/{slug}/{id}','BlogController@show');
Route::get('users/{id}','BlogController@users');
Route::get('category/{slug}/{id}','BlogController@showCategoryPost');
Route::get('blog/','BlogController@showBlogPost');
Route::get('comments/{slug}/{id}','BlogController@showCommentPost');
Route::get('contact','BlogController@contact');


Route::post('comments/{slug}/{id}','BlogController@Create');
Route::post('contact',function(){
        return'oui';});
// pour filtre les post et get
//route::post('comment',['before'=>'csrf'],'BlogController@create');



