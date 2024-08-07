<?php
session_start();
if(isset($_COOKIE['username'])){
    echo "<h2>My boss is so handsome and romantic</h2>";
    echo "<a href ='welcome-2.php'><input type = button value= Comeback></a>";
}
?>