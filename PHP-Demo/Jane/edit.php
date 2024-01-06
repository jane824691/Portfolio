<?php

require './parts/connect_db.php';

// 取得資料的 PK
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

if (empty($product_id)) {
  header('Location: list.php');
  exit; // 結束程式
}

$sql = "SELECT * FROM product WHERE product_id={$product_id}";
$row = $pdo->query($sql)->fetch();

if (empty($row)) {
  header('Location: list.php');
  exit; // 結束程式
}

#echo json_encode($row, JSON_UNESCAPED_UNICODE);
$title = '編輯資料';
$productImg = htmlentities($row['productImg']);

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
  <a href="list.php"><i class="fa-solid fa-paw"></i>寵物商城</a>
  <a href="../S/list.php"><i class="fa-solid fa-paw"></i>寵物生活日記</a>
  <a href="../Tsai/list.php"><i class="fa-solid fa-paw"></i>寵物論壇</a>
</div>


<div class="main">
  
</div>
   
</body>

<div class="d-flex flex-row">
  <main>
    <div class="d-flex justify-content-center m-5">
      <div class="container d-flex justify-content-end">
        <div class="card" style="width: 40rem; height:30rem">


        <div style="width: 300px; height: 300px; border:dashed 2px grey; overflow:hidden" class="position-absolute top-50 start-50 translate-middle">
          <img src="../Jane/uploads/<?= $productImg ?>" alt="" id="myimg" style="width:100%; height:100%; object-fit:cover;"  class=""  />
      </div>

      <div style="cursor: pointer;" onclick="document.form2.productImg.click()">點選上傳圖片</div>

      <form name="form3">
        <input type="file" name="productImg" onchange="uploadNewFile()" />
      </form>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">編輯資料</h5>
              <br>
              <form name="form1" onsubmit="sendData(event)">
                <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                <div class="mb-3">
                  <!-- <div>
                  <label for="salesCondition"><input type="radio" name="salesCondition" value="">上架中</label>
                  <label for="salesCondition"><input type="radio" name="salesCondition" value="">已下架</label>
                </div> -->
                  <label for="productName" class="form-label">商品姓名</label>
                  <input type="text" class="form-control" id="productName" name="productName" value="<?= htmlentities($row['productName']) ?>">
                  <div class="form-text"></div>
                </div>
                <div class="mb-3">
                  <label for="category_id" class="form-label">分類</label>
                  <?php include 'cate2.php' ?>
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">金額</label>
                  <input type="number" class="form-control" id="price" name="price" min="0" value="<?= htmlentities($row['price']) ?>">
                  <div class="form-text"></div>
                </div>
                <div class="mb-3">
                  <label for="stock" class="form-label">庫存</label>
                  <input type="number" class="form-control" id="stock" name="stock" min="0" value="<?= htmlentities($row['stock']) ?>">
                  <div class="form-text"></div>
                </div>

                <div class="mb-3">
                  <label for="productDescription" class="form-label">商品敘述</label>
                  <textarea class="form-control" name="productDescription" id="productDescription" cols="30" rows="3"><?= htmlentities($row['productDescription']) ?></textarea>
                  <div class="form-text"></div>
                </div>
                  <!-- 為了把已經上傳到伺服器的圖片名稱存進資料庫的欄位。 -->
                <input type="input" name="newProductImg" hidden />

                <button type="submit" class="btn btn-primary">送出</button>
              </form>

            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <?php include './parts/scripts.php' ?>
  <script>
    function uploadNewFile() {
      const fd = new FormData(document.form3);
      fetch("upload-img-api-1.php", {
          method: "POST",
          body: fd,
        })
        .then((r) => r.json())
        .then((data) => {
          if (data.success) {
            // 更新预览图像
            myimg.src = "../Jane/uploads/" + data.file;
            // 更新数据库中的图像文件名
            document.form1.newProductImg.value = data.file;
          }
        });
    }



    const productName_in = document.form1.productName;
    // const salesCondition_in = document.form1.salesCondition;
    const category_id_in = document.form1.category_id;
    const price_in = document.form1.price;
    const stock_in = document.form1.stock;
    const fields = [productName_in, price_in, stock_in];
    // 在 sendData() 函数中获取新上传的图像文件名
    const newProductImg = document.form1.newProductImg.value;




    function sendData(e) {
      e.preventDefault(); // 不要讓表單以傳統的方式送出

      // 外觀要回復原來的狀態
      fields.forEach(field => {
        field.style.border = '1px solid #CCCCCC';
        field.nextElementSibling.innerHTML = '';
      })

      // TODO: 資料在送出之前, 要檢查格式
      let isPass = true; // 有沒有通過檢查

      if (productName_in.value.length <= 0) {
        isPass = false;
        productName_in.style.border = '2px solid red';
        productName_in.nextElementSibling.innerHTML = '請填寫正確的姓名';
      }

      // 非必填
      if (price_in.value <= 0) {
        isPass = false;
        price_in.style.border = '2px solid red';
        price_in.nextElementSibling.innerHTML = '請填寫金額';
      }

      if (stock_in.value <= 0) {
        isPass = false;
        stock_in.style.border = '2px solid red';
        stock_in.nextElementSibling.innerHTML = '請填寫庫存';
      }

      if (!isPass) {
        return; // 沒有通過就不要發送資料
      }
      // 建立只有資料的表單
      const fd = new FormData(document.form1);

      fetch('edit-api.php', {
          method: 'POST',
          body: fd, // 送出的格式會自動是 multipart/form-data
        }).then(r => r.json())
        .then(data => {
          console.log({
            data
          });
          if (data.success) {
            alert('資料編輯成功');
            location.href = "./list.php"
          } else {
            // alert('資料沒有修改');
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
      // .catch(ex => console.log(ex))


      // 更新数据库中的图像文件名
      // const pdimg = new FormData();
      // pdimg.append("product_id", product_id);
      // pdimg.append("newProductImg", newProductImg);

      // fetch("update-img-api.php", {
      //     method: "POST",
      //     body: fd,
      //   })
      //   .then((r) => r.json())
      //   .then((data) => {
      //     if (data.success) {
      //       // alert('图像已更新');
      //       location.reload(); // 刷新页面或执行其他操作
      //     }
      //   });
    }
  </script>
  <?php include './parts/html-foot.php' ?>