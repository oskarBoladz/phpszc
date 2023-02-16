<?php
    if (isset($_POST["lagin"]))
    {
    $mysqli = new mysqli("localhost","root","","appsz");
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $hpass = crypt($pass, 'SHA256');
    $result = $mysqli->query("SELECT id, email, pass, username FROM users WHERE email='$email' and pass='$hpass'");
    if(mysqli_num_rows($result) == 1) {
        session_start();
        while($row = $result->fetch_assoc()) {
            $_SESSION["user"] = $row["username"];
            $_SESSION["id"] = $row["id"];
        }
        setcookie('dsa', '', 1);
        header('Location: finalPage.php');
    }else{
        echo '<script>alert("password or email is wrong")</script>';
    }
    }

    ?>