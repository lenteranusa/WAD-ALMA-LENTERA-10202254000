<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Don N Done</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="page" style="max-width:400px; padding-top:60px;">
    <h1>Don N Done Login</h1>
    <div class="card">
        <form method="POST" action="{{ route('login') }}" style="display:flex; flex-direction:column; gap:10px;">
            @csrf
            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required
                   style="font-size:14px; padding:6px 8px; border:1px solid #3368A0; border-radius:6px;">
            <button type="submit">Log in</button>
            @if ($errors->any())
                <p style="color:#A0333F; margin:0;">{{ $errors->first() }}</p>
            @endif
        </form>
        <p style="text-align:center; margin:14px 0 0; font-size:14px;">
    No account yet? <a href="{{ route('register') }}" style="color:#1c2b4a;">Register</a>
</p>
    </div>
</div>
</body>
</html>