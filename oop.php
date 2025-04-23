<?php
class Person {
    public $name;
    public $age;
    private $password = "1234";
    protected $secret = "secret";
    static $count = 1;
    function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    function sayHi() {
        echo "Hi $this->name";
    }
    function cry() {
        
    }
    function lol() {
        if(this->age > 10) {
            echo 'hahaha hahaha';
        }else if(this->age > 20) {
            echo 'say hahaha';
        }
    }
}
$mark = new Person("Mark", 30); // new object
$jon = new Person("Jon", 20); //    new object
echo $mark->name; // property
echo $mark->age; // property
$mark->sayHi(); // method

echo Person::$count; // static

?>