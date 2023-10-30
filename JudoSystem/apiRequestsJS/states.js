

var statesG = new Array();
function searchState(state){

    for(let i = 0;i < statesG.length;i++){
        if(statesG[i].nome == state){
            return statesG[i].id
    }
    }
}
function promiseCity(){
    
    let selectCidade = document.querySelector("#cidade");
    let select = document.querySelector("#estado");
    selectCidade.innerHTML = "";
    initialOp = document.createElement("option");
    initialOp.value = "";
    initialOp.innerHTML = "Selecione a cidade";
    selectCidade.appendChild(initialOp);
    //alert(searchState(select.value))
    fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados/"+(searchState(select.value))+"/municipios")
    .then((response)=>response.json())
    .then((cities)=>{
        let i = 0;
        
        while(i < cities.length){
            let option = document.createElement("option");
            option.value = cities[i].nome;
            option.innerHTML = cities[i].nome;
            
            selectCidade.appendChild(option);
            i++;
        }
    }).catch((error)=>{alert(error)})

    
}
function promiseState(){
    let select = document.querySelector("#estado");
    fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome")
    .then((response)=>response.json())
    .then((states)=>{
        let i = 0;
        statesGlobal = states
        while(i < states.length){
            statesG = states;
            let option = document.createElement("option");
            option.value = states[i].nome;
            option.innerHTML = states[i].nome;
            
            select.appendChild(option);
            i++;
        }
    }).catch((error)=>{alert(error)})
}
