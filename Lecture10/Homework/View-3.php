<?php
session_start();
include('connect_database-1.php');
$query = "SELECT * FROM products";
$result = $comn->query($query);
if (!isset($_COOKIE['username'])) {
  header("Location: View-2.php");
  exit();
  $username = $_COOKIE['username'];
}
?>
<?php
// function myFunction()
// {
//   include('connect_database-1.php');
//   $condition = "WHERE username = '$data[product_name]'";
//   $sql = "SELECT*FROM products " . $condition;
//   $resultdetail = $comn->query($sql);
//   if ($resultdetail->num_rows > 0) {
//     include('View-4.php');
//     echo "<script>location.href = 'View-4.php'</script>";
//   }
//   $comn->close();
// }
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
    </tr>
    <?php
    if ($result->num_rows > 0) {
      $product_id = 1;
      while ($data = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?php echo $product_id; ?> </td>
          <form method="post">
            <td><?php echo "<a href ='View-4.php' name = 'product_name' >'$data[product_name]'</a>" ?></a></td>
            <?php $_SESSION['product_name'] = $data['product_name'] ?>
          </form>
        <tr>
        <?php
        $product_id++;
      }
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