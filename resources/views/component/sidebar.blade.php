<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    /* Sidebar Styles */
.sidebar {
    width: 200px;
    background-color: #333;
    color: #fff;
    position: fixed;
    height: 100%;
    overflow: auto;
    padding-top: 20px;
    text-align: center;
}

.sidebar img {
    width: 80%;
    margin-bottom: 20px;
}

.sidebar-menu {
    list-style-type: none;
    padding: 0;
}

.sidebar-menu li {
    padding: 10px 0;
}

.sidebar-menu li a {
    color: #fff;
    text-decoration: none;
    display: block;
}

.sidebar-menu li a:hover {
    background-color: #575757;
    border-radius: 4px;
}
</style>
<body>
    <div class="sidebar">
        <img src="logo.png" alt="Company Logo">
        <ul class="sidebar-menu">
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#profile">Profile</a></li>
            <li><a href="#settings">Settings</a></li>
            <li><a href="#logout">Logout</a></li>
        </ul>
    </div>
</body>
</html>