<?php
$host = 'localhost';
$db = 'cyberworld.ru';
$user = 'root';
$pass = '';

switch($_GET['act']){
    case 0:
        m_send($host, $user, $pass, $db);
        break;
    case 1:
        m_load($host, $db, $user, $pass);
        break;
}