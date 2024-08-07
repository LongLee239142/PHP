<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h1> Form Register</h1>
        <p>First and last name:</br> <input type="text" name="fullname" value=""></p>
        <p>Password: </br><input type="password" name="password" value=""></p>
        <p>Email:</br> <input type="text" name="email" value=""></p>
        <p>Age: </br><input type="text" name="age" value=""></p>
        <p>Dob: </br><input type="date" name="birthday" value = ""></p>
        <p>Gender:</br> Male <input type="radio" name="gender" value="Male">, Female <input type="radio" name="gender" value="Female"></p>
        <p>Country:</br> <select name="country">
            <option value="Việt Nam">Việt Nam</option>
            <option value="United States of America">USA</option>
            <option value="United Kingdom">UK</option>
        </select></p>
        <p>I do agree to the terms </br><input type="checkbox" name="agress" value="yes"><br>
        <button type="submit">Sign In</button>
    </form>
    
    <p><?php if(isset($_POST["fullname"])) { echo $_POST["fullname"]; } ?></p>
    <p><?php if(isset($_POST["password"])) { echo $_POST["password"]; } ?></p>
    <p><?php if(isset($_POST["email"])) { echo $_POST["email"]; } ?> </p>
    <p><?php if(isset($_POST["birthday"])) { echo $_POST["birthday"]; } ?></p>
    <p><?php if(isset($_POST["gender"])) { echo $_POST["gender"]; } ?></p>
    <p><?php if(isset($_POST["Country"])) { echo $_POST["Country"]; } ?></p>
    <p><?php if(isset($_POST["agress"])) { echo "I agree"; } ?>
</body>
</html>