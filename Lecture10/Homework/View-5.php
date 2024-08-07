<?php
  include('connect_database-1.php');
  $condition = "WHERE username = '$data[product_name]'";
  $sql = "SELECT*FROM products " . $condition;
  $resultdetail = $comn->query($sql);
  if ($resultdetail->num_rows > 0) {
    include('View-4.php');
    echo "<script>location.href = 'View-4.php'</script>";
  }
  $comn->close();
?>