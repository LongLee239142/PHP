<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form action="" method="post" >
        Full Name: <input type="text" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''; ?>">
        <br><br>
        Student Code: <input type="tex" name="student_code" value="<?php echo isset($_POST['student_code']) ? $_POST['student_code'] : ''; ?>">
        <br><br>
        <input type="submit" name="submit" value="Submit">
      </form>
      
      <?php
      if (isset($_POST['submit'])) {
          $fullname = $_POST['fullname'];
          $student_code = $_POST['student_code'];
          $nameArray = explode(' ', $fullname);
          $e_name = " ";
          $re_name = $nameArray[count($nameArray) - 1];
          for ($i = 0; $i < count($nameArray) - 1; $i++) {
            $e_name.= strtolower($nameArray[$i][0]);
          }
          $email = strtolower($re_name ). "." . trim($e_name). trim($student_code) .'@aptechlearning.edu.vn';
          echo "Your full name is: $fullname <br>";
          echo "$nameArray <br>";
          echo "Your Student Code is: $student_code <br>";
          echo "Your email is: $email<br>";
        }
      ?>
</body>
</html>