
<?php
require_once('connect.php');

function getProducts($conn) {
    $sql = 'SELECT * FROM products ORDER BY name';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        $products = '<tr>';
        $counter = 0;
        while ($row = $stmt->fetch()) {
            if ($counter == 3) {
                $counter = 0;
                $products .= '<tr>';
            }
            $products .= '
           <td><img src="'.$row['Image'].'" height="300px" width="300px">
                <p>'.$row['Name'].'</p>
                <p>$'.$row['Price'].'</p>
                <p>'.$row['Description'].'</p>
                <form method="post" action="ShoppingCart.php">
                <input type="hidden" name="id" value="'.$row['PrimaryKey'].'"/>
                <input type="submit" name="add" value="ADD"/>
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Morality.gg</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body id="products">
<div id="aboutUl">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="Merchandise.php">Merchandise</a></li>
        <li><a href="ShoppingCart.php">Shopping Cart</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</div>

<h1 id="merchh1">Products</h1>
<div class="content">
    <div class="productContent">
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
</html>
?>
