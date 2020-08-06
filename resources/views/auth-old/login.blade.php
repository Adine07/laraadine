<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login area</title>
</head>

<body>

    <h1>Login Page</h1>

    <form action="/login-proccess" method="post">
        @csrf
        <label for="">
            Email
            <input type="email" name="email">
        </label><br><br>

        <label for="">
            Password
            <input type="password" name="password">
        </label>
        <br>

        <button>Login</button>
    </form><br>

    <a href="/register">Ke Halaman Register >></a>

</body>

</html>