<?php
///**
// * Created by PhpStorm.
// * User: session2
// * Date: 5/5/16
// * Time: 4:37 PM
// */
//require_once ('connect.php');
//if (isset($_POST['submit'])) {
//    // Connect to the database
//
//    // Grab the user-entered log-in data
//    $user_username = trim($_POST['username']);
//    $user_password = trim($_POST['password']);
//
//    if (!empty($user_username) && !empty($user_password)) {
//        // Look up the username and password in the database
//        $query = "SELECT primarykey, username FROM users WHERE username = '$user_username' AND password = SHA('$user_password')";
//        $stmt = $dbh->prepare($query);
//        $results = $stmt->execute(array(
//            $user_username => $user_username,
//            $user_password => $user_password
//        ));
//        $data = $stmt->fetchAll();
//        if (count($data) == 1) {
//            // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
//            $row = $data[0];
//            $_SESSION['user_id'] = $row['user_id'];
//            $_SESSION['username'] = $row['username'];
//            setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
//            setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
//            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
//            header('Location: ' . $home_url);
//        }
//        else {
//            // The username/password are incorrect so set an error message
//            $error_msg = 'Sorry, you must enter a valid username and password to log in.';
//        }
//    }
//    else {
//        // The username/password weren't entered so set an error message
//        $error_msg = 'Sorry, you must enter your username and password to log in.';
//    }
//
//}
//?>
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
<!--    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
<!--    <link rel="stylesheet" type="text/css" href="stylesheet.css">-->
<!--    <style>-->
<!--        -->
<!--        body{-->
<!--            text-decoration: none;-->
<!--        }-->
<!--            #Login{-->
<!--                background-color: lightgrey;-->
<!--                width: 100%;-->
<!--                position: relative;-->
<!--                right:0%;-->
<!--                text-align: center;-->
<!--                font-family: sans-serif;-->
<!--            }-->
<!---->
<!---->
<!---->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--<div id="logo"><img src="IMGS/Finished-Mongoose.jpg"/></div>-->
<!--<div id="topbanner">-->
<!--</div>-->
<!--<div id="aboutUl">-->
<!--    <ul>-->
<!--        <li><a href="index.php">Home</a></li>-->
<!--        <li><a href="Merchandise.php">Merchandise</a></li>-->
<!--        <li><a href="ShoppingCart.php">Shopping Cart</a></li>-->
<!--        <li><a href="login.php">Login</a></li>-->
<!--        <li><a href="Signup.php">Signup</a></li>-->
<!--    </ul>-->
<!--</div>-->
<!--<div id="Login">-->
<!--    <form method="post" action="--><?php //echo $_SERVER['PHP_SELF']; ?><!--">-->
<!--        <label>Username</label>-->
<!--        <input type="text" id="Username" name="username" value="--><?php //if (!empty($username)) echo ''; ?><!--">-->
<!--        <br>-->
<!--        <label>Password</label>-->
<!--        <input type="password" id="Password" name="password" value="--><?php //if (!empty($password1)) echo ''; ?><!--">-->
<!--        <br>-->
<!--        <input style="background-color: darkblue;" class="btn btn-info" type="submit" name="submit" value="submit">-->
<!--    </form>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->
<?php
require_once('connect.php');
function login($conn) {
    setcookie('token', "", 0, "/");
    $password = sha1($_POST['password']);
    $email = $_POST['email'];
    $sql = 'SELECT * FROM users WHERE email = ? AND password = ?';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute(array($email, $password))) {
        $valid = false;
        while ($row = $stmt->fetch()) {
            $valid = true;
            $token = generateToken();
            $sql = 'UPDATE users SET token = ? WHERE email = ?';
            $stmt1 = $conn->prepare($sql);
            if ($stmt1->execute(array($token, $email))) {
                setcookie('token', $token, 0, "/");
                echo 'Login Successful';
            }
        }
        if(!$valid) {
            echo 'Email or Password Incorrect';
        }
    }
}
function generateToken() {
    $date = date(DATE_RFC2822);
    $rand = rand();
    return sha1($date.$rand);
}
if(isset($_POST['login'])) {
    login($dbh);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
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

<div class="login">
    <h3>Login</h3>
    <form method="post" action="">
        <input type="text" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" name="login" value="LOGIN"/>
    </form>

    <a href="Signup.php">Register Here</a>
</div>
</body>
</html>



