<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::when('*','csrf',['post']);

route::pattern('id','[1-9][0-9]*');
foreach (File::allFiles(__DIR__.'/routes')as $partials){
    require_once $partials->getPathname();
}
// exemple controller/action

app::missing(function($exception){
   return Response::view('error', [],404);
 
});

