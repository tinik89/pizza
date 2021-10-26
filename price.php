<?php


class price
{
    private $price = 0;


    public function addPrice($price)
    {
        $this->price += $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}