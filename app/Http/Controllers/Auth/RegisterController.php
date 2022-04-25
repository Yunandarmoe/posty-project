<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePostRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('upload', $filename);

                $gallery = new Gallery();
                $gallery->name = $filename;
                $gallery->save();
            }
            return back();
        }

        //$validated = $request->validated();

        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login');

        auth()->attempt($request->only('email', 'password'));
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::delete('upload/' . $gallery->name);
        $gallery->delete();

        return back();
    }

    public function download($id)
    {
        $gallery = Gallery::findOrFail($id);
        return Storage::download('upload/' . $gallery->name);
    }
}
