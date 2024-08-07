<?php
function is_valid_email($email) {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,6}$/';
    return preg_match($pattern, $email);
}
$email = "long.ld195887@gmail.com";
if (is_valid_email($email)) {
    echo $email . " is a valid email address.";
} else {
    echo $email . " is not a valid email address.";
}
?>