@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-6/12 p-5 mt-8 bg-blue-300 rounded-md">
    <div class="bg-light p-4 rounded">
      <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-2 py-2 rounded front-medium float-right">Add new user</a>
    </div>
    <table class="mt-6">
      <thead>
        <tr>
          <th class="w-40">No</th>
          <th class="w-2/5">Name</th>
          <th class="w-2/5">Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr class="mb-3">
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td><a href="{{ route('users.show', $user->id) }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Show</a></td>
          <td><a href="{{ route('users.edit', $user->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a></td>
          <td>
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection