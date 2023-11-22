showing = false

function showSlideBar(slideButton){
    slideButton.style.marginLeft = !showing?'180px':'0px'
    let slideBar = document.querySelector('#slideBar');
    
    slideBar.style.display = showing?'none':'block';

    showing = !showing;
}

