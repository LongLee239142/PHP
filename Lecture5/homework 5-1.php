<?php
function findMinMax($arr){
    if (empty($arr)){
        return array ('min' => null, 'max' => null);
    }
    $min = $arr[0];
    $max = $arr[0];
    foreach ($arr as $value){
        if ($value > $max){
            $max = $value;
        }
        if ($value < $min){
            $min = $value;
        }
    }
    return array ('min' => $min, 'max'=> $max);
}
?>