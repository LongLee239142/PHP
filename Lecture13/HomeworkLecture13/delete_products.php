<?php
if (!isset($_COOKIE['username'])) {
    header("Location: View_list_products.php");
    exit();
    $username = $_COOKIE['username'];
  }
include 'connect_database-1.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    $product_id = $comn->real_escape_string($_GET['id']);
    
    $sql = "UPDATE products SET is_active = '0' WHERE product_id = $product_id";

    if ($comn->query($sql) === TRUE) {
      
        header("Location: View_list_products.php");
        exit();
    } else {
        echo "Error deleting product: " . $comn->error;
    }
}

$comn->close();

?>
