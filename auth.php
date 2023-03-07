<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="assets/css/main.css">

    <title>Регистрация</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.php">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Главная <span class="sr-only">(current)</span></a>
            <li class="nav-item ">
                <a class="nav-link" href="signup.php"> Регистрация <span class="sr-only">(current)</span></a>
            <li class="nav-item active">
                <a class="nav-link" href="auth.php"> Авторизация <span class="sr-only">(current)</span></a>
            <li class="nav-item">

            </li>
        </ul>
    </div>
</nav>


<?php // debug($_SESSION); //session_destroy(); ?>
<div class="wrapper mt-5">
    <div class="container">
        <h1 text-align="center">Форма авторизации</h1>
        <form action="validation/login.php" method="post">
            <input type = "text" class="form-control" name="login" id="login" placeholder="Введите логин">
            <input type = "password" class="form-control" name="pass" id="pass" placeholder="Введите пароль">
            <button class="btn btn-success" type = "submi">Авторизоваться</button>
        </form>



    </div><!-- /container -->
</div><!-- /wrapper -->

<!-- Modal -->
<div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-cart-content">

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

