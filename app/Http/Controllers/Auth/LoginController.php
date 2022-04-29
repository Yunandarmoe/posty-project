<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginStoreRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginStoreRequest $request)
    {           
        auth()->attempt($request->only('email', 'password'));       
        
        return redirect('/'); 
    }
}
