<!DOCTYPE html>
<html>

<head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <form action="" method="post">
    <div class="container">
      <h1>Personal Information</h1>
      <form>
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter full name" name="fullName">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="birthYear">Birth Year</label>
          <input type="text" class="form-control" id="birthYear" placeholder="Enter birth year" name="birthYear">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $birthYear = $_POST['birthYear'];
  $currentYear = date('Y');
  $age = $currentYear - $birthYear;
?>
  <table class="table">
    <tr>
      <td><?php echo "Your full name is: $fullName " ?></td>
    </tr>
    <tr>
      <td><?php echo  "Your email is: $email " ?></td>
    </tr>
    <tr>
      <td><?php echo "This year you are: $age years old " ?></td>
    </tr>
    </tbody>
  </table>

<?php
}
?>