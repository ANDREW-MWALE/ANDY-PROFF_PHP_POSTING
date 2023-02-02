<?php 
$host="localhost";
$dbname="products_db";
$username = "root";
$password = "";

$mysqli = new mysqli(
    hostname: $host,
    userngitame: $username,
    database: $dbname,
    password: $password
);

if($mysqli->connect_errno){
    die("connection error:" . $mysqli->connect_error);
}
return $mysqli;
