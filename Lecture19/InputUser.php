
<?php

function isLogin($username, $password)
{    // Connect to the database
    include("connect_database-3.php");
    $flag = false;
    $sql = "SELECT password FROM users WHERE username = ?";
    // Prepare the statement

    $stmt = $comn->prepare($sql);
    // Bind the parameters
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    //Converst to hard password
    if (password_verify($password, $user['password'])) {
        $flag = true;
    };

     // Close the statement
    $comn->close();
    return $flag;
}
if (isset($_COOKIE['username'])) {
    // header("Location: View_list_table_information.php");
    echo "<script> alert('Login success')</script>";

    echo "<a href ='Out-2.php'><input type = button value= Logout></a>";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            if (isLogin($username, $password)) {
                setcookie('username', $username, time() + (3600), "/");
                echo "<script>location.href ='InputUser.php'</script>";
            } else {
                echo "<script> alert('Username or Password is not exist')</script>";
                echo "<script>location.href = 'Login-1.php'</script>";
            }
        } else {
            echo "<script> alert('Pleasel fil out all fields!')</script>";
            echo "<script>location.href = 'Login-1.php'</script>";
        }
    }
}
?>