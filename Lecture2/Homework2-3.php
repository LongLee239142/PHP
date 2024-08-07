<!-- Find the largest and smallest element in an array -->
<?php
function findMinMax($arr) {
    if (empty($arr)) {
        return array('min' => null, 'max' => null);
    }

    $min = $max = $arr[0];
    foreach ($arr as $value) {
        if ($value < $min) {
            $min = $value;
        }
        if ($value > $max) {
            $max = $value;
        }
    }

    return array('min' => $min, 'max' => $max);
}


$arr = array(3, -5, 1, 10, 9, 2);
$result = findMinMax($arr);
echo "Minimum value: " . $result['min'] . "</br>";
echo "Maximum value: " . $result['max'] ;
?>