var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");
var openPop = document.getElementById("ouvrirPop");
var closePop = document.getElementById("fermerPop");
var affichePop = document.getElementById("popupOverlay");


openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

/* ouvre le burgeur */
function openNav() {
  sidenav.classList.add("active");
}

/* ferme le burgeur */
function closeNav() {
  sidenav.classList.remove("active");
}


openPop.onclick = openPopUp;
closePop.onclick = closePopUp;


/* ouvre le burgeur */
function openPopUp() {
  affichePop.style.visibility = "visible";
}

/* ferme le burgeur */
function closePopUp() {
  affichePop.style.visibility = "hidden";
}