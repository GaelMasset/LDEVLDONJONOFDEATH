
let affichage = document.getElementById("affichageCombat");
let attaque = document.getElementById("attaque");
let fuite = document.getElementById("fuite");

let heros = {
    
    type : "heros",
    name : "",
    classe : 0,
    pv : 0,
    pv_max : 0,
    initiative :0,
    force: 0,
    mana : 0,
    bonus_arme : 0,
    bonus_armure : 0,
    xp : 0,
    current_level : 0

}

let monstre = {

    type : "monstre",
    name: "",
    pv: 0,
    initiative: 0,
    force: 0,
    mana: 0,
    attack: "",
    loot_id: 0,
    xp: 0
}

function rand(min, max){
    return Math.floor(Math.random() * (max - min)) + min
}

function max(a, b){
    if (a > b) return a;
    return b;
}

function min(a, b){
    if (a < b) return a;
    return b;
}

function initialiserMonstre(name, pv, initiative, force, mana, attack, loot_id, xp){

    monstre.name = name;
    monstre.pv = pv;
    monstre.initiative = initiative;
    monstre.mana = mana;
    monstre.force = force;
    monstre.attack = attack;
    monstre.loot_id = loot_id;
    monstre.xp = xp;

}

function initialiserHeros(name, classe, pv, pv_max, initiative, force, mana, bonus_armure, bonus_arme, xp, current_level){

    heros.name = name;
    heros.classe = classe;
    heros.pv = pv;
    heros.initiative = initiative;
    heros.force = force;
    heros.mana = mana;
    heros.bonus_armure = bonus_armure;
    heros.bonus_arme = bonus_arme;
    heros.xp = xp;
    heros.current_level = current_level;

};

function decidePremier(heros, monstre){
    let initiativeHeros = rand(1, 6) + heros.initiative;
    let initiativeMonstre = rand(1, 6) + monstre.initiative;

    console.log(initiativeHeros, initiativeMonstre);

    if(initiativeHeros > initiativeMonstre || (initiativeHeros == initiativeMonstre && heros.classe == "Voleur")){
        return false;
    } else {
        return true;
    }
}

function attaqueDuMonstre() {

}

attaque.addEventListener("click", () => {
    if(attaque.textContent = "Commencer") {
        affichageCombat.textContent = "Le combat commence !";
        if(decidePremier(heros, monstre)){

        }

        attaquetextContent = "Attaquer";
    } 
    if(attaque.textContent = "Attaquer") {
        
    }

});

fuite.addEventListener("click", () => {
    
});