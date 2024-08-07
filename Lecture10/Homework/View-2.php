
<?php
function isLogin($username, $password)
{
    include("connect_database-1.php");
    $flag = false;
    $condition = "WHERE username = '$username' AND password_hash = '$password'";
    $sql = "SELECT*FROM usersregister " . $condition;
    $result = $comn->query($sql);
    if ($result == true && $result->num_rows > 0) {
        $flag = true;
    };
    $comn->close();
    return $flag;
}


// if (!isset($_COOKIE['username'])){
//     header("Location:Login-1.php");
//     exit;
// }
if (isset($_COOKIE['username'])) {
    header("Location: View-3.php");
    echo "<a href ='Out-2.php'><input type = button value= Logout></a>";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            if (isLogin($username, $password)) {
                setcookie('username', $username, time() + (60), "/");
                echo "<script>location.href ='view-2.php'</script>";
            } else {
                echo "<script> alert('Username is not exist')</script>";
                echo "<script>location.href = 'Products-1.php'</script>";
            }
        } else {
            echo "<script> alert('Pleasel fil out all fields!')</script>";
            echo "<script>location.href = 'Products-1.php'</script>";
        }
    }
}
?>