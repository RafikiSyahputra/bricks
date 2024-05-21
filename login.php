<?php 
require_once 'config/config.php';
if (isset($_SESSION["login"]) && isset($_SESSION["user"])) {
  header("Location: index.php");
} elseif (isset($_SESSION["driver"])) {
  header("Location: driver/index.php");
}

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  if (mysqli_num_rows($result) === 1) {
    
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;
      $_SESSION["user"] = $row["id_user"];
      if ($row["roles"] == "USER") {
        header("Location: index.php");
      } elseif($row["roles"] == "ADMIN") {
        header("Location: admin");
      } else {
        header("Location: owner");
      }
    }
  }

  $error = true;

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

    <title>Login - BricksGenius</title>

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
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
              <a href="products.php" class="nav-link">Semua Produk</a>
            </li>
            <li class="nav-item">
              <a href="about.php" class="nav-link">Tentang Kami</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- page content -->
    <div class="page-content page-auth">
      <section class="store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img
                src="assets/images/logo/logo1.png"
                alt=""
                class="w-50 mb-lg-none"
              />
            </div>
            <div class="col-lg-5">
              <h2 class="mb-4">Temukan Keseruan Disini!</h2>
              
              <form action="" method="POST" class="mt-3">
                  <?php if (isset($error)) : ?>
                      <div class="alert alert-danger w-75">
                          <p class="font-weight-bold m-0">Maaf, Email / Username salah</p>
                      </div>
                  <?php endif;?>
                  <?php if (isset($_SESSION['login_success'])) : ?>
                      <div class="alert alert-success w-75">
                          <p class="font-weight-bold m-0"><?= $_SESSION['login_success']; ?></p>
                      </div>
                  <?php unset($_SESSION["login_success"])?>
                  <?php endif;?>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control w-75"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control w-75"
                    required
                  />
                </div>
                <button
                  type="submit"
                  name="login"
                  class="btn btn-dark btn-block w-75 mt-4"
                  >Login</button>
                <a
                  href="register.php"
                  class="btn btn-login btn-block w-75 mt-2"
                  >Daftar</a
                >
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
