<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="welcome-1.php" method="post">
        <h1> Form Login</h1>
        <p>Username:</br> <input type="text" name="username" value=""></p>
        <p>Password: </br><input type="password" name="password" value=""></p>
        <input type="submit" value="Login">
    </form>
</body>

</html>