<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* Sidebar Styles */
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #C39D7A;
            color: #fff;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            overflow: auto;
            z-index: 100;
        }

        .sidebar img {
            width: 100%;
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-menu h1{
            font-size: 24px;
            padding: 24px;
        }

        .bg-logo {
            background-color: #fff;
            padding: 10px;
        }

        .bg-logo img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
        }

        .text-dashboard {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="bg-logo">
            <img src="{{ asset('img/logo_lanscap.png') }}" alt="Company Logo">
        </div>
        <ul class="sidebar-menu">
            <h1>Dashboard</h1>
    
        </ul>
    </div>
    
    <!-- Rest of your content -->
</body>

</html>
