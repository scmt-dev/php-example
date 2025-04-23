<?php 

class Animal {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

class Dog extends Animal {
    public function sayHi() {
        echo "Ang Ang $this->name";
    }
}

class Cat extends Animal {
    public function sayHi() {
        echo "Miao $this->name";
    }
}

$dog = new Dog("Humlae", 10);
$dog->sayHi();

$cat = new Cat("Mimi", 5);
$cat->sayHi();
