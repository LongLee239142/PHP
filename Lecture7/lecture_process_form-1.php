<?php
// Kiểm tra xem phương thức là POST và có dữ liệu được gửi đi không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường được gửi đi có được định nghĩa không
    if (isset($_POST["username"]) && !empty($_POST["username"])  && isset($_POST["password"])&&!empty($_POST["password"])) {
        // Lấy dữ liệu từ form
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Xử lý dữ liệu ở đây (ví dụ: kiểm tra đăng nhập, lưu vào cơ sở dữ liệu, v.v.)

        // Hiển thị thông báo hoặc chuyển hướng người dùng tùy thuộc vào kết quả xử lý
        echo "Username: $username<br>";
        echo "Password: $password<br>";
    } else {
        echo "Vui lòng điền vào tất cả các trường!";
    }
} else {
    // Nếu không phải phương thức POST, chuyển hướng hoặc hiển thị thông báo lỗi
    echo "Method not allowed";
}
?>

