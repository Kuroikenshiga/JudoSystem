

function insert(){

    let obj = new Object();
    obj.numero = document.querySelector("#numero").value
    obj.nome = document.querySelector("#nome").value
    obj.cidade = document.querySelector("#cidade").value
    obj.estado = document.querySelector("#estado").value
    obj.bairro = document.querySelector("#bairro").value
    obj.logradouro = document.querySelector("#logradouro").value
    obj.complemento = document.querySelector("#complemento").value

    let xml = new XMLHttpRequest();
    xml.open("POST",'index.php?class=academia&method=insert');
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
    obj.numero = document.querySelector("#numero").value
    obj.nome = document.querySelector("#nome").value
    obj.cidade = document.querySelector("#cidade").value
    obj.estado = document.querySelector("#estado").value
    obj.bairro = document.querySelector("#bairro").value
    obj.logradouro = document.querySelector("#logradouro").value
    obj.complemento = document.querySelector("#complemento").value

    let xml = new XMLHttpRequest();
    xml.open("POST",'index.php?class=academia&method=update');
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            alert(xml.responseText)
        }
    }
    xml.send(JSON.stringify(obj))
}

function initializeForm(){
    states = statesApi.getStates();
    alert(states)
}