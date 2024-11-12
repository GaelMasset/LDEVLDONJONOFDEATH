let heros = {  
    name = name;
    image = image;
    classe = classe;
    pv = pv;
    initiative = initiative;
    force = force;
    mana = mana;
    armure = armure;
    arme1 = arme1;
    arme2 = arme2;
    bouclier = bouclier;
    xp = xp;
    spell_list = spell_list;
    current_level = current_level;
}

let monstre = {
    nom: "",
    pv: 0,
    initiative: 0,
    force: 0,
    mana: 0,
    attack: "",
    loot_id: 0,
    xp: 0
}

function initialiserHeros(name, image, classe, pv, initiative, force, mana, armure, arme1, arme2, bouclier, xp, spell_list, current_level){

    $heros.name = name;
    $heros.image = image;
    $heros.classe = classe;
    $heros.pv = pv;
    $heros.initiative = initiative;
    $heros.force = force;
    $heros.mana = mana;
    $heros.armure = armure;
    $heros.arme1 = arme1;
    $heros.arme2 = arme2;
    $heros.bouclier = bouclier;
    $heros.xp = xp;
    $heros.spell_list = spell_list;
    $heros.current_level = current_level;

}

function 

console.log('a');