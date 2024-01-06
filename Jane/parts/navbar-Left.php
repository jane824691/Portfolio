<style>
  div.sticky {
  position: sticky;
  top: 50;
}
</style>

<main class="bg-tw3 w250px sticky">
    <div class="container2 mx-5">
      <div class="d-flex align-items-start py-1">
        <div class="nav flex-column nav-pills me-3 border-black" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link homepage mx-4" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><a style="color:blue" class="nav-link homepage <?= $memclick == 'add' ? 'active' : '' ?>" href="/MiddlePresentation/homepage3.php">首頁</a></button>
          <button class="nav-link member" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><a style="color:blue" class="nav-link member <?= $memclick == 'list' ? 'active' : '' ?>" href="/MiddlePresentation/blunt/profile1/list.php">會員中心</a></button>
          <button class="nav-link shop" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-shop" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><a style="color:blue" class="nav-link shop <?= $memclick == 'list' ? 'active' : '' ?>" href="list.php">寵物商城</a></button>
          <button class="nav-link diary" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-diary" type="button" role="tab" aria-controls="v-pills-diary" aria-selected="false"><a style="color:blue" class="nav-link diary <?= $memclick == 'list' ? 'active' : '' ?>" href="/MiddlePresentation/S/list.php">寵物營養日記</a></button>
          <button class="nav-link forum" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-forum" type="button" role="tab" aria-controls="v-pills-forum" aria-selected="false"><a style="color:blue" class="nav-link forum <?= $memclick == 'list' ? 'active' : '' ?>" href="/MiddlePresentation/Tsai/list.php">寵物論壇</a></button>
        </div>
      </div>
    </div>
  </main>