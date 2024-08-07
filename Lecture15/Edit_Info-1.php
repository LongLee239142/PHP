<?php
include 'connect_database-2.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    if (isset($_POST['name']) && isset($_POST['original_price']) && isset($_POST['category']) && isset($_POST['percent_discount'])) {
        $id = ($_GET['id']);
        $name = $_POST["name"];
        $category = $_POST["category"];
        $original_price = $_POST["original_price"];
        $percent_discount = $_POST["percent_discount"];

        // Update the product in the database
        $sql = "UPDATE products SET name ='$name', original_price ='$original_price', category ='$category', percent_discount='$percent_discount' WHERE id = $id;";

        if ($comn->query($sql) === TRUE) {
            echo "Product updated successfully";
            echo "<script>location.href ='Question-4.php'</script>";
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
        <h1> Edit Product's Information</h1>
        <label for="name">Product Name:</label><br>
        <input type="text" name="name" required><br>
        <label for="original_price">Original Price:</label><br>
        <input type="text"  name="original_price" required><br>
        <label for="category">Category:</label><br>
        <input type="text"  name="category" required><br>
        <label for="percent_discount">Percent Discount:</label><br>
        <input type="text" name="percent_discount" required><br><br>
        <input type="submit" value="Edit Info"><br>
    </form>

    </form>
</body>

</html>