$(window).scroll(function(){
   if($("#menu").offset().top>56) {
       $("#menu").addClass("dark");
   }else{
       $("#menu").removeClass("dark");
   }
});
const nav = document.querySelector('#hamburger button');
nav.addEventListener('click', e => {
    nav.classList.toggle('open');
});

//DatosEsp = function (esp) {
//    window.alert(esp);
//    window.location.href = window.location.href + "#tab3?w1=" + esp;
//};