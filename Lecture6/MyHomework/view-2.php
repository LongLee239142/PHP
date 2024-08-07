<?php
include('connect_database-2.php');
$query = "SELECT *FROM student";
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
      <th>user_name</th>
      <th>first_name</th>
      <th>last_name</th>
      <th>dob</th>
      <th>gender</th>
      <th>address</th>
      <th>phone</th>
      <th>email</th>
    </tr>
    <?php
      if ($result->num_rows > 0) {
        $sn=1;
        while($data = $result->fetch_assoc()) {
    ?>

    <tr>
      <td><?php echo $sn; ?> </td>
      <td><?php echo $data['user_name']; ?></a></td>
      <td><?php echo $data['first_name']; ?> </td>
      <td><?php echo $data['last_name']; ?> </td>
      <td><?php echo $data['dob']; ?> </td>
      <td><?php echo $data['gender']; ?> </td>
      <td><?php echo $data['address']; ?> </td>
      <td><?php echo $data['phone']; ?> </td>
      <td><?php echo $data['email']; ?></td>
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