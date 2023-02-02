<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ ."/database.php";

    $sql = sprintf("SELECT * FROM user
    WHERE email = '$s'",
     $mysqli->real_escape_String($_POST["email"]));
// "sprintf" used to insert value from the form
// to excute query
$result=$mysqli->query($sql);
//to get data from the resuilt object
$user = $result->fetch_assoc();
// to print the content of the variable
var_dump($user);
exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
    </head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <body>
        <h1>login</h1>
        <form action="login.php" method="post">
            <div>
            <label for="email">email</label>
            <input type="text" id="email" name="email"/>
</div>
            <div>
                <label for="password">password</label>
            <input type="password" id="password" name="password"/>
</div>
<div>
    <button>login</button>
</div>
        </form>
    </body>
    </html>
