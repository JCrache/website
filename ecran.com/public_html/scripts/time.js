function setmin(){
    let d = new Date;
    let m = d.getUTCMinutes();
    if (m<10) {m='0'+m}
    document.getElementById("heure").innerHTML = d.getHours() + "h" + m;
}

function sethour(){
    let min;
    min = setInterval(setmin,1900);
}

function settime(){
    setmin();
    sethour();
}