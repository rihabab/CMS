<?php 

$db = [
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => 'rihabtkd',
    'db_name' => 'gestion',
];
/*
foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
*/


$connection = mysqli_connect($db['db_host'], $db['db_user'], $db['db_pass'], $db['db_name']);


// if($connection){
//     echo "we are connected";
// }








?>