<?php
if (!isset($_COOKIE['username'])) {
    header("Location: View_list_products.php");
    exit();
    $username = $_COOKIE['username'];
  }
include 'connect_database-1.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    $customer_id = $comn->real_escape_string($_GET['id']);
    
    $sql = "DELETE FROM customers WHERE customer_id = $customer_id";

    if ($comn->query($sql) === TRUE) {
      
        header("Location: View_list_products.php");
        exit();
    } else {
        echo "Error deleting product: " . $comn->error;
    }
}

$comn->close();

?>
