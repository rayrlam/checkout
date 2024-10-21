<?php

namespace App\CQRS\Commands;

class CreateProductCommand
{
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name =  $name;
        $this->price = $price;
    }
}