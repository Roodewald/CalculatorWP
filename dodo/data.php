<?php
$host = 'localhost';
$db = 'forplugin';
$user = 'root';
$pass = '';

$mysqli = new mysqli("$host","$user","$pass","$db");

switch ($_GET['act']) {
    case '0':
        loadInDataBase();
        break;
    
    case '1':
        break;
}
loadInDataBase(){
    $firstInput  = $_GET['firstInput'];
    $secondInput = $_GET['secondInput'];

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }

    if((!$mysqli -> query("INSERT INTO tableBable (firstInput, secondInput) VALUES ('$firstInput','$firstInput',)"))){
        echo("Error description: " . $mysqli -> error);
    }
}