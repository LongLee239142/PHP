<?php
if (!isset($_COOKIE['username'])) {
    header("Location: View_list_products.php");
    exit();
    $username = $_COOKIE['username'];
}
include 'connect_database-3.php';

//Check ID is not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {

    //Get Id and Sanitize the input
    $id = filter_var($comn->real_escape_string($_GET['id']), FILTER_SANITIZE_NUMBER_INT);

    // delete the Infor in the database
    $sql = "DELETE FROM tables WHERE table_id = ?";

    // Prepare the statement
    $deleteStatement = $comn->prepare($sql);

    // Bind the parameters
    $deleteStatement->bind_param("i", $id);

    //Execute the statement
    if ($deleteStatement->execute()) {
        header("Location: View_list_table_information.php");
        exit();
    } else {
        echo "Error deleting product: " . $comn->error;
    }
}
// Close the statement
$deleteStatement->close();

// Close the database connection
$comn->close();
?>