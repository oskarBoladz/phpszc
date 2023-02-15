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
    
</head>
<body>
    <div class="nav-bar">
        <img src="fav/android-chrome-256x256.png" alt="">
        <p id="title">ColorSet</p>
    </div>

    <div class="regMenu">
        <form method="post">
            <input placeholder="username" pattern="\w{3,15}" maxlength="15" type="text" name="username" class="inputT" required>
            <input  type="password" placeholder="password"  name="pass" class="inputT" id="p1" onchange="d()" required>
            <input type="password" placeholder="confirm password"  name="pass2" class="inputT" id="p2" onchange="d()" required>
            <input placeholder="e-mail" type="email" name="email" class="inputT" required><br>
            <button type="submit" name="submit" class="subB" id="s">Register</button>
            <br><a href="login.php" id="g" style="line-height:60px;">Login</a>
        </form>
    </div>

    <script>
        document.getElementById("s").disabled=true;
        d=()=>{
            if(document.getElementById("p1").value==document.getElementById("p2").value){
                document.getElementById("s").disabled=false;
            }else{
                document.getElementById("s").disabled=true;
            }
        }
    </script>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    if (isset($_POST["submit"]))
    {//lsxqnbnfmbxajaof
        $username = $_POST["username"];
        $password = $_POST["pass"];
        $email = $_POST["email"];
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'boladz.oskar@gmail.com';
        $mail->Password = 'lsxqnbnfmbxajaof';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($email);
        $mail->addAddress('oskar.boladz@wp.pl');
        $mail->isHTML(true);
        $vcode = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">'.$vcode.'</b></p>';
        $mail->send();

        $hpass = crypt($password, 'SHA256');
        $mysqli = new mysqli("localhost","root","","appsz");


        $mysqli->query("INSERT INTO users(username, email, pass, verification_code) VALUES ('" . $username . "', '" . $email . "', '" . $hpass . "', '" . $vcode . "')");
        header("Location: email-verification.php?email=" . $email);
        exit();
            



    }
        
?>
</body>
</html>