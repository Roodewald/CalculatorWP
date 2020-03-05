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
function m_send($host, $user, $pass, $db){
    $FIO = $_POST['cf-FIO'];
    $age = $_POST['cf-age'];
    $mail = $_POST['cf-mail'];
    $phone = $_POST['cf-phone'];
    $kurse = $_POST['cf-kurse'];

    $link = mysqli_connect($host, $user, $pass, $db);
    if(mysqli_query($link, "INSERT INTO `wp_request` (`FIO`, `age`, `mail`, `phone`,'kurse') VALUES ('$FIO', '$age', '$mail','$phone','$kurse')")){
        echo "Успешно отправлено";
    }else{
        echo ;
        mysqli_error
    }
}