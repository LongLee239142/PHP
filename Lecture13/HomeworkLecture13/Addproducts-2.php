<?php
if (!isset($_COOKIE['username'])) {

header("Location: Login-1.php");

exit();

$username = $_COOKIE['username'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add More Products</title>
</head>

<body>
    <form action="Addmore-1.php" method="post">
        <h1> Information Product</h1>
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