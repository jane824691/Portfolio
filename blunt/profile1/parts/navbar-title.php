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
<button class="nav-item btn btn-success mx-3">
        <a class="nav-link <?= $memclick == 'list' ? 'active' : '' ?>"><i class="fa-solid fa-paw"></i>
        <?= "目前第$page 頁/共 $totalPages 頁" ?></a>  
      </button>
<button class="nav-item border border-0 btn btn-success mx-3">
        <a class="nav-link <?= $memclick =='add' ? 'active' : '' ?>" href="list.php"><i class="fa-solid fa-paw"></i>會員中心列表</a>
      </button>
      <button class="nav-item border border-0 btn btn-success mx-3">
        <a class="nav-link <?= $memclick =='add' ? 'active' : '' ?>" href="add.php"><i class="fa-solid fa-paw"></i>新增會員</a>
      </button>
      
      
      
</ul>

