

function searchState(state){
    s = new Array();
    let p = document.createElement("p");
    fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome")
    .then((response)=>response.json())
    .then((states)=>{
        
        for(let i = 0;i < states.length;i++){
            p.innerHTML += state+" == "+states[i].nome+"<br>"
            if(states[i].nome == state){
                return states[i].id
            }
        }
        
    }).catch((error)=>{alert(error)})
    
   
    principal = document.querySelector("#principal");
    principal.appendChild(p)



}
function promiseCity(){
    
    let selectCidade = document.querySelector("#cidade");
    select = document.querySelector("#estado");
    
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
            let option = document.createElement("option");
            option.value = states[i].nome;
            option.innerHTML = states[i].nome;
            
            select.appendChild(option);
            i++;
        }
    }).catch((error)=>{alert(error)})
}
