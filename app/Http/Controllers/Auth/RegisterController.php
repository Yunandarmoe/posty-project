<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Image;

class RegisterController extends Controller
{
    public function __construct()
    {

        $this->middleware(['guest']);
    }

    public function index()
    {
        $images = Image::all();
        return view('auth.register', compact('images'));
    }

    public function store(RegisterStoreRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('upload', $filename);

            $image = new Image();
            $image->name = $filename;
            $image->save();
        }
        return redirect()->route('login');
    }
}
