<?php
// replace with the servername of the hosting company when launching the website.
$serverName = 'localhost';
$dbName = 'logindb';
$dbuserName = 'root';
$dbuserPwd = '';

$connection = mysqli_connect($serverName, $dbuserName, $dbuserPwd, $dbName);

if(!$connection){
     die("connection to database has failed: ".mysqli_connect_error() );
}
?>