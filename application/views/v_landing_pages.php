<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/plugins.php") ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php $this->load->view("_partials/sidebar.php") ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php $this->load->view("_partials/topbar.php") ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-10 text-gray-800">Anda mungkin ingin melihat</h1>
          </div>

          <?php $this->load->view("_partials/screenshots.php") ?>

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-10 text-gray-800">Apps</h1>
            </div>
            <!-- Content Row -->
            <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              <?php
              if ($get_app->num_rows() > 0) {
                foreach ($get_app->result() as $row) {
              ?>
                  <div class="col-md-2 mb-2 ">
                    <a style="text-decoration:none" href="<?= base_url() ?>desc_page?id=<?php echo $row->idapp ?>" class="img">
                      <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="cd h5 mb-0 font-weight-bold text-gray-800"><?php echo $row->appname ?></div>
                              <span class="text-dark text-xs font-weight-bold mb-1"><?php echo $row->namadev ?></span>
                            </div>
                            <div class="col-auto">
                              <img src=<?php echo $row->appsicon ?> class="col-auto mt-2  " alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php

                }
              } else {
                ?>

              <?php
              }
              ?>
            </div>
          </div>
          <!-- /.container-fluid -->
          <!-- End of Main Content -->

          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
          </a>
        </div>
        <?php $this->load->view("_partials/footer.php") ?>
        <?php $this->load->view("_partials/modals.php") ?>
        <?php $this->load->view("_partials/scripts.php") ?>



</body>

</html>