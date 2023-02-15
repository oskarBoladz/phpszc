function generateAvatar(text, foregroundColor, backgroundColor) {
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");

    canvas.width = 50;
    canvas.height = 50;

    // Draw background
    context.fillStyle = backgroundColor;
    context.fillRect(0, 0, canvas.width, canvas.height);

    // Draw text
    context.font = "bold 25px Roboto";
    context.fillStyle = foregroundColor;
    context.textAlign = "center";
    context.textBaseline = "middle";
    context.fillText(text, canvas.width / 2, canvas.height / 2);

    return canvas.toDataURL("image/png");
}
//console.log(generateAvatar("Ka","white","black"))

document.getElementById("aDiv").style.backgroundImage="url("+generateAvatar("Ka","white","black")+")"

//navigator.clipboard.writeText(copyText.value);

