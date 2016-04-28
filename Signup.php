<?php
/**
 * Created by PhpStorm.
 * User: session2
 * Date: 4/27/16
 * Time: 5:48 PM
 */
$dbname = 'moraldb';
$passdb = 'root';
$userdb = 'root';

$dbh = new PDO('mysql:host=localhost;dbname='.$dbname, $passdb, $userdb);

$username = $_POST['username'];
$password = $_POST[SHA1('password')];
$email = $_POST['email'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];

$city = $_POST[''];
$state = $_POST[''];
$ccn = $_POST[''];
$seccode = $_POST[''];
$zipcode = $_POST[''];
if ($_POST['submit']){}
$query = "INSERT INTO users VALUES (?,?,?,?,?)";
$data = $dbh->prepare($query);
      $results = $stmt->execute(array(
          $username,
          $password,
          $email,
          $firstName,
          $lastName,
      ))->fetchall();

?>

<form method="post">
    <label></label>
    <input>
</form>
