<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class SessionController extends Controller
{
        public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']); 
    }

         /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */ 
    public function showLoginForm() {
	    if(Auth::check()){
            return redirect()->intended('/');
	    }else{
			return view('login');
	    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
        public function login(Request $request) {

        $messages = [
            'inputUsername.required'        => 'El usuario es requerido.',
            'inputPassword.required'    => 'El password es requerido.',
        ];

        $this->validate($request, [
            'inputUsername' => 'required',
            'inputPassword' => 'required',
        ], $messages);
        //guard('sistema')->
        if (Auth::attempt(['username' => $request->inputUsername, 'password' => $request->inputPassword, 'rol' => 'superadministrador'], $request->has('remember') )) {
            return redirect()->intended('/');
        } elseif (Auth::attempt(['email'=> $request->inputUsername, 'password' => $request->inputPassword, 'rol' => 'superadministrador'], $request->has('remember')) ) {
            return redirect()->intended('/');
        } else {
            $loginFailed = [
                'loginFailed' => 'Usuario o contraseña son incorrectos',
            ];
            return redirect()->back()->withInput()->withErrors($loginFailed);
        }

    }

        public function logout() {
        Auth::logout();
        return redirect()->intended('/login');
    }

}
