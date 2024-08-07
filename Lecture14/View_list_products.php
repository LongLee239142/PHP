<?php
session_start();
include('connect_database-1.php');

$query = "SELECT * FROM products";

$result = $comn->query($query);

if (!isset($_COOKIE['username'])) {

  header("Location: Login-1.php");

  exit();

  $username = $_COOKIE['username'];
}

?>

<?php

function myFunction()
{
  include('connect_database-1.php');



  $sql = "SELECT c.customer_id, c.first_name, c.last_name, c.email, c.phone_number, c.address, c.city, c.country, o.order_date, o.total_amount
  FROM customers c
  JOIN orders o ON c.customer_id = o.customer_id ";
  $result = $comn->query($sql);

  return $result;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Main</title>
</head>

<body>
  <table border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th>S.N</th>
      <th>Frist Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Address</th>
      <th>City</th>
      <th>Country</th>
      <th>Order Date</th>
      <th>Total Amount</th>
      
    </tr>
    </tr>

    <?php
    $result = myFunction();

    if ($result->num_rows > 0) {

      $sn = 1;

      while ($data = $result->fetch_assoc()) {

    ?>

        <tr>
          <td><?php echo $sn; ?> </td>
          <form method="post">
            <td> <a href="View_detail_products.php?id=<?php echo $data['customer_id']; ?>"><?php echo $data['first_name']; ?></a></td>
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
            <td>
              <a href="Edit_products-1.php?id=<?php echo $data['customer_id']; ?>" value="">Edit</a>
              <a href="delete_products.php?id=<?php echo $data['customer_id']; ?>"onclick="return confirm('Are you sure you want to delete ?')" ">Delete</a>
            </td>
          </form>
        <tr>

        <?php

        $sn++;
      }
    } else {
        ?>
        <tr>
          <td colspan="8">No data found</td>
        </tr>
      <?php } ?>
  </table>
  </table>
  <a href='Addproducts-2.php'>Add More</a><br>
  <a href='Out-2.php'>Logout</a>

</body>

</html>