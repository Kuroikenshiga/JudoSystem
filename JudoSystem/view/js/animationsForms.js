let formDiv = document.querySelectorAll(".subContainer");
firstInteract = true;
for(let i = 0; i < formDiv.length;i++){
    formDiv[i].addEventListener("click",()=>{
        
        formDiv[i].style.animationName = "animationOn"
        formDiv[i].style.animationDuration = "1s"
        formDiv[i].style.animationFillMode = "forwards"
        

        if(formDiv[i].id == "right"){
          
            setTimeout(()=>{
                document.querySelector("#formAcademy").style.display = "flex"
            },500)
            if(!firstInteract){
                document.querySelector("#left").style.animationName = "animationOff"
                document.querySelector("#left").style.animationDuration = "1s"
                document.querySelector("#left").style.animationFillMode = "forwards"
                //formDiv[i].style.animationDelay = "1s"
                setTimeout(()=>{
                  
                    document.querySelector("#formulario").style.display = "none"
                })
            }
            firstInteract = false;
            
        }
        else{
            setTimeout(()=>{
                document.querySelector("#formulario").style.display = "flex"
            },500)
            if(!firstInteract){
                document.querySelector("#right").style.animationName = "animationOff"
                document.querySelector("#right").style.animationDuration = "1s"
                document.querySelector("#right").style.animationFillMode = "forwards"
                //formDiv[i].style.animationDelay = "1s"
                setTimeout(()=>{
                    
                    document.querySelector("#formAcademy").style.display = "none"
                })
            }
            firstInteract = false;
            
        }
       

    
    })

    
    
    // document.querySelector("#container").addEventListener("click",()=>{
       
    //     formDiv[i].style.animationName = "animationOff"
    //     formDiv[i].style.animationDuration = "1s"
    //     formDiv[i].style.animationFillMode = "forwards"
    //     //formDiv[i].style.animationDelay = "1s"
    //     setTimeout(()=>{
    //         document.querySelector("#formAcademy").style.display = "none"
    //         document.querySelector("#formulario").style.display = "none"
    //     })
    // })
}
