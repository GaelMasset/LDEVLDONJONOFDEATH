let guerrier = document.getElementById("optionGuerrier");
let mage = document.getElementById("optionMage");
let voleur = document.getElementById("optionVoleur");
let label = document.getElementById("opGuerrier");

guerrier.addEventListener("click", () =>
    guerrier.style.borderColor="yellow"
    //label = document.getElementById("opGuerrier"),
    //label.style.backgroundColor = "#C4975E"
);

label.addEventListener("click", ()=>
    label.style.borderColor="yellow"
);