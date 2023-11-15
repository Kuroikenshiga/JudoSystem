function insert(){

    let obj = new Object();
    obj.nome = document.querySelector("#nome").value
    obj.faixa = document.querySelector("#faixa").value
    obj.genero = document.querySelector("#genero").value
    obj.data_nascimento = document.querySelector("#data_nascimento").value
    obj.pontuacao = document.querySelector("#pontuacao").value


    let xml = new XMLHttpRequest();
    xml.open("POST",'../../index.php?class=atleta&method=insert');
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            if(xml.responseText == "Erro no cadastro"){
                alert(xml.responseText)
                return 0
            }
            window.location.href = xml.responseText
        }
    }
    xml.send(JSON.stringify(obj))
}
function update(){
    let obj = new Object();
    
    obj.id = document.querySelector('#id_atleta').value
    obj.nome = document.querySelector("#nome").value
    obj.faixa = document.querySelector("#faixa").value
    obj.genero = document.querySelector("#genero").value
    obj.data_nascimento = document.querySelector("#dtnasc").value
    obj.pontuacao = document.querySelector("#pontuacao").value

    let xml = new XMLHttpRequest();
    xml.open("POST",'../../index.php?class=atleta&method=update');
    xml.setRequestHeader("content-type",'application/json');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            if(xml.responseText == 'Erro no update'){
                alert('Erro no update')
                return 0
            }
            window.location.href = xml.responseText
        }
    }
    xml.send(JSON.stringify(obj))
}

function remove(id){
    
    let xml = new XMLHttpRequest();
    xml.open('Post','../../index.php?class=atleta&method=delete',true);
    xml.setRequestHeader('Content-type','application/json');
    let obj = new Object()
    obj.id = id;
    
    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            
                let atletas = JSON.parse(xml.responseText)
                let table = document.querySelector('#bodyTable')
                
                table.innerHTML = ''

                for(i = 0;i < atletas.length;i++){
                    let tr = document.createElement('tr')

                    let tdNome = document.createElement('td')
                    tdNome.innerHTML = atletas[i].nome
                    tr.appendChild(tdNome)

                    let tdFaixa = document.createElement('td');
                    tdFaixa.innerHTML = atletas[i].faixa
                    tr.appendChild(tdFaixa)

                    let tdGenero = document.createElement('td');
                    tdGenero.innerHTML = atletas[i].genero
                    tr.appendChild(tdGenero)

                    let tdDtnasc = document.createElement('td')
                    tdDtnasc.innerHTML = atletas[i].data_nascimento
                    tr.appendChild(tdDtnasc)

                    let tdPontuacao = document.createElement('td')
                    tdPontuacao.innerHTML = atletas[i].pontuacao
                    tr.appendChild(tdPontuacao)

                    let aM = document.createElement('a')
                    aM.href = 'index.php?class=Atleta&method=ShowUpdate&id_atleta='+atletas[i].id
                    let tdBM = document.createElement('td')
                    let bM = document.createElement('button')
                    bM.className = 'btn btn-info'
                    bM.innerHTML = 'Modifica'
                    aM.appendChild(bM)
                    tdBM.appendChild(aM)
                    tr.appendChild(tdBM)

                    let tdBD = document.createElement('td')
                    
                    tdBD.innerHTML = "<button class='btn btn-danger' onclick='remove("+atletas[i].id+")'>Deletar</button>"
                    tr.appendChild(tdBD)
                 table.appendChild(tr)
            }
           
        
    }
    
}
xml.send(JSON.stringify(obj))
}