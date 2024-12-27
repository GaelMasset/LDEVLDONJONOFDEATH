
let affichage = document.getElementById("affichageCombat");
let commence = document.getElementById("commence");
let attaque = document.getElementById("attaque");
let continu = document.getElementById("continue");
let fuite = document.getElementById("fuite");
let pvMonstre = document.getElementById("pvMonstre");

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

    if(initiativeHeros > initiativeMonstre || (initiativeHeros == initiativeMonstre && heros.classe == "Voleur")){
        return false;
    } else {
        return true;
    }
}

function attaqueDuMonstre() {
        let a = rand(1,6) + monstre.force;
        let d = rand(1, 6) + (heros.force / 2) + heros.bonus_armure;
        degat = max(0, a - d);

        heros.pv -= degat;

        return degat;
}   

function attaqueDuHeros() {
    degat = rand(1,6) + heros.force + heros.bonus_arme;

    monstre.pv -= degat;

    pvMonstre.textContent = monstre.pv;
   
}

commence.addEventListener("click", () => {

    affichageCombat.textContent = "Le combat commence ! ";
    if(decidePremier(heros, monstre)){
        attaqueDuMonstre();           
        affichageCombat.textContent += monstre.name + " vous prend par surprise ! Vous perdez " + degat + " PV." ;

        if(heros.pv < 0){
            affichageCombat.textContent = "Vous avez perdu ! ";
            commence.style.display = "none";
            continu.style.display = "block";
            return;
        }

    } else {
        affichageCombat.textContent += "Vous avez l'avantage ! ";
    }
    commence.style.display = "none";
    attaque.style.display = "block";
});

attaque.addEventListener("click", () => {
    
    attaqueDuHeros();

    affichageCombat.textContent = "Vous infligez " + degat + " PV à "+monstre.name+" ! ";

    if(monstre.pv < 0){
        affichageCombat.textContent = "Vous avez gagné ! ";
        attaque.style.display = "none";
        continu.style.display = "block";
        return;
    }

    attaqueDuMonstre();

    affichageCombat.textContent += monstre.name + " utilise " + monstre.attack + " et vous inflige " + degat + " PV ! ";

    if(heros.pv < 0){
        affichageCombat.textContent = "Vous avez perdu ! ";
        attaque.style.display = "none";
        continu.style.display = "block";
        return;
    }
});

fuite.addEventListener("click", () => {
    console.log("fuite");
});

attaque.style.display = "none";
continu.style.display = "none";

