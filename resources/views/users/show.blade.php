@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-2/6 p-5 mt-8 bg-gray-300 rounded-md">
    <div class="container mt-4">
      <h1 class="text-xl mb-5 text-center" style="font-weight: bold">User's Information</h1>
      @if($user->image)
      <img src="{{ Storage::url($user->image) }}" alt="Profile Image" style="height: 100px; width: 100px; border-radius: 50%; border: 1px solid #fff; margin: 0 auto;">
      @else
      <img src="{{ asset('storage/images') . '/' . 'avatar.jpg' }}" alt="Avatar Image" style="height: 100px; width: 100px; border-radius: 50%; border: 1px solid #fff; margin: 0 auto;">
      @endif
      <p class="mb-2 text-center mt-4">Name: {{ $user->name }}</p>
      <p class="mb-2 text-center mt-4 mb-5">Email: {{ $user->email }}</p>
    </div>
    <div class="mt-5" style="width: 140px; margin: 0 auto;">
      <a href="{{ route('users.edit', $user->id) }}" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">Edit</a>
      <a href="{{ route('users.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Back</a>
    </div>
  </div>
</div>
</div>

@endsection