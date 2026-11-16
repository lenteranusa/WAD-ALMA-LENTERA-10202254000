<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Don N Done')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header>
    <p class="brand"><a href="{{ route('home') }}" style="color:inherit;text-decoration:none;">Don N Done</a></p>
    <nav>
        <a href="#">Service &amp; Rate Module</a>
        <a href="{{ route('machines.index') }}" class="{{ request()->routeIs('machines.*') ? 'active' : '' }}">Machinery &amp; Equipment Module</a>
        <a href="#">Customer Data Module</a>
        <a href="#">Cleaning Material Module</a>
    </nav>
    <div style="margin-top:10px; font-size:13px;">
    {{ auth()->user()->name }} ({{ auth()->user()->role }})
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</header>

<div class="page">
    @yield('content')
</div>
</body>
</html>