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
$dbh = new PDO('mysql:host=localhost;dbname=moraldb', 'root', 'root');


//insert if submit
if (isset($_POST['submit'])) {
    //post vars for the form to signup
    $username = $_POST['username'];
    $password1 = $_POST[('password1')];
    $password2 = $_POST[('password2')];
    $email = $_POST['email'];
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];


    //Insert into db
    $query = "INSERT INTO users (email,fname,lname,username,password1)VALUES (?,?,?,?,SHA(?))";
    $stmt = $dbh->prepare($query);
    $results = $stmt->execute(array(
        $email,
        $firstName,
        $lastName,
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
<div id="menubar">
    <a href="index.php"><p>home</p></a>
    <a href="store.php"><p>store</p></a>
    <a href="aboutus.php"><p>about us</p></a>
</div>
<div id="signup">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>First Name</label>
    <input type="text" id="First Name" name="fName" value="<?php if (!empty($firstName)) echo ''; ?>">
    <br>
    <label>Last Name</label>
    <input type="text" id="Last Name" name="lName" value="<?php if (!empty($lastName)) echo ''; ?>">
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