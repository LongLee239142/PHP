
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact form</title>
</head>

<body>
    <h1>Do You Have Anything in Mind?</h1>
    <?php if (!empty($msg)) {
        echo "<h2>$msg</h2>";
    } ?>
    <form method="POST" action="sendmail.php">
        <label for="name">Name: <input type="text" name="name" id="name"></label><br><br>
        <label for="email">Email: <input type="email" name="email" id="email"></label><br><br>
        <label for="message">Message: <textarea name="message" id="message" rows="8" cols="20"></textarea></label><br><br>
        <input type="submit" value="Send">
    </form>
</body>

</html>