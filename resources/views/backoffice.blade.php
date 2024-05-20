<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/backoffice.css')}}">
    <title>backoffice</title>
</head>
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

    <div class="content">
        <div class="navbar">
            <h1>Selamat Datang, Admin</h1>
            <div class="profile">
                <img src="profile.jpg" alt="Profile Picture">
                <span>User Name</span>
            </div>
        </div>
        <div class="table-header">
            <h2>Manage Users</h2>
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Search...">
                <button onclick="searchTable()">Search</button>
            </div>
            <div>
                <button>Edit Selected</button>
                <button>Delete Selected</button>
            </div>
        </div>

        <table class="crud-table" id="crud-table">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</body>
</html>