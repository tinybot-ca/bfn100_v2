<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        <ul>
            <li>
                Amount: {{ $pushup->amount}}
            </li>
            <li>
                Date: {{ $pushup->created_at}}
            </li>
            <li>
                Comment: {{ $pushup->comment}}
            </li>
        </ul>
    </h1>
    
</body>
</html>