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
        @foreach ($pushups as $pushup)
            <li><a href="/pushups/{{ $pushup->id }}">{{ $pushup->comment }}</a></li>
        @endforeach
        </ul>
    </h1>
</body>
</html>