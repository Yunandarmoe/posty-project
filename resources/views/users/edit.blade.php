@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-2/6 p-5 mt-8 bg-green-300 rounded-md">
  <div class="bg-green-300 p-4 rounded">
      <div class="container mt-4">
        <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="post" class="mt-5">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" class="bg-gray-100 border-2 w-full p-3 rounded-md @error('name') border-red-500 @enderror" value="{{old('name', $user->name)}}">
            @error('name')
              <div class="text-red-500 mt-2 text-sm">
                {{ ($message) }}
              <div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-3 rounded-md @error('email') border-red-500 @enderror" value="{{old('email', $user->email)}}">
            @error('email')
              <div class="text-red-500 mt-2 text-sm">
                {{ ($message) }}
              <div>
            @enderror
          </div>

          <div class=" mb-4">
            <label for="password" class="sr-only">password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-3 rounded-md @error('password') border-red-500 @enderror">
            @error('password')
              <div class="text-red-500 mt-2 text-sm">
                {{ ($message) }}
              <div>
            @enderror
          </div>

          <div class="input-group mb-4">
            <input type="file" name="image" class="form-control">
            @error('image')
              <div class="text-red-500 mt-2 text-sm">
                {{ ($message) }}
              <div>
            @enderror
          </div>

          <div>
            <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-2 py-2 rounded front-medium w-1/3">Update</button>
            <a href="{{ route('users.index') }}" class="bg-green-400 hover:bg-green-500 text-white px-2 py-2 rounded front-medium w-1/4 text-center float-right">Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection