

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
    var objGlobal = new Object();
    let xml = new XMLHttpRequest();
    xml.open("GET",'index.php?class=academia&method=getAcademiaAPI',false);
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
           
            objGlobal = JSON.parse(xml.responseText);
            document.querySelector("#numero").value = objGlobal.numero
            document.querySelector("#nome").value = objGlobal.nome
   
            document.querySelector("#bairro").value = objGlobal.bairro
            document.querySelector("#logradouro").value = objGlobal.logradouro
            document.querySelector("#complemento").value = objGlobal.complemento
        }
       
    }
    xml.send(null)
    
    var stateId = null
    let select = document.querySelector("#estado");
    
    xml.open('GET',"https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome",false);
    xml.setRequestHeader('content-type','application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            states = JSON.parse(xml.responseText)
            let k = 0
            while(k < states.length){
                
                let option = document.createElement("option");
                option.value = states[k].nome;
                option.innerHTML = states[k].nome;
                if(states[k].nome == objGlobal.estado){option.selected = true; stateId = states[k].id}
                select.appendChild(option);
                k++;
            }
        }
        
    }
    xml.send(null)
    let selectCidade = document.querySelector("#cidade");
    
    selectCidade.innerHTML = "";
    initialOp = document.createElement("option");
    initialOp.value = "";
    initialOp.innerHTML = "Selecione a cidade";
    selectCidade.appendChild(initialOp);
    //alert(searchState(select.value))
    
    fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados/"+(stateId)+"/municipios")
    .then((response)=>response.json())
    .then((cities)=>{
        let i = 0;
        
        while(i < cities.length){
            let option = document.createElement("option");
            option.value = cities[i].nome;
            option.innerHTML = cities[i].nome;
            if(cities[i].nome == objGlobal.cidade){option.selected = true}
            selectCidade.appendChild(option);
            i++;
        }
    }).catch((error)=>{alert(error)})
    
}
