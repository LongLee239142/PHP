<!-- Xoá Phần Tử trong Mảng -->
<?php 
    $top_car_brands =["Toyota", "Honda", "BMW", "Ford", "Hyundai", "Mercedes"];
        unset($top_car_brands[5]);
    print_r($top_car_brands);
?>