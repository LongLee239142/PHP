<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>Họ tên: <input type="text" name="fullname" value=""></p>
        <p>Password: <input type="password" name="password" value=""></p>
        <p>Đăng ký học: HTML <input type="checkbox" name="check_html" value="HTML">, CSS <input type="checkbox" name="check_css" value="CSS"></p>
        <p>Giới tính: Nam <input type="radio" name="gender" value="Nam">, Nữ <input type="radio" name="gender" value="Nữ"></p>
        <p>Thành phố: <select name="city">
            <option value="Hà Nội">Hà Nội</option>
            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
            <option value="Đà Nẵng">Đà Nẵng</option>
            <option value="Cần Thơ">Cần Thơ</option>
        </select></p>
        <p>Tin nhắn:<br>
        <textarea cols="30" rows="7" name="message"></textarea></p>
        <button type="submit">Gửi</button>
    </form>
    
    <p>Họ tên: <?php if(isset($_POST["fullname"])) { echo $_POST["fullname"]; } ?></p>
    <p>Password: <?php if(isset($_POST["password"])) { echo $_POST["password"]; } ?></p>
    <p>Đăng ký học: <?php if(isset($_POST["check_html"])) { echo $_POST["check_html"]; } ?> <?php if(isset($_POST["check_css"])) { echo $_POST["check_css"]; } ?></p>
    <p>Giới tính: <?php if(isset($_POST["gender"])) { echo $_POST["gender"]; } ?></p>
    <p>Thành phố: <?php if(isset($_POST["city"])) { echo $_POST["city"]; } ?></p>
    <p>Tin nhắn: <?php if(isset($_POST["message"])) { echo $_POST["message"]; } ?></p>
</body>
</html>