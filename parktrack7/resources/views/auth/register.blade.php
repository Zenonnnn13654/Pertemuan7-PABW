
<h2>Register ParkTrack</h2>

<form action="{{ url('/register') }}" method="POST">
    @csrf

    <p>Nama</p>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name') <p>{{ $message }}</p> @enderror

    <p>Email</p>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email') <p>{{ $message }}</p> @enderror

    <p>Password</p>
    <input type="password" name="password">
    @error('password') <p>{{ $message }}</p> @enderror

    <p>Konfirmasi Password</p>
    <input type="password" name="password_confirmation">

    <br><br>
    <button type="submit">Register</button>
</form>

<a href="{{ url('/login') }}">Sudah punya akun? Login</a>
