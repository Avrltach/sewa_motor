<?php
$databaseHost ='localhost';
$databaseName ='sewamotor';
$databaseUSername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUSername, $databasePassword,
 $databaseName);

if(!$mysqli){
    die("Connection failed: " . mysqli_connect_error());
} 
?>