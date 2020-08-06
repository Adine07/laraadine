<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register area</title>
</head>
<body>

    <h1>Register Page</h1>

    <form action="/registration-proccess" method="post">
    @csrf
        <label for="">
            Name
            <input type="text" name="name">
        </label><br><br>

        <label for="">
            Email
            <input type="email" name="email">
        </label><br><br>

        <label for="">
            Password
            <input type="password" name="password">
        </label>
        <br>

        <button>Register</button>
    </form><br>

    <a href="/login">Ke Halaman Login <<</a>
    
</body>
</html>