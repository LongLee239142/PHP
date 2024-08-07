<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
</head>

<body>
    <form action="Insert-1.php" method="post">
        <h1> Registration Login</h1>
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email"  name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password"  name="password" required><br>
        <label for="confirm-password">Confirm Password:</label><br>
        <input type="password" name="confirm-password" required><br><br>
        <input type="submit" value="Register"><br>
        <a href ='Login-1.php'>You already have an account ?</a>
    </form>
</body>

</html>