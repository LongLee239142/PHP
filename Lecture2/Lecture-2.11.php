<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
    $car_brands = array("Toyota", "Honda", "Suzuki"); 
    // var_dump($car_brands)
      foreach ($car_brands as $key => $value) {
      echo "Hãng xe đứng thứ " . $key + 1 . " là " . $value . "</br>";
}
?>

</body>
</html>