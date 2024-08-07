<?php
$array = [
    'domain' => 'toidicode.com',
    'description' => 'Website học lập trình online'
];
print_r(array_flip($array));
// output: Array ( [toidicode.com] => domain [Website học lập trình online] => description )
?>