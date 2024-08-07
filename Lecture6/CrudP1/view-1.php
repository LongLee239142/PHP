<?php
include('connect_database-1.php');
$query = "SELECT *FROM product WHERE is_active = 1";
$result = $comn->query($query);
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
      <th>S.N</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Stock Quantity</th>
      <th>Manufacturer</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Action</th>
    </tr>
    <?php
      if ($result->num_rows > 0) {
        $sn=1;
        while($data = $result->fetch_assoc()) {
    ?>

    <tr>
      <td><?php echo $sn; ?> </td>
      <td><?php echo $data['name_']; ?></a></td>
      <td><?php echo $data['description_']; ?> </td>
      <td><?php echo $data['price']; ?> </td>
      <td><?php echo $data['stock_quantity']; ?> </td>
      <td><?php echo $data['manufacturer']; ?> </td>
      <td><?php echo $data['create_at']; ?> </td>
      <td><?php echo $data['updated_at']; ?> </td>
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


  </table 
</body>

</html>