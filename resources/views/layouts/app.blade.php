<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Posty Project</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white">
  <nav class="p-5 bg-blue-400 flex justify-between">
    <ul class="flex justify-between items-center">
      <li class="p-3">
        <a href="">Home</a>
      </li>
    </ul>

    <ul class="flex justify-between items-center">
      @auth
      <li>
        @if(Auth::user()->image)
          <img src="{{ Auth::user()->getImage() }}" alt="" style="height: 50px; width: 50px; border-radius: 50%; border: 1px solid #fff;">
        @else
          <img src="{{ asset('storage/images') . '/' . 'avatar.jpg' }}" alt="No photo" style="height: 50px; width: 50px; border-radius: 50%; border: 1px solid #fff;">
        @endif
      </li>
      <li class="p-3">
        <p>{{ auth()->user()->name }}</p>
      </li>
      <li class="p-3">
        <form action="{{ route('logout') }}" method="get">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </li>
      @endauth

      @guest
      <li class="p-3">
        <a href="{{ route('register') }}">Register</a>
      </li>
      <li class="p-3">
        <a href="{{ route('login') }}">Login</a>
      </li>
      @endguest
    </ul>
  </nav>
  @yield('content')
</body>

</html>