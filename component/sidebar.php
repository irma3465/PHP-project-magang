
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="assets/images/faces/face28.png">
          </div>
          <div class="user-name">
              <?php echo $_SESSION['nama']; ?>
          </div>
          <div class="user-designation">
              Developer
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pages/prodi/index">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Prodi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pages/kategori/index">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pages/product/index">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Product</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pages/fakultas/index">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Fakultas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pages/jurusan/index">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Jurusan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pages/prodi/index">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Prodi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pages/dosen/index">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dosen</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pages/mata_kuliah/index">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Mata Kuliah</span>
            </a>
          </li>
          
        </ul>
      </nav>