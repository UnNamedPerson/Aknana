<?php
// replace with the servername of the hosting company when launching the website.
$serverName = 'localhost';
$dbName = 'images';
$dbuserName = 'root';
$dbuserPwd = '';

$connect = mysqli_connect($serverName, $dbuserName, $dbuserPwd, $dbName);

if(!$connect){
     die("connection to database has failed: ".mysqli_connect_error() );
}
?>