let body = document.body;
let affichage = document.getElementById("affichageCombat");

function afficher(message){
    affichage.innerHTML += message  + '<br />';
    
}

let combat = {
    estMonstreTour: false
}

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

}

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

function attaquer(attaquant, defenseur, type, sort){

    let attaque, defense, degat;

    if(attaquant.type === 'heros' && type === 'physique'){
        attaque = rand(1,6) + attaquant.force + attaquant.bonus_arme;
        console.log("att" + attaque)
        degat = attaque;
    }
    if(attaquant.type === 'heros' && type === 'magique'){
        attaque = (rand(1,6) + rand(1,6)) + attaquant.valeur_mana[sort];
        attaquant.mana -= attaquant.spell_list[sort];
        afficher(attaquant.name + " a utilisé " + sort + "...");
        degat = attaque;
    }

    if(attaquant.type === 'monstre'){
        attaque = rand(1,6) + attaquant.force;
        defense = rand(1, 6) + (defenseur.force / 2) + defenseur.bonus_armure;
        degat = max(0, attaque - defense);
        
    }
    console.log("test" + degat);
    defenseur.pv -= degat;

    console.log(attaquant.name + " " + attaquant.pv);
    console.log(defenseur.name + " " + defenseur.pv);

    afficher(defenseur.name + " a subi " + degat + " dégats ! ");
}

function battle(type, sort) {
    
    

    if(combat.estMonstreTour) {

        attaquer(monstre, heros, type, sort);

        combat.estMonstreTour = false;

        if(heros.pv <= 0 || monstre.pv <= 0){
            fini();
        }

        afficher(monstre.name + " vous attaque ! Que faire ?");

    } else {

        attaquer(heros, monstre, type, sort);

        combat.estMonstreTour = true;

        if(heros.pv <= 0 || monstre.pv <= 0){
            fini();
        }

        battle();

    }

    
}

function potion() {

}

function fini() {
    document.location.href="/LDEVLDONJONOFDEATH/chapter1";
}

initialiserHeros("Erci", "aaa", "Magicien", 20, 20, 5, 4, 20, 1, 2, 2, {"flamme":5, "glace":7}, 5);
console.log(heros);
initialiserMonstre("Slime", 40, 5, 5, 10, "Boue", "10");
decidePremier(heros, monstre);

console.log(combat.estMonstreTour)

let commencer = document.createElement('button');
commencer.textContent = 'Commencer';
commencer.addEventListener('click', () => {
        let physique = document.createElement('button');
        physique.textContent = 'Attaque physique';
        physique.addEventListener('click', () => {
            battle("physique", null)
        })
        body.append(physique);

        let magique = document.createElement('button');
        magique.textContent = 'Attaque magique';
        magique.addEventListener('click', () => {
              battle("magique", "flamme")
        })
        if(heros.classe === 'Magicien'){
            body.append(magique);
        }

        let potion = document.createElement('button');
        potion.textContent = 'Boire une potion';
        potion.addEventListener('click', () => {

            potion();

        });
        
        
        body.append(potion);
        body.removeChild(commencer);
        if(combat.estMonstreTour){
            battle();
        } else {
            afficher(monstre.name + " vous attaque ! Que faire ?");
        }
})

body.append(commencer);
