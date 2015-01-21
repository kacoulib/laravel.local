<?php

class BlogController extends \BaseController {
        
        public function __construct()
        {
            View::composer('layouts.master', function($view) {
                $categories = Category::all();
                $view->with('categories', $categories);
            });
        }
        
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            /**
             * 
             // retourner un json
             * return Response::json(['name'=>'karim','address'=>'Sevvran'],'200 OK');
             * 
             */
            $posts = Post::publish()->get();
            $cats = Category::all();
            
            

            return View::make('blog.index', ['posts'=>$posts,'cats'=>$cats,'title'=>'Essais Laravel']);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug='', $id)
	{
            $post = Post::find($id);
            $comments = $post->comment;
            $title = strip_tags($post->title); // voir le master
            
            return View::make('blog.single', compact('post', 'title', 'comments'));
	}
	
        /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showCategoryPost($slug='', $id)
	{
            $cat = Category::find($id);
            $posts = $cat->posts;
            $title = strip_tags($cat->title);
            
            return View::make('blog.category', compact('cat','posts','title'));
	}
        /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showBlogPost()
	{
            $posts = Post::all();
            
            return View::make('blog.blog', compact('posts','title'));
	}
        /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showCommentPost($slug='', $id)
	{
            $post = Post::find($id);
            $comments = $post->comment;
            $title = strip_tags($post->title);
            
            return View::make('blog.comment', compact('post','comments','title'));
	}
        /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function contact()
	{
            return View::make('blog.contact');
	}
        
        /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function create($slug='',$id)
	{
            $regles = array(
			'email' => 'required|email',
			'nom' => 'required|nom'
		);
            
            $validation = Validator::make(Input::all(), $regles);

		if ($validation->fails()) {
		  return Redirect::to('comments/'.$slug.'/'.$id)->withErrors($validation)->withInput();
		} else {
			return View::make('blog.confirm');
		}
	}
        
        /**
	 * Display our test page.
	 *
	 * @return View
	 */
	public function users($id)
	{
            $user = User::find($id);
            
            $posts= $user->posts();
            
            return View::make('blog.users', compact('user','posts'));
	}


}
