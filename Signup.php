<?php
/**
 * Created by PhpStorm.
 * User: session2
 * Date: 4/27/16
 * Time: 5:48 PM
 */
//vars for connection
$dbname = 'moraldb';
$passdb = 'root';
$userdb = 'root';

//connection
require_once ('connect.php');

//insert if submit
if (isset($_POST['submit'])) {
    //post vars for the form to sign up
    $username = $_POST['username'];
    $password1 = $_POST[('password1')];
    $password2 = $_POST[('password2')];
    $email = $_POST['email'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];

    //Insert into db
    $query = "INSERT INTO users (email,fname,lname,username,password)VALUES (?,?,?,?,SHA(?))";
    $stmt = $dbh->prepare($query);
    $results = $stmt->execute(array(
        $email,
        $firstname,
        $lastname,
        $username,
        $password1,
    ));
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<head>
    <div id="logo"><img src="IMGS/Finished-Mongoose.jpg"/></div>
    <div id="topbanner">
        <h1>Sign up to Morality</h1>
    </div>
</head>
<body>
<div id="aboutUl">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="Merchandise.php">Merchandise</a></li>
        <li><a href="ShoppingCart.php">Shopping Cart</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="Signup.php">Signup</a></li>
    </ul>
</div>
<div id="signup">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>First Name</label>
    <input type="text" id="First Name" name="fname" value="<?php if (!empty($firstname)) echo ''; ?>">
    <br>
    <label>Last Name</label>
    <input type="text" id="Last Name" name="lname" value="<?php if (!empty($lastname)) echo ''; ?>">
    <br>
    <label>Email</label>
    <input type="text" id="Email" name="email" value="<?php if (!empty($email)) echo ''; ?>">
    <br>
    <label>Username</label>
    <input type="text" id="Username" name="username" value="<?php if (!empty($username)) echo ''; ?>">
    <br>
    <label>Password</label>
    <input type="password" id="Password" name="password1" value="<?php if (!empty($password1)) echo ''; ?>">
    <br>
    <label>Retype Password</label>
    <input type="password" id="password2" name="password2" value="<?php if (!empty($password2)) echo ''; ?>">
    <br>
    <input type="submit" name="submit" value="submit">
</form>
</div>
</body>
</html>