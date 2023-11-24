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

function getAtleta(id){
    
    let barraDePesquisa = document.querySelector('#search');
    let select = document.querySelector('#atletas');
    
    let xml = new XMLHttpRequest();
    
    xml.open('POST','../../index.php?class=atleta&method=listByCategoriaAndNome');
    xml.setRequestHeader('content-type','application/x-www-form-urlencoded');

    xml.onreadystatechange = ()=>{
        select.innerHTML = ""
        if(xml.readyState == 4 && xml.status == 200){
           //alert(xml.responseText)
            array = new Array()
            try{
               
                array = JSON.parse(xml.responseText)
            }catch(erro){
                alert(xml.responseText);
            }
            
            for(let i = 0; i < array.length; i++){
                
                let option = document.createElement('option');
                option.value = array[i].id
                option.innerText = array[i].nome
                option.addEventListener
                select.appendChild(option)
            }
        } 
    }
    xml.send('id='+id+'&nome='+barraDePesquisa.value);

}

function constraintCheckbx(){
    vit = document.querySelector('#vitoria');
    hanso = document.querySelector('#hansokumake');

    if(hanso.checked == true){
        vit.checked = false;
    }
}