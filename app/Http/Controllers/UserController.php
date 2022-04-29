<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gallery;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
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
                'image' => "/images/" . $imagename,     
            ]);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]); 
        }
        return redirect('users');
    }

    public function show(User $id)
    {
        return view('users.show', [
            'user' => $id
        ]);
    }

    public function edit(User $id)
    {
        return view('users.edit', [
            'user' => $id
        ]);
    }

    public function update(User $id, UserUpdateRequest $request)
    {
        $id->update($request->all());

        if ($request->hasFile('image')) {
            $imageuploaded = $request->file('image');
            $imagename = time() .'_'. $imageuploaded->getClientOriginalName();
            $imagepath = $request->image->storeAs('images', $imagename);
            $input['image'] = "/images/" . "$imagename";
            
            $gallery = new Gallery();
            $gallery->image = $imagename;
            $gallery->save();
        }
        
        $id->update($input);

        $id->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('users');
    }

    public function destroy(User $id)
    {
        $id->delete();
        return back();
    }
}
