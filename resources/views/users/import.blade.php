@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-6/12 p-5 mt-5 bg-blue-300 rounded-md">
    <div class="bg-light p-4 rounded">
      <div class="container">
        @if(Session::has('import_errors'))
          @foreach (Session::get('import_errors') as $failure)
            <p class="p-3 rounded-md" style="background-color: #e53e3e; margin-bottom: 5px">           
              {{ $failure->errors()[0] }} at line no - {{ $failure->row() }}
            <p>
          @endforeach
        @endif
        <div>
          <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control mt-5">
            @error('file')
              <div class="text-red-500 text-sm">
                {{ ($message) }}
              <div>
            @enderror
            <br>
            <div class="mt-5">
              <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Import Data</button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection