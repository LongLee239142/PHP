<?php
include("connect_database-2.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $category = $_POST["category"];
    $original_price = $_POST["original_price"];
    $percent_discount = $_POST["percent_discount"];
    $sql = "INSERT INTO products (name, original_price, category, percent_discount) VALUES (?, ?, ?, ?)";
            $stmt = $comn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ssss", $product_name, $original_price, $category, $percent_discount);
                if ($stmt->execute()) {
                    echo "<script> alert('Add success')</script>";
                    echo "<script>location.href = 'Question-4.php'</script>";
                } else {
                    echo "Error: " . $sql  . "<br>" . $comn->error;
                }
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $comn->error;
            }
            $comn->close();
            echo "<script> alert('Add success')</script>";
            echo "<script>location.href = 'Question-4.php'</script>";
        }
 
?>

<?
// $search = $_POST['search'];

// $servername = "localhost";
// $username = "bob";
// $password = "123456";
// $db = "classDB";

// $conn = new mysqli($servername, $username, $password, $db);

// if ($conn->connect_error){
// 	die("Connection failed: ". $conn->connect_error);
// }

// $sql = "select * from students where name like '%$search%'";

// $result = $conn->query($sql);

// if ($result->num_rows > 0){
// while($row = $result->fetch_assoc() ){
// 	echo $row["name"]."  ".$row["age"]."  ".$row["gender"]."<br>";
// }
// } else {
// 	echo "0 records";
// }

// $conn->close();

?>