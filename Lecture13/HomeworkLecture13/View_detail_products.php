<?php
session_start();
include('connect_database-1.php');
if (!isset($_COOKIE['username'])) {
  header("Location: Login-1.php");
  exit();
  $username = $_COOKIE['username'];
}
function getDetailProduct()
{
  include('connect_database-1.php');
  $id = $_GET['id'];
  $query = "SELECT p.product_id, p.product_name, p.description, p.price, p.quantity_in_stock, p.created_at, m.manufacturer_name, c.category_name, p.is_active
  FROM products p 
  JOIN manufacturers m ON p.manufacturer_id = m.manufacturer_id AND p.is_active = 1
  JOIN category c ON p.category_id = c.category_id AND p.product_id =$id";
  $result = $comn->query($query);
  return $result;
}
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <table border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th>description</th>
      <th>price</th>
      <th>quantity_in_stock </th>
      <th>manufacturer</th>
      <th>category</th>
      <th>created_at</th>
      <th>is_active</th>
    </tr>
    <?php
    if (getDetailProduct()->num_rows > 0) {
      $data = getDetailProduct()->fetch_assoc();
    ?>
      <tr>
        <td><?php echo $data['description']; ?> </td>
        <td><?php echo $data['price']; ?> </td>
        <td><?php echo $data['quantity_in_stock']; ?> </td>
        <td><?php echo $data['manufacturer_name']; ?> </td>
        <td><?php echo $data['category_name']; ?> </td>
        <td><?php echo $data['created_at']; ?></td>
        <td><?php echo $data['is_active']; ?></td>
        <!-- <td>
          <a href="Edit_products-1.php" value="">Edit</a>
          <a href="delete_products.php" value="">Delete</a>
        </td> -->
      <tr>
      <?php
    } else {
      ?>
      <tr>
        <td colspan="8">No data found</td>
      </tr>
    <?php } ?>
  </table>

  <a href='Out-2.php'>Logout</a>

</body>

</html>