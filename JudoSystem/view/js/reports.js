function getRankingAPI(){
    let selecione = document.querySelector('#metricas');
    let ths = document.querySelectorAll('.remove');
    method = 'showRankingAtletasFiltred'
    if(selecione.value != 'm'){
        for(let i =0; i < ths.length;i++){
            ths[i].parentNode.removeChild(ths[i]);
        }
    }
    else{
        method = 'showRankingAtletasMedalhas';
    }
    let span = document.querySelector('#span');
    let h2 =  document.querySelector('#h2');
    span.innerText = selecione.value == 'f'?'Ranking de atletas que mais utilizam mais força nas lutas':selecione.value == 't'?'Ranking de atletas que mais utilizam mais técnica nas lutas':selecione.value == 'c'?'Ranking de atletas com melhor condicionamento físico':'Ranking de atletas com mais medalhas'
    h2.innerText = selecione.value == 'f'?'Ranking de atletas que mais utilizam mais força nas lutas':selecione.value == 't'?'Ranking de atletas que mais utilizam mais técnica nas lutas':selecione.value == 'c'?'Ranking de atletas com melhor condicionamento físico':'Ranking de atletas com mais medalhas'
    let xml = new XMLHttpRequest();
    xml.open('POST','index.php?class=reports&method='+method,true);
    xml.setRequestHeader('content-type','application/x-www-form-urlencoded');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            try{
                //alert(xml.responseText)
                let array = JSON.parse(xml.responseText);
                let bodyT = document.querySelector('#body');
                let bodyH = document.querySelector('#head');
                
                bodyT.innerHTML = ""

                if(selecione.value != 'm'){
                    try{
                        let th = document.querySelector('#metrica');
                        th.innerText = selecione.value == 'f'?'Força':selecione.value == 't'?'Técnica':'Condicionamento Físico';
                       
                    }
                    catch(error){
                        let th = document.createElement('th');
                        th.innerText = selecione.value == 'f'?'Força':selecione.value == 't'?'Técnica':'Condicionamento Físico'
                        th.id = 'metrica';
                        bodyH.appendChild(th)
                        
                    }
                    for(let i = 0;i < array.length;i++){
                        let row = document.createElement('tr');
                        let td0 = document.createElement('td');
                        td0.innerText = i + 1;
                        row.appendChild(td0)
                        let td1 = document.createElement('td');
                        td1.innerText = array[i].nome
                        row.appendChild(td1)
                        let td2 = document.createElement('td');
                        td2.innerText = array[i].faixa
                        row.appendChild(td2)
                        let td3 = document.createElement('td');
                        td3.innerText = array[i].genero;
                        row.appendChild(td3);
                        
                        let td4 = document.createElement('td');
                        td4.innerText = array[i].metrica;
                        row.appendChild(td4);

                        bodyT.appendChild(row)
                    }
                }
                else{
                    try{
                        bodyH.removeChild(document.querySelector('#metrica'))
                    }
                    catch(error){
                        console.log(xml.responseText)
                    }

                    let th1 = document.createElement('th');
                    th1.innerText = 'Quantidade de medalhas de ouro'
                    th1.className = 'center remove'
                    bodyH.appendChild(th1)

                    let th2 = document.createElement('th');
                    th2.innerText = 'Quantidade de medalhas de Prata'
                    th2.className = 'center remove'
                    bodyH.appendChild(th2)

                    let th3 = document.createElement('th');
                    th3.innerText = 'Quantidade de medalhas de Bronze'
                    th3.className = 'center remove'
                    bodyH.appendChild(th3)

                    for(let i = 0;i < array.length;i++){
                        let row = document.createElement('tr');
                        let td0 = document.createElement('td');
                        td0.innerText = i + 1;
                        row.appendChild(td0)
                        let td1 = document.createElement('td');
                        td1.innerText = array[i].nome
                        row.appendChild(td1)
                        let td2 = document.createElement('td');
                        td2.innerText = array[i].faixa
                        row.appendChild(td2)
                        let td3 = document.createElement('td');
                        td3.innerText = array[i].genero;
                        row.appendChild(td3);
                        
                        let td4 = document.createElement('td');
                        td4.innerText = array[i].qtdOuro;
                        row.appendChild(td4);

                        let td5 = document.createElement('td');
                        td5.innerText = array[i].qtdPrata;
                        row.appendChild(td5);

                        let td6 = document.createElement('td');
                        td6.innerText = array[i].qtdBronze;
                        row.appendChild(td6);

                        bodyT.appendChild(row)
                    }
                }
            }
            catch(error){
                console.log(xml.responseText)
                    
            }
        }
    }
    xml.send("metricas="+selecione.value);

}
