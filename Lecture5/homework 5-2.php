<?php
function reverseArray($arr){
    $length = count($arr);
    $reversedArray = array();
    for ($i = $length - 1; $i >= 0; $i --){
        $reversedArray[] = $arr[$i];
    }
    return $reversedArray;
}
?>