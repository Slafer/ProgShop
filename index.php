<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 3;
$offset = $limit * ($page-1);
$products = get_progs($limit, $offset);
$total_pages = round(countRow('programs')/$limit, 0);
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

    <style>
        <?php include "assets/css/main.css" ?>
    </style>

    <title>Витрина</title>
</head>
<body>
<?php //print_r($total_pages) ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.php">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Главная <span class="sr-only">(current)</span></a>
            <li class="nav-item">
                <?php if(isset($_COOKIE['user']) == false): ?>
            <a class="nav-link" href="signup.php"> Регистрация <span class="sr-only">(current)</span></a>
            <li class="nav-item">

            <li class="nav-item">
                <a class="nav-link" href="auth.php"> Авторизация <span class="sr-only">(current)</span></a>
            <li class="nav-item">
                <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="cabinet.php"> ЛК <span class="sr-only">(current)</span></a>
            <li class="nav-item">
            <li class="nav-item">
                <a class="nav-link" href="validation/exit.php"> Выход <span class="sr-only">(current)</span></a>
            <li class="nav-item">
                <?php endif; ?>
                <?php if(isset($_COOKIE['user'])): ?>
                <button id="get-cart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart-modal">
                    Корзина <span class="badge badge-light mini-cart-qty"><?= $_SESSION['cart.qty'] ?? 0?></span>
                </button>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>


<?php // debug($_SESSION); //session_destroy(); ?>
<div class="wrapper mt-5">
    <div class="container">
        <div class="row">

            <div class="product-cards mb-5">
                <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <div class="card-thumb">
                        <a href="#"><img src="img/<?= $product['img'] ?>" alt="<?= $product['title'] ?>"></a>
                    </div>
                    <div class="card-caption">
                        <div class="card-title">
                            <a href="#"><?= $product['title']?></a>
                        </div>
                    <div class="card-desc">
                        <?= $product['description'] ?>
                    </div>
                        <div class="card-price text-center">
                            <del><?= $product['price'] ?></del>
                            0 руб.
                        </div>
                        <?php if(isset($_COOKIE['user'])): ?>
                        <a href="?cart=add?id=<?=$product['id'] ?>" class="btn btn-info btn-block card-add-to-cart"
                        data-id="<?=$product['id'] ?>">
                            <i class="fas fa-cart-arrow-down"></i> Купить
                        <a/>
                            <?php endif; ?>
<!--                        <div class="item-status"><i class="fas fa-check text-success"></i> В наличии</div>-->
                    </div>
                </div><!-- /product-card -->
                <?php endforeach; ?>
                <?php endif; ?>
            </div><!-- /product-cards -->

        </div><!-- /row -->

      <?php include("inc/pagination.php")?>

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
