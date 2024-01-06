<?php

require './parts/connect_db.php';
$title = '分類資料';

$sql = "SELECT * FROM product_category";

$rows = $pdo->query($sql)->fetchAll();

#echo json_encode($rows, JSON_UNESCAPED_UNICODE);
?>

<div class="container">
  <div class="row">
          <form name="form1" onsubmit="return false">
            <div class="input-group mb-3">
              <span class="input-group-text">主分類</span>

              <select class="form-select" name="cate01" id="cate01" onchange="generateCate2List()">
                <?php foreach ($rows as $r) :
                  if ($r['categoryParent'] == '0') : ?>
                    <option value="<?= $r['category_id'] ?>"><?= $r['categoryName'] ?></option>
                <?php
                  endif;
                endforeach ?>
              </select>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">次分類</span>
              <select class="form-select" name="cate2" id="cate2"></select>
            </div>
  </div>
</div>


<script>
  const initVals = {cate01: 4, cate2: 13};

  const cates = <?= json_encode($rows, JSON_UNESCAPED_UNICODE) ?>;

  const cate01 = document.querySelector('#cate01')
  const cate2 = document.querySelector('#cate2')

  

  function generateCate2List() {
    const cate01Val = cate01.value; // 主分類的值

    let str = "";
    for (let item of cates) {
      if (+item.categoryParent === +cate01Val) {
        str += `<option value="${item.category_id}">${item.categoryName}</option>`;
      }
    }

    cate2.innerHTML = str;
  }
  cate01.value =initVals.cate01; // 設定第一層的初始值
  generateCate2List(); // 生第二層
  cate2.value =initVals.cate2; // 設定第二層的初始值

</script>