
const navbarShowBtn = document.querySelector('.navbar-show-btn');
const navbarCollapseDiv = document.querySelector('.navbar-collapse');
const navbarHideBtn = document.querySelector('.navbar-hide-btn');

navbarShowBtn.addEventListener('click', function(){
    navbarCollapseDiv.classList.add('navbar-show');
});
navbarHideBtn.addEventListener('click', function(){
    navbarCollapseDiv.classList.remove('navbar-show');
});

window.addEventListener('resize', changeSearchIcon);
function changeSearchIcon(){
    let winSize = window.matchMedia("(min-width: 1200px)");
    if(winSize.matches){
        document.querySelector('.search-icon img').src = "search-icon-light.png";
    } else {
        document.querySelector('.search-icon img').src = "search-icon.png";
    }
}
changeSearchIcon();


let resizeTimer;
window.addEventListener('resize', () =>{
    document.body.classList.add('resize-animation-stopper');
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        document.body.classList.remove('resize-animation-stopper');
    }, 400);
});


function toggleMenu() {
    var subMenu = document.getElementById('subMenu');
    subMenu.classList.toggle("open-menu");
}

const inputs= [...document.querySelectorAll(".otp-box input")];
const submitBtn= document.querySelector(".otp-box button");

inputs.forEach((input, index)=> {
    input.addEventListener( "keyup", (e)=>{

   if( !(e.keyCode>=48 && e.keycode<=57)){
    e.target.value=" ";
    return ;

   }
   e.target.value= String.fromCharCode( e.keyCode);
   if(index<(inputs.length-1)){

    inputs[index+1].focus();
   }
   setTimeout(()=>{
   const isDisabledBtn= inputs.some(e=>e.value.length!==1);
   submitBtn.disabled=isDisabledBtn;

   }, 0);

    });

});
