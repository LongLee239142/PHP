<!-- Mảng Kết Hợp - Associative Array -->
<?php
$top_car_brands = [
    "Toyota" => "Japan",
    "Honda" => "Japan",
    "BMW" => "German",
    "Ford" => "USA",
    "Hyundai" => "Korea",
];

// print_r($top_car_brands);
foreach ($top_car_brands as $brand => $country) {
    echo "$brand là hãng xe của $country<br>";
}
?>