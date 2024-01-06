<?php
require './parts/connect_db.php'?>
<?php include './parts/html-head.php' ?>
<?php include './parts/scripts.php' ?>
<?php
if(! isset($memclick)){
  $memclick = ''; //避免console查看div裡面有warning產生 
}
?>

<style>
.h50px {
  height: 50px;
}
.w50px {
  width: 50px;
}
.h650px {
  height: 650px;
}
.w250px {
  width: 250px;
}

.bg-tw1 {
  background-color: #fff;
}

.bg-tw2 {
  background-color: lightpink;
}

.bg-tw3 {
  background-color: #bfc4dc;
}

.img-head>img{
  height: 50px;
  margin: auto
}

img{
  height: 650px;
  margin-left: 250px;
  position:relative; 
}

.container2{
  position:absolute;
}

/* input[type=text]:focus {
  border:none;} */

</style>
<body class="bg-tw1">
  <nav class="bg-tw2">
    <div class="container h50px d-flex align-items-center text-white"> 
      <div class="img-head h50px w50px bg-tw1 ms-5 rounded-circle mx-5">
        <img class="h50px w50px rounded-circle object-fit-cover" src="./mouse.jpg" alt="">
      </div>
      <span style="color:red;font-size:20px">MFEE_04 : 咪咪貓貓</span>
    </div>
  </nav>
  <main class="bg-tw3 w250px h650px">
    <div class="container2 mx-5">
      <div class="d-flex align-items-start py-1">
        <div class="nav flex-column nav-pills me-3 border-black" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link homepage" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><a style="color:blue" class="nav-link homepage <?= $memclick == 'add' ? 'active' : '' ?>" href="add.php">首頁</a></button>
          <button class="nav-link member" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><a style="color:blue" class="nav-link member <?= $memclick == 'list' ? 'active' : '' ?>" href="list.php">會員中心</a></button>         
          <button class="nav-link shop" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-shop" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><a style="color:blue" class="nav-link shop <?= $memclick == 'list' ? 'active' : '' ?>" 
          href="list.php">寵物商城</a></button>
          <button class="nav-link diary" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-diary" type="button" role="tab" aria-controls="v-pills-diary" aria-selected="false"><a style="color:blue" class="nav-link diary <?= $memclick == 'list' ? 'active' : '' ?>" href="list.php">寵物營養日記</a></button>
          <button class="nav-link forum" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-forum" type="button" role="tab" aria-controls="v-pills-forum" aria-selected="false"><a style="color:blue" class="nav-link forum <?= $memclick == 'list' ? 'active' : '' ?>" href="list.php">寵物論壇</a></button>
        </div> 
      </div>
    </div>
    <div class="img2">
      <img src="./cat2.jpg" alt="">
      
      <div class="bg-secondary-subtle w-30 h-30 position-absolute top-50 start-50 translate-middle border border-3 border border-danger-subtle rounded-4 shadow p-3 text-center fw-bold bs-primary-bg-subtle opacity-75 ">
        <form name="member1" onsubmit="sendData(event)">
        <h3 style="color:salmon">請登入會員</h3>

          <div class="input-group mb-2 mt-3 px-3">
            <label for="account" class="form-label"></label>
            <span class="input-group-text" id="basic-addon1">帳號</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="account" id="account">

            <!-- value="<?= htmlentities($_POST['account'] ?? '') ?>" -->
            
          </div>
          <div class="input-group mb-2 px-3">
            <label for="password" class="form-label"></label>
            <span class="input-group-text" id="basic-addon1">密碼</span>
            <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password" id="password">

            <!-- value="<?= htmlentities($_POST['password'] ?? '') ?>" -->

          </div>

          <div class="hstack gap-3">
            <button type="submit" class="btn btn-primary ms-auto">登入</button>
            <button type="reset" class="btn btn-warning">清除</button>
          </div>
        </form>
    </div>
  </main>
</body>

<?php include './parts/scripts.php' ?>
<script>
  const account_in = document.member1.account;
  const password_in = document.member1.password;
  const groups = [account_in, password_in]; //一次拿以上兩個參照

  function sendData(e){ //sendData(event)的function
    e.preventDefault(); // 不要讓表單以傳統的方式送出
  

  // groups.forEach(group => {
  //   group.style.border = '1px solid #CCCCCC';
  //   group.nextElementSibling.innerHTML = ''; //其餘欄位不變
  //   })

    let isPass = true;

    // if (account_in.value.length < 5) {
    //   isPass = false;
    //   name_in.style.border = '2px solid red';
    //   name_in.nextElementSibling.innerHTML = '請填寫正確的帳號';
    // }
    
    // if (!isPass) {
    //   exit; // 沒有通過就不要發送資料 //本來是return
    // }

    const fd = new FormData(document.member1);

    fetch('homepage-api.php', {
        method: 'POST',
        body: fd, // 送出的格式會自動是 multipart/form-data
      }).then(r => r.json())
      .then(data => {
        console.log({
          data
        });
        if(data.success){
          alert('成功登入');
          location.href = "./list.php"
        }else{
          alert('帳號或密碼為空值或錯誤');
          //for/in 迴圈拿key(物件)
          for(let n in data.errors){
            console.log(`n: ${n}`);
            if(document.member1[n]){
              const input = document.member1[n];
              // input.style.border = '2px solid red';
              input.nextElementSibling.innerHTML = data.errors[n];
            }
          }
        }

      })
      // .catch(ex => console.log(ex))
  
    }

</script>


<?php include './parts/html-foot.php' ?>