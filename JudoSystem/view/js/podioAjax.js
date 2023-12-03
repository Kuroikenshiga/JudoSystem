function insertPodio(){
    let obj = new Object();
    obj.categoria = document.querySelector('#categoria').value
    obj.competicao = document.querySelector('#competicao').value
    obj.l1 = document.getElementById('atl1').value == ""?null:document.getElementById('atl1').value;
    obj.l2 = document.getElementById('atl2').value == ""?null:document.getElementById('atl2').value;
    obj.l3 = document.getElementById('atl3').value == ""?null:document.getElementById('atl3').value;
    obj.l3_2 = document.getElementById('atl3_2').value == ""?null:document.getElementById('atl3_2').value;
    obj.p1 = document.getElementById('p1').value;
    obj.p2 = document.getElementById('p2').value;
    obj.p3 = document.getElementById('p3').value;
    obj.p3_2 = document.getElementById('p3_2').value;

    let xml = new XMLHttpRequest();
    xml.open('POST','../../index.php?class=podio&method=insert',true);
    xml.setRequestHeader('content-type','application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            alert(xml.responseText)
        }
    }
    xml.send(JSON.stringify(obj))
}

function updatePodio(){
    let obj = new Object();
    obj.categoria = document.querySelector('#categoria').value
    obj.competicao = document.querySelector('#competicao').value
    obj.l1 = document.getElementById('atl1').value == ""?null:document.getElementById('atl1').value;
    obj.l2 = document.getElementById('atl2').value == ""?null:document.getElementById('atl2').value;
    obj.l3 = document.getElementById('atl3').value == ""?null:document.getElementById('atl3').value;
    obj.l3_2 = document.getElementById('atl3_2').value == ""?null:document.getElementById('atl3_2').value;
    obj.p1 = document.getElementById('p1').value;
    obj.p2 = document.getElementById('p2').value;
    obj.p3 = document.getElementById('p3').value;
    obj.p3_2 = document.getElementById('p3_2').value;

    let xml = new XMLHttpRequest();
    xml.open('POST','../../index.php?class=podio&method=update',true);
    xml.setRequestHeader('content-type','application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            alert(xml.responseText)
        }
    }
    xml.send(JSON.stringify(obj))
}

function getAtleta(id,comp,barraDePesquisa,idSelect){
    
    // let barraDePesquisa = document.querySelector('#search');
    let select = document.getElementById(idSelect)
    
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
            let option = document.createElement('option');
                option.value = ""
                option.innerText = 'Atleta externo'
                select.appendChild(option)
            for(let i = 0; i < array.length; i++){
                
                let option = document.createElement('option');
                option.value = array[i].id
                option.innerText = array[i].nome
                option.addEventListener
                select.appendChild(option)
            }
        } 
    }
    xml.send('id='+id+'&nome='+barraDePesquisa.value+'&comp='+comp);

}

function setInputValue(input,slct){
   
    let barraDePesquisa = document.getElementById(input);
    let select = document.getElementById(slct);
    
    let i = 0;
    
    while(i < select.options.length){
        if(select.options[i].value == select.value){
            barraDePesquisa.value = select.options[i].innerText
            break;
        }
        i++;
    }
}