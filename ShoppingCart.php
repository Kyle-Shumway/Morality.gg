<?php
require_once('connect.php');
function addProduct($conn, $id) {
    $token = getToken();
    $sql = 'INSERT INTO orders_products (orders_id, products_id) (SELECT o.id, ? FROM users u LEFT JOIN orders o ON u.id = o.users_id AND o.status = "new" WHERE u.token = ?)';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(array($id, $token))) {
    }
}

function deleteProduct($conn, $id) {
    $token = getToken();
    $sql = 'DELETE op FROM users u LEFT JOIN orders o ON u.id = o.users_id AND o.status = "new" LEFT JOIN orders_products op ON o.id = op.orders_id WHERE u.token = ? AND op.id = ?';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(array($token, $id))) {
    }
}

function getProducts($conn) {
    $token = getToken();
    $sql = 'SELECT p.name, p.image, p.price, p.description, op.id FROM users u LEFT JOIN orders o ON u.id = o.users_id AND o.status = "new" LEFT JOIN orders_products op ON o.id = op.orders_id LEFT JOIN products p ON op.products_id = p.id WHERE u.token = ?';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(array($token))) {
        while ($row = $stmt->fetch()) {
            if ($counter == 3) {
                $counter = 0;
                $products .= '<tr>';
            }
            $products .= '
            <td><img src="'.$row['image'].'" height="300px" width="300px">
                <p>'.$row['name'].'</p>
                <p>'.$row['description'].'</p>
                <p>$'.$row['price'].'</p>
                <form method="post" action="ShoppingCart.php">
                <input type="hidden" name="id" value="'.$row['id'].'"/>
                <input type="submit" name="delete" value="DELETE"/>
                </form></td>
        ';
            $counter++;
            if ($counter == 3) {
                $products .= '</tr>';
            }
        }
        echo $products;
    }
}

function getToken() {
    if (isset($_COOKIE['token'])) {
        return $_COOKIE['token'];
    }
    else {
        header('location:login.php');
    }
}
if(isset($_POST['add'])) {
    $id = $_POST['id'];
    addProduct($dbh, $id);
}
if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    deleteProduct($dbh, $id);
}
?>



<!DOCTYPE html>
<head>
    <title>New York Apartments</title>
    <link rel="stylesheet" type="text/css" href="styleSheet.css">
</head>

<body id="shoppingCart">
<div class="aboutUl">
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="About.php">About</a></li>
        <li><a href="Contact.php">Contact</a></li>
        <li><a href="Products.php">Products</a></li>
        <li><a href="shoppingCart.php">Shopping Cart</a></li>
        <li><a href="F.A.Q..php">F.A.Q.</a></li>
        <li><a href="login.php">Login</a></li>
        <li class="copyright"> © New York Apartments</li>
    </ul>
</div>
<h1>Shopping Cart</h1>

<div>
    <div class="productContent">
        <form method="post" action="Checkout.php">
            <input type="submit" name="Checkout" value="CHECKOUT"/>
        </form>
        <div class="productTable">
            <table border="1px">
                <?php
                getProducts($dbh);
                ?>

            </table>

        </div>
    </div>
</div>

</body>
