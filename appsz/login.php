<?php
include("log.php");
session_start();
if(isset($_SESSION["user"])){
    header('Location: finalPage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ColorSet</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
    <link rel="manifest" href="fav/site.webmanifest">
    <link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="styleR.css">
</head>
<body>
    <div class="nav-bar">
        <img src="fav/android-chrome-256x256.png" alt="">
        <p id="title">ColorSet</p>
    </div>

    <div class="regMenu">
        <form method="post">
        <input placeholder="e-mail" type="email" name="email" class="inputT" required>
            <input  type="password" placeholder="password"  name="pass" class="inputT" id="p1" required>
            <br>
            <button type="submit" name="lagin" class="subB" id="s">Login</button><br>
            <a href="register.php" id="g" >Register</a>
        </form>
    </div>

    

</body>
</html>