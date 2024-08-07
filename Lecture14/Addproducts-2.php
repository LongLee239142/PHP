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
    <title>Add More Information Customer</title>
</head>

<body>
    <form action="Addmore-1.php" method="post">
        <h1> Information Order Of Customer</h1>
        <label for="first_name">Frist Name:</label><br>
        <input type="text" name="first_name" required><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text"  name="last_name" required><br>
        <label for="email">Email:</label><br>
        <input type="email"  name="email" required><br>
        <label for="phone_number">Phone Number:</label><br>
        <input type="text" name="phone_number" required><br><br>
        <label for="address">Address:</label><br>
        <input type="text" name="address" required><br><br>
        <label for="city">City:</label><br>
        <input type="text" name="city" required><br><br>
        <label for="country">Country:</label><br>
        <input type="text" name="country" required><br><br>
        <input type="submit" value="Add"><br>
    </form>
    <a href='Out-2.php'>Logout</a>
</body>

</html>