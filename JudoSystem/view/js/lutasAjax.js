function insert(){

    let obj = new Object();
    obj.tempo = document.querySelector("#tempo").value
    obj.hansoku_make = document.querySelector("#hansoku_make").value
    obj.ganhou = document.querySelector("#ganhou").value
    obj.goldenScore = document.querySelector("#goldenScore").value

    let xml = new XMLHttpRequest();
    xml.open("POST",'index.php?class=lutas&method=insert');
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            alert(xml.responseText)
        }
    }
    xml.send(JSON.stringify(obj))
}
function update(){
    let obj = new Object();
    obj.tempo = document.querySelector("#tempo").value
    obj.hansoku_make = document.querySelector("#hansoku_make").value
    obj.ganhou = document.querySelector("#ganhou").value
    obj.goldenScore = document.querySelector("#goldenScore").value

    let xml = new XMLHttpRequest();
    xml.open("POST",'index.php?class=lutas&method=update');
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            alert(xml.responseText)
        }
    }
    xml.send(JSON.stringify(obj))
}