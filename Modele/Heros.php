<?php

class Heros{
    private $id;
    private $name;
    private $class;
    private $image;
    private $pv;
    private $mana;
    private $strenght;
    private $initiative;
    private $armor;
    private $armor_bonus;
    private $primary_weapon;
    private $primary_bonus;
    private $secondary_weapon;
    private $secondary_bonus;
    private $shield;
    private $shield_bonus;
    private $spell_list;
    private $xp;

    public function __construct($id, $name, $class, $image, $pv, $mana, $strenght, $initiative, $armor, $armor_bonus, $primary_weapon, $primary_bonus, $secondary_weapon, $secondary_bonus, $shield, $shield_bonus,$spell_list, $xp)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->pv = $pv; 
        $this->mana = $mana;
        $this->strenght = $strenght;
        $this->initiative = $initiative;
        $this->armor = $armor;
        $this->armor_bonus = $armor_bonus;
        $this->primary_weapon = $primary_weapon;
        $this->primary_bonus = $primary_bonus;
        $this->secondary_weapon = $secondary_weapon;
        $this->secondary_bonus = $secondary_bonus;
        $this->shield = $shield;
        $this->shield_bonus = $shield_bonus;
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

    public function getDefenseBonus(){
        return $this->armor_bonus + $this->shield_bonus;
    }

    public function getAttackBonus(){
        return $this->primary_bonus + $this->secondary_bonus;
    }

}