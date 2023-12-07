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

    let xml = new XMLHttpRequest();
    xml.open('POST','index.php?class=reports&method='+method,true);
    xml.setRequestHeader('content-type','application/x-www-form-urlencoded');

    xml.onreadystatechange = ()=>{
        if(xml.readyState == 4 && xml.status == 200){
            alert(xml.responseText)
        }
    }
    xml.send("metrica="+selecione.value);

}
