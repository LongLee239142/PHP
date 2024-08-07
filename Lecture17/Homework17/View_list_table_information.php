<?php
include('connect_database-3.php');
if (!isset($_COOKIE['username'])) {

  header("Location: Login-1.php");

  exit();

  $username = $_COOKIE['username'];
}

?>

<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Main</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
  #active {
    background: gray;
    color: white;
  }
</style>

<body>
  <table class="table">
    <tr>
      <th>Table Id</th>
      <th>Table Number</th>
      <th>Capacity</th>
      <th>Location</th>
      <th>Description</th>
      <th>Is Reserved</th>
      <th>Is Outdoor</th>
      <th>Is Available</th>
      <th>Created At</th>
      <th>Last Updated At</th>

    </tr>
    </tr>

    <?php
    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }
    $no_of_records_per_page = 3;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    include("connect_database-3.php");

    $total_pages_sql = "SELECT COUNT(*) FROM tables ";
    $result = mysqli_query($comn, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    $sql = "SELECT * FROM tables  
         LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($comn, $sql);
    $sn = 1;
    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
      $sn = $sn + $offset;
    }

    while ($data = mysqli_fetch_array($res_data)) {
    ?>

      <tr>
        <form method="post">
          <td><?php echo  $sn; ?></td>
          <td><?php echo  $data['table_number']; ?></td>
          <td><?php echo $data['capacity']; ?></td>
          <td><?php echo $data['location']; ?></td>
          <td><?php echo $data['description']; ?> </td>
          <td><?php echo $data['is_reserved']; ?> </td>
          <td><?php echo $data['is_outdoor']; ?> </td>
          <td><?php echo $data['is_available']; ?> </td>
          <td><?php
              $datatime = new DateTime($data['created_at']);
              echo  $datatime->format('d-m-Y H:i:s'); ?>
          </td>
          <td><?php
              $datatime = new DateTime($data['last_updated_at']);
              echo  $datatime->format('d-m-Y H:i:s'); ?>
          </td>
          <td>
            <a href="Edit_Info-1.php?id=<?php echo $data['table_id']; ?>" value="">Edit</a>
            <a href="delete_information.php?id=<?php echo $data['table_id']; ?>" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
          </td>
        </form>
      <tr>
      <?php
      $sn++;
    }

    mysqli_close($comn);
      ?>
  </table>
  <ul class=" pagination">
    <li class="<?php if ($pageno <= 1) {
                  echo 'disabled';
                } ?>">
      <a href="<?php if ($pageno <= 1) {
                  echo '';
                } else {
                  echo "?pageno=" . ($pageno - 1);
                } ?>">Prev</a>
      <?php for ($i = 1; $i <= $total_pages - 1; $i++) : ?>
        <?php if ($pageno == $i) {   ?>

    <li><a href="?pageno=<?php echo $i; ?>" id="active"><?php echo $i; ?></a></li>
  <?php
        } else { ?>
    <li><a href="?pageno=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php } ?>
<?php endfor; ?>
<?php if ($pageno == $total_pages) {   ?>
  <li><a href="?pageno=<?php echo $total_pages; ?>" id="active"><?php echo $total_pages ?></a></li>
<?php } else { ?>
  <li><a href="?pageno=<?php echo $total_pages; ?>"><?php echo $total_pages ?></a></li>
<?php } ?>
<li><a href="<?php if ($pageno >= $total_pages) {
                echo '';
              } else {
                echo "?pageno=" . ($pageno + 1);
              } ?>">Late</a> </li>

  </ul><br>
  <a href="Addmore_table_information-1.php">Add More</a><br>
  <a href='Out-2.php'>Logout</a>

</body>

</html>