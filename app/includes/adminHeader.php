





    <header class="header">
      <nav class="nav">
          <div class="nav-bar">

          <span class="logo navLogo"><a href="<?php echo BASE_URL . 'index.php' ?>"><img src="../../assets/img/M-.png" alt="" style="width: 100px; height: 100px;"></a></span>

              <div>
                  <div class="logo-toggle">
                      <!-- <span class="logo"><a href="<?php echo BASE_URL . 'index.php' ?>"><img src="../assets/img/M-.png" alt="" style="width: 100px; height: 100px;"></a></span> -->
                      <!-- <i class="fa fa-xmark siderbarClose"></i> -->
                  </div>


                  <?php if (isset($_SESSION['id'])): ?>
                  <ul class="nav-links">
                        <div class="btn-group dropstart">
                          <button type="button" class="btn dropdown-toggle text-light fixDrop" data-bs-toggle="dropdown" aria-expanded="false">
                          <?php echo $_SESSION['username']; ?>
                          </button>
                          <ul class="dropdown-menu" style="background-color: #303036;">
                          <?php if($_SESSION['admin'] == 1): ?>
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo BASE_URL . 'index.php' ?>">Store</a></li>
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo admin_URL . 'dashboard.php' ?>">dashboard</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item text-danger headlinks" href="<?php echo BASE_URL . 'logout.php' ?>">Logout</a></li>
                          </ul>
                        </div>
                      </li>
                  </ul>
                  <?php endif; ?>

                  </div>

                  <ul class="nav-links">
                        <div class="btn-group dropstart">
                          <button type="button" class="btn dropdown-toggle text-light fixDrop" data-bs-toggle="dropdown" aria-expanded="false">
                          Sections
                          </button>
                          <ul class="dropdown-menu" style="background-color: #303036;">
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo BASE_URL . 'admin/products/index.php' ?>">Manage Products</a></li>
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo BASE_URL . 'admin/categories/index.php' ?>">Manage Categories</a></li>
                            <li><a class="dropdown-item text-light headlinks" href="<?php echo BASE_URL . 'admin/users/index.php' ?>">Manage Users</a></li>
                          </ul>
                        </div>
                      </li>
                  </ul>
              
              <!-- <i class="fa fa-bars sidebarOpen"></i> -->
          </div>
      </nav>
    </header>
    