<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form action="" method="post" >
        Full Name: <input type="text" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''; ?>">
        <br><br>
        Email: <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <br><br>
        Your birth year: <input type="number" name="birthyear" value="<?php echo isset($_POST['birthyear']) ? $_POST['birthyear'] : ''; ?>">
        <br><br>
        <input type="submit" name="submit" value="Submit">
      </form>
      
      <?php
      if (isset($_POST['submit'])) {
          $fullname = $_POST['fullname'];
          $email = $_POST['email'];
          $birthyear = $_POST['birthyear'];
          $currentYear = date('Y');
          $age = $currentYear - $birthyear;
          echo "Your full name is: $fullname <br>";
          echo "Your email is: $email <br>";
          echo "This year you are: $age years old <br>";
      }
      ?>
</body>
</html>