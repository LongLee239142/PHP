<?php
// Xóa cookie
if(isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/");
}

// Chuyển hướng đến trang đăng nhập
header("Location: index.php");
exit();
?>
