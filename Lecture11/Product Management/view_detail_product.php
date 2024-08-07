<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
  function getDetailProduct(){
    include('connect_db.php');
    $id = $_GET['id'];
    $query = "SELECT *FROM products where product_id =$id";
    $result = $conn->query($query);
    return $result;
  }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Product Detail</h2>
  <table cellspacing="0" cellpadding="10">
    <?php
      if (getDetailProduct()->num_rows > 0) {
        $data = getDetailProduct()->fetch_assoc();
    ?>
    <tr>
      <th>Name</th>
      <td><?php echo $data['product_name']; ?></td>
    </tr>
    <tr>
      <th>Description</th>
      <td><?php echo $data['description']; ?> </td>
    </tr>
    <tr>
      <th>Price</th>
      <td><?php echo $data['price']; ?> </td>
    </tr>
    <tr>
      <th>Stock Quantity</th>
      <td><?php echo $data['quantity_in_stock']; ?> </td>
    </tr>
    <tr>
      <th>Manufacturer</th>
      <td><?php echo $data['manufacturer_id']; ?> </td>
    </tr>
    <tr>
      <th>Category</th>
      <td><?php echo $data['category_id']; ?> </td>
    </tr>
    <tr>
      <th>Created At</th>
      <td><?php echo $data['created_at']; ?> </td>
    </tr>
    <tr>
      <th>Action</th>
      <td>
      <a href="#" value="">Edit</a>
      <a href="#" value="">Delete</a>
      </td>
    </tr>
    <tr>
      <td>
        <a href="view_list_product.php">Back to View List Product</a>
      </td>
    </tr>
    <?php
    } else {
    ?>
      <tr>
        <td colspan="8">No data found</td>
      </tr>
      <?php } ?>
  </table>
</body>

</html>