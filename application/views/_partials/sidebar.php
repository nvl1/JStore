    <!-- Sidebar -->

    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">



      <!-- Sidebar - Brand -->

      <div class="icon text-center m-3 ">

        <span class="icon">

          <img class="img-fluid" src="assets/logos/_umum/BLACK BG.png" width="200">

        </span>

      </div>

      <?php

      if ($this->session->userdata('logged_in')) {

      ?>



        <!-- Profile User -->

        <div class="p-3">

          <div class="container-fluid bg-white rounded">

          <hr class="sidebar-divider">

            <div class="image">

              <img src="<?= $this->session->userdata('foto') ?>" class="rounded img-fluid"></img>

            </div>

            

            <div class="a text-dark nav-link">

              <span class="center bold"><?= $this->session->userdata('nama') ?></span>

            </div>

          </div>

        </div>

        <!-- End Of Profile User -->



        <li class="nav-item">

          <a class="nav-link" data-toggle="modal" data-target="#logoutModal">

            <i class="fas fa-fw fa-sign-out-alt"></i>

            <span>Log Out</span>

          </a>

        </li>

      <?php

      } else {

      ?>

        <li class="nav-item">

          <a class="nav-link" href="<?= base_url('login') ?>">

            <i class="fas fa-fw fa-sign-out-alt"></i>

            <span>Log In</span>

          </a>

        </li>

      <?php

      }

      ?>



      <!-- Divider -->

      <hr class="sidebar-divider my-0">



      <?php
      if ($this->session->userdata('logged_in')) {
      if ($this->session->userdata('Creator')) {

      ?>

        <!-- Nav Item - Dashboard -->

        <li class="nav-item active">

          <a class="nav-link" href="<?= base_url('creator_page') ?>">

            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Home </span>

          </a>

        </li>

        <!-- Divider -->

        <hr class="sidebar-divider">

        <!-- Heading -->

        <div class="sidebar-heading">

          Menu

        </div>



        <li class="nav-item">

          <a class="nav-link" href="<?= base_url('tambah_apps') ?>">

            <i class="fas fa-fw fa-plus"></i>

            <span>Tambah Aplikasi</span>

          </a>

          <a class="nav-link" href="<?= base_url('setting_creator') ?>">

            <i class="fas fa-fw fa-cog"></i>

            <span>Update Data Creator</span>

          </a>

        </li>

      <?php

      } else { ?>

        <!-- Nav Item - Dashboard -->

        <li class="nav-item active">

          <a class="nav-link" href="<?= base_url('welcome') ?>">

            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Home </span>

          </a>

        </li>

        <!-- Divider -->

        <hr class="sidebar-divider">

        <!-- Heading -->

        <div class="sidebar-heading">

          Menu

        </div>



        <li class="nav-item">
            
            

           <a class="nav-link" href="<?php echo base_url('req') ?>">
           
           <i class="fas fa-fw fa-plus"></i>
           
            <span>Request</span>

          </a>
             

        </li>
        
        <li class="nav-item">
            
            

           <a class="nav-link" href="<?php echo base_url('favorit') ?>">
           
           <i class="far fa-star"></i>
           
            <span>Favorit</span>

          </a>
             

        </li>
        
        <!-- <li class="nav-item">-->

        <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->

        <!--    <i class="fas fa-fw fa-cog"></i>-->

        <!--    <span>Categories</span>-->

        <!--  </a>-->

        <!--  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->

        <!--    <div class="bg-white py-2 collapse-inner rounded">-->

        <!--      <h6 class="collapse-header">Custom Components:</h6>-->
        <!--    </div>-->

        <!--  </div>-->

        <!--</li>-->

      <?php }} else { ?>
      <!-- Nav Item - Dashboard -->

        <li class="nav-item active">

          <a class="nav-link" href="<?= base_url('welcome') ?>">

            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Home </span>

          </a>

        </li>

        <!-- Divider -->

        <!--<hr class="sidebar-divider">-->

        <!-- Heading -->

        <!--<div class="sidebar-heading">-->

        <!--  Menu-->

        <!--</div>-->



        <!--<li class="nav-item">-->

        <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->

        <!--    <i class="fas fa-fw fa-cog"></i>-->

        <!--    <span>Categories</span>-->

        <!--  </a>-->

        <!--  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->

        <!--    <div class="bg-white py-2 collapse-inner rounded">-->

        <!--      <h6 class="collapse-header">Custom Components:</h6>-->
        <!--    </div>-->

        <!--  </div>-->

        <!--</li>-->
      <?php
      }
      ?>



      <!-- Nav Item - Utilities Collapse Menu -->



      <!-- Divider -->

      <hr class="sidebar-divider d-none d-md-block">



      <!-- Sidebar Toggler (Sidebar) -->

      <div class="text-center d-none d-md-inline">

        <button class="rounded-circle border-0" id="sidebarToggle"></button>

      </div>



    </ul>

    <!-- End of Sidebar -->