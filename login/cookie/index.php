<?php
// Kiểm tra nếu cookie đã được đặt, chuyển hướng đến trang chính
if(isset($_COOKIE['username'])) {
    header("Location: main.php");
    exit();
}

// Kiểm tra nếu form đăng nhập được submit
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    // (Trong ví dụ này, bạn cần thêm code xác thực thông tin đăng nhập)
    if($username == 'admin' && $password == 'password') {
        // Đặt cookie nếu đăng nhập thành công
        setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 ngày
        header("Location: main.php");
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="username">Tên đăng nhập:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="submit" value="Đăng nhập">
    </form>
</body>
</html>
