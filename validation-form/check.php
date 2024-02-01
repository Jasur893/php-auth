<?php

$login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
$name = filter_var(trim($_POST['name']), FILTER_UNSAFE_RAW);
$pass = filter_var(trim($_POST['pass']), FILTER_UNSAFE_RAW);

if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
} else if(mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    echo "Недопустимая длина имени";
    exit();
} else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
    echo "Недопустимая длина пароля (от 2 до 6 символов)";
    exit();
}

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

$stmt = $conn->prepare("INSERT INTO `users` (`login`, `pass`, `name`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $login, $pass, $name);
$stmt->execute();

$stmt->close();
$conn->close();

header('Location: /');
exit();

