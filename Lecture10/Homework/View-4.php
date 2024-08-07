<?php
session_start();
include('connect_database-1.php');
// if (!isset($_SESSION['product_name'])) {
//     header("Location: View-3.php");
//     exit();
//   }
if (!isset($_COOKIE['username'])) {
  header("Location: View-2.php");
  exit();
  $username = $_COOKIE['username'];
}
if (!isset($_SESSION['product_name'])) {
  header("Location: View-3.php");
  exit;
  $_SESSION['product_name'] = $data['product_name'];
}
?>
<?php

if (isset($_SESSION['product_name'])) {
  include('connect_database-1.php');
  $condition = "WHERE product_name = '$_SESSION[product_name]'";
  $sql = "SELECT*FROM products " . $condition;
  $resultdetail = $comn->query($sql);
  $comn->close();
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
  <table border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th>description</th>
      <th>price</th>
      <th>quantity_in_stock </th>
      <th>manufacturer_id</th>
      <th>category_id</th>
      <th>created_at</th>
      <th>is_active</th>
    </tr>
    <?php if ($resultdetail->num_rows > 0) {
      while ($datab = $resultdetail->fetch_assoc()) {
    ?>
        <tr>
          <td><?php echo $datab['description']; ?> </td>
          <td><?php echo $datab['price']; ?> </td>
          <td><?php echo $datab['quantity_in_stock']; ?> </td>
          <td><?php echo $datab['manufacturer_id']; ?> </td>
          <td><?php echo $datab['category_id']; ?> </td>
          <td><?php echo $datab['created_at']; ?></td>
          <td><?php echo $datab['is_active']; ?></td>
        <tr>
        <?php } 
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