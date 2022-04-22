<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Posty Project</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-300">
  <nav class="p-5 bg-white flex justify-between">
    <ul class="flex justify-between items-center">
      <li class="p-3">
        <a href="">Home</a>
      </li>
    </ul>

    <ul class="flex justify-between items-center">
      <li class="p-3">
        <a href="">Username</a>
      </li>
      <li class="p-3">
        <a href="">Login</a>
      </li>
      <li class="p-3">
        <a href="">Logout</a>
      </li>
    </ul>
  </nav>

  @yield('content')
</body>
</html>