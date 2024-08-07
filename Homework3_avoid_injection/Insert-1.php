
<?php
// include("connect_database-1.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $comfirmpassword = $_POST["confirm-password"];
    if ($password == $comfirmpassword) {
        require_once "connect_database-1.php";
        $password = $_POST["password"];
        $username = $_POST["username"];
        $email = $_POST["email"];

            include("connect_database-1.php");
            $condition = "WHERE username = ? AND password_hash = ?";
            $sql = "SELECT*FROM usersregister " . $condition;
            $stmt = $comn->prepare($sql);
            $stmt -> bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
        
        }
        if ($result->num_rows > 0) {
            setcookie('username', $username, time() + (60), "/");
            echo "<script> alert('Username available') </script>";
            echo "<script>location.href = 'Register-1.php'</script>";
        } else {
            $sql = "INSERT INTO usersregister (username, email, password_hash) VALUES (?, ?, ?)";

            $stmt = $comn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sss", $username, $email, $password);
                if ($stmt->execute()) {
                    echo "<script> alert('Register success')</script>";
                    echo "<script>location.href = 'Login-1.php'</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $comn->error;
                }
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $comn->error;
            }
            $comn->close();
            echo "<script> alert('Register success')</script>";
            echo "<script>location.href = 'Login-1.php'</script>";
        }
        $stmt->close();  
        $comn->close();
    } else {
        echo "<script> alert('Password and Confirm Password do not match. Please Register again!')</script>";
        echo "<script>location.href = 'Register-1.php'</script>";
    }
?>
