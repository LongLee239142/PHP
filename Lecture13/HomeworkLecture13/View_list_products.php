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



  $sql = "SELECT p.product_id, p.product_name, p.description, p.price, p.quantity_in_stock, p.created_at, m.manufacturer_name, c.category_name
  FROM products p 
  JOIN manufacturers m ON p.manufacturer_id = m.manufacturer_id AND p.is_active = 1
  JOIN category c ON p.category_id = c.category_id AND p.is_active = 1";

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
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Stock Quantity</th>
      <th>Manufacturer</th>
      <th>Category</th>
      <th>Created At</th>
      
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
            <td> <a href="View_detail_products.php?id=<?php echo $data['product_id']; ?>"><?php echo $data['product_name']; ?></a></td>
            <td><?php echo $data['description']; ?></td>
            <td><?php echo $data['price']; ?></td>
            <td><?php echo $data['quantity_in_stock']; ?> </td>
            <td><?php echo $data['manufacturer_name']; ?> </td>
            <td><?php echo $data['category_name']; ?> </td>
            <td><?php
                $datatime = new DateTime($data['created_at']);
                echo  $datatime->format('d-m-Y H:i:s'); ?> </td>
            <td>
              <a href="Edit_products-1.php?id=<?php echo $data['product_id']; ?>" value="">Edit</a>
              <a href="delete_products.php?id=<?php echo $data['product_id']; ?>"onclick="return confirm('Are you sure you want to delete ?')" ">Delete</a>
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