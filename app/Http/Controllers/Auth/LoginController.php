<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class LoginController extends Controller
{

    //protected $redirectTo = '/home';
    
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Will return only validated data
       
        //$request->validated();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        auth()->attempt($request->only('email', 'password'));       
        
        return redirect()->route('home'); 
    }
}
