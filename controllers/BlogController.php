<?php

class BlogController extends \BaseController {

    public function __construct() {
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
    public function index() {
        /**
         * 
          // retourner un json
         * return Response::json(['name'=>'karim','address'=>'Sevvran'],'200 OK');
         * 
         */
        $posts = Post::publish()->get();
        $cats = Category::all();



        return View::make('blog.index', ['posts' => $posts, 'cats' => $cats, 'title' => 'Essais Laravel']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response 
     */
    public function show($slug = '', $id) {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->publish()->get();
        $title = strip_tags($post->title); // voir le master

        return View::make('blog.single', compact('post', 'title', 'comments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showCategoryPost($slug = '', $id) {
        $cat = Category::find($id);
        $posts = $cat->posts;
        $title = strip_tags($cat->title);

        return View::make('blog.category', compact('cat', 'posts', 'title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showBlogPost() {
        $posts = Post::publish()->get();

        return View::make('blog.blog', compact('posts', 'title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showCommentPost($slug = '', $id) {
        $post = Post::find($id)->publish()->get();
        $comments = $post->comments()->publish()->get();
        $title = strip_tags($post->title);

        return View::make('blog.comment', compact('post', 'comments', 'title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function contact() {
        return View::make('blog.contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function create() {
        if (Input::server('REQUEST_METHOD') == 'POST') {



            $messages = array(
                'email' => 'le chanmp :attribute est requis',
                'username' => 'Vous devez indiquer un :attribute'
            );

            $validation = Validator::make(Input::all(), Comment::$rules, $messages);
            //$input = Input::all();
            $input = filter_input_array(INPUT_POST, [
                'post_id' => FILTER_VALIDATE_INT,
                'email' => FILTER_SANITIZE_EMAIL,
                'username' => FILTER_SANITIZE_STRING,
                'content' => FILTER_SANITIZE_STRING
            ]);

            if ($validation->fails()) {
                return Redirect::back()->withErrors($validation)->withInput();
            } else {
//                $comment = new Comment;
//                $comment->email = Input::get('email');
//                $comment->username = Input::get('username');
//                $comment->content = Input::get('content');
//                $comment->post_id = Input::get('post_id');
//                $comment->save();
                comment::create($input);

                return Redirect::back()->with('message', 'merci pour le message');
            }
        }
    }

    /**
     * Display our test page.
     *
     * @return View
     */
    public function users($id) {
        $user = User::find($id);

        $posts = $user->posts()->publish()->get();

        return View::make('blog.users', compact('user', 'posts'));
    }

    /**
     * Display our test page.
     *
     * @return View
     */
   

}
