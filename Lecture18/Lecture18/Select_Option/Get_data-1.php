<!DOCTYPE html>
<html>

<head>
    <title>Product Filter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock Quantity</th>
    </tr>
    <?php
    //Connectdatabase
    include("connect_database-3.php");

    // Get category_id from required
    $category_id = $_GET['id'];
    if (!empty($category_id)) {

        //Query list's product belong to category selected
        $sql = "SELECT * FROM products WHERE category_id = ?";
        $stmt = $comn->prepare($sql);
        $stmt->bind_param("s", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        //Display product list
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>$" . $row["price"] . "</td>";
                echo "<td>" . $row["stock_quantity"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "No products found in this category";
        }

          //Close connect database
        $comn->close();
    } else {

        //Query list's product belong to category selected
        $sql = "SELECT * FROM products ";
        $result = $comn->query($sql);
        //Display product list
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>$" . $row["price"] . "</td>";
                echo "<td>" . $row["stock_quantity"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "No products found in this category";
        }

          //Close connect database
        $comn->close();
    }
    ?>
</table>

</body>

</html>