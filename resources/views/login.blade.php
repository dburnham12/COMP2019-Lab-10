<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="display: flex; flex-direction: column; align-items: center; border: 2px solid black; border-radius: 10px; padding: 10px;" >
        <h1>Login</h1>
        <form action="/login" method="POST" style="display: flex; flex-direction: column; align-items: center;">
            @csrf
            <input type="text" name="loginName" id="loginName" placeholder="username">
            <input type="password" name="loginPassword" id="loginPassword" placeholder="password">
            <br>
            <button>Submit</button>
            <!-- Article to view all errors using laravel -->
            <!-- https://stackoverflow.com/questions/12419814/check-if-any-error-message-exists-and-show-all-of-them-in-laravel -->
            <!-- Used to display any errors that have been sent to the frontend component using withErrors
             mainly makes use of $errors->all() which returns an array of errors -->
            @foreach($errors->all() as $error)
                <h4>{{$error}}</h4>
            @endforeach
            <p>Not a member yet? Please <a href='/register'>Sign Up</a> here</p>
        </form>
    </div>
</body>
</html>