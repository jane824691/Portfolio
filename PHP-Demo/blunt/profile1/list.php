<?php
require './parts/connect_db.php';

?>
</style>
<?php include './parts/html-head.php' ?>
<?php include 'homepage2.php' ?>

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
</style>
</head>
<body>

<div class="sidenav">
  <div class="img-head h200px w50px bg-tw1 ms-5 rounded-circle mx-5">
    <img class="h50px w50px rounded-circle object-fit-cover" src="mouse.jpg" alt=""></div>
  <a href="../../homepage3.php"><i class="fa-solid fa-shield-dog"></i>首頁</a>
  <a href="list.php"><i class="fa-solid fa-paw"></i>會員中心</a>
  <a href="../../Jane/list.php"><i class="fa-solid fa-paw"></i>寵物商城</a>
  <a href="../../S/list.php"><i class="fa-solid fa-paw"></i>寵物生活日記</a>
  <a href="../../Tsai/list.php"><i class="fa-solid fa-paw"></i>寵物論壇</a>
</div>


<div class="main">
  
</div>
   
</body>

</main>
<?php include './parts/scripts.php' ?>

<script>

</script>
<?php include './parts/html-foot.php' ?>

