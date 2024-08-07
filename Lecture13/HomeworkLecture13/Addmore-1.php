
<?php
if (!isset($_COOKIE['username'])) {
    header("Location: Login-1.php");
    exit();
    $username = $_COOKIE['username'];
  }
include("connect_database-1.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $manufacturer_id = 1;
    $category_id = 1;
    $quantity_in_stock = $_POST["quantity_in_stock"];
    $manufacturer_name = $_POST["manufacturer_name"];
    $category_name = $_POST["category_name"];
    $is_active = $_POST["is_active"];
    $sql = "INSERT INTO products (product_name, description, price, quantity_in_stock,manufacturer_id, category_id, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $sql_m = "INSERT INTO manufacturers (manufacturer_name) VALUES (?)";
    $sql_c = "INSERT INTO category (category_name) VALUES (?)";
            $stmt = $comn->prepare($sql);
            $stmtm = $comn->prepare($sql_m);
            $stmtc = $comn->prepare($sql_c);
            if ($stmt && $stmtm && $stmtc) {
                $stmt->bind_param("sssssss", $product_name, $description, $price, $quantity_in_stock ,$manufacturer_id , $category_id, $is_active );
                $stmtm->bind_param("s", $manufacturer_name );
                $stmtc->bind_param("s", $category_name );
                if ($stmt->execute() && $stmtm->execute() && $stmtc->execute()) {
                    echo "<script> alert('Add success')</script>";
                    echo "<script>location.href = 'View_list_products.php'</script>";
                } else {
                    echo "Error: " . $sql . $sql_m . $sql_c . "<br>" . $comn->error;
                }
                $stmt->close();
                $stmtm->close();
                $stmtc->close();
            } else {
                echo "Error preparing statement: " . $comn->error;
            }
            $comn->close();
            echo "<script> alert('Add success')</script>";
            echo "<script>location.href = 'View_list_products.php'</script>";
        }
 
?>
