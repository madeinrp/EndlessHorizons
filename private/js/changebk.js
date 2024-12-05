var images = ["sfondo1.jpg", "sfondo2.jpg", "sfondo3.jpg", "sfondo4.jpg", "sfondo5.jpg", "sfondo6.jpg"];
var currentIndex = 0;

function changeBackground(){
    currentIndex = (currentIndex + 1) % images.length;
    document.body.style.backgroundImage = "url(../private/images/log-reg/" + images + ");";
}

setInterval(changeBackground, 5000);