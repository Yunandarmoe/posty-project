@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-6/12 p-5 mt-5 bg-blue-300 rounded-md">
    <div class="bg-light p-4 rounded">
      Please check your email. If you did not receive the email, 
      <form action="{{ route('verification.resend') }}" method="post" class="d-inline">
        @csrf
        <button type="submit" class="bg-blue-500 text-white px-2 py-2 rounded front-medium">
          click here to request another
        </button>
      </form>
    </div>
  </div>
</div>

@endsection