<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng đến trang chính
if(isset($_SESSION['username'])) {
    header("Location: view_list_product.php");
    exit();
}

function isLogin($username, $password){
    include("connect_db.php");
    $flag = false;
    $condition = "WHERE username = '$username' and password_hash = '$password'";
    $sql = "SELECT *FROM users " . $condition;
    $result = $conn -> query($sql);
    if($result == true && $result -> num_rows > 0){
        $flag = true;
    }else{
        $error = "Tên đăng nhập không tồn tại.";
    }
    $conn -> close();
    return $flag;
}

// Kiểm tra nếu form đăng nhập được submit
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    // (Trong ví dụ này, bạn cần thêm code xác thực thông tin đăng nhập)
    if(isLogin($username, $password)) {
        $_SESSION['username'] = $username;
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
