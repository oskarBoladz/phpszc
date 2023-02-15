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

lists={}

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
    //console.log(th.parentElement.parentElement.id)
    
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