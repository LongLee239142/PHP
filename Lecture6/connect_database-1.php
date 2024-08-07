<?php
$hostName = "";
$userName = "";
$password = "123456789";
$databaseName ="demo_db_php";
$comn = new mysqli ($hostName, $userName, $password, $databaseName);
if( $comn -> connect_error){
    die("Connect failed: ".$comn ->connect_error);
}else{
    echo "Connect Success";
}
?>