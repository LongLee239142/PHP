<?php
require 'InputUser.php';
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3, "/");
}
header("Location: Login-1.php");
exit();
