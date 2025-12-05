<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="display: flex; flex-direction: column; align-items: center; border: 2px solid black; border-radius: 10px; padding: 10px;" >
        <h1>Register</h1>
        <form action="/register" method="POST" style="display: flex; flex-direction: column; align-items: center;">
            @csrf
            <input type="text" name="name" id="name" placeholder="username">
            <input type="email" name="email" id="email" placeholder="email">
            <input type="password" name="password" id="password" placeholder="password">
            <br>
            <!-- Article to view all errors using laravel -->
            <!-- https://stackoverflow.com/questions/12419814/check-if-any-error-message-exists-and-show-all-of-them-in-laravel -->
            <!-- Used to display any errors that have been sent to the frontend component using withErrors
             mainly makes use of $errors->all() which returns an array of errors -->
            @foreach($errors->all() as $error) 
                <h4>{{$error}}</h4>
            @endforeach
            <button>Submit</button>
        </form>
    </div>
</body>
</html>