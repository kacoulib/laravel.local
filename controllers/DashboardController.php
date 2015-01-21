<?php

class DashboardController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $posts = Post::NoTrash()->paginate(2);
        $links = $posts->links();

        return View::make('admin.dashboard', compact('posts', 'links'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function trash() {

        $posts = Post::trash()->paginate(2);
        $links = $posts->links();

        return View::make('admin.trash', compact('posts', 'links'));
    }


    public function changeStatus() {

        if (!empty($_POST)) {
            $status = Input::get('status');

            if (!in_array($status, ['publish', 'unpublish', 'trash', 'delete'])) {
                throw new InvalidArgumentException('bad argument');
            }

            $posts = Input::get('posts');

            if (empty($posts)) {
                return Redirect::back()->with('message', 'Aucune selection n\'a été faite!!!');
            }


            if ($status !== 'delete') {
                foreach ($posts as $id) {

                    $a = Post::findOrFail((int) $id);
                    $a->status = $status;
                    $a->save();
                }
            } else {
                foreach ($posts as $id) {
                    $a = Post::findOrFail((int) $id);
                    $a->delete();
                }
            }
        }

        return Redirect::back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function logout() {

        Auth::logout();

        return Redirect::to('/');
    }

}
