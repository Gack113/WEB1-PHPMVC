<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<a class="navbar-brand" href="banchamp.dev">LNL</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<!--Menu-->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="#">Trang Chủ <span class="sr-only">(current)</span></a>
    </li>
    <?php foreach (ProductType::all() as $item):?>
      <li class="nav-item">
        <a class="nav-link" href="<?='Page/Type/'.$item->MaLoaiSP ?>"><?= $item->TenLoaiSP ?></a>
      </li>
    <?php endforeach ?>
  </ul>
  <ul class="navbar-nav my-auto">
    <li class="nav-item dropdown">
      <button class="btn btn-outline-info my-2 my-sm-0" id="navbarDropdownCart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span id="cartStatus" class="fa fa-shopping-cart">
          <?php if(Session::has('cart')): ?>
            (<?= Session::get('cart')->totalQty ?>)
          <?php else: echo "(0)" ?>
          <?php endif;?>
        </span>
        <i class="fa fa-chevron-down"></i>
      </button>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownCart">
        <div id="cartBody">
        <?php if(Session::has('cart')): ?>
          <?php foreach(Session::get('cart')->items as $item): ?>
            <a class="dropdown-item">
              <span><img width="50" src="../../../app/public/source/img/product/<?= trim($item['item']->TenSP)?>/thumbnail/<?=trim($item['item']->TenSP).'.png' ?>" alt=""></span>
              <span><?= $item['item']->TenSP ?></span>
              <span><?= $item['item']->GiaSP ?></span>
              <span>x<?= $item['qty'] ?></span>
              <span class="badge badge-pill badge-warning"><i class="fa fa-times" aria-hidden="true"></i></span>
            </a>
          <?php endforeach; ?>
        </div>
        <div class="dropdown-divider"></div>
        <div id="totalPrice" class="dropdown-item">Tổng: <span><?= Session::get('cart')->totalPrice ?></span></div>
        <?php endif;?>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <button  class="btn btn-info">
             <span>
              Đặt hàng
              <i class="fa fa-angle-right" aria-hidden="true"></i>
             </span>
          </button>
        </a>
      </div>
    </li>
    <li class="nav-item">&nbsp;</li>
    <li class="nav-item">
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
      </form>
    </li>
    <li class="nav-item">&nbsp;</li>
    <?php if(Session::has('auth')): ?>
    <li class="nav-item dropdown">
        <button class="btn btn-outline-info my-2 my-sm-0" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>
            <?= Session::get('auth')->displayName ?>
              <i class="fa fa-chevron-down"></i>
          </span>
        </button>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Thông tin cá nhân</a>
          <?php if(Session::get('auth')->role == 1): ?>
          <a class="dropdown-item" href="../admin">Trang quản trị</a>
          <?php endif; ?>
          <a class="dropdown-item" href="../auth/logout">Đăng xuất</a>
        </div>
    </li>
    <?php else: ?>
      <a href="../auth/login"><button class="btn btn-outline-info my-2 my-sm-0"> Đăng nhập</button></a>
    <?php endif; ?>
  </ul>
</div>
<!--End Menu-->
</nav>
