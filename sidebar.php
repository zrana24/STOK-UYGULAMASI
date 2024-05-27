<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
    </li>
    <form class="form-inline my-2 my-lg-0" onsubmit="tablo(); return false;" id="arama">
      <input class="form-control mr-sm-2 ml-3" type="search" id="veri" name="veri">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >ARA</button>
    </form>
  </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="kayit.php" class="brand-link">
    <span class="brand-text font-weight-light">ADMİN</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fa fa-bars"></i>
            <p>STOK</p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="urun.php" class="nav-link">
                <i class="fa fa-angle-double-right"></i>
                <p>ÜRÜN KAYIT</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="firma_cari.php" class="nav-link">
                <i class="fa fa-angle-double-right"></i>
                <p>FİRMALAR /CARİ KARTLAR</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="fatura.php" class="nav-link">
                <i class="fa fa-angle-double-right"></i>
                <p>FATURA</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="kasa.php" class="nav-link">
                <i class="fa fa-angle-double-right"></i>
                <p>KASA</p>
              </a>
            </li>
          </ul>

        </li>
      </ul>
    </nav>
  </div>
</aside>
