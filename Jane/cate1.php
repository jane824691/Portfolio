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
            <div class="input-group">
              <select class="form-select" name="categoryParent" id="categoryParent">

                <?php foreach ($rows as $r) :
                  if ($r['categoryParent'] == '0') : ?>
                    <option value="<?= $r['category_id'] ?>"><?= $r['categoryName'] ?></option>
                <?php
                  endif;
                endforeach ?>
              </select>
            </div>
          </form>

  </div>
</div>



<script>
  // const initVals = {cate1: 1};

  // const cates = <?= json_encode($rows, JSON_UNESCAPED_UNICODE) ?>;

  // const cate1 = document.querySelector('#categoryParent')
  // const cate2 = document.querySelector('#cate2')
  

  // function generateCate2List() {
  //   const cate1Val = cate1.value; // 主分類的值

  //   let str = "";
  //   for (let item of cates) {
  //     if (+item.parent_sid === +cate1Val) {
  //       str += `<option value="${item.category_id}">${item.categoryName}</option>`;
  //     }
  //   }

  //   cate2.innerHTML = str;
  // }
  // cate1.value =initVals.cate1;  // 設定第一層的初始值
  // generateCate2List();  // 生第二層
  // cate2.value =initVals.cate2;  // 設定第二層的初始值

</script>