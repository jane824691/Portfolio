<?php

$dir = __DIR__ . '/uploads/';


# 檔案類型的篩選
$exts = [
  'image/jpeg' => '.jpg',
  'image/png' => '.png',
  'image/webp' => '.webp',
];



header('Content-Type: application/json');
$output = [
  'success' => false,
  'file' => ''
];

if (!empty($_FILES) and !empty($_FILES['productImg']) and $_FILES['productImg']['error']==0) {
  
  if (!empty( $exts[$_FILES['productImg']['type']] )) {
    $ext = $exts[$_FILES['productImg']['type']]; // 副檔名

    # 隨機的主檔名
    $f = sha1($_FILES['productImg']['name']. uniqid());

    if (
      move_uploaded_file(
        $_FILES['productImg']['tmp_name'],
        $dir . $f. $ext
      )
    ) {
      $output['success'] = true;
      $output['file'] = $f. $ext;
    }
  }
}

echo json_encode($output);
