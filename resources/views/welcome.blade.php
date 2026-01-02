<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>

<body>
    <div style="text-align: center; margin-top: 100px;">
        <h1>Selamat Datang di Toko Kita</h1>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}">Ke Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a> |
                    <a href="{{ route('register') }}">Daftar Akun Baru</a>
                @endauth
            </div>
        @endif
    </div>
</body>

</html>
