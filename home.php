<?php
include 'koneksi.php';
$q = 'select * from user';
$result = mysqli_query($con, $q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css" type="text/css">
    <title>Home <Stand class="in"></Stand>
    </title>
</head>

<body>
    <div class="header">
        <nav>
            <h4>Standin</h4>
            <ul class="nav-links">
                <li><a href="">About</a></li>
                <li><a href="">Contacts</a></li>
                <li class="btn">
                    Sign Up
                </li>
            </ul>
        </nav>

        <div class="container">

            <h7>cari tenant impianmu</h7>
            <h2>Cari tenant<br>
                dengan mudah</h2>
            <div class="button">
                <a href="#">
                    <h3>Sewa Sekarang</h3>
                </a>
            </div>

        </div>


    </div>
</body>

</html>