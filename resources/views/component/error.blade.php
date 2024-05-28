<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    /* Container for the error messages */
    .error-messages {
        border: 1px solid #e74c3c;
        background-color: #f9d6d5;
        color: #e74c3c;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    /* List of error messages */
    .error-messages ul {
        list-style-type: none;
        padding-left: 0;
    }

    /* Individual error message item */
    .error-messages li {
        margin: 5px 0;
    }

    /* Additional styles for better visual appearance */
    .error-messages li::before {
        content: '⚠️ ';
        /* Add a warning icon before each error message */
        margin-right: 5px;
    }

    /* Responsive design to ensure the messages look good on smaller screens */
    @media (max-width: 600px) {
        .error-messages {
            padding: 10px;
            font-size: 14px;
        }
    }
</style>

<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>

</html>
