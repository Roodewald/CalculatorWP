<?php
$host = 'localhost';
$db = 'forplugin';
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

        $mysqli = new mysqli("$host","$user","$pass","$db");

        if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }

        // Perform a query, check for error
        if (!$mysqli -> query("INSERT INTO wp_request (FIO, age, mail, phone, kurse) VALUES ('$FIO','$age','$mail','$phone','$kurse')")) {
        echo("Error description: " . $mysqli -> error);
        
        
    }
}
function m_load($host, $db, $user, $pass){
    $dsn = "mysql:host=$host;dbname=$db;";
    $pdo = new PDO($dsn, $user, $pass);
    try {
        $stmt = $pdo->query('SELECT * FROM wp_request ');
        echo "<table style='width: 90%'><tr><th>FIO</th><th>age</th><th>mail</th><th>phone</th><th>kurse</th></tr>";
        while ($row = $stmt->fetch())
        {
            echo "<tr><td>".$row['FIO']."</td><td>".$row['age']."</td><td>".$row['mail']."</td><td>".$row['phone']."</td><td>".$row['kurse']."</td></tr>";
        }
        echo "</table><style>table,tr,td,th{border: 1px solid black; text-align: center}</style>";
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
}