<?php

class AuthController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    
    public function __construct() {
        if(!Auth::guest()){
            return Redirect::to('admin/dashboard');
            exit();
        }
    }
    public function index() {
        if (Input::server('REQUEST_METHOD') == 'POST') {
            //dd($_POST);
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            $validation = Validator::make($userdata, [
                        'username' => 'required',
                        'password' => 'required'
            ]);

            if ($validation->fails()) {
                return Redirect::back()->withErrors($validation)->withInput(Input::Except('password'));
            } else {
                //user::create($input);
                if (Auth::attempt($userdata)) {
                    //$this->checked($userdata);
                    return Redirect::to('admin/dashboard');
                } else {
                    return Redirect::back()->with('message', 'desoler mais il y\'a une erreur');
                }
            }
        } else {
            return View::make('admin.login');
        }
    }
    
    private function checked($userdata){
        if (Auth::attempt($userdata)) {
                    //$this->checked($userdata);
                    return Redirect::to('dashboard')->with('message', 'welcolm dashboard');
                } else {
                    return Redirect::back()->with('message', 'desoler mais il y\'a une erreur');
                }
    }
    
    public function logout(){
        Auth::logout();
        return Redirect::to('/')->with('message','you logout');
    }
}
