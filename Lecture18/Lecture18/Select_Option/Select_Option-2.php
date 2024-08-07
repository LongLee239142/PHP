<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Products by Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <h2>Product Filter</h2>
    <select id="Select" class="form-control bg-primary text-white rounded-pill">
        <option value="">Select Category</option>
        <?php
        //connect database
        include("connect_database-3.php");

        //Query list data
        $sql = "SELECT * FROM categories";
        $result = $comn->query($sql);

        // Display list category in combobox
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value ='" . $row["category_id"] . "'>" . $row["category_name"] . "</option>";
            }
        }
        ?>
    </select>

    <div id="display">
        <!--List's Product will display here -->
    </div>

    <script>
        document.getElementById("Select").addEventListener("change", function() {
            var category_Id = this.value;
            var glc = new XMLHttpRequest();
            glc.open("GET", "Get_data-1.php?id=" + category_Id, true);
            glc.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("display").innerHTML = this.responseText;
                }
            };
            glc.send();
        });
    </script>

</body>

</html>