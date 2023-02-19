<?php
include("log.php");

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
            
    <form id="fform">
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
                    <script src="appWork.js"></script>


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
                        <!--
                        echo $data;
                        function iss($data){
                            if($data=="{" or $data=="}" or $data=="[" or $data=="]" or $data=="\"" or $data=="," or $data=="(" or $data==")" or $data==":"){
                                return true;
                            }else{
                                return false;
                            }
                        }
                        $lid="";
                        for($i=0;$i<=strlen($data)-1;$i++){
                            if(iss($data[$i])==false){
                                while(iss($data[$i])==false){
                                    $lid = implode(array($lid, $data[$i]));
                                    $i++;
                                }
                                echo "?".$lid."?";
                            }
                        }
                    -->
                        
                        
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
<script type="text/javascript" sec="jquery-3.6.3.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    document.cookie="dataa="+JSON.stringify(lists);

    $(document).ready(function(){
    $.ajax({    
        url: "dowab.php",                  
        success: function(data){                    
            //$("#letters").html(data)
            document.cookie="dataa="+JSON.stringify(data);
        }
    });

    $("#fform").submit(function(e){
        e.preventDefault()
        $.ajax({

            url: 'sve.php',
            data: $(this).serialize(),
            type: 'POST',
            succes: function(resp){
                $("#letters").html(resp);
            }

         });         

    })
})


loadData=()=>{
// tu kurwa programuj
}
loadData()

copyData=(data)=>{
    navigator.clipboard.writeText(data);
}
curentColor=[255,255,255]

hD=document.getElementById("hexData")
rD=document.getElementById("rgbData")
hsD=document.getElementById("rgbData")

circle=document.getElementById("mainColorCircle")

r=document.getElementById("rR")
g=document.getElementById("gR")
b=document.getElementById("bR")
//circle.style.backgroundColor="rgb("+r.value+","+g.value+","+b.value+")"
suwakCheck=()=>{
    curentColor=[r.value,g.value,b.value]
    setCircle(r.value,g.value,b.value)
    setValuesR(r.value,g.value,b.value)
    setGradient(r.value,g.value,b.value)
}
//parseInt(hexString, 16)
convertH=(d)=> { return (+d).toString(16).toUpperCase(); }

convertHs= (r, g, b) => {
    r /= 255;
    g /= 255;
    b /= 255;
    const l = Math.max(r, g, b);
    const s = l - Math.min(r, g, b);
    const h = s
      ? l === r
        ? (g - b) / s
        : l === g
        ? 2 + (b - r) / s
        : 4 + (r - g) / s
      : 0;
    return [
        Math.round(60 * h < 0 ? 60 * h + 360 : 60 * h),
        Math.round(100 * (s ? (l <= 0.5 ? s / (2 * l - s) : s / (2 - (2 * l - s))) : 0)),
        Math.round((100 * (2 * l - s)) / 2),
    ];
  };

setValuesR=(r,g,b)=>{
    rD.innerHTML="R:"+r+" G:"+g+" B:"+b;

    hD.innerHTML="#"+convertH(r)+convertH(g)+convertH(b);
    
    hsD.innerHTML="H:"+convertHs(r,g,b)[0]+" S:"+convertHs(r,g,b)[1]+"% L:"+convertHs(r,g,b)[2]+"%"
    //console.log(convertHs(r.value,g.value,b.value))
}
setCircle=(r,g,b)=>{
    circle.style.backgroundColor="rgb("+r+","+g+","+b+")"
}


setGradient=(r,g,b)=>{

for(i =1;i<=5;i++){
    let l = 30+((i-1)*10)
        
        id="gP"+i.toString()
        document.getElementById(id).style.backgroundColor="hsl("+convertHs(r,g,b)[0]+","+convertHs(r,g,b)[1]+"%,"+l+"%)";

        //console.log(document.getElementById(id))
    }
}
/*
localStorage.setItem("lastname", "Smith");
localStorage.getItem("lastname");
var jQueryScript = document.createElement('script');  
jQueryScript.setAttribute('src','https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js');
document.head.appendChild(jQueryScript);
*/
lists={}

/*
addEventListener('beforeunload', (event) => {
    document.cookie="dataa="+JSON.stringify(lists);
    localStorage.clear();
    localStorage.setItem("data", JSON.stringify(lists));
 });

 window.addEventListener("load", (event) => {

    try{
    if(JSON.parse(localStorage.getItem("data")).constructor == Object) {
        lists=JSON.parse(localStorage.getItem("data"))
    }
    }   catch(error){
        console.log(error)
    }
  });
*/
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}





saverF=()=>{
    //document.cookie = "dsa=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    
    document.cookie="dataa="+JSON.stringify(lists);

    /*list=lists
    lists={}
    

    for (const [key, value] of Object.entries(list)) {
        drawList(key)
        for(i=0 ;i<=value.length; i++){
            addColor(key,value[1])
        }
        //console.log(key, value);
    }
    list={}*/
    // for (let i in list) {
    //     createList()
    //     for (i=0;i<=list[i];i++) {
    //         addColor(id,col)
    //     }
    // }
}


drawList=(id)=>{
    const lista = document.createElement("div");
    lista.className="lista"

    lista.setAttribute("id",id)
    lista.innerHTML=
    
    "<div class=\"trash\" onclick=\"trash(this)\"><span class=\"material-symbols-outlined\">delete</span></div>"+"<div class=\"addColorButton\" onclick=\"addColorToList("+idList+")\" >Add color   <span class=\"material-symbols-outlined\" >add</span></div>"

    
    document.getElementById('letters').appendChild(lista)
        
    
    
    lists[id]=[]


}



addColor=(id,col)=>{
    const bb = document.createElement("div");
    bb.className="listaE"  
    //console.log(id)
    idl=lists[id].length+1+id
    bb.setAttribute("id",idl)
    bb.setAttribute("cv","rgb("+curentColor[0]+","+curentColor[1]+","+curentColor[2]+")")
    bb.innerHTML="<div class=\"delete\" onclick=\"deleteColor(this)\"><span class=\"material-symbols-outlined\" >close</span></div>"
    bb.style.backgroundColor="rgb("+curentColor[0]+","+curentColor[1]+","+curentColor[2]+")"
    document.getElementById(id).appendChild(bb)
    lists[id].push([idl,"rgb("+curentColor[0]+","+curentColor[1]+","+curentColor[2]+")"])
    return bb;
}

deleteColor=(th)=>{

    for(i=0;i<=lists[th.parentElement.parentElement.id].length;i++){
        console.log(lists[th.parentElement.parentElement.id][i][0])
        if(lists[th.parentElement.parentElement.id][i][0]==th.parentElement.id){
            lists[th.parentElement.parentElement.id].splice(i,1)
            document.getElementById(th.parentElement.id).remove()
            break;
        }
    }
    
}

addColorToList=(id)=>{
    addColor(id.id,curentColor)
}

createList=()=>{
    const lista = document.createElement("div");
    lista.className="lista"
    dll=Object.keys(lists).length+1
    //console.log(Object.keys(lists).length)
    idList="lis"+dll.toString()
    lista.setAttribute("id",idList)
    lista.innerHTML=
    
    "<div class=\"trash\" onclick=\"trash(this)\"><span class=\"material-symbols-outlined\">delete</span></div>"+"<div class=\"addColorButton\" onclick=\"addColorToList("+idList+")\" >Add color   <span class=\"material-symbols-outlined\" >add</span></div>"

    
    document.getElementById('letters').appendChild(lista)
        
    
    
    lists[idList]=[]
    addColor(idList,curentColor)

}
trash=(th)=>{
    console.log(th.parentElement.id)

    delete lists[th.parentElement.id]
    document.getElementById(th.parentElement.id).remove()
}





</script>
<script type="text/javascript" src="appWork.js"></script>

</body>
</html>