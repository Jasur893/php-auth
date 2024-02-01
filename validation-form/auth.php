<?php

$login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
$pass = filter_var(trim($_POST['pass']), FILTER_UNSAFE_RAW);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register-php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pass = md5($pass);

//$stmt = $conn->prepare("INSERT INTO `users` (`login`, `pass`, `name`) VALUES (?, ?, ?)");
//$stmt->bind_param("sss", $login, $pass, $name);
//$stmt->execute();
//
//$stmt->close();

$result = $conn->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");

$user = $result->fetch_assoc();

if(count($user) == 0){
    echo "Такой ползователь не найден";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

$conn->close();

header('Location: /');
exit();
