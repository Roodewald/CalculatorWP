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
    $name = $_POST['cf-name'];
    $email = $_POST['cf-mail'];
    $subject = $_POST['cf-subject'];
    $textarea = $_POST['cf-message'];

    $link = mysqli_connect($host, $user, $pass, $db);
    if(mysqli_query($link, "INSERT INTO `wp_request` (`name`, `email`, `subject`, `text`) VALUES ('$name', '$email', '$subject','$textarea')")){
        echo "Has been sent";
    }else{
        echo "Unable to sent your message";
    }
}

function m_load($host, $db, $user, $pass){
    $dsn = "mysql:host=$host;dbname=$db;";
    $pdo = new PDO($dsn, $user, $pass);
    try {
        $stmt = $pdo->query('SELECT * FROM wp_request ');
        echo "<table style='width: 90%'><tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>";
        while ($row = $stmt->fetch())
        {
            echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['subject']."</td><td>".$row['text']."</td></tr>";
        }
        echo "</table><style>table,tr,td,th{border: 1px solid black; text-align: center}</style>";
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
}
