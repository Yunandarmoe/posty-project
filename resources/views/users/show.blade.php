@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-2/6 p-5 mt-8 bg-gray-300 rounded-md">
    <div class="container mt-4">
      <h1 class="text-xl mb-5" style="font-weight: bold">User's Information</h1>
      <p class="mb-2">Name: {{ $user->name }}</p>
      <p class="mb-2">Email: {{ $user->email }}</p>
    </div>
    <div class="mt-4">
        <a href="{{ route('users.edit', $user->id) }}" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">Edit</a>
        <a href="{{ route('users.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Back</a>
    </div>
  </div>
</div>
</div>

@endsection