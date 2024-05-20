<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/login_tamu.css')}}">
    <title>Login Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Mooli&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="center">
        <div class="login_card">
            <div class="login_picture">
                <img src="{{asset('img/tch.png')}}">
            </div>
            <div class="login_form">
                <div class="text">
            <h1> Login </h1>
                </div>
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
                    <div class="input-container">
                        <input type="email" value="{{ old('email') }}" id="email" name="email" required placeholder="Email">
                    </div>
                    <div class="input-container">
                        <span><i id="toggler"class="far fa-eye"></i></span>
                        <input type="password" id="fakePassword" name="password" required placeholder="Password">
                      </div>

                    <button name="submit" type="submit" class="btn btn-primary">Masuk</button>
                    <br>
                    <br>
                    <a class="button-link" href=".php">Apakah anda belum memiliki akun ? register</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/togglePassword.js') }}"></script>

</html>
