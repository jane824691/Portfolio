<?php
require './parts/connect_db.php';

?>
<?php

$title = '分類資料';

$sql = "SELECT * FROM product_category";

$rows_act = $pdo->query($sql)->fetchAll();

#echo json_encode($rows, JSON_UNESCAPED_UNICODE);

?>

  <!-- <th scope="col"><a href="add_category.php"> <i class="fa-regular fa-square-plus"></i>新增</a></th> -->

  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    如未列於表中, 可按此新增
  </button> -->

  <a href="#"> <i class="fa-regular fa-square-plus" data-bs-toggle="modal" data-bs-target="#exampleModal">若未在列表中,可點此新增</i></a>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">商品分類</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form name="form1" onsubmit="sendData(event)">
            <span>主分類</span>
            <?php include 'cate1.php' ?>

            <div class="mb-3">
              <span>次分類</span>
              <input type="text" class="form-control" id="categoryName" name="categoryName">
              <div class="form-text"></div>
            </div>
            <?php

            // foreach ($rows_act as $row) : {
            //     if ($row['category_id'] == 0) {
            //       $is_selected = $row['category_id'] == $row_act['categoryParent'] ? "selected" : "";
            //       echo '<option value="' . $row['category_id'] . '" ' . $is_selected . '>' . $row['categoryName'] . '</option>';
            //     }
            //   }
            // endforeach;

            ?>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">新增</button>
        </div>
      </div>
    </div>
  </div>


  </div>

  <?php include './parts/scripts.php' ?>
  <script>
    function sendData(e) {
      e.preventDefault(); // 不要讓表單以傳統的方式送出
      // TODO: 資料在送出之前, 要檢查格式
      let isPass = true; // 有沒有通過檢查

      if (!isPass) {
        return; // 沒有通過就不要發送資料
      }
      // 建立只有資料的表單
      const fd = new FormData(document.form1);

      fetch('add_category-api.php', {
          method: 'POST',
          body: fd, // 送出的格式會自動是 multipart/form-data
        }).then(r => r.json())
        .then(data => {
          console.log({
            data
          });
          if (data.success) {
            alert('資料新增成功');
            location.href = "./add.php"
          } else {
            alert('發生問題');
            for (let n in data.errors) {
              console.log(`n: ${n}`);
              if (document.form1[n]) {
                const input = document.form1[n];
                input.style.border = '2px solid red';
                input.nextElementSibling.innerHTML = data.errors[n];
              }
            }
          }

        })
        .catch(ex => console.log(ex))
    }
  </script>
  <?php include './parts/html-foot.php' ?>