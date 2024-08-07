<?php
 $array = [1,2,3,4];
 $sum = 0;
 $sum_notPrime_1 = 0;
 $sum_notPrime_2 = 0;
 for ($i = 0; $i < count($array); $i ++){
   $sum += $array[$i] ;
   if ($array[$i] <= 1) {
      $sum_notPrime_1 += $array[$i]; 
    }
    for ($x = 2; $x < $array[$i]; $x++) {
      if ($array[$i] % $x == 0) {
         $sum_notPrime_2 += $array[$i] ;
      }
 }
}
 echo $sum -  $sum_notPrime_1 -  $sum_notPrime_2;
?>