@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-4/12 p-5 mt-5 bg-blue-300 rounded-md">
    <form action="{{ route('register.store') }}" enctype="multipart/form-data" method="post" class="mt-5">
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

      <div class="input-group mb-4">
        <input type="file" name="image" class="form-control">
        @error('image')
          <div class="text-red-500 mt-2 text-sm">
            {{ ($message) }}
          <div>
        @enderror
      </div>

      <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded front-medium w-full">Register</button>
      </div>
    </form>

  </div>
</div>

@endsection