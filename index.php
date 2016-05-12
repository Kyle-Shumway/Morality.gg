<?php

$user = 'root';
$pass = 'root';
$name = 'moraldb';
$conn = $dbh = new PDO('mysql:host=localhost;dbname='.$name, $user, $pass);
// code
$query = "SELECT username , s.team_name FROM users u LEFT JOIN subscriptions s ON s.users_id = u.primarykey";
$stmt = $conn->prepare($query);
$output = '';
if ($stmt->execute()) {
    $products = '<tr>';

    while ($row = $stmt->fetch()) {
        $output .= '<tr><td>
                <p>' . $row['username'] . '</p>
                </td>
                <td>
                <p>' . $row['team_name'] . '</p>
                </td>
                </tr>';
    }
    echo $output;
}
function generateToken() {
    $date = date(DATE_RFC2822);
    $rand = rand();
    return sha1($date.$rand);
}

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script src="script.js"></script>
<head>

</head>
<body>
<div class=”container”>
    <div class=”image-slider-wrapper”>
        <ul id=”image_slider”>
            <li><img src='IMGS/moralwin.jpeg'></li>
            <li><img src='IMGS/moralwch.jpeg'></li>
            <li><img src='IMGS/TSM.jpeg'></li>
            <li><img src='IMGS/moralleage.jpeg'></li>
        </ul>
    </div>
</div>

</body>
</html>