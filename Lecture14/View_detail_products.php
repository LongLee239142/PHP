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
  $customer_id = $_GET['id'];
  $query = "SELECT c.customer_id, c.first_name, c.last_name, c.email, c.phone_number, c.address, c.city, c.country, o.order_date, o.total_amount
  FROM customers c 
  JOIN orders o ON c.customer_id = o.customer_id AND o.customer_id = $customer_id";
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
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Address</th>
      <th>City</th>
      <th>Country</th>
      <th>Order Date</th>
      <th>Total Amount</th>
    </tr>
    <?php
    if (getDetailProduct()->num_rows > 0) {
      $data = getDetailProduct()->fetch_assoc();
    ?>
      <tr>
        <td><?php echo $data['last_name']; ?></td>
        <td><?php echo $data['email']; ?> </td>
        <td><?php echo $data['phone_number']; ?> </td>
        <td><?php echo $data['address']; ?> </td>
        <td><?php echo $data['city']; ?> </td>
        <td><?php echo $data['country']; ?> </td>
        <td><?php
            $datatime = new DateTime($data['order_date']);
            echo  $datatime->format('d-m-Y H:i:s'); ?> </td>
        <td><?php echo $data['total_amount']; ?> </td>
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