<?php
require_once 'config/config.php';

if (isset($_SESSION["user"])) {
  $id = $_SESSION["user"];
  $result = query("SELECT * FROM users WHERE id_user = $id")[0];
  if ($result['roles'] == 'ADMIN') {
    header("Location: admin");
  } elseif ($result["roles"] == 'OWNER') {
    header("Location: owner");
  }
}

if (isset($_SESSION["driver"])) {
  header("Location: driver");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>BricksGenius - About Us</title>

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="assets/style/main.css" rel="stylesheet" />
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top bg-light" data-aos="fade-down">
    <div class="container">
      <a href="index.php" class="navbar-brand" title="home">
        <img src="assets/images/logo/logo.png" class="w-50" alt="logo" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="index.php" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link">Semua Produk</a>
          </li>

          <?php
          if (!isset($_SESSION["login"]) && !isset($_SESSION["user"])) : ?>
            <li class="nav-item">
              <a href="register.php" class="nav-link">Daftar</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="btn btn-dark nav-link px-4 text-white">Login</a>
            </li>
          <?php else : ?>
            <li class="nav-item dropdown">
              <?php
              $id = $_SESSION["user"];
              $user = query("SELECT * FROM users WHERE id_user = $id")[0];
              ?>
              <a href="#" class="nav-link font-weight-bold" id="navbarDropdown" role="button" data-toggle="dropdown">
                <!-- <img
                      src="../assets/images/user_pc.png"
                      alt="profile"
                      class="rounded-circle mr-2 profile-picture"
                    /> -->
                Halo, <?= $user["name"]; ?>
              </a>
              <div class="dropdown-menu">
                <?php if ($user["roles"] == 'ADMIN') : ?>
                  <a href="admin" class="dropdown-item">
                    Dashboard
                  </a>
                <?php else : ?>
                  <a href="user" class="dropdown-item">
                    Dashboard
                  </a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item">Logout</a>
              </div>
            </li>
            <li class="nav-item">
              <?php
              $id = $user["id_user"];
              $carts = rows("SELECT * FROM carts WHERE user_id = $id");
              ?>
              <?php if ($carts >= 1) : ?>
                <a href="cart.php" class="nav-link d-inline-block">
                  <img src="assets/images/shopping-cart-filled.svg" alt="cart-empty" />
                  <div class="cart-badge"><?= $carts; ?></div>
                </a>
              <?php else : ?>
                <a href="cart.php" class="nav-link d-inline-block">
                  <img src="assets/images/icon-cart-empty.svg" alt="cart-empty" />
                </a>
              <?php endif; ?>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- page content -->
  <div class="page-home" data-aos="zoom-in">
    <section class="store-landing" style="background-color: #F5CAC3; background-attachment: fixed; padding: 150px 0 150px 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="" style="font-size: 60px;">BricksGenius</h1>
            <h5 class="">Bring Your Ideas!</h5>
            <a href="https://wa.me/6289618113392" target="_blank" class="btn btn-dark mt-2 px-4 py-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 18 18">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
              </svg> Hubungi Kami</a>
          </div>
        </div>
      </div>
    </section>
    <section class="store-adventeges" id="adventeges">
    <section class="store-landing" style="background-color: #F28482; background-attachment: fixed; padding: 150px 0 150px 0;">
      <div class="container">
        <div class="row text-center">
          <div class="col-12">
            <h2 class="font-weight-bold mb-2">Selamat datang di BricksGenius!</h2>
            <hr style="border-top: 5px solid black; width: 80px;">
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-12">
            <p>Di BricksGenius, kami percaya bahwa pendidikan dan kesenangan dapat bersatu dalam bentuk yang menyenangkan dan mendidik. Kami bangga mempersembahkan kepada Anda koleksi mainan edukasi terbaik yang dirancang untuk merangsang imajinasi, kreativitas, dan kemampuan pemecahan masalah anak-anak.</p>
          </div>
        </div>
        <div class="row text-center" style="margin-top: 100px;">
          <div class="col-12">
            <h2 class="font-weight-bold">Apa sih BrickGenius itu?</h2>
            <hr style="border-top: 5px solid black; width: 80px;">
          </div>
        </div>
        <div class="row justify-content-center text-center">
          <div class="col-md-6">
            
            <p>Dari set konstruksi yang membangun fondasi pengetahuan matematika dan teknologi, hingga permainan logika yang merangsang pikiran, kami menyediakan produk-produk berkualitas tinggi yang tidak hanya menghibur, tetapi juga menginspirasi.</p>
          </div>
          <div class="col-md-6">
            
            <p>Segera temukan beragam mainan edukasi kami, hadirkan keceriaan dan pembelajaran yang berkelanjutan bagi putra-putri Anda. Bersama-sama, mari kita membantu mereka menjadi generasi cerdas, kreatif, dan penuh potensi.</p>
          </div>
        </div>
      </div>
    </section>

  <br>
  <!-- akhir slider -->

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