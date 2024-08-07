<?php 
$top_car_brands =["Toyota", "Honda", "BMW", "Ford", "Hyundai"];
$length = count($top_car_brands);

for ($i = 0; $i < $length; $i++) {
    echo "Hãng xe đứng số " . ($i + 1) . " là: {$top_car_brands[$i]}<br>";
}
?>