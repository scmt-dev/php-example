<?php
$filename = 'test-file.txt';
/*
    \n = new line
    \t = tab
*/
$IP = $_SERVER['SERVER_ADDR'];
$data =  $IP." ".date('Y-m-d H:i:s')."\n\t Hello World \n\n";
file_put_contents($filename, $data, FILE_APPEND);

// read file
echo file_get_contents($filename);

?>