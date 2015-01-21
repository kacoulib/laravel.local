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
route::pattern('id','[1-9][0-9]*');

Route::when('*','csrf',['post']);

Route::filter('old', function()
{
    if (Input::get('age') < 200)
    {
        return Redirect::to('/');
    }
});
foreach (File::allFiles(__DIR__.'/routes')as $partials){
    require_once $partials->getPathname();
}

