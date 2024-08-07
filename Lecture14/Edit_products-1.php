<?php
if (!isset($_COOKIE['username'])) {

    header("Location: Login-1.php");
  
    exit();
  
    $username = $_COOKIE['username'];
  }
include 'connect_database-1.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['phone_number']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['country']) && isset($_POST['toltal_amount'])) {
        $customer_id = ($_GET['id']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country =$_POST['country'];
        $toltal_amount = $_POST['toltal_amount'];

        // Update the product in the database
        $sql = "UPDATE customers SET first_name ='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number', address='$address', city='$city', country = '$country' WHERE customer_id = $customer_id;";
        $sql_o = "UPDATE orders SET total_amount ='$toltal_amount', order_date = CURRENT_TIMESTAMP WHERE customer_id = $customer_id;";

        if ($comn->query($sql) === TRUE && $comn->query($sql_o) === TRUE) {
            echo "Product updated successfully";
            echo "<script>location.href ='View_list_products.php'</script>";
        } else {
            echo "Error updating product: " . $comn->error;
        }
    }else {
            echo "All fields are required";
        }
    
    }

$comn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Products</title>
</head>

<body>
    <form action="" method="post">
        <h1>Edit</h1>
        <label for="first_name">First Name:</label><br>
        <input type="text" name="first_name" required><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text"  name="last_name" required><br>
        <label for="email">Email:</label><br>
        <input type="email"  name="email" required><br>
        <label for="phone_number">Phone Number:</label><br>
        <input type="text" name="phone_number" required><br><br>
        <label for="address">Address:</label><br>
        <input type="text" name="address" required><br><br>
        <label for="city">City:</label><br>
        <input type="text" name="city" required><br><br>
        <label for="country">Country:</label><br>
        <input type="text" name="country" required><br><br>
        <label for="toltal_amount">Toltal Amount:</label><br>
        <input type="text" name="toltal_amount" required><br><br>
        <input type="submit" value="Add"><br>
    </form>
</body>

</html>