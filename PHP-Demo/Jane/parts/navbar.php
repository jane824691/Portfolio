<?php
if (!isset($pageName)) {
  $pageName = '';
}
?>
<style>
  nav.navbar ul.navbar-nav .nav-link.active {
    background-color: blue;
    color: white;
    border-radius: 6px;
    font-weight: 600;
  }
</style>

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

/* img{
  height: 650px;
  margin-left: 250px;
  position:relative; 
} */

/* .container2{
  position:absolute;
} */

/* input[type=text]:focus {
  border:none;} */

</style>
<body class="bg-tw1">
  <nav class="bg-tw2">
    <div class="container h50px d-flex align-items-center text-white"> 
      <div class="img-head h50px w50px bg-tw1 ms-5 rounded-circle mx-5">
        <img class="h50px w50px rounded-circle object-fit-cover" src="mouse.jpg" alt="">
      </div>
      <span style="color:red;font-size:20px" ><a class="nav-link <?= $pageName == 'list' ? 'active' : '' ?>" href="list.php">MFEE_04 : 咪咪貓貓</a></span>
      <button class="nav-item border border-0 btn btn-warning mx-3">
        <a class="nav-link <?= $pageName == 'add' ? 'active' : '' ?>" href="add.php">新增</a>
      </button>
      <button class="nav-item btn btn-success mx-3">
        <a class="nav-link <?= $memclick == 'list' ? 'active' : '' ?>" href="list.php">列表</a> 
      </button>
    </div>
  </nav>
  <!-- <main class="bg-tw3 w250px h650px">
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
      
      
  </main> -->
</body>