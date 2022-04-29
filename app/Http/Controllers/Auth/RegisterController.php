<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterStoreRequest;
use App\Models\Gallery;

class RegisterController extends Controller
{
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
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),   
                'image' => "images/" . $imagename,     
            ]);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]); 
        }
        auth()->login($user);
        return redirect('/');
    }
}
