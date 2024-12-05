const container = document.querySelector(".container"),
    pwShowHide = document.querySelectorAll(".showHidePw"),
    pwFields = document.querySelectorAll(".password"),
    signUp = document.querySelector(".signup-link"),
    login = document.querySelector(".login-link");

//js code to show/hide password and change icon
pwShowHide.forEach(eyeIcon =>{
    eyeIcon.addEventListener("click", ()=>{
        pwFields.forEach(pwField =>{
            if(pwField.type ==="password"){
                pwField.type = "text";

                pwShowHide.forEach(icon =>{
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                })
            }else{
                pwField.type = "password";

                pwShowHide.forEach(icon =>{
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                })
            }
        }) 
    })
})

// js code to appear signup and login form
signUp.addEventListener("click", ( )=>{
    container.classList.add("active");
});
login.addEventListener("click", ( )=>{
    container.classList.remove("active");
});

/*
function validation(){
    var form = document.getElementById("form");
    var email = document.getElementById("email").value;
    var text = document.getElementById("text");

    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if(email.match(pattern)){
        form.classList.add("vaild");
        form.classList.remove("invaild");
        text.innerHTML = "L'indirizzo email inserito è valido";
        text.style.color = "#00ff00";
    }else{
        form.classList.remove("vaild");
        form.classList.add("invaild");
        text.innerHTML = "L'indirizzo email inserito non è valido";
        text.style.color = "#ff0000";
    }

    if(email == ""){
        form.classList.remove("vaild");
        form.classList.remove("invaild");
        text.innerHTML = "";
        text.style.color = "#00ff00";
    }
}*/

//Background autochange
var images = ["../images/log-reg/Plots.jpg", "../images/log-reg/Plots.jpg", "../images/log-reg/CityPark.jpg", "../images/log-reg/CityPlots.jpg", "../images/log-reg/Lago.jpg", "../images/log-reg/Panoramic.jpg", "../images/log-reg/SMD.jpg"];
var currentIndex = 0;
var background = document.getElementById("background");

function changeBackground(){
    currentIndex++;
    if(currentIndex > images.length -1){
        currentIndex = 0;
    }

    background.style.opacity = 0;
    
    setTimeout(function(){
        background.style.backgroundImage = "url(" + images[currentIndex] + ")";
        background.style.opacity = 1;
    }, 1000);
}

setInterval(changeBackground, 5000);