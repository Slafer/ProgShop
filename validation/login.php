<?php
$login = filter_var((trim($_POST['login'])), FILTER_SANITIZE_STRING);
$pass = filter_var((trim($_POST['pass'])), FILTER_SANITIZE_STRING);

$pass = md5($pass."salt121");

$mysql = new mysqli('localhost', 'root','root','prog_catalog');
$result = $mysql->query("SELECT * FROM users WHERE login ='$login' AND pass = '$pass' ");
$user = $result->fetch_assoc();
if (!count($user))
{
    echo "Такой пользователь не найден";
    exit();
}
setcookie('user', $user['login'], time() + 3600, "/");
$mysql->close();

header('Location: /');