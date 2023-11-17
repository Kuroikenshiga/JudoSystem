function insert(){
    let obj = new Object();
    obj.data_inscricao = document.querySelector("#data_inscricao").value
    obj.hora_inscricao = document.querySelector("#hora_inscricao").value

    let xml = new XMLHttpRequest();
    xml.open("POST",'../../index.php?class=inscricao&method=insert');
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
    obj.data_inscricao = document.querySelector("#data_inscricao").value
    obj.hora_inscricao = document.querySelector("#hora_inscricao").value

    let xml = new XMLHttpRequest();
    xml.open("POST",'../../index.php?class=inscricao&method=update');
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){

        }
    }
    xml.send(JSON.stringify(obj))
}