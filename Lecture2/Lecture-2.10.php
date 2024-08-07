
<!DOCTYPE html>
<html>
<head>
</head>
<body>
   <?php 
     $car_brands = array("Toyota", "Honda", "Suzuki"); 

       foreach ($car_brands as $key => $value) {
             echo "Hãng xe đứng thứ {$key + 1} là {$value}";
       }
    ?>
</body>
</html>