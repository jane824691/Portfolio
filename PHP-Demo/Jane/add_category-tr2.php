<?php
require './parts/connect_db.php';

?>
<?php

require './parts/connect_db.php';
$title = '分類資料';

$sql = "SELECT * FROM act";

$rows_act = $pdo->query($sql)->fetchAll();

#echo json_encode($rows, JSON_UNESCAPED_UNICODE);


?>
<?php include './parts/html-head.php' ?>
<?php include 'homepage2.php' ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="d-flex p-2 bd-highlight" >
<!-- 左邊 -->

<div class="sidenav">
  <div class="img-head h200px w50px bg-tw1 ms-5 rounded-circle mx-5">
    <img class="h50px w50px rounded-circle object-fit-cover" src="mouse.jpg" alt=""></div>
  <a href="../homepage3.php"><i class="fa-solid fa-shield-dog"></i>首頁</a>
  <a href="../blunt/profile1/list.php"><i class="fa-solid fa-paw"></i>會員中心</a>
  <a href="../Jane/list.php"><i class="fa-solid fa-paw"></i>寵物商城</a>
  <a href="list.php"><i class="fa-solid fa-paw"></i>寵物生活日記</a>
  <a href="../Tsai/list.php"><i class="fa-solid fa-paw"></i>寵物論壇</a>
</div>


<div class="main">
  
</div>
<style>
  form .form-text {
    color: red;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="card">

        <div class="card-body">
          <h5 class="card-title">新增商品種類</h5>

          <form name="form1" onsubmit="sendData(event)">

          <div class="container">
            <div class="row">
              <form name="form1" onsubmit="return false">
                <div class="input-group">
                  <select class="form-select" name="cate1" id="cate1">

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

          <div class="mb-3">
            <label for="categoryName" class="form-label">次分類</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName">
            <div class="form-text"></div>
          </div>

            <button type="submit" class="btn btn-primary">新增</button>
          </form>

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

    fetch('act_add-api.php', {
        method: 'POST',
        body: fd, // 送出的格式會自動是 multipart/form-data
      }).then(r => r.json())
      .then(data => {
        console.log({
          data
        });
        if (data.success) {
          alert('資料新增成功');
          location.href = "./act_list.php"
        } else {
          alert('發生問題');
          for(let n in data.errors){
            console.log(`n: ${n}`);
            if(document.form1[n]){
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