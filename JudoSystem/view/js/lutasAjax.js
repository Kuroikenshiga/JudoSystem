function insertLuta(){

    let obj = new Object();
    obj.luta = new Object();
    obj.luta.categoria = document.querySelector('#categoria').value;
    obj.luta.tempo = document.querySelector('#tempo').value;
    obj.luta.goldenScore = document.querySelector('#goldenScore').value;
    obj.luta.hansokumake = document.querySelector('#Hansokumake').checked;

    obj.oponente1 = new Object();
    obj.oponente1.atleta = document.querySelector('#atletas').value;
    obj.oponente1.w1 = document.querySelector('#wazari1').value;
    obj.oponente1.w2 = document.querySelector('#wazari2').value;
    obj.oponente1.ippon = document.querySelector('#ippon').value;
    obj.oponente1.neWaza = document.querySelector('#ne-waza').value;
    obj.oponente1.tecnica = document.querySelector('#tecnica').value;
    obj.oponente1.forca = document.querySelector('#forca').value;
    obj.oponente1.condFisico = document.querySelector('#condFisico').value;
    obj.oponente1.vencedor = document.querySelector('#vencedor').checked;
    obj.oponente1.qtdFaltas = document.querySelector('#faltas').value;

    obj.oponente2 = new Object();
    obj.oponente2.atleta = document.querySelector('#atletas_2').value == ''?null:document.querySelector('#atletas_2').value;
    obj.oponente2.w1 = document.querySelector('#wazari1_2').value;
    obj.oponente2.w2 = document.querySelector('#wazari2_2').value;
    obj.oponente2.ippon = document.querySelector('#ippon_2').value;
    obj.oponente2.neWaza = document.querySelector('#ne-waza_2').value;
    obj.oponente2.tecnica = document.querySelector('#tecnica_2').value;
    obj.oponente2.forca = document.querySelector('#forca_2').value;
    obj.oponente2.condFisico = document.querySelector('#condFisico_2').value;
    obj.oponente2.vencedor = document.querySelector('#vencedor_2').checked;
    obj.oponente2.qtdFaltas = document.querySelector('#faltas_2').value;

    console.log(JSON.stringify(obj))
    let xml = new XMLHttpRequest();
    xml.open("POST",'index.php?class=lutas&method=insert');
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            alert('!!!!'+xml.responseText)
        }
    }
    xml.send(JSON.stringify(obj))
}
function updateLuta(){
    let obj = new Object();
    obj.luta = new Object();
    obj.luta.id = document.querySelector('#lutaId').value;
    obj.luta.categoria = document.querySelector('#categoria').value;
    obj.luta.tempo = document.querySelector('#tempo').value;
    obj.luta.goldenScore = document.querySelector('#goldenScore').value;
    obj.luta.hansokumake = document.querySelector('#Hansokumake').checked;

    obj.oponente1 = new Object();
    obj.oponente1.id = document.querySelector('#idOponente1').value;
    obj.oponente1.atleta = document.querySelector('#atletas').value;
    obj.oponente1.w1 = document.querySelector('#wazari1').value;
    obj.oponente1.w2 = document.querySelector('#wazari2').value;
    obj.oponente1.ippon = document.querySelector('#ippon').value;
    obj.oponente1.neWaza = document.querySelector('#ne-waza').value;
    obj.oponente1.tecnica = document.querySelector('#tecnica').value;
    obj.oponente1.forca = document.querySelector('#forca').value;
    obj.oponente1.condFisico = document.querySelector('#condFisico').value;
    obj.oponente1.vencedor = document.querySelector('#vencedor').checked;
    obj.oponente1.qtdFaltas = document.querySelector('#faltas').value;

    obj.oponente2 = new Object();
    obj.oponente2.id = document.querySelector('#idOponente2').value;
    obj.oponente2.atleta = document.querySelector('#atletas_2').value == ''?null:document.querySelector('#atletas_2').value;
    obj.oponente2.w1 = document.querySelector('#wazari1_2').value;
    obj.oponente2.w2 = document.querySelector('#wazari2_2').value;
    obj.oponente2.ippon = document.querySelector('#ippon_2').value;
    obj.oponente2.neWaza = document.querySelector('#ne-waza_2').value;
    obj.oponente2.tecnica = document.querySelector('#tecnica_2').value;
    obj.oponente2.forca = document.querySelector('#forca_2').value;
    obj.oponente2.condFisico = document.querySelector('#condFisico_2').value;
    obj.oponente2.vencedor = document.querySelector('#vencedor_2').checked;
    obj.oponente2.qtdFaltas = document.querySelector('#faltas_2').value;

    console.log(JSON.stringify(obj))
    let xml = new XMLHttpRequest();
    xml.open("POST",'index.php?class=lutas&method=update');
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
           if(xml.responseText == 'OK'){
                let principal = document.querySelector('#alert')
                let alerta = document.createElement('div')
                alerta.className = 'alert alert-primary'
                alerta.role = 'alert'
                p = document.createElement('p')
                p.innerText = 'Cadastrado com sucesso'
                alerta.appendChild(p)
                principal.appendChild(alerta)
                window.location.href = '../../index.php?class=lutas&method=listByCategoriaAndCompeticao&comp='+document.querySelector('#comp').value+'&categoria='+document.querySelector('#categoria').value
           }
        }
    }
    xml.send(JSON.stringify(obj))
}

function getAtleta(id,comp,barraDePesquisa){
    
    // let barraDePesquisa = document.querySelector('#search');
    let select = document.querySelector(barraDePesquisa.id == "search"?'#atletas':'#atletas_2');
    
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
    xml.send('id='+id+'&nome='+barraDePesquisa.value+'&comp='+comp);

}
function setInputValue(value){
   
    let barraDePesquisa = document.querySelector(value == 1?'#search':'#search_2');
    let select = document.querySelector(value == 1?'#atletas':'#atletas_2');
    
    let i = 0;
    
    while(i < select.options.length){
        if(select.options[i].value == select.value){
            barraDePesquisa.value = select.options[i].innerText
            break;
        }
        i++;
    }
}
function constraintCheckbx(){
    vit = document.querySelector('#vitoria');
    hanso = document.querySelector('#hansokumake');

    if(hanso.checked == true){
        vit.checked = false;
    }
}

function validaTempo(){
    let tempo = document.querySelector("#tempo").value

    alert(tempo.match(/[1-5][:][0-5][0-9]/))
    tempo.value = tempo.match(/[1-5]/)
}

function showContent(){
    // divLuta = document.querySelector('#luta');
    // divLuta.style.display = divLuta.style.display  == 'none'?'block':'none'
    // divLutadores = document.querySelector('#lutadores'); 
    // divLutadores.style.display = divLutadores.style.display == 'flex'?'none':'flex'
    // bt = document.querySelector('#btCad');
    // bt.style.display =  bt.style.display == 'block'?'none':'block'
    // btB = document.querySelector('#btBack');
    // btB.style.display =  btB.style.display == 'block'?'none':'block'
    // texto = document.querySelector('#lutadoresText');
    // texto.style.display = texto.style.display == 'block'?'none':'block'
}

function allowUpdate(check){
    inputs = document.querySelectorAll('.control')

    for(let i = 0;i < inputs.length;i++){
        inputs[i].disabled = check.checked?false:true;
    }

    bt = document.querySelector('#btUp');
    bt.style.display = check.checked?'block':'none'
}