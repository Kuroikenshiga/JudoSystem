showing = false

function showSlideBar(){
    
    let slideBar = document.querySelector('#slideBar');
    
    slideBar.style.display = showing?'none':'block';

    showing = !showing;
}