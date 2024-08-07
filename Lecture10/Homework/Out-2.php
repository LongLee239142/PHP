<?php
require 'View-2.php';
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3, "/");
}
header("Location: Products-1.php");
exit();
