<?php
include('connect_database-1.php');
$query = "SELECT *FROM products";
$result = $comn->query($query);
if(!isset($_COOKIE['username'])) {
    header("Location: View-2.php");
    exit();
    $username = $_COOKIE['username'];
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
      <th>product_id</th>
      <th>product_name</th>
      <th>description</th>
      <th>price</th>
      <th>quantity_in_stock </th>
      <th>manufacturer_id</th>
      <th>category_id</th>
      <th>created_at</th>
      <th>is_active</th>
    </tr>
    <?php
      if ($result->num_rows > 0) {
        $product_id=1;
        while($data = $result->fetch_assoc()) {
    ?>

    <tr>
      <td><?php echo $product_id; ?> </td>
      <td><?php echo $data['product_name']; ?></a></td>
      <td><?php echo $data['description']; ?> </td>
      <td><?php echo $data['price']; ?> </td>
      <td><?php echo $data['quantity_in_stock']; ?> </td>
      <td><?php echo $data['manufacturer_id']; ?> </td>
      <td><?php echo $data['category_id']; ?> </td>
      <td><?php echo $data['created_at']; ?></td>
      <td><?php echo $data['is_active']; ?></td>
    <tr>
    <?php
      $product_id++;
      }
    }else{
    ?>
    <tr>
      <td colspan="8">No data found</td>
    </tr>
    <?php } ?>


    </table >

   <a href='Out-2.php'>Logout</a>
  
</body>

</html>