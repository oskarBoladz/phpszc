<?php


session_start();

    $mysqli = new mysqli("localhost","root","","appsz");
    $id= $_SESSION["id"];
    $check = $mysqli->query("SELECT data FROM users WHERE id = '$id'");
    if($check -> num_rows == 1){
        while($row = $check->fetch_assoc()) {
            if($row["data"]!=null){
                $data=$row["data"];
                setcookie("dataa",$data );
            }
        }
    }
    echo $data;
?>