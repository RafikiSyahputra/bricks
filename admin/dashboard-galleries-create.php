<?php

if (isset($_POST["tambahGaleri"])) {
  if (tambahGaleri($_POST) > 0) {
    echo "<script>
            alert('Gallery Berhasil Ditambahkan');
            document.location.href = '?page=galleries';
          </script>";
  } else {
    echo "<script>
            alert('Gallery Gagal Ditambahkan');
            document.location.href = '?page=galleries';
          </script>";
  }
}

?>

<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
  <div class="container-fluid">
    <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
      &laquo; Menu
    </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collpase navbar-collapse" id="navbarResponsive">
      <!-- dekstop menu -->
      <ul class="navbar-nav d-none d-lg-flex ml-auto">
        <li class="nav-item dropdown">
          <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
            <img src="../assets/images/person-circle.svg" alt="profile" height="40px" class="rounded-circle mr-2 profile-picture" />
            <?php
            $id_user = $_SESSION['user'];
            $user = query("SELECT * FROM users WHERE id_user = $id_user")[0];
            ?>
            Halo, <?= $user["name"]; ?>
          </a>
          <div class="dropdown-menu">
            <a href="../index.php" class="dropdown-item">Kembali</a>
            <div class="dropdown-divider"></div>
            <a href="../logout.php" class="dropdown-item">Logout</a>
          </div>
        </li>
      </ul>

      <!-- mobile app -->
      <ul class="navbar-nav d-block d-lg-none">
        <li class="nav-item">
          <a href="" class="nav-link"> Hi, <?= $user["name"]; ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Buat Galeri Baru</h2>
      <p class="dashboard-subtitle">Buat Galeri Baru Untuk Produk</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12 mt-2">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Nama Produk</label>
                      <?php

                      $products = query("SELECT * FROM products");

                      ?>
                      <select name="name" id="name" class="form-control">
                        <?php foreach ($products as $product) : ?>
                          <option value="<?= $product["id_product"]; ?>"><?= $product["product_name"]; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="photos">Foto</label>
                      <input type="file" name="photos" id="photos" class="form-control" multiple>
                    </div>
                  </div>
                  <!-- <div class="col-md-12">
                    <div class="form-group">
                      <label for="photo">Foto</label>
                      <input type="file" name="photo" id="photo" class="form-control" multiple>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12 text-right">
                    <button type="submit" name="tambahGaleri" class="btn btn-dark px-4">
                      Simpan
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>