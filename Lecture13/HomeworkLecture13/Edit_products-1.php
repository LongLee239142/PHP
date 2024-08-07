<?php
if (!isset($_COOKIE['username'])) {

    header("Location: Login-1.php");
  
    exit();
  
    $username = $_COOKIE['username'];
  }
include 'connect_database-1.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    if (isset($_POST['product_name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['quantity_in_stock']) && isset($_POST['manufacturer_name']) && isset($_POST['category_name']) && isset($_POST['is_active'])) {
        $product_id = ($_GET['id']);
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity_in_stock = $_POST['quantity_in_stock'];
        $manufacturer_id = 1;
        $category_id = 1;
        $manufacturer_name =$_POST['manufacturer_name'];
        $category_name =$_POST['category_name'];
        $is_active = $_POST['is_active'];

        // Update the product in the database
        $sql = "UPDATE products SET product_name ='$product_name', description='$description', price='$price', quantity_in_stock='$quantity_in_stock', manufacturer_id='$manufacturer_id', category_id='$category_id', is_active='$is_active', created_at = CURRENT_TIMESTAMP WHERE product_id=$product_id;";
        $sql_m = "UPDATE manufacturers SET manufacturer_name ='$manufacturer_name'WHERE manufacturer_id=$product_id;";
        $sql_c = "UPDATE category SET category_name ='$category_name'WHERE category_id=$product_id;";

        if ($comn->query($sql) === TRUE && $comn->query($sql_m) === TRUE && $comn->query($sql_c) === TRUE) {
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
        <label for="product_name">product_name:</label><br>
        <input type="text" name="product_name" required><br>
        <label for="description">description:</label><br>
        <input type="text"  name="description" required><br>
        <label for="price">price:</label><br>
        <input type="price"  name="price" required><br>
        <label for="quantity_in_stock">quantity_in_stock:</label><br>
        <input type="text" name="quantity_in_stock" required><br><br>
        <label for="manufacturer_name">manufacturer_name:</label><br>
        <input type="text" name="manufacturer_name" required><br><br>
        <label for="category_name">category_name:</label><br>
        <input type="text" name="category_name" required><br><br>
        <label for="is_active">is_active:</label><br>
        <input type="text" name="is_active" required><br><br>
        <input type="submit" value="Add"><br>
    </form>
</body>

</html>