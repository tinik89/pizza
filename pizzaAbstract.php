<?php


abstract class pizzaAbstract
{
    public $name;
    abstract static function getAllPizza();

    public function getPizzaFullName($size)
    {
        return $this->name . '-' . $size . 'см.';
    }
}