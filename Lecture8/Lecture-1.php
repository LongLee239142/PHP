<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <h1> Form Login</h1>
        <p>Username:</br> <input type="text" name="username" value=""></p>
        <p>Password: </br><input type="password" name="password" value=""></p>
        <input type="submit" value="Login">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($username === "Admin" && $password === "12345678") {
                echo "Login Success!";
            } else {
                echo "Login Fail. Please Login again ";
            }
        } else {
            echo "Pleasel fil out all fields!";
        }
    }
    ob_start();
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    ?>
</body>

</html>