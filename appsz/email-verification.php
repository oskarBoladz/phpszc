
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
<form method="POST">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text"  name="verification_code" placeholder="Verification code"  required /><br>

    <input type="submit" name="verify_email" value="Verify">
</form>
</div>
<?php

    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $vcode = $_POST["verification_code"];

        $mysqli = new mysqli("localhost","root","","appsz");
        $check = $mysqli->query("SELECT verification_code FROM users WHERE email = '$email'");
        if($check -> num_rows == 1){
            while($row = $check->fetch_assoc()) {
                if($row["verification_code"]==$vcode){
                    $mysqli->query("update users set verification_code='con' where email='".$email."'");
                    header("Location: cop.php");
                }
            }
        }


        exit();
    }

?>
</body>
</html>