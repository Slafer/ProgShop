<?php

function debug(array $data): void
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function get_progs($limit, $offset): array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM programs LIMIT $limit OFFSET $offset");
    return $res->fetchAll();
}
function get_progsForCab(): array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM programs");
    return $res->fetchAll();
}
function IsOwn($product, $user): bool
{
    global $pdo;
    $uid = $pdo->query("SELECT * FROM users WHERE login = '$user'")->fetchColumn();
    $progids = $pdo->query("SELECT * FROM bought WHERE user_id = '$uid'")->fetchAll();
    foreach($progids as $pid)
    {
        if ($pid['prog_id'] == $product['id']) return true;
    }
    return false;

}
function get_progs_for_user($limit, $offset, $user): array
{
    global $pdo;
    $uid = $pdo->query("SELECT id FROM users WHERE login = '$user'")->fetchColumn();
    $pids = $pdo->query("SELECT * FROM bought WHERE user_id = '$uid' LIMIT $limit OFFSET $offset");
    $res = $pdo->query("SELECT * FROM programs WHERE id IN ");
    return $res->fetchAll();
}
function get_prog(int $id): ?array
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM programs WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}
function add_to_cart($product): void
{
    if (isset($_SESSION['cart'][$product['id']])){
        $_SESSION['cart'][$product['id']]['qty'] += 1;
    } else{
        $_SESSION['cart'][$product['id']] = [
            'title' => $product['title'],
            'link' => $product['link'],
            'price' => $product['price'],
            'qty' => 1,
            'img' => $product['img'],
            'id' => $product['id'],
        ];
    }
    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
  //  $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : 1;
}
function add_to_bd($product): void
{
    $mysql = new mysqli('localhost', 'root','root','prog_catalog');
    $login = $_COOKIE['user'];
    $user = $mysql->query("SELECT * FROM users WHERE login='$login'")->fetch_assoc();
    $uid = $user['id'];
    $pid = $product['id'];
    $mysql->query("INSERT IGNORE INTO bought (user_id, prog_id) VALUES('$uid', '$pid');");
    $mysql->close();
}
function countRow($table): int
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM $table;";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchColumn();
}
function countRowForCab($table): int
{
    $mysql = new mysqli('localhost', 'root', 'root', 'prog_catalog');
    $login = $_COOKIE['user'];
    $user = $mysql->query("SELECT * FROM users WHERE login='$login'")->fetch_assoc();
    $uid = $user['id'];
    $ans = $mysql->query("SELECT COUNT(DISTINCT * FROM $table WHERE user_id = '$uid'");
    return $ans;
}