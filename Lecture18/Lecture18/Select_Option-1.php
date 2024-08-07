<!DOCTYPE html>
<html>

<head>
    <title>Product Filter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        } */
    </style>
</head>

<body>
    <h2>Product Filter</h2>

    <form method="post">
        <label for="category">Select Category:</label>
        <select name="category" id="category">
            <option value="">All Categories</option>
            <?php
            // // Connect to the database
            include("connect_database-3.php");


            // Get list data base
            $sql = "SELECT category_name , category_id FROM categories";
            $result = $comn->query($sql);

            // Display list
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["category_id"] . "'>" . $row["category_name"] . "</option>";
                    
                }
            }
            ?>
        </select>
        <input type="submit" value="Filter">
    </form>
   <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $category_id = $_POST["category"];
            $sql_n = "SELECT category_name  FROM categories WHERE category_id = $category_id";
            if (!empty($category_id)) {  
             $data_n=mysqli_query($comn, $sql_n);
            $data = mysqli_fetch_array($data_n);
            // $data["category_name"] = $category_name;
        
        
     echo "<h3>Filtered Products " . $data["category_name"] . "</h3>";
            
    }else{
        echo "<h3>Filtered Products All category:</h3>";
   }
      }
        
    ?>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock Quantity</th>
        </tr>
        <?php
        // Processing form submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $category_id = $_POST["category"];

            // Build a query to retrieve products based on the selected category
            $sql_l = "SELECT product_name, description, price, stock_quantity FROM products";
            if (!empty($category_id)) {
                $sql_l .= " WHERE category_id = $category_id";
    
                $res_data = mysqli_query($comn, $sql_l);

                // Display result
                while ($row = mysqli_fetch_array($res_data)) {
                    echo "<tr>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>$" . $row["price"] . "</td>";
                    echo "<td>" . $row["stock_quantity"] . "</td>";
                    echo "</tr>";
                }
            } else {
                $res_data = mysqli_query($comn, $sql_l);
                while ($row = mysqli_fetch_array($res_data)) {
                    echo "<tr>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>$" . $row["price"] . "</td>";
                    echo "<td>" . $row["stock_quantity"] . "</td>";
                    echo "</tr>";
            }
        }
    }
    
        // Close connect
        $comn->close();
        ?>
    </table>
</body>

</html>