<?php
session_start();
if (!isset($_SESSION['password'])){
    header("Location:Lecture-1.php");
    exit;
}
if (isset($_SESSION['password'])) {
    echo "Login Success</br>";
    echo "<h1>Welcome My boss </h1><br>";
    echo "<a href ='Profile-1.php'>Profile My Boss</a><br><br>";
    echo "<a href ='Logout-1.php'><input type = button value= Logout></a>";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            // $_SESSION['username'] = $username; or
            if ($username === "Admin" && $password === "12345678") {
                $_SESSION['password'] = $password;
                echo "<script>location.href ='welcome-1.php'</script>";
            } else {
                echo "<script> alert('Login Fail. Please Login again!')</script>";
                echo "<script>location.href = 'Lecture-1.php'</script>";
            }
        } else {
            echo "<script> alert('Pleasel fil out all fields!')</script>";
            echo "<script>location.href = 'Lecture-1.php'</script>";
        }
    }
}
?>