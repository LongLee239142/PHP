<?php
include 'connect_database-2.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    $id = $comn->real_escape_string($_GET['id']);
    
    $sql = "DELETE FROM products WHERE id = $id";

    if ($comn->query($sql) === TRUE) {
      
        header("Location: Question-4.php");
        exit();
    } else {
        echo "Error deleting product: " . $comn->error;
    }
}

$comn->close();

?>