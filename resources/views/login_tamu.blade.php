<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/login_tamu.css')}}">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm">
            <input type="email" id="email" name="email" placeholder="Email" required>
            
            <input type="password" id="password" name="password" placeholder="Password"  required>
            
            <button type="submit">Masuk</button>
        </form>
        <p>Apakah anda belum memiliki akun? <a href="#">Register</a></p>
        <div id="error-message"></div>
    </div>
    <script src="{{asset('js/login.js')}}"></script>
</body>
</html>
