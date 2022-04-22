<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(StorePostRequest $request)
    {
        // Will return only validated data

        $validated = $request->validated();

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }

}
