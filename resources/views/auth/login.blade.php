@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-4/12 p-5 mt-5 bg-blue-300 rounded-md">
    <form action="{{ route('login') }}" method="post">
      @csrf
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
        <input type="password" name="password" id="name" placeholder="Your password" class="bg-gray-100 border-2 w-full p-3 rounded-md @error('password') border-red-500 @enderror" >
        @error('password')
          <div class="text-red-500 mt-2 text-sm">
            {{ ($message) }}
          <div>
        @enderror
      </div>

      <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded front-medium w-full">Login</button>
      </div>
    </form>
  </div>
</div>


@endsection