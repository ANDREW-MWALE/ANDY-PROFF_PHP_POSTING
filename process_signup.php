<?php

 if(empty($_POST["name"])){
    die("user name is required");
 }
 if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("email is require");
 }
 if(strlen($_POST["password"]) < 8){
    die("Password must be atleast 8 characters");
}
if(! preg_match("/[a-z]/i", $_POST["password"])){
    die("password must atleast contain more than one letter");
}
if(! preg_match("/[0-9]/", $_POST["password"])){
    die("password must atleat contain more than one number");
}
if($_POST["password"] !== $_POST["password_confirmation"]){
    die("password must watch");
}
$password_hash = password_hash($_POST["password"],  PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user(name, email, password_hash) 
VALUES(?, ?, ?)";

$stmt=$mysqli->stmt_init();

if(! $stmt->prepare($sql)){
    die("SQL error:" . $mysqli->error);
}

$stmt->bind_param(
    "sss", $_POST["name"],
    $_POST["email"],
    $password_hash);
if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
}else{
    if($mysqli->errno === 1062){
        die("email already taken");
    }
    die($mysqli->error . "" . $mysqli->errno);
}