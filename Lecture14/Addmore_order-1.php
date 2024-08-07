<?php
if (!isset($_COOKIE['username'])) {

header("Location: Login-1.php");

exit();

$username = $_COOKIE['username'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add More Information Products</title>
</head>

<body>
    <form action="Addoders-2.php" method="post">
        <h1> Information Order Of Customer</h1>
        <label for="first_name">Frist Name:</label><br>
        <input type="text" name="first_name" required><br>
        <label for="phone_number">Phone Number:</label><br>
        <input type="text"  name="phone_number" required><br>
        <label for="toltal_amount">Toltal Amount:</label><br>
        <input type="text" name="toltal_amount" required><br><br>
        <input type="submit" value="Add"><br>
    </form>
    <a href='Out-2.php'>Logout</a>
</body>

</html>