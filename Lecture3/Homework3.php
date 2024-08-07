<?php
function getEmail($name) {
  $nameArray = explode(' ', $name);
  $e_name = " ";
  $re_name = $nameArray[count($nameArray) - 1];
  for ($i = 0; $i < count($nameArray) - 1; $i++) {
    $e_name.= strtolower($nameArray[$i][0]);
  }
  $email = strtolower($re_name ). "." . trim($e_name). '@aptechlearning.edu.vn';
  return $email;
}
$name = "Le DiNh LoNg";
echo getEmail($name); 
?>