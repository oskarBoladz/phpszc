
function generateAvatar(text, foregroundColor, backgroundColor) {
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");

    canvas.width = 50;
    canvas.height = 50;


    context.fillStyle = backgroundColor;
    context.fillRect(0, 0, canvas.width, canvas.height);


    context.font = "bold 25px Roboto";
    context.fillStyle = foregroundColor;
    context.textAlign = "center";
    context.textBaseline = "middle";
    context.fillText(text, canvas.width / 2, canvas.height / 2);

    return canvas.toDataURL("image/png");
}
tlet='<?php echo $_SESSION[\'user\'];?>';
console.log("dsa")
//tle=tlet.slice(0, 2)
document.getElementById("aDiv").style.backgroundImage="url("+generateAvatar("os","white","black")+")"



