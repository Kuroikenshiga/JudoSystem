function promiseState(){
    let select = document.querySelector("#estado");
    fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome")
    .then((response)=>response.json())
    .then((states)=>{
        let i = 0;
        
        while(i < states.length){
            let option = document.createElement("option");
            option.value = states[i].nome;
            option.innerHTML = states[i].nome;
            option.onclick = ()=>{

            }
            select.appendChild(option);
            i++;
        }
    }).catch((error)=>{alert(error)})
}
function setSelectedState(id){
    let form = document.
    let hidden = document.createElement('input');
    hidden.type = 'hidden';
    hidden.value = id;
}