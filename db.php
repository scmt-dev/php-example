<?php 
// open mode debug
// error_reporting(1);
//                ip server    |user fb |pwd   |database name 
$db = new mysqli('localhost', 'root', 'root', 'bank');
// check error connection
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $db->connect_error;
    exit();
}
?>