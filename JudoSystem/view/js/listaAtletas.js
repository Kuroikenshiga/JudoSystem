showing = false

function showSlideBar(slideButton){
    slideButton.style.animationName = !showing?'animacaoDaBarraShowButton':'animacaoDaBarraHiddenButton'
    let slideBar = document.querySelector('#slideBar');
    slideButton.style.animationDuration = '1s';
    slideButton.style.animationFillMode = 'forwards';
    
    slideBar.style.animationName = showing?'animacaoDaBarraHidden':'animacaoDaBarraShow';
    slideBar.style.animationDuration = '1s';
    slideBar.style.animationFillMode = 'forwards';
    showing = !showing;
    console.log(showing)
}

