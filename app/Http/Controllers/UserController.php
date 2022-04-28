<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            $imagename = time() . '_' . $imageuploaded->getClientOriginalName();
            $filepath = 'public/images';
            $imagepath = $request->image->storeAs($filepath, $imagename);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => '/images/' . $imagename,
        ]);

        return redirect('user');
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $user->update($request->all());

        if ($request->hasFile('image')) {
            $imageuploaded = $request->file('image');
            $imagename = time() . '_' . $imageuploaded->getClientOriginalName();
            $filepath = 'public/images';
            $imagepath = $request->image->storeAs($filepath, $imagename);
            $input['image'] = "/images/" . "$imagename";
        }
        
        $user->update($input);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('user');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
