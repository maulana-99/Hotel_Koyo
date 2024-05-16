
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/login_tamu.css')}}">
    <title>Login Dashboard</title>
    
</head>
<body>
    <div class="center">
        <div class="login_card">
            <div class="login_picture">
                <img src="{{asset('img/oke.jpg')}}">
            </div>
            <div class="login_form">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form id="loginForm" method="post" action="">
                    @csrf
                    <input type="email" value="{{ old('email') }}" id="email" name="email" required placeholder="Email">
                    <input type="password" id="password" name="password" required placeholder=" Password">

                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                    <br>
                    <br>
                    <a class="button-link" href=".php">Apakah anda belum memiliki akun ? register</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
