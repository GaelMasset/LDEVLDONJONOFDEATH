<?php

class Heros{
    private $id;
    private $name;
    private $class;
    private $image
    private $pv;
    private $mana;
    private $strenght;
    private $initiative;
    private $armor;
    private $primary_weapon;
    private $secondary_weapon;
    private $shield;
    private $spell_list;
    private $xp;

    public function __construct($id, $name, $class, $image, $pv, $mana, $strenght, $initiative, $armor, $primary_weapon, $secondary_weapon, $shield, $spell_list, $xp)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->pv = $pv; 
        $this->mana = $mana;
        $this->strenght = $strenght;
        $this->initiative = $initiative;
        $this->armor = $armor;
        $this->primary_weapon = $primary_weapon;
        $this->secondary_weapon = $secondary_weapon;
        $this->shield = $shield;
        $this->spell_list = $spell_list;
        $this->xp = $xp;
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

    public function getName(){
        return $this->name;
    }

}