<?php
require './blunt/profile1/parts/connect_db.php'?>
<?php include './blunt/profile1/parts/html-head.php' ?>
<?php include './blunt/profile1/parts/scripts.php' ?>
<?php
if(! isset($memclick)){
  $memclick = ''; //避免console查看div裡面有warning產生 
}
?>

<?php
session_start(); # 啟用 session 的功能

$users =[];

$users =[
    'shin' => [
        'password' => '2345',
        'nickname' => '小新',
        'avatar' => '',
        'account'=>'',
        'email'=>'',
        ]
    ];
    // echo $_SESSION['users'];
?>

<head>
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

.img-head>img{
  height: 50px;

}

img{
  height: 1000px;
  position:relative; 
}

</style>
</head>
<body>

<div class="sidenav">
  <div class="img-head h200px w50px bg-tw1 ms-5 rounded-circle mx-5">
    <img class="h50px w50px rounded-circle object-fit-cover" src="./blunt/profile1/mouse.jpg" alt=""></div>
  <a href="homepage3.php"><i class="fa-solid fa-shield-dog"></i>首頁</a>
  <a href="./blunt/profile1/list.php"><i class="fa-solid fa-paw"></i>會員中心</a>
  <a href="Jane/list.php"><i class="fa-solid fa-paw"></i>寵物商城</a>
  <a href="S/list.php"><i class="fa-solid fa-paw"></i>寵物生活日記</a>
  <a href="Tsai/list.php"><i class="fa-solid fa-paw"></i>寵物論壇</a>
</div>

<!-- <body class="bg-tw1">
  <nav class="bg-tw2">
    <div class="container h50px d-flex align-items-center text-white"> 
      <div class="img-head h50px w50px bg-tw1 ms-5 rounded-circle mx-5">
      <div class="bg-secondary-subtle w-30 h-30 position-absolute top-50 start-50 translate-middle border border-3 border border-danger-subtle rounded-4 shadow p-3 text-center fw-bold bs-primary-bg-subtle opacity-75 ">

      <h1>歡迎登入</h1>
    </div>
  </nav>
</body> -->

<div class="main">
  
</div>
    <div class="img2">
      <img src="./blunt/profile1/cat2.jpg" alt="">
      
      <div class="bg-secondary-subtle w-200 h-200 position-absolute top-50 start-50 translate-middle border border-3 border border-danger-subtle rounded-4 shadow p-3 text-center fw-bold bs-primary-bg-subtle opacity-75 ">

        <h1>歡迎登入</h1>
    </div>
  </main>
</body>

<?php include './blunt/profile1/parts/scripts.php' ?>
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
          localStorage.setItem('user',JSON.stringify(data.userData[0]))
          console.log('eddie',JSON.parse(localStorage.getItem('user')))
          location.href = "./blunt/profile1/list.php"
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


<?php include './blunt/profile1/parts/html-foot.php' ?>