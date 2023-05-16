
<header class="header">
  <nav class="nav">
      <div class="nav-bar">
          <div class="icons">
              <div class="searchBox">
                  <div class="searchToggle">
                    <i class="fa-solid fa-x cancel"></i>
                    <i class="fa-solid fa-magnifying-glass search"></i>
                  </div>

                    <div class="search-field">
                      <form method="GET" action="index.php">
                        <input class="form-control me-2" type="text" name="search" placeholder="search..." aria-label="Search" required>
                        <button class="btn" type="submit"><i class="fa fa-magnifying-glass"></i></button>
                      </form>
                    </div>
                </div>
                
                <div class="fonticons">
                  <a href="#"><i class="fa fa-heart text-light"></i></a>
                  <a href="#"><i class="fa fa-user text-light"></i></a>
                  <a href="<?php echo BASE_URL . 'cart.php' ?>"><i class="fa fa-cart-shopping text-light"></i></a>
              </div>
          </div>

          <div class="menu">
              <div class="logo-toggle">
                  <span class="logo"><a href="<?php echo BASE_URL . 'index.php' ?>"><img src="assets/img/M-.png" alt="" style="width: 100px; height: 100px;"></a></span>
                  <i class="fa fa-xmark siderbarClose"></i>
              </div>

              <ul class="nav-links">
                  <li><a href="<?php echo BASE_URL . 'index.php' ?>">Home</a></li>
                  <li><a href="<?php echo BASE_URL . 'about.php' ?>">About</a></li>

                  <?php if (isset($_SESSION['id'])): ?>
                  <li><a href="<?php echo BASE_URL . 'cart.php' ?>">View Cart</a></li>
                  <li><a href="<?php echo BASE_URL . 'orders.php' ?>">My Orders</a></li>
                  <li>
                    <div class="btn-group dropstart">
                      <button type="button" class="btn dropdown-toggle text-light fixDrop" data-bs-toggle="dropdown" aria-expanded="false">
                      <?php echo $_SESSION['username']; ?>
                      </button>
                      <ul class="dropdown-menu" style="background-color: #303036;">
                      <?php if($_SESSION['admin'] == 1): ?>
                        <li><a class="dropdown-item text-light headlinks" href="admin/dashboard.php">dashboard</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item text-light headlinks" href="logout.php">logout</a></li>
                      </ul>
                    </div>
                  </li>
                  <?php else: ?>
                  <li><a href="login.php">Log In</a></li>
                  <li><a href="register.php">Register</a></li>
                  <?php endif; ?>
              </ul>
          </div>

          <span class="logo navLogo"><a href="<?php echo BASE_URL . 'index.php' ?>"><img src="assets/img/M-.png" alt="" style="width: 100px; height: 100px;"></a></span>
          <i class="fa fa-bars sidebarOpen"></i>
      </div>
  </nav>
</header>