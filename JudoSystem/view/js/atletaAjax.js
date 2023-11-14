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