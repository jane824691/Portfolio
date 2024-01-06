<?php
require './parts/connect_db.php';

$output = [
  'postData' => $_POST,
  'success' => false,
  // 'error' => '',
  'errors' => [],
];

# 告訴用戶端, 資料格式為 JSON
header('Content-Type: application/json');


$categoryName = $_POST['categoryName'] ?? '';
$categoryParent = $_POST['cate1'] ?? '';

# 如果沒有通過檢查
// if (!$isPass) {
//   echo json_encode($output);
//   exit;
// }

$sql = "INSERT INTO `product_category`(
  `categoryName`, `categoryParent`
  ) VALUES (
    ?, ?
  )";

$stmt = $pdo->prepare($sql);

$stmt->execute([
  $categoryName,
  $categoryParent,
]);

// 
$output['lastInsertId'] = $pdo->lastInsertId(); # 取得最新資料的 primary key
$output['success'] = boolval($stmt->rowCount());
echo json_encode($output);
