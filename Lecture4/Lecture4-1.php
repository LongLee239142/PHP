<?php

function getInput($input){
      $output = "";
      for ($i = 0; $i < strlen($input); $i += 3) {
           $output .= substr($input, $i, 3) . "-";
      }
      $output = trim($output, "-");
    return $output;
}
echo getInput("XCVBNMHMK");
?>