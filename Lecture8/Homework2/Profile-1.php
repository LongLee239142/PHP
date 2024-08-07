<?php
session_start();
if(isset($_SESSION['password'])){
    echo "<h2>My boss is so handsome and romantic</h2>";
    echo "<a href ='welcome-1.php'><input type = button value= Comeback></a>";
}
?>