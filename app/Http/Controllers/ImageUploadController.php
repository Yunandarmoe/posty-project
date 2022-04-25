<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function index()
    {
        return view('image');
    }

    public function store (Request $request) 
    {
        //$request->file('image')->move(public_path('image', 'a.jpg'));
        dd($request->all());
        return back();
    }
}
