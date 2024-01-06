<?php
require './parts/connect_db.php';

# 告訴用戶端, 資料格式為 JSON
header('Content-Type: application/json');
#echo json_encode($_POST);
#exit; // 結束程式


$output = [
  'postData' => $_POST,
  'success' => false,
  // 'error' => '',
  'errors' => [],
];

// 取得資料的 PK
$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

if (empty($product_id)) {
  $output['errors']['product_id'] = "沒有 PK";
  echo json_encode($output);
  exit; // 結束程式
}

$productName = $_POST['productName'] ?? '';
$category_id = $_POST['cate2'] ?? '';
$price = $_POST['price'] ?? '';
$stock = $_POST['stock'] ?? '';
// $salesCondition = $_POST['salesCondition'] ?? '';
// $productImg = $_POST['productImg'] ?? '';
$newProductImg = $_POST['newProductImg'] ?? '';
$productDescription = $_POST['productDescription'] ?? '';


// TODO: 資料在寫入之前, 要檢查格式

// trim(): 去除頭尾的空白
// strlen(): 查看字串的長度
// mb_strlen(): 查看中文字串的長度

//以下方這種方式會跳出html內建提醒方式
$isPass = true;
if (empty($productName)) {
  $isPass = false;
  $output['errors']['productName'] = '請填寫商品名稱';
}

if (empty($price)) {
  $isPass = false;
  $output['errors']['price'] = '請填寫大於0的商品金額';
}

# 如果沒有通過檢查
if (!$isPass) {
  // echo json_encode($output);
  exit;
}

$sql = "UPDATE `product` SET 
  `productName`=?,
  `category_id`=?,
  `price`=?,
  `stock`=?,
  `productImg`=?,
  `productDescription`=?
WHERE `product_id`=? ";

// `salesCondition`=?,   


$stmt = $pdo->prepare($sql);

$stmt->execute([
  $productName,
  $category_id,
  $price,
  $stock,
  $newProductImg,
  $productDescription,
  $product_id
]);

// $salesCondition,   $productImg,
// 

$output['rowCount'] = $stmt->rowCount();
$output['success'] = boolval($stmt->rowCount());
echo json_encode($output);


?>
