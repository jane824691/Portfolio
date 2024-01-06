<?php
require './parts/connect_db.php';
$pageName = 'list';
$title = '列表';

$perPage = 25; # 一頁最多有幾筆

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
  header('Location: ?page=1'); # 頁面轉向
  exit; # 直接結束這支 php
}

$t_sql = "SELECT COUNT(1) FROM product";

# 總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

# 預設值
$totalPages = 0;
$rows = [];

// 有資料時
if ($totalRows > 0) {
  # 總頁數
  $totalPages = ceil($totalRows / $perPage);
  if ($page > $totalPages) {
    header('Location: ?page=' . $totalPages); # 頁面轉向最後一頁
    exit; # 直接結束這支 php
  }


  $sql = sprintf(
    "SELECT * FROM product ORDER BY product_id DESC LIMIT %s, %s",
    ($page - 1) * $perPage,
    $perPage

  );
  $rows = $pdo->query($sql)->fetchAll();
}

?>

<style>
  .col {
    margin-left: 10px;
  }

  */ .h900px {
    height: 900px;
  }
</style>
<?php include './parts/html-head.php' ?>
<?php include 'homepage2.php' ?>

<head>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <style>
    body {
      font-family: "Lato", sans-serif;
    }

    .sidenav {
      height: 100%;
      width: 160px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #91C7B1;
      overflow-x: hidden;
      padding-top: 20px;
    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 18px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #B33951;
    }

    .main {
      margin-left: 160px;
      /* Same as the width of the sidenav */
      font-size: 28px;
      /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }
  </style>
</head>

<body>

  <div class="sidenav">
    <div class="img-head h200px w50px bg-tw1 ms-5 rounded-circle mx-5">
      <img class="h50px w50px rounded-circle object-fit-cover" src="mouse.jpg" alt="">
    </div>
    <a href="../homepage3.php"><i class="fa-solid fa-shield-dog"></i>首頁</a>
    <a href="../blunt/profile1/list.php"><i class="fa-solid fa-paw"></i>會員中心</a>
    <a href="list.php"><i class="fa-solid fa-paw"></i>寵物商城</a>
    <a href="../S/list.php"><i class="fa-solid fa-paw"></i>寵物生活日記</a>
    <a href="../Tsai/list.php"><i class="fa-solid fa-paw"></i>寵物論壇</a>
  </div>
</body>
<div class="flex-row">
  <div id="userName" class="m-5">
    <div class="container">
      <div class="row ">
        <div class="col">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=1">
                  <i class="fa-solid fa-angles-left h24px py-1"></i></a>
              </li>
              <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                if ($i >= 1 and $i <= $totalPages) : ?>
                  <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                  </li>
              <?php
                endif;
              endfor; ?>
              <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $totalPages ?>">
                  <i class="fa-solid fa-angles-right h24px py-1"></i></a>
              </li>
              <?php include './parts/navbar-title.php' ?>
            </ul>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col">刪除</th>
                <th scope="col">商品ID</th>
                <th scope="col">分類ID</th>
                <th scope="col">商品圖片</th>
                <th scope="col" class="col-4">商品名稱</th>
                <th scope="col">單價金額</th>
                <th scope="col">庫存</th>
                <th scope="col">最後編輯時間</th>
                <!-- <th scope="col">商品狀態</th>  -->

                <th scope="col">商品敘述</th>
                <th scope="col">修改</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rows as $r) : ?>
                <tr>
                  <td><a href="javascript: deleteItem(<?= $r['product_id'] ?>)">
                      <i class="fa-solid fa-trash-can"></i>
                    </a></td>
                  <td><?= $r['product_id'] ?></td>
                  <td><?= $r['category_id'] ?></td>
                  <td><img width="50" ; style="border-radius: 30%;" src="../Jane/uploads/<?= $r['productImg'] ?>" alt=""></td>
                  <td><?= htmlentities($r['productName']) ?>
                  <td><?= $r['price'] ?></td>
                  <td><?= $r['stock'] ?></td>
                  <td><?= $r['editTime'] ?></td>
                  <!-- <td><?= $r['salesCondition'] ?></td>  -->
                  <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        點我看
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">商品敘述</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <?= $r['productDescription'] ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  <td><a href="edit.php?product_id=<?= $r['product_id'] ?>">
                      <i class="fa-solid fa-file-pen"></i>
                    </a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>


    </div>



    <?php include './parts/scripts.php' ?>
    <script>
      function deleteItem(product_id) {
        if (confirm(`確定要刪除編號為 ${product_id} 的資料嗎?`)) {
          location.href = 'delete.php?product_id=' + product_id;
        }
      }
    </script>
    <?php include './parts/html-foot.php' ?>