<?php
if (!isset($_COOKIE['username'])) {
    header("Location: Login-1.php");
    exit();
    $username = $_COOKIE['username'];
}
function isGetID($first_name, $phone_number)
{
    include("connect_database-1.php");
    $flag = false;
    $condition = "WHERE first_name = '$first_name' AND phone_number = '$phone_number'";
    $sql = "SELECT customer_id FROM customers " . $condition;
    $result = $comn->query($sql);
    if ($result == true && $result->num_rows > 0) {
        $flag = true;
        while ($data = $result->fetch_assoc()) {
            include("connect_database-1.php");
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $first_name = $_POST["first_name"];
                $phone_number = $_POST["phone_number"];
                $toltal_amount = $_POST["toltal_amount"];
                $sql_o1 = "INSERT INTO orders (customer_id, total_amount) VALUES (?,?)";
                $stmt = $comn->prepare($sql_o1);
                $stmt->bind_param("ss", $data["customer_id"], $toltal_amount);
                $stmt->execute();
                $stmt->close();
            }
        }
    }
    $comn->close();
    return $flag;
}
include("connect_database-1.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $phone_number = $_POST["phone_number"];
    $toltal_amount = $_POST["toltal_amount"];
    if (isGetID($first_name, $phone_number)) {
        echo "<script> alert('Add success')</script>";
        echo "<script>location.href = 'View_list_products.php'</script>";
    } else {
        echo "Error preparing statement: " . $comn->error;
    }
    $comn->close();
}
