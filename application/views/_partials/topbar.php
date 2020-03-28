        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-dark topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          
          <?php if($this->session->userdata('logged_in')) {
                    if ($this->session->userdata('Creator')) {  ?>
          <form action="<?php echo base_url('cari_apps')?>" action="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" id='cari' name='cari' placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-dark" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
              </div>
            </div>
          </form>
          <?php } else { ?>
          <form action="<?php echo base_url('cari_apps')?>" action="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" id='cari' name='cari' placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-dark" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
              </div>
            </div>
          </form>
          <?php } } else { ?>
          <form action="<?php echo base_url('cari_apps')?>" action="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" id='cari' name='cari' placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-dark" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
              </div>
            </div>
          </form>
          <?php }?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>

              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <?php if ($this->session->userdata('logged_in')) {
            ?>
            <?php } ?>
            <?php if ($this->session->userdata('Creator')) {  ?>
            <a class="dropdown-menu-lg-right" href="<?= base_url('creator_page') ?>">
              <span class="icon">
                <img class="a img-fluid" src="assets/logos/_umum/Telkom.png" width="80">
              </span>
            </a>
            </nav>
            <?php } else{ ?>
            <a class="dropdown-menu-lg-right" href="<?= base_url('welcome') ?>">
              <span class="icon">
                <img class="a img-fluid" src="assets/logos/_umum/Telkom.png" width="80">
              </span>
            </a>
        </nav>
            <?php }?>
        <?php $this->load->view("_partials/styles.php") ?>

        <!-- End of Topbar -->