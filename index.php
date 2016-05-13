<?php

$user = 'root';
$pass = 'root';
$name = 'moraldb';
$conn = $dbh = new PDO('mysql:host=localhost;dbname='.$name, $user, $pass);
// code
$query = "SELECT username , s.team_name FROM users u LEFT JOIN subscriptions s ON s.users_id = u.primarykey";
$stmt = $conn->prepare($query);
if ($stmt->execute()) {
    $products = '<tr>';

    while ($row = $stmt->fetch()) {
        $output .= '<tr><td>
                <p>' . $row['username'] . '</p>
                </td>
                <td>
                <p>' . $row['team_name'] . '</p>
                </td>
                </tr>
                ';
    }
    echo $output;
}



?>
<!DOCTYPE html>
<html>

    <style>

        body li{
            text-decoration: none;
            text-align: center;
            list-style-type: none;;

        }

        body{
            text-decoration: none;
            text-align: center;
            list-style-type: none;
            background: url('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQtEtRPIQtCw_g4N6OV8CAcF0mqF7J68LCOy5Lc1djh_LGVv-LS') fill fill auto;

        }

        #header{
            width: 100%;
            height: 30%;
            position: relative;
            top: 80%;
            left: 0%;
            background-color: black;
            opacity: .8;
            color:white;
            background-image: url('https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQtEtRPIQtCw_g4N6OV8CAcF0mqF7J68LCOy5Lc1djh_LGVv-LS');


        }


        #signup{
            background-color: darkblue;

        }



    </style>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script src="script.js"></script>
<head>

</head>
<body>
    <div style='position:relative;top:20%;' class='jumbotron' id='header'>
            <h1>Welcome to Morality.gg</h1>
            <p style='color:orange;'>Schedule e-Sports Events</p>
                <span  class='glyphicon glyphicon-user' style='font-size:20px;  '></span><input id='signup' type='submit' value='Login/Signup' class='btn btn-info'></input>
                <input type='submit' value='Calendar' class='btn btn-info' style='background-color: purple;'></input>
                <input type='submit' value="Logout" class='btn btn-info' style='background-color:red;'></input>
    </div>

<?php
//getProducts($dbh);
?>
</body>
</html>

