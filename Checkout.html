<?php
require_once('connect.php');
function retireOrder($conn) {
    $token = getToken();
    $sql = 'UPDATE users u LEFT JOIN orders o ON u.id = o.users_id AND o.status = "new" SET o.status = "old" WHERE u.token = ?';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(array($token))) {
    }
}
function createNewOrder($conn) {
    $token = getToken();
    $sql = 'INSERT INTO orders (users_id, status) (SELECT u.id, "new" FROM users u WHERE u.token = ?)';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(array($token))) {
    }
}
function checkout($conn) {
    retireOrder($conn);
    createNewOrder($conn);
    echo 'Checkout Successful';
}
function getToken() {
    if (isset($_COOKIE['token'])) {
        return $_COOKIE['token'];
    }
    else {
        header('location:/SimpleCart/login/');
    }
}
?>
<!DOCTYPE html>
<head>
    <title>Morality</title>
</head>
<body>
<h2>Please wait while we connect you to the shopping cart...</h2>
</body>
