@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-center">
    <form method="post" enctype="multipart/form-data" class="mt-5">
      @csrf
      <div class="input-group">
        <input type="file" name="image[]" multiple class="form-control" aria-label="Upload">
        <button class="btn btn-primary" type="submit">Upload</button>
      </div>
    </form>
  </div>
  <div class="row mt-5">
    @foreach ($galleries as $gallery)
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-body">
          <img src="{{ $gallery->image_link }}" alt="" class="">
        </div>
        <div class="card-footer">
          <a href="{{ $gallery->image_link }}" target="_blan" class="btn btn-info">View</a>
          <a href="{{ route('register.download', $gallery->id) }}" class="btn btn-success">Download</a>
          <a href="{{ route('register.destroy', $gallery->id) }}" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<div class="flex justify-center">
  <div class="w-4/12 p-5 mt-5 bg-blue-300 rounded-md">
    <form action="{{ route('register') }}" method="post" class="mt-5">
      @csrf
      <div class="mb-4">
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-3 rounded-md @error('name') border-red-500 @enderror" value="{{ old('name') }}">
        @error('name')
        <div class="text-red-500 mt-2 text-sm">
          {{ ($message) }}
          <div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-3 rounded-md @error('username') border-red-500 @enderror" value="{{ old('username') }}">
            @error('username')
            <div class="text-red-500 mt-2 text-sm">
              {{ ($message) }}
              <div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-3 rounded-md @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                  {{ ($message) }}
                  <div>
                    @enderror
                  </div>

                  <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="name" placeholder="Your password" class="bg-gray-100 border-2 w-full p-3 rounded-md @error('password') border-red-500 @enderror">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                      {{ ($message) }}
                      <div>
                        @enderror
                      </div>

                      <div class="mb-4">
                        <label for="password_confirmation" class="sr-only">Confirm your password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" class="bg-gray-100 border-2 w-full p-3 rounded-md">
                      </div>

                      <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded front-medium w-full">Register</button>
                      </div>
    </form>
  </div>
</div>

@endsection