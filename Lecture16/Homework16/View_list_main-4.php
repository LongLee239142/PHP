<?php
include('connect_database-2.php');

$query = "SELECT * FROM products";

$result = $comn->query($query);

?>

<?php

function myFunction()
{
  include('connect_database-2.php');



  $sql = "SELECT * FROM products";

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
  <table>
    <tr>
      <td>
        <form action="Search-1.php" method="get">
          <input type="text" name="search" placeholder="Enter your search term" value="<?php if(isset($_GET["search"])){echo $_GET["search"];}?>">
          <input type="submit" value="Search">
        </form>
      </td>
    </tr>
  </table>
  <table border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th>S.N</th>
      <th>Name</th>
      <th>original_price</th>
      <th>category</th>
      <th>percent_discount </th>

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
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['original_price']; ?></td>
            <td><?php echo $data['category']; ?> </td>
            <td><?php echo $data['percent_discount']; ?> </td>
            <td>
              <a href="Edit_Info-1.php?id=<?php echo $data['id']; ?>" value="">Edit Infor</a>
              <a href="delete_product-1.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
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
  <form action="Addmore_product-1.php" method="post">
    <h2>Add new Product</h2>
    <label for="product_name">Product Name:</label><br>
    <input type="text" name="product_name" required><br>
    <label for="original_price">Original Price:</label><br>
    <input type="text" name="original_price" required><br>
    <label for="category">Category:</label><br>
    <input type="text" name="category" required><br>
    <label for="percent_discount">Percent Discount:</label><br>
    <input type="text" name="percent_discount" required><br><br>
    <input type="submit" value="Update Info"><br>
  </form>

</body>

</html>