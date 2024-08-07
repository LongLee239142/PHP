<!-- Write a php program to calculate the sum of even numbers in an array: -->
<?php
function findTotalEvenNumber($arr) {
    if (empty($arr)) {
        return array('total' => null);
    }

    $total = $arr[0];
    foreach ($arr as $value) {
        if ($value % 2 ==0) {
            $total += $total;
        }
    }

    return array('total'=> $total);
}


$arr = array(3, -5, 1, 10, 9, 2);
$result = findTotalEvenNumber($arr);
echo "Total of Even Number : " . $result['total'] . "</br>";
?>