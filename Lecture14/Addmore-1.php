
<?php
if (!isset($_COOKIE['username'])) {
    header("Location: Login-1.php");
    exit();
    $username = $_COOKIE['username'];
  }
include("connect_database-1.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $sql = "INSERT INTO customers (first_name, last_name, email, phone_number, address, city, country) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $comn->prepare($sql);
            if ($stmt ) {
                $stmt->bind_param("sssssss", $first_name, $last_name, $email, $phone_number ,$address ,$city, $country );
                if ($stmt->execute()){
                    echo "<script> alert('Add success')</script>";
                    echo "<script>location.href = 'Addmore_order-1.php'</script>";
                } else {
                    echo "Error: " . $sql . $sql_m . "<br>" . $comn->error;
                }
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $comn->error;
            }
            $comn->close();
            echo "<script> alert('Add success')</script>";
            echo "<script>location.href = 'Addmore_order-1.php'</script>";
        }
 
?>
