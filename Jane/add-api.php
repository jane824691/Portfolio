<?php
require './parts/connect_db.php';

/* *****************
# 會有 SQL injection
# 值如果包含單引號就會出錯
$sql = sprintf("INSERT INTO `address_book`(
  `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
  ) VALUES (
    '%s', '%s', '%s', '%s', '%s', NOW()
  )", 
    $_POST['name'], 
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],validateMobile
    $_POST['address']
);
$stmt = $pdo->query($sql);
*/

$output = [
  'postData' => $_POST,
  'success' => false,
  // 'error' => '',
  'errors' => [],
];

# 告訴用戶端, 資料格式為 JSON
header('Content-Type: application/json');
/*
if(empty($_POST['name']) or empty($_POST['email'])){
  $output['errors']['form'] = '缺少欄位資料';
  echo json_encode($output);
  exit;
}
*/

$productName = $_POST['productName'] ?? '';
$category_id = $_POST['cate2'] ?? '';
$price = $_POST['price'] ?? '';
$stock = $_POST['stock'] ?? '';
// $salesCondition = $_POST['salesCondition'] ?? '';
$productImg = $_POST['productImg'] ?? '';
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
  echo json_encode($output);
  exit;
}

$sql = "INSERT INTO `product`(
  `productName`, `category_id`, `price`, `stock`, `productImg`, `productDescription`, `editTime`
  ) VALUES (
    ?, ?, ?, ?, ?, ?, NOW()
  )";

//  `salesCondition`,

$stmt = $pdo->prepare($sql);

$stmt->execute([
  $productName,
  $category_id,
  $price,
  $stock,
  // $salesCondition,
  $productImg,
  $productDescription,
]);

// 


$output['lastInsertId'] = $pdo->lastInsertId(); # 取得最新資料的 primary key
$output['success'] = boolval($stmt->rowCount());
echo json_encode($output);
?>
