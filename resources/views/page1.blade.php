<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth 
        <p>Hello {{$user}}</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
    @else
        <p>You are not authenticated. Please return to <a href='/'>HOME PAGE</a> to login</p>
    @endauth
</body>
</html>