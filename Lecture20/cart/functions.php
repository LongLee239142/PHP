<?php
include 'config.php'; // Include file cấu hình kết nối cơ sở dữ liệu

// Hàm thêm sản phẩm vào giỏ hàng
function addToCart($productId, $quantity = 1) {
    global $conn;
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row) {
        if(isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' => $quantity
            ];
        }
    }
}

// Hàm cập nhật số lượng sản phẩm trong giỏ hàng
function updateCartQuantity($productId, $quantity) {
    if($quantity <= 0) {
        unset($_SESSION['cart'][$productId]); // Nếu số lượng là 0 hoặc âm, loại bỏ sản phẩm khỏi giỏ hàng
    } else {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
    }
}

// Hàm tạo đơn hàng từ giỏ hàng
function createOrder($customerName, $customerEmail) {
    global $conn;
    
    // Thêm đơn hàng vào bảng orders
    $totalAmount = calculateTotal();
    $sql = "INSERT INTO orders (customer_name, customer_email, total_amount) VALUES ('$customerName', '$customerEmail', $totalAmount)";
    $conn->query($sql);
    $orderId = $conn->insert_id; // Lấy ID của đơn hàng mới
    
    // Thêm các mục vào bảng order_items
    foreach($_SESSION['cart'] as $productId => $item) {
        $price = $item['price'];
        $quantity = $item['quantity'];
        $sql = "INSERT INTO order_details (order_id, product_id, price, quantity) VALUES ($orderId, $productId, $price, $quantity)";
        $conn->query($sql);
    }
    
    // Xóa giỏ hàng sau khi tạo đơn hàng
    unset($_SESSION['cart']);
    
    return $orderId;
}

// Hàm tính tổng tiền của giỏ hàng
function calculateTotal() {
    $total = 0;
    foreach($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}
?>
