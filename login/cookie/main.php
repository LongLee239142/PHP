<?php
// Kiểm tra nếu cookie không tồn tại, chuyển hướng đến trang đăng nhập
if(!isset($_COOKIE['username'])) {
    header("Location: index.php");
    exit();
}

// Lấy tên người dùng từ cookie
$username = $_COOKIE['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trang chính</title>
</head>
<body>
    <h2>Xin chào <?php echo $username; ?></h2>
    <a href="logout.php">Đăng xuất</a>
</body>
</html>
