
<?php

// if (!isset($_COOKIE['username'])){
//     header("Location:Login-1.php");
//     exit;
// }
if (isset($_COOKIE['username'])) {
    echo "Login Success</br>";
    echo "<h1>Welcome My boss </h1><br>";
    echo "<a href ='Profile-2.php'>Profile My Boss</a><br><br>";
    echo "<a href ='Logout-2.php'><input type = button value= Logout></a>";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            include("connect_database-1.php");
            $condition = "WHERE username = ? AND password_hash = ?";
            $sql = "SELECT*FROM usersregister " . $condition;
            $stmt = $comn->prepare($sql);
            $stmt -> bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                    setcookie('username', $username, time() + (60), "/"); 
                    echo "<script>location.href ='welcome-2.php'</script>";
                    }
            else {
                echo "<script> alert('Username is not exist')</script>";
                echo "<script>location.href = 'Login-1.php'</script>";
            }
        } 
        else {
            echo "<script> alert('Pleasel fil out all fields!')</script>";
            echo "<script>location.href = 'Login-1.php'</script>";
        }
    }
}
?>