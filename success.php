<?php 
require 'config/config.php';

if (isset($_SESSION["user"])) {
  $id = $_SESSION["user"];
  $result = query("SELECT * FROM users WHERE id_user = $id")[0];
  if ($result['roles'] == 'ADMIN') {
    header("Location: admin");
  } elseif($result["roles"] == 'OWNER') {
    header("Location: owner");
  }
}

if (!isset($_SESSION["login"]) && !isset($_SESSION["user"])) {
  header("Location: login.php");
} elseif (isset($_SESSION["driver"])) {
  header("Location: driver/index.php");
}

$id = $_SESSION["user"];
$user = query("SELECT * FROM users WHERE id_user = $id")[0];


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

    <title>Transaksi Berhasil!</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="assets/style/main.css" rel="stylesheet" />
  </head>

  <body>
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="assets/images/icon-success.svg" alt="" />
              <h2 class="mt-3">Transaksi Diproses!</h2>
              <p>
                Silahkan foto bukti transaksi di dahsboard transaksi anda dan
                Silahkan tunggu konfirmasi dari Admin Ya!
              </p>
              <div>
                <?php if ($user["roles"] == 'ADMIN') : ?>
                <a href="admin" class="btn btn-dark w-50 mt-4">
                  Kembali Ke Dashboard
                </a>
                <?php else : ?>
                <a href="user" class="btn btn-dark w-50 mt-4">
                  Kembali Ke Dashboard
                </a>
                <?php endif; ?>
                <a href="index.php" class="btn btn-sign-up w-50 mt-2">
                  Belanja Lagi
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="/script/navbar-scroll.js"></script>
  </body>
</html>
