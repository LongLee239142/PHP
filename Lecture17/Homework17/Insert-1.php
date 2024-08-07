<?php

// include("connect_database-1.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $comfirmpassword = $_POST["confirm_password"];
    //Check the password match
    if ($password == $comfirmpassword) {
        require_once "connect_database-3.php";
        $password = $_POST["password"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $full_name = $_POST["full_name"];
        $date_of_birth = $_POST["date_of_birth"];

    //Converts hashed password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    //Function check the existence of the username
        function isLogin($username)
        {
            include("connect_database-3.php");
            $flag = false;
            $sql = "SELECT*FROM users WHERE username = ? ";
            $stmt = $comn->query($sql);
            $stmt = $comn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt ->get_result();
            if ($result == true && $result->num_rows > 0) {
                $flag = true;
            };
            $stmt->close();
            $comn->close();
            return $flag;
        }

        //Check Username
        if (isLogin($username)) {
            $_COOKIE['username'] = $username;
            echo "<script> alert('Username available') </script>";
            echo "<script>location.href = 'Register-1.php'</script>";
        } else {

            //Insert Registrant's information
            $sql_i = "INSERT INTO users (username, email, password, full_name, date_of_birth) VALUES (?, ?, ?, ?, ?)";
            $stmt_i = $comn->prepare($sql_i);
            $stmt_i->bind_param("sssss", $username, $email, $hashed_password, $full_name, $date_of_birth);
            if ($stmt_i) {
                if ($stmt_i->execute()) {
                    echo "<script> alert('Register success')</script>";
                    echo "<script>location.href = 'Login-1.php'</script>";
                } else {
                    echo "Error: " . $sql_i . "<br>" . $comn->error;
                }

                // Close the statement
                $stmt_i->close();
                
            } else {
                echo "Error preparing statement: " . $comn->error;
            }
            // Close the database connection
            $comn->close();
            echo "<script> alert('Register success')</script>";
            echo "<script>location.href = 'Login-1.php'</script>";
        }
    } else {
        echo "<script> alert('Password and Confirm Password do not match. Please Register again!')</script>";
        echo "<script>location.href = 'Register-1.php'</script>";
    }
}
