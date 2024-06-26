<?php 
require_once 'config/config.php';
if (isset($_SESSION["login"]) && isset($_SESSION["user"])) {
  header("Location: index.php");
} elseif (isset($_SESSION["driver"])) {
  header("Location: driver/index.php");
}

if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
      $_SESSION['login_success'] = 'Registratsi Berhasil Silahkan Login';
      header("Location: login.php");
  } else {
    $error = $_SESSION["error"];
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Daftar - BricksGenius</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="assets/style/main.css" rel="stylesheet" />
  </head>

  <body>
    <!-- navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top bg-light"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="index.php" class="navbar-brand" title="home">
          <img src="assets/images/logo/logo.png" class="w-50" alt="logo" />
        </a>
        <button
          class="navbar-toggler d-lg-none"
          type="button"
          data-toggle="collapse"
          data-target="#collapsibleNavId"
          aria-controls="collapsibleNavId"
          aria-expanded="false"
          aria-label="Toggle navigation"
        ></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Semua Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">Tentang Kami</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- page content -->
    <div class="page-content page-auth" id="register">
      <section class="store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-5">
              <h2 class="mb-4">
              <br />
                Silahkan Daftar Disini Ya!
              </h2>

              <form action="" class="mt-3" method="POST">
                  <?php if (isset($error)) : ?>
                  <div class="alert alert-danger">
                      <p class="font-weight-bold m-0"><?= $error; ?></p>
                  </div>
                  <?php endif;?>
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="form-control"
                    autofocus
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="email">Alamat Email</label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="password2">Konfirmasi Password</label>
                  <input
                    type="password"
                    name="password2"
                    id="password2"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="telpon">Nomor Handphone</label>
                  <input
                    type="text"
                    name="telpon"
                    id="telpon"
                    class="form-control"
                    required
                  />
                </div>
                <button
                  type="submit"
                  name="register"
                  class="btn btn-dark btn-block mt-4"
                >
                  Daftar Sekarang
                </button>

                <a
                  href="login.php"
                  class="btn btn-light btn-block mt-4"
                  >Sudah Memiliki Akun?</a>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- footer -->
    <footer>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p class="pt-4 pb-2">
            <p>Kelompok 2 - RPL 4D</p>
          </p>
        </div>
      </div>
    </div>
  </footer>
    <!-- akhir footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.slim.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="assets/js/navbar-scroll.js"></script>
  </body>
</html>
