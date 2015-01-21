<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// mettre en place les items du menu dans le master.blade.php, les items sont dans unul li cliquable.
// definir les routes category/{slug}/{id}

// dans le controller BlofController implementer la methode showCategoryPost($slug, $id)
// vous affichez les posts d'une categorie dans une vue category.blade.php
//                          exo
//creez une route de type post
// routes/blog.php
//route::post('comment','BlogController@create');

// mettre en place la vue show.blade.php
// regarder sur le site laravel.com heper form
 
//{{Form::open(['url'=>'comment'])}}
// {{Form::label('email','votre email(*)')}}
// {{Form::label('email',input::old('email', ['require'])}}
// {{$errors->has('email')? $errors->first('email'):'')}}
// {{Form::close()}}
// 
// //dans le controleur BlogController
// 
// public function create(){
//     if(Input::server('RESUEST_METHOD')=='post'){
//         dd(input:all);
//     }
// }

/**
 * creer un template login.blade
 *      username + password
 * créez la route qui affiche ce formulaire
 * on va également créer un controller spécifique pour bérifier le couple username + password => AuthController avec deix methodes:
 *      index + logout
 *      Auth::atempt($userdata, $remember); //$remember paramettre facultatif  
 *      Auth::logout(); //pour se deloguer 
 *      Auth::guest();
 */



                        $table->increments('id');
			$table->string('username',128);
			$table->string('email',128)->unique();
			$table->string('password',64);
			$table->enum('role', array('administrator', 'editor', 'dash'))->default('editor');
			$table->string('remember_toke',100)->unique();
			$table->timestamps();


		{
			$table->increments('id');
                        $table->integer('user_id')->unsigned()->nullable();
                        $table->string('title',50);
			$table->string('slug',50);
			$table->text('excerpt');
			$table->text('content');
			$table->string('link_thumbnail', 200);
			$table->integer('comments_count')->default(0);
			$table->enum('status', array('publish', 'unpublish', 'dash'))->default('unpublish');
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
			$table->timestamps();

                
                        $table->increments('id');
                        $table->string('username');
                        $table->text('content');
                        $table->integer('post_id',10);
			$table->timestamps();
                        