<?php
if(! isset($pageName)){
  $pageName = ''; //避免console查看div裡面有warning產生 
}
?>
<div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= $pageName == 'list' ? 'active' : '' ?>" href="list.php">列表</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $pageName == 'add' ? 'active' : '' ?>" href="add.php">新增</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $pageName =='cate2' ? 'active' : '' ?>" href="cate2.php">二層選單</a>
        </li>
      </ul>  
      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php if (isset($_SESSION['admin'])) : ?>
          <li class="nav-item">
            <a class="nav-link"><?= $_SESSION['admin']['nickname'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'login' ? 'active': '' ?>" href="../practises/logout.php">登出</a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'login' ? 'active': '' ?>" href="../login.php">登入</a>
          </li>
        <?php endif ?>        
      </ul>
    </div>
  </nav>
</div>