<?php
include("log.php");

session_start();
include("sve.php");
    $mysqli = new mysqli("localhost","root","","appsz");
    $id= $_SESSION["id"];
    $check = $mysqli->query("SELECT data FROM users WHERE email = '$id'");
    if($check -> num_rows == 1){
        while($row = $check->fetch_assoc()) {
            if($row["data"]!=null){
                $data=$row["data"];
                setcookie("dataa",$data );
            }
        }
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

    <link rel="stylesheet" href="finalPageStyle.css">

    
</head>

<body>

    
    
        <div class="nav-bar">
            <img src="fav/android-chrome-256x256.png" alt="">
            <p id="title">ColorSet</p>
            <div class="aDiv" id="aDiv">
                <!--<img id="avatar">-->
            </div>
            <a  href="logout.php" onclick="saverF()" class="nav-menu"  style="float:right; color: var(--mainTextColor);text-decoration:none;margin-right:20px;">logout</a>
            
    <form method="post" >
            <!--<a  onclick="saverF()" class="nav-menu" style="float:right; color: var(--mainTextColor);text-decoration:none;margin-right:20px; cursor:pointer;">save</a>-->
            <button type="submit" name="sv" onclick="saverF()" class="nav-menu" style="margin-top:20px;border:none;font-size:16px;background-color:initial;float:right; color: var(--mainTextColor);text-decoration:none;margin-right:20px; cursor:pointer;">save</button>
            </form>

        </div>

        <!--<script src="script.js" ></script>-->
        <script type="text/javascript">


function generateAvatar(text, foregroundColor, backgroundColor) {
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");

    canvas.width = 50;
    canvas.height = 50;


    context.fillStyle = backgroundColor;
    context.fillRect(0, 0, canvas.width, canvas.height);


    context.font = "bold 25px Space Mono";
    context.fillStyle = foregroundColor;
    context.textAlign = "center";
    context.textBaseline = "middle";
    context.fillText(text, canvas.width / 2, canvas.height / 2 + 2);

    return canvas.toDataURL("image/png");
}
tlet='<?php echo $_SESSION['user'];?>';
tle=tlet.slice(0, 2)
document.getElementById("aDiv").style.backgroundImage="url("+generateAvatar(tle.toUpperCase(),"white","black")+")"





    </script>

            <div class="main-box">
                <div class="color-editor">
                        <div class="r1">
                        <div id="mainColorCircle"></div>

                            <table>
                                
                                <tr><td><span id="hexData" onclick="copyData(this.innerHTML)">#FFFFFF</span></tr></td>
                                    <tr><td><span id="rgbData" onclick="copyData(this.innerHTML)">R:255 G:255 B:255</span></tr></td>
                                        <tr><td><span id="hslData" onclick="copyData(this.innerHTML)">H:0 S:100% L:100%</span></tr></td>

                        </table>
                        </div>
                        <div class="rgbR">

                            <input type="range" min="0" max="255" step="1" value="255" id="rR" oninput="suwakCheck()"> <input type="range" id="gR" min="0" max="255" step="1" value="255" oninput="suwakCheck()"><input type="range" id="bR" min="0" max="255" step="1" value="255" oninput="suwakCheck()">

                        </div>
                        <div id="gradientBox">
                            <div class="gradientPlace" id="gP1"></div>
                            <div class="gradientPlace" id="gP2"></div>
                            <div class="gradientPlace" id="gP3"></div>
                            <div class="gradientPlace" id="gP4"></div>
                            <div class="gradientPlace" id="gP5"></div>
                        </div>


                </div>
                <div class="color-palete">
                    <div class="colorPaleteUser" id="colorPaleteUser">
                    <div id="letters">
                        <!--<div class="lista">
                            <div class="addColorButton" onclick="addColorToList()">
                            
                                Dodaj kolor
                                <span class="material-symbols-outlined" >
                                    add
                                </span>
                            </div>
                            <div class="listaE">
                                <div class="delete"><span class="material-symbols-outlined" >
                                    close
                                </span></div>
                            </div>

                            

                        </div>-->
                    </div>
                        <div class="addPaleteButon" onclick="createList()">
                            
                            Add list
                            <span class="material-symbols-outlined" >
                                add
                            </span>
                        </div>
                    </div>
                </div>
            </div>

    
    
    
    <!--<script src="appWork.js"></script>-->
<script src="appWork.js"></script>

</body>
</html>