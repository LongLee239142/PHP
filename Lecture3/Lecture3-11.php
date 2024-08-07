<?php
 function getName($input_name){
    $name = explode(" ", $input_name);
    foreach ( $name as $value){
        $x = ucfirst($value);
       echo $x . " " ;
    }
    return trim( $x . " ") ;
 }
 getName("long le");
?>