<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
if(!isset($_SESSION['username'])) {
    header("Location:  login.php");
    exit();
}

function getListProduct(){
    include('connect_db.php');
    $query = "SELECT *FROM products WHERE is_active = 1";
    $result = $conn->query($query);
    return $result;
}

// Lấy tên người dùng từ session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trang chính</title>
</head>
<body>
    <h2>Xin chào <?php echo $username; ?></h2>
    <table cellspacing="0" cellpadding="10">
    <tr>
      <th>S.N</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Stock Quantity</th>
      <th>Manufacturer</th>
      <th>Category</th>
      <th>Created At</th>
      <th>Action</th>
    </tr>
    <?php
    $result = getListProduct();
      if ($result->num_rows > 0) {
        $sn=1;
        while($data = $result->fetch_assoc()) {
    ?>

    <tr>
      <td><?php echo $sn; ?> </td>
      <td>
        <a href="view_detail_product.php?id=<?php echo $data['product_id']; ?>"><?php echo $data['product_name']; ?></a>
      </td>
      <td><?php echo $data['description']; ?> </td>
      <td><?php echo $data['price']; ?> </td>
      <td><?php echo $data['quantity_in_stock']; ?> </td>
      <td><?php echo $data['manufacturer_id']; ?> </td>
      <td><?php echo $data['category_id']; ?> </td>
      <td><?php echo $data['created_at']; ?> </td>
      <td>

      <a href="#" value="">Edit</a>

      <a href="#" value="">Delete</a>
      </td>
    <tr>
    <?php
      $sn++;
      }
    }else{
    ?>
    <tr>
      <td colspan="8">No data found</td>
    </tr>
    <?php } ?>
    </table>
    
    <a href="logout.php">Đăng xuất</a>
</body>
</html>
