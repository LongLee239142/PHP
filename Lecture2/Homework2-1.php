<!-- Write a PHP program to check whether a year is a leap year or not. -->
<?php
function isLeapYear($year) {
    return (($year % 4) == 0 && ($year % 100) != 0) || ($year % 400) == 0;
}

$year = 2023;
if (isLeapYear($year)) {
    echo "$year is a leap year.";
} else {
    echo "$year is not a leap year.";
}
?> 