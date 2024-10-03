export function validate(){
    let inputs = document.getElementsByClassName("validate");
    for(let i = 0; i < inputs.length;i++){
        if(inputs[i].value == ""){
            inputs[i].style.backgroundColor = "yellow"
            inputs[i].focus();
            setInterval(()=>{inputs[i].style.backgroundColor = ""},3000)
            
            return false;
        }
    }
    return true;
}