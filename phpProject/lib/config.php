<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$dbname = "phpproject";
$dbusername= "root";
$password="";
$host = "localhost";
$conn = mysqli_connect($host,$dbusername,$password,$dbname);
?>