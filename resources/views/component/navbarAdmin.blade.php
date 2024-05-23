<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #ddd;
    font-size: 24px;
}

.navbar h1 {
    margin: 0;
}

.navbar .profile {
    display: flex;
    align-items: center;
}
.navbar .profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.navbar .profile span {
    font-weight: bold;
}


</style>
<body>
        <div class="profile">
            <img src="{{ $avatar }}" alt="Avatar {{ $user->name }}">
            <span>{{ Auth::user()->name }}</span>
        </div>
    </div>
</body>
</html>