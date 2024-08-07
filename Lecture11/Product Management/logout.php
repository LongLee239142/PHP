<?php
session_start();

// Xóa session
session_unset();
session_destroy();

// Chuyển hướng đến trang đăng nhập
header("Location: index.php");
exit();
?>
