<?php
include('connect_database-3.php');
if (!isset($_COOKIE['username'])) {

    header("Location: Login-1.php");

    exit();

    $username = $_COOKIE['username'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if form fields are set and not empty
    if (isset($_POST['table_number']) && isset($_POST['capacity']) && isset($_POST['location']) && isset($_POST['description']) && isset($_POST['is_reserved']) && isset($_POST['is_outdoor']) && isset($_POST['is_available'])) {

        // Sanitize the input
        $table_number = filter_var($_POST["table_number"], FILTER_SANITIZE_NUMBER_INT);
        $capacity = filter_var($_POST["capacity"], FILTER_SANITIZE_NUMBER_INT);
        $location = $_POST["location"];
        $description = $_POST["description"];

        // Sanitize the input
        $is_reserved = filter_var(mysqli_real_escape_string($comn, $_POST["is_reserved"] ? 1 : 0), FILTER_VALIDATE_BOOLEAN);
        $is_outdoor = filter_var(mysqli_real_escape_string($comn, $_POST["is_outdoor"] ? 1 : 0), FILTER_VALIDATE_BOOLEAN);
        $is_available = filter_var(mysqli_real_escape_string($comn, $_POST["is_available"] ? 1 : 0), FILTER_VALIDATE_BOOLEAN);

        // Update the product in the database
        $sql = "INSERT INTO tables (table_number , capacity, location, description , is_reserved , is_outdoor , is_available ) VALUES( ?, ?, ?, ?, ?, ?, ?)";
        $addateStatement = $comn->query($sql);


        // Prepare the statement
        $addStatement  = $comn->prepare($sql);

        // Bind the parameters
        $addStatement->bind_param("iissiii", $table_number, $capacity, $location, $description, $is_reserved, $is_outdoor, $is_available);

        // Execute the statement
        if ($addStatement->execute()) {
                echo "<script>alert('Table's Information add successfully')</script> ";
                echo "<script>location.href ='View_list_table_information.php'</script>";
            } else {
                echo "Error updating Table's Information: " . $comn->error;
            }
        
    } else {
        echo "All fields are required";
    }

    // Close the statement
    $addStatement->close();
    // $addStatement_s->close();
    
    // Close the database connection
    $comn->close();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Products</title>
</head>

<body>
    <form action="" method="post">
        <h1> Add Table's Information</h1>
        <label for="table_number">Table Number:</label><br>
        <input type="text" name="table_number" required><br>
        <label for="capacity">Capacity:</label><br>
        <input type="text" name="capacity" required><br>
        <label for="location">Location:</label><br>
        <input type="text" name="location" required><br>
        <label for="description">Description:</label><br>
        <input type="text" name="description" required><br>
        <label for="is_reserved">Is Reserved:</label><br>
        <input type="text" name="is_reserved" required><br>
        <label for="is_outdoor">Is Outdoor:</label><br>
        <input type="text" name="is_outdoor" required><br>
        <label for="is_available">Is Available:</label><br>
        <input type="text" name="is_available" required><br>
        <input type="submit" value="Add Info"><br>
    </form>

    </form>
</body>

</html>