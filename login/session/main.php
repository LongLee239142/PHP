<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Lấy tên người dùng từ session
$username = $_SESSION['username'];
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
