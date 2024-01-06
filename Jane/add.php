<?php
require './parts/connect_db.php';

$pageName = 'add';
$title = '新增';

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
  <div class="d-flex p-2 bd-highlight">
    <!-- 左邊 -->

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


    <div class="main">

    </div>

</body>




<!-- 因為分成兩張卡, 第一張卡先上傳&顯示, 第二張卡的form會submit資訊所以還是要補<input type="input" name="productImg" hidden />讓他有值可抓-->

<main>
  <div class="d-flex justify-content-center m-5">
    <div class="container d-flex justify-content-end">
      <div class="card" style="width: 40rem; height:30rem">
        <form name="form2" hidden>
          <input type="file" name="productImg" onchange="uploadFile()" />
        </form>
        <div style="width: 300px; height: 300px; border:dashed 2px grey; overflow:hidden" class="position-absolute top-50 start-50 translate-middle">
          <img src="https://climate.onep.go.th/wp-content/uploads/2020/01/default-image.jpg" alt="" id="myimg" style="width:100%; height:100%; object-fit:cover;" class="" />
        </div>
        <div style="cursor: pointer;" onclick="document.form2.productImg.click()">點選上傳圖片</div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-15">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">新增商品資料</h5>
                <form name="form1" onsubmit="sendData(event)">
                  <div class="mb-3">
                    <!-- <div class="float-end">
                <label for="salesCondition"><input type="radio" name="salesCondition" value="上架中" checked>上架中</label>
                <label for="salesCondition"><input type="radio" name="salesCondition" value="已下架">已下架</label>
              </div> -->
                    <label for="productName" class="form-label">商品姓名</label>
                    <input type="text" class="form-control" id="productName" name="productName">
                    <div class="form-text"></div>
                  </div>
                  <div class="mb-3">
                    <p>分類</p>
                    
                    <?php include 'cate2.php' ?>
                    <?php include 'add_category.php' ?>

                    
                  </div>
                  
                  <div class="mb-3 mx-4">
                    <label for="price" class="form-label">金額</label>
                    <input type="number" class="form-control" id="price" name="price" min="0">
                    <div class="form-text"></div>
                  </div>
                  <div class="mb-3 mx-4">
                    <label for="stock" class="form-label">庫存</label>
                    <input type="number" class="form-control" id="stock" name="stock" min="0">
                    <div class="form-text"></div>
                  </div>

                  <div class="mb-3 mx-4">
                    <label for="productDescription" class="form-label">商品敘述</label>
                    <textarea class="form-control" name="productDescription" id="productDescription" cols="30" rows="3"></textarea>
                    <div class="form-text"></div>
                  </div>

                  <input type="input" name="productImg" hidden />


                  <button type="submit" class="btn btn-primary mb-4 mx-4">送出</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php include './parts/scripts.php' ?>
  <script>
    const productName_in = document.form1.productName;
    const category_id = document.form1.category_id;
    const price = document.form1.price;
    const stock = document.form1.stock;
    const productImg = document.form1.productImg;
    // const salesCondition = document.form1.salesCondition;
    const fields = [productName_in, price, stock];



    // 圖片上傳的function一開始只寫了myimg.src = "/group4/uploads/" + data.file;這段只有把上傳圖片寫入uploads資料夾裡
    // 也需要補    const productImgName = document.form1.productImg;
    // 跟productImgName.value = data.file才能抓到賦予productImg值，讓他能被api抓到


    function uploadFile() {
      const fd = new FormData(document.form2);
      const productImgName = document.form1.productImg;
      fetch("upload-img-api-1.php", {
          method: "POST",
          body: fd, // enctype="multipart/form-data"
        })
        .then((r) => r.json())
        .then((data) => {
          if (data.success) {
            myimg.src = "../Jane/uploads/" + data.file;
            productImgName.value = data.file
          }
        });
    }


    function sendData(e) {
      e.preventDefault(); // 不要讓表單以傳統的方式送出

      // 外觀要回復原來的狀態
      fields.forEach(field => {
        field.style.border = '1px solid #CCCCCC';
        field.nextElementSibling.innerHTML = '';
      })

      // TODO: 資料在送出之前, 要檢查格式
      let isPass = true; // 有沒有通過檢查

      if (productName.value.length <= 0) {
        isPass = false;
        productName.style.border = '2px solid red';
        productName.nextElementSibling.innerHTML = '請填寫商品名稱';
      }


      // 非必填  && !validateMobile(price.value)
      if (price.value <= 0) {
        isPass = false;
        price.style.border = '2px solid red';
        price.nextElementSibling.innerHTML = '請填寫金額';
      }

      if (stock.value <= 0) {
        isPass = false;
        stock.style.border = '2px solid red';
        stock.nextElementSibling.innerHTML = '請填寫庫存';
      }

      if (!isPass) {
        return; // 沒有通過就不要發送資料
      }
      // 建立只有資料的表單
      const fd = new FormData(document.form1);

      fetch('add-api.php', {
          method: 'POST',
          body: fd, // 送出的格式會自動是 multipart/form-data
        }).then(r => r.json())
        .then(data => {
          console.log({
            data
          });
          if (data.success) {
            alert('資料新增成功');
            location.href = "./list.php"
          } else {
            //alert('發生問題');
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
    }
  </script>
  <?php include './parts/html-foot.php' ?>