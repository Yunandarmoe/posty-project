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
        @foreach ($images as $image)
          <img src="{{ asset('./upload/' . $image->name) }}" alt="" class="image rounded-circle" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
        @endforeach
      </li>
      <li class="p-3">
        <p>{{ auth()->user()->name }}</p>
      </li>
      <li class="p-3">
        <form action="{{ route('logout') }}" method="post">
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
  <div>

  </div>


  @yield('content')
</body>

</html>