<?php
$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'web';

$mysqli = new mysqli($hostName, $userName, $password, $databaseName);

if ($mysqli->connect_error){
    //echo "Connection Error....<br>";
}
else{
   // echo "Connection to Database is Successful...<br>";
}
?>