function insert(){

    obj = new Object()
    obj.senha = document.querySelector("#passWord").value;
    obj.nome = document.querySelector("#userName").value;

    let xml = new XMLHttpRequest();
    xml.open("POST","index.php?class=User&method=insert",true);
    xml.setRequestHeader("content-Type","Application/Json");
    
   xml.onreadystatechange = ()=> {
        if(xml.status == 200 && xml.readyState == 4){
            alert(xml.responseText);
        }
   }

    xml.send(JSON.stringify(obj))


}
function login(){
    obj = new Object()
    obj.senha = document.querySelector("#passWord").value;
    obj.nome = document.querySelector("#userName").value;

    let xml = new XMLHttpRequest();
    xml.open("POST","index.php?class=User&method=login",true);
    xml.setRequestHeader("content-Type","Application/Json");
    
   xml.onreadystatechange = ()=> {
        if(xml.status == 200 && xml.readyState == 4){
            alert(xml.responseText);
        }
   }

    xml.send(JSON.stringify(obj))
}