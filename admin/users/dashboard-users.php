<nav
  class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
  data-aos="fade-down"
>
  <div class="container-fluid">
    <button
      class="btn btn-secondary d-md-none mr-auto mr-2"
      id="menu-toggle"
    >
      &laquo; Menu
    </button>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarResponsive"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collpase navbar-collapse" id="navbarResponsive">
      <!-- dekstop menu -->
      <ul class="navbar-nav d-none d-lg-flex ml-auto">
        <li class="nav-item dropdown">
          <a
            href="#"
            class="nav-link"
            id="navbarDropdown"
            role="button"
            data-toggle="dropdown"
          >
          <img
              src="../assets/images/person-circle.svg"
              alt="profile"
              height="40px"
              class="rounded-circle mr-2 profile-picture"
            />
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
          <a href="" class="nav-link"> Halo, <?= $user["name"]; ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Akun</h2>
      <p class="dashboard-subtitle">Kelola Akun</p>
    </div>
    <div class="dashboard-content">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row mb-4">
                <div class="col-12">
                <a href="?page=users-create" class="btn btn-dark">
                  + Tambahkan Akun Baru
                </a>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Email</th>
                          <th scope="col">Nomor Handphone</th>
                          <th scope="col">Tingkat</th>
                          <th scope="col" class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          $query = "SELECT * FROM users";
                          $users = query($query);
                        ?>
                        <?php foreach ($users as $user) : ?>
                        
                          <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $user["name"]; ?></td>
                            <td><?= $user["email"]; ?></td>
                            <td><?= $user["phone_number"]; ?></td>
                            <td><?= $user["roles"]; ?></td>
                            <td style="width: 17%; text-align: center;">
                              <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="?page=users-details&id=<?= $user["id_user"]; ?>">Edit</a>
                                  <a class="dropdown-item" onclick="return confirm('Apakah Ingin Menghapus <?= $user['name'] ?> ?')" href="?page=users-delete&id=<?= $user["id_user"]; ?>">Hapus</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php $no++ ?>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
