<?php include './parts/html-head.php' ?>
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
  background-image:url('../bg-img.jpg');
}

.bg-tw2 {
  background-image:url('../bg-img.jpg');
}

.bg-tw3 {
  background-color: #bfc4dc;
}

.img-head>img{
  height: 50px;
  margin: auto
}

/* img{
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
        <!-- <img class="h50px w50px rounded-circle object-fit-cover" src="mouse.jpg" alt="">
      </div> -->
      <!-- <span style="color:red;font-size:20px">MFEE_04 : 咪咪貓貓</span> -->
      <!-- <button class="nav-item border border-0 btn btn-warning mx-3">
        <a class="nav-link <?= $memclick =='add' ? 'active' : '' ?>" href="list.php"></a>
      </button>
      <button class="nav-item btn btn-success mx-3">
        <a class="nav-link <?= $memclick == 'list' ? 'active' : '' ?>" href="list.php">列表</a> 
      </button> -->
    </div>
  </nav>
</body>


<?php include './parts/html-foot.php' ?>