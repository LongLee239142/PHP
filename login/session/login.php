<?php
   session_start();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="#" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username">
                    </td>
                </tr>
                <tr>
                <td>Password</td>
                    <td>
                        <input type="text" name="password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="login">
                    </td>
                    
                </tr>
            </table>
        </form>
</body>
<?php
    
    $msg = '';

    function isLogin($username, $password){
        include('connect_db.php');
        $flag = false;
        // Define your SQL query with a WHERE clause
        $condition = "username = '$username' and password = '$password'"; // e.g., "column_name = 'value'"

        // SQL query to fetch all table names in the database
        $sql = "SELECT *FROM user where $condition";

        $result = $conn->query($sql);
        if ($result !== false && $result->num_rows > 0) {
            $flag = true;
        }
        
        // Close the database connection
        $conn->close();
        return $flag;
    }
    
    if (isset($_POST['login']) && !empty($_POST['username']) 
        && !empty($_POST['password'])) {      
        if (isLogin($_POST['username'], $_POST['password'])) {
            
            $_SESSION['username'] = $_POST['username'];
            
            echo 'You have entered valid use name and password';
            header("Location:get_data.php");
        }else {
            echo 'Wrong username or password';
        }
    }
    ?>
</html>