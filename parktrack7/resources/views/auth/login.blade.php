
<!DOCTYPE html>
<html>
<head>
    <title>Login ParkTrack</title>
</head>
<body>
    <h2>Login ParkTrack</h2>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <br><br>

        <label>Password</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit">Login</button>
    </form>

    <a href="{{ route('register') }}">Register</a>
</body>
</html>
