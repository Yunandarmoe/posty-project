<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;
use App\Models\User;
use App\Models\Gallery;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        $galleries = Gallery::all();
        return view('auth.register', compact('galleries'));
    }

    public function store(RegisterStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $imageuploaded = $request->file('image');
            $imagename = time() .'_'. $imageuploaded->getClientOriginalName();
            $imagepath = $request->image->storeAs('images', $imagename);

            $gallery = new Gallery();
            $gallery->image = $imagename;
            $gallery->save();
        }
        
        if($request->hasFile('image')) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),   
                'image' => "images/" . $imagename,     
            ]);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]); 
        }

        return redirect()->route('login');
    }
}
