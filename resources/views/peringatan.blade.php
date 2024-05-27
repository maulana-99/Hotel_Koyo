<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        @keyframes shake {
            0% {
                transform: translate(1px, 1px) rotate(0deg);
            }

            10% {
                transform: translate(-1px, -2px) rotate(-1deg);
            }

            20% {
                transform: translate(-3px, 0px) rotate(1deg);
            }

            30% {
                transform: translate(3px, 2px) rotate(0deg);
            }

            40% {
                transform: translate(1px, -1px) rotate(1deg);
            }

            50% {
                transform: translate(-1px, 2px) rotate(-1deg);
            }

            60% {
                transform: translate(-3px, 1px) rotate(0deg);
            }

            70% {
                transform: translate(3px, 1px) rotate(-1deg);
            }

            80% {
                transform: translate(-1px, -1px) rotate(1deg);
            }

            90% {
                transform: translate(1px, 2px) rotate(0deg);
            }

            100% {
                transform: translate(1px, -2px) rotate(-1deg);
            }
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .peringatan {
            text-align: center;
            padding: 20px;
            border: 2px solid #dc3545;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .peringatan h1 {
            margin: 0;
            color: #dc3545;
            font-size: 3em;
            animation: shake 0.5s;
            animation-iteration-count: infinite;
            padding: 10px;
        }

        .peringatan p {
            margin: 10px 0 0;
            font-size: 1.2em;
            color: #333;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="peringatan">
        <h1>Peringatan</h1>
        <p>404 Not Found</p>
        <p>Halaman yang Anda cari tidak dapat ditemukan.</p>
    </div>
    </div>
</body>

</html>
