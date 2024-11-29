<?php

class Monstre{
    private $id;
    private $name;
    private $image
    private $pv;
    private $mana;
    private $strenght;
    private $initiative;
    private $attack;
    private $xp;
    private $loot_id;

    public function __construct($id, $name, $image, $pv, $mana, $strenght, $initiative, $attack, $xp, $loot_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pv = $pv; 
        $this->mana = $mana;
        $this->strenght = $strenght;
        $this->initiative = $initiative;
        $this->xp = $xp;
        $this->attack = $attack;
        $this->loot_id = $loot_id;
    }

    public function getName(){
        return $this->name;
    }

    public function getImage(){
        return $this->image;
    }

    public function getMana(){
        return $this->mana;
    }

    public function getXp(){
        return $this->xp;
    }

    public function getAttack(){
        return $this->attack;
    }

    public function getLoot(){
        return $this->loot_id;
    }

    public function getXp(){
        return $this->xp;
    }

}