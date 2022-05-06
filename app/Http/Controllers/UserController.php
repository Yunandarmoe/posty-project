<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gallery;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Exports\CsvExport;
use Illuminate\Http\Request;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->paginate(5);
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
            $imagepath = $request->image->storeAs('public/images', $imagename);

            $gallery = new Gallery();
            $gallery->image = $imagename;
            $gallery->save();
        }

        if ($request->hasFile('image')) {
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
            $imagename = time() . '_' . $imageuploaded->getClientOriginalName();
            $imagepath = $request->image->storeAs('public/images', $imagename);
            $input['image'] = "/images/" . "$imagename";

            $gallery = new Gallery();
            $gallery->image = $imagename;
            $gallery->save();
        }

        $id->update($input);

        $id->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.show', $id);
    }

    public function destroy(User $id)
    {
        $id->delete();
        return back();
    }

    public function importview()
    {
        return view('users.import');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv',
        ], [
            'file.required' => 'Please choose a file',
        ]);

        try {
            $file = $request->file('file');
            Excel::import(new CsvImport, $file);
            return redirect()->route('users.index')
                ->with('import_success', 'User file has been imported');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return redirect()->back()
                ->with('import_errors', $failures);
        }
    }

    public function export()
    {
        return Excel::download(new CsvExport, 'sample.csv');
    }
}
