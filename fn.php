<?php 

echo 'fn.php<br>';

function add($a, $b) {
    return $a + $b;
}

echo add(1, 4);
echo add(3,3) + add(4,4);
echo '<hr>';
echo date('Y-m-d H:i:s');

function sayHi($name) {
    echo "Hi $name";
}
sayHi('Mark');
sayHi('Jon');
sayHi('Alex');
sayHi('Hum');



?>






