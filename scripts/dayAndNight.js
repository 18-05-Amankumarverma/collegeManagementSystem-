var body = document.querySelector("body");

var navUlLiA = document.querySelectorAll("nav ul li a");

var priceBoxOne = document.querySelectorAll(".priceBoxOne div");
var priceBoxOneButton = document.querySelectorAll(".priceBoxOne button");


var dayNightCheckbox = document.getElementById("dayNightCheckbox");

var footer = document.querySelector("footer");
var footerFluid = document.getElementById("footer-fluid");

var newsLetterInput = document.getElementById("newsLetterInput");

dayNightCheckbox.onclick = function changeWebsiteColor() {


    if (dayNightCheckbox.checked == true) {
        body.style.backgroundColor = "#242424";
        body.style.color = "#fff";
        footer.style.backgroundColor = "#242424";
        newsLetterInput.style.backgroundColor = "#1b1b1b";
        footerFluid.style.backgroundColor = "#1b1b1b";
        footerFluid.style.borderRadius = "20px";

        for(let i=0;i<priceBoxOne.length;i++){
            priceBoxOne[i].style.backgroundColor = "#1b1b1b";
            priceBoxOneButton[i].style.backgroundColor = "#242424";
        }

        for(let g=0;g<navUlLiA.length;g++){
            navUlLiA[g].style.color = "white";
        }


    }
    else {

        body.style.backgroundColor = "white";
        body.style.color = "#212529";
        footer.style.backgroundColor = "#060E25";
        newsLetterInput.style.backgroundColor = "#060E25";
        footerFluid.style.backgroundColor = "#060E25";
        footerFluid.style.borderRadius = "20px";

        for(let i=0;i<priceBoxOne.length;i++){
            priceBoxOne[i].style.backgroundColor = "#F5F1F1";
            priceBoxOneButton[i].style.backgroundColor = "#060E25";
        }

        
        for(let g=0;g<navUlLiA.length;g++){
            navUlLiA[g].style.color = "#1b1b1b";
        }

    }
}



//hamberger menu

var menu = document.getElementById("menu");
var nav = document.querySelector("nav");
menu.onclick = function(){
    if(menu.checked == true){
        nav.style.visibility = "visible";
        nav.style.left = "0px";
    }
    else{
        
        nav.style.transition = "transition:all .5s";
        nav.style.left = "-400px";

    }
}
