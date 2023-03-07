<?php
$login = filter_var((trim($_POST['login'])), FILTER_SANITIZE_STRING);
$pass = filter_var((trim($_POST['pass'])), FILTER_SANITIZE_STRING);
$name = filter_var((trim($_POST['name'])), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 250) {
    echo "Длина логина не может быть меньше 5 и больше 250!";
    exit();
} else if (mb_strlen($name) > 250) {
    echo "Длина имени не может быть больше 250!";
    exit();
} else if (mb_strlen($pass) < 6 || mb_strlen($name) > 20) {
    echo "Длина пароля не может быть меньше 6 и больше 20!";
    exit();
}

    $pass = md5($pass."salt121");

    $mysql = new mysqli('localhost', 'root','root','prog_catalog');
    $mysql->query("INSERT INTO users (login, pass, name) VALUES('$login','$pass','$name');");
    $mysql->close();

    header('Location: /');
    exit();
?>
