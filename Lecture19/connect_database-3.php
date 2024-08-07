<?php
$hostName = "localhost";
$userName = "root";
$password_db = "12345678";
$databaseName ="testdb";
$comn = new mysqli ($hostName, $userName, $password_db, $databaseName);
if( $comn -> connect_error){
    die("Connect failed: ".$comn ->connect_error);
}
// }else{
//     // echo "Connect Success";
// }
?>