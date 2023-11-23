
function insert(){
    let obj = new Object();
    obj.atleta = document.querySelector('#atletas').value;
    obj.classe = document.querySelector('#classe').value;
    obj.genero = document.querySelector('#genero').value;
    obj.peso = document.querySelector('#peso').value
    obj.competicao = document.querySelector('#competicao').value
    let xml = new XMLHttpRequest();
    xml.open("POST",'../../index.php?class=inscricao&method=insert');
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            try{
                obj = JSON.parse(xml.responseText);
                window.location.href = obj.way;
            }
            catch(e){
                alert('Erro na inserção')
            }
        }   
    }
    xml.send(JSON.stringify(obj))
}
function changeSearchValue(){

    search = document.querySelector('#search');

    search.value = document.querySelector('#atletas').innerText;
}
function update(){
    let obj = new Object();
    obj.id = document.querySelector('#id').value;
    obj.atleta = document.querySelector('#atletas').value;
    obj.classe = document.querySelector('#classe').value;
    obj.genero = document.querySelector('#genero').value;
    obj.peso = document.querySelector('#peso').value
    obj.competicao = document.querySelector('#competicao').value
    let xml = new XMLHttpRequest();
    xml.open("POST",'../../index.php?class=inscricao&method=update&id='+document.querySelector('#idComp').value);
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            try{
                obj = JSON.parse(xml.responseText);
                window.location.href = obj.way;
            }
            catch(e){
                alert(xml.responseText)
            }
        }   
    }
    xml.send(JSON.stringify(obj))
}
function getAtleta(){
    
    let barraDePesquisa = document.querySelector('#search');
    let select = document.querySelector('#atletas');
    
    let xml = new XMLHttpRequest();
    
    xml.open('GET','../../index.php?class=atleta&method=listAtletaJson&nome='+barraDePesquisa.value,true);
    xml.setRequestHeader('content-type','www-url-form-encoded');

    xml.onreadystatechange = ()=>{
        select.innerHTML = ""
        if(xml.readyState == 4 && xml.status == 200){
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
    xml.send(null);

}

// function getClassCategoria(){
//     let xml = new XMLHttpRequest();
    
//     xml.open('GET','../../index.php?class=atleta&method=listAtletaJson&nome='+barraDePesquisa.value,true);
//     xml.setRequestHeader('content-type','www-url-form-encoded');

//     xml.onreadystatechange = ()=>{
//         select.innerHTML = ""
//         if(xml.readyState == 4 && xml.status == 200){
//             array = new Array()
//             try{
               
//                 array = JSON.parse(xml.responseText)
//             }catch(erro){
//                 alert(xml.responseText);
//             }
            
//             for(let i = 0; i < array.length; i++){
                
//                 let option = document.createElement('option');
//                 option.value = array[i].id
//                 option.innerText = array[i].nome

//                 select.appendChild(option)
//             }
//         } 
//     }
//     xml.send(null);
// }
function getClassPeso(){
    let select = document.querySelector('#peso')
    let genero = document.querySelector('#genero')
    let classe = document.querySelector('#classe')
    

    let msg = 'Escolha o peso do atleta'

    if(classe.value == '' && genero.value == ''){
        msg = 'Selecione a classe e o peso do atleta'
    }
    
    else if(classe.value == '' ){
        msg = 'Selecione a classe do atleta'
    }
    else if(genero.value == ''){
        msg = 'Selecione o genero do atleta'
    }
    select.innerHTML = ""
    let option = document.createElement('option');
                option.value = null
                option.innerText = msg

                select.appendChild(option)
     

    

    let xml = new XMLHttpRequest();
    
    xml.open('GET','../../index.php?class=categoria&method=listPesoPorGenero&genero='+genero.value+'&classe='+classe.value,true);
    xml.setRequestHeader('content-type','www-url-form-encoded');

    xml.onreadystatechange = ()=>{

        
        if(xml.readyState == 4 && xml.status == 200){
            array = new Array()
            try{
                //alert(xml.responseText);
                array = JSON.parse(xml.responseText)
            }catch(erro){
                alert(xml.responseText);
            }
            
            for(let i = 0; i < array.length; i++){
                
                let option = document.createElement('option');
                option.value = array[i]
                option.innerText = array[i]

                select.appendChild(option)
            }
        } 
    }
    xml.send(null);
    
}
