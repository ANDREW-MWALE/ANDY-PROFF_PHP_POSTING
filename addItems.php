<?php 
if(empty($_POST["product_name"])){
    die("no product name entered");
}
if(empty($_POST["description"])){
    die("no decription has been given");
}
if(empty($_POST["quantity"])){
    die("quantity not specified");
}
// if(empty($_POST["Price"])){
//     die("price has not been give");
// }

$mysqli = require __DIR__ . "/p_database.php";

$sql = "INSERT INTO product(product_name, description, quantity) 
VALUE(?, ?, ?)";
$stmt=$mysqli->stmt_init();

if(! $stmt->prepare($sql)){
    die("SQL error:" . $mysqli->error);
}
$stmt->bind_param(
    "sfi", $_POST["product_name"],
    $_POST["description"],
    $_POST["quantity"],
    // $_price["price"]
);
$stmt->execute();


header("Location: product_selected successfully.html");
    exit;

?>
