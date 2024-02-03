let formDiv = document.querySelectorAll(".subContainer");
for(let i = 0; i < formDiv.length;i++){
    formDiv[i].addEventListener("mouseover",()=>{
        formDiv[i].style.animationName = "animationOn"
        formDiv[i].style.animationDuration = "1s"
        formDiv[i].style.animationFillMode = "forwards"

        if(formDiv[i].id == "rigth"){
            setTimeout(()=>{
                document.querySelector("#formAcademy").style.display = "flex"
            })
        }
        else{
            setTimeout(()=>{
                document.querySelector("#formulario").style.display = "flex"
            })
        }
    })
    formDiv[i].addEventListener("mouseout",()=>{
        formDiv[i].style.animationName = "animationOff"
        formDiv[i].style.animationDuration = "1s"
        formDiv[i].style.animationFillMode = "forwards"
        setTimeout(()=>{
            document.querySelector("#formAcademy").style.display = "none"
            document.querySelector("#formulario").style.display = "none"
        })
    })
}
