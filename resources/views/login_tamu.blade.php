
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
                <form id="loginForm" method="post" action="proses_login.php">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter Username">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter Password">
                    <input type="submit" value="Login">
                    <br>
                    <br>
                    <a class="button-link" href="login_siswa.php">Apakah anda belum memiliki akun ? register</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
