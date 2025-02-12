<?php 
error_reporting(1);
$db = new mysqli('localhost', 'root', 'root', 'pos');
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $db->connect_error;
    exit();
}
?>