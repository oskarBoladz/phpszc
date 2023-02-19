<?php
session_start();
$mysqli = new mysqli("localhost","root","","appsz");
$id= $_SESSION["id"];


    $dt = $_COOKIE["dataa"];
    $mysqli->query("update users set data='$dt' where id='$id'");
    //setcookie('dsa', '', 1);



    // $dt = $_COOKIE["dataa"];
    // $mysqli->query("update users set data='$dt' where id='$id'");

?>