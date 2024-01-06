<?php
require './blunt/profile1/parts/connect_db.php';


/* *********************
# 會有 SQL injection
# 值如果包含單引號就會出錯(for example:account= john's dog)
$sql = sprintf("INSERT INTO `address_book`(
  `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
  ) VALUES (
    '%s', '%s', '%s', '%s', '%s', NOW()
  )", 
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address']
);
$stmt = $pdo->query($sql);
*/

$output = [
  'postData' =>$_POST,
  'success' => false,
  // 'error' => '',
  'error' => [],
  'userData' => [],
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
$account = $_POST['account'] ?? '';
$password = $_POST['password'] ?? '';
 //??表示是輸入前者，否輸入''



// TODO: 資料在寫入之前, 要檢查格式

// trim(): 去除頭尾的空白
// strlen(): 查看字串的長度
// mb_strlen(): 查看中文字串的長度


//必須填寫帳號不可空白
$isPass = true;
if(empty($account)){
  $isPass = false;
  $output['errors']['account'] = '請填寫正確的帳號';
}

// if(empty($password)){
//   $isPass = false;
//   $output['errors']['password'] = '密碼輸入錯誤';
// }

// if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
//   $isPass = false;
//   $output['errors']['email'] = 'email 格式錯誤';
// }

# 如果沒有通過檢查
if(! $isPass){
  echo json_encode($output);
  exit;
}

$sql = "SELECT * from `profile1`
  WHERE (`account` = ? AND `password` = ?)  ";

//statement
$stmt = $pdo->prepare($sql);

$stmt->execute([
  $account,
  $password, 
]);

$result = $stmt->fetchAll();
/*
  $name
  $email
  $mobile
  $birthday
  $_POST['address']

*/
// $pdo->lastInsertId() ,pdo = PHP Data Objects
// $output['lastInsertId'] = $pdo->lastInsertId(); # pdo物件取得最新資料的 primary key
$output['success'] = boolval($result);
$output['userData'] = $result; //轉成布林值
echo json_encode($output);
// echo json_encode([
//   'postData' => $_POST,
//   'rowCount' => $stmt->rowCount(),
// ]);