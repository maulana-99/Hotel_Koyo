<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu Hotel</title>
    <link rel="stylesheet" href="styles.css">
</head>
@include('component.navbarRes')
@include('component.sidebarRes')

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: calc(100% - 240px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 100%;
            overflow-y: scroll;
            margin-left: 250px;
            position: fixed;
        }

        table {}

        th,
        td {
            border: 1px solid #ddd;
            padding: 20px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kamar</th>
                <th>Tipe Kamar</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            </tr>
        </tbody>
    </table>
</body>

</html>
