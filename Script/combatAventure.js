let body = document.body;


let heros = {
    
    type : "heros",
    name : "",
    image : "",
    classe : "",
    pv : 0,
    pv_max : 0,
    initiative :0,
    force: 0,
    mana : 0,
    bonus_arme : 0,
    bonus_armure : 0,
    xp : 0,
    spell_list : {},
    valeur_mana : {},
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

function initialiserHeros(name, image, classe, pv, pv_max, initiative, force, mana, bonus_armure, bonus_arme, xp, spell_list, current_level){

    heros.name = name;
    heros.image = image;
    heros.classe = classe;
    heros.pv = pv;
    heros.pv_max = pv_max;
    heros.initiative = initiative;
    heros.force = force;
    heros.mana = mana;
    heros.bonus_armure = bonus_armure;
    heros.bonus_arme = bonus_arme;
    heros.xp = xp;
    heros.spell_list = spell_list;
    heros.current_level = current_level;

};


