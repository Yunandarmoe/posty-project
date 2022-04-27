@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-6/12 p-5 mt-5 bg-blue-300 rounded-md">
    <div class="bg-light p-4 rounded">
      <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-2 py-2 rounded front-medium">Go to the user's list</a>
    </div>
  </div>
</div>

@endsection