<?php
require './parts/connect_db.php';

$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
if(! empty($product_id)){
  $sql = "DELETE FROM product WHERE product_id={$product_id}";
  $pdo->query($sql);
}

$come_from = 'list.php';
if(! empty($_SERVER['HTTP_REFERER'])){
  $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location: $come_from");
// 跳轉回list, Location為表頭後面必須+空格, 再+要跳轉的網址or位置
