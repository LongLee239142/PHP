<?php
session_start();
include 'functions.php'; // Include file chứa các hàm

// Xử lý thêm sản phẩm vào giỏ hàng
if(isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $productId = $_GET['id'];
    addToCart($productId);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Xử lý cập nhật số lượng sản phẩm trong giỏ hàng
if(isset($_POST['update_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    updateCartQuantity($productId, $quantity);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Xử lý tạo đơn hàng
if(isset($_POST['submit_order'])) {
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $orderId = createOrder($customerName, $customerEmail);
    echo "Order created successfully with ID: $orderId";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Products</h1>
    <ul>
        <?php
        // Lấy danh sách sản phẩm từ cơ sở dữ liệu
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>{$row['name']} - \${$row['price']} <a href='?action=add&id={$row['id']}'>Add to Cart</a></li>";
            }
        }
        ?>
    </ul>
    
    <h1>Shopping Cart</h1>
    <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <ul>
            <?php foreach($_SESSION['cart'] as $id => $item): ?>
                <li>
                    <?php echo $item['name']; ?> - $<?php echo $item['price']; ?> - 
                    Quantity: 
                    <form method="post" action="">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                        <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                        <input type="submit" name="update_cart" value="Update">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>Total: $<?php echo calculateTotal(); ?></p>
        <form method="post" action="">
            <label for="customer_name">Customer Name:</label>
            <input type="text" name="customer_name" id="customer_name" required><br>
            <label for="customer_email">Customer Email:</label>
            <input type="email" name="customer_email" id="customer_email" required><br>
            <input type="submit" name="submit_order" value="Place Order">
        </form>
    <?php else: ?>
        <p>Your shopping cart is empty</p>
    <?php endif; ?>
</body>
</html>
