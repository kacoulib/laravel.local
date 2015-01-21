<?php

class PostController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return "hello index ressource";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $categories = Category::all();

        return View::make('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $post = Input::get();
        $user_id = Auth::id();

        $p = new Post;

        $p->title = $post['title'];
        $p->category_id = $post['category_id'];
        $p->user_id = $user_id;

        $p->content = $post['content'];
        $p->status = $post['status'];

        $p->save();


        return Redirect::to('admin.show')->with('message','post creer!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->publish()->get();
        $title = strip_tags($post->title); // voir le master

        return View::make('admin.show', compact('post', 'title', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $posts = Post::all();
        $post = $posts->find($id);
        $categories = Category::all();

        return View::make('admin.edit', compact('posts', 'post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        $post = Input::get();
        $user = Post::findOrFail($id);

        $user->title = $post['title'];
        $user->content = $post['content'];
        $user->category_id = $post['category_id'];
        $user->status = $post['status'];
        $user->save();

        return Redirect::to('admin.dashboard')->with('message','updated well!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
