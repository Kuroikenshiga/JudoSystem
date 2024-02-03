function insert(){

    let objUser = new Object()
    objUser.senha = document.querySelector("#passWord").value;
    objUser.nome = document.querySelector("#userName").value;
    objUser.email = document.querySelector("#email").value;

    let objAcademia = new Object();
    objAcademia.numero = document.querySelector("#numero").value;
    objAcademia.nome = document.querySelector("#nome").value;
    objAcademia.cidade = document.querySelector("#cidade").value;
    objAcademia.estado = document.querySelector("#estado").value;
    objAcademia.bairro = document.querySelector("#bairro").value;
    objAcademia.logradouro = document.querySelector("#logradouro").value;
    objAcademia.complemento = document.querySelector("#complemento").value;
    objUser.academia = objAcademia;
    
    let xml = new XMLHttpRequest();
    xml.open("POST","../../index.php?class=User&method=insert",true);
    xml.setRequestHeader("content-Type","Application/Json");
    
   xml.onreadystatechange = ()=> {
        if(xml.status == 200 && xml.readyState == 4){
            let json;
            //console.log(xml.responseText)
            try{
                json = JSON.parse(xml.responseText);
            }
            catch(error){
                console.log(error)
                return 0
            }

            window.location.href = json.way
        }
   }

    xml.send(JSON.stringify(objUser))


}
function login(){
    obj = new Object()
    obj.senha = document.querySelector("#passWord").value;
    obj.email = document.querySelector("#email").value;

    let xml = new XMLHttpRequest();
    xml.open("POST","../../index.php?class=user&method=login",true);
    xml.setRequestHeader("content-Type","Application/Json");
    
   xml.onreadystatechange = ()=> {
        if(xml.status == 200 && xml.readyState == 4){
            //alert(xml.responseText);
            try{
                let objResponse = JSON.parse(xml.responseText);
                window.location.href = objResponse.way;
            }
            catch(exception){
                alert(xml.responseText)
            }
        }
   }

    xml.send(JSON.stringify(obj))
}