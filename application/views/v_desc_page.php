<!DOCTYPE html>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php
  if ($get_app_join_where->num_rows() > 0) {
    foreach ($get_app_join_where->result() as $row) {
  ?>
      <title><?php echo $row->appname ?></title>
      <style>
        me {
          padding: 70px;
        }
      </style>
</head>

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
          <!-- Page Heading -->
          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">


              <!-- Main Content -->
              <div id="content">

                <!-- Begin Page Content -->
                <div class="container">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-10 text-gray-800 font-weight-bold">Apps</h1>

                  <div class="col-md-12 col-md-6 mb-5">
                    <div class="row align-items-center">
                      <span class="icon">
                        <img src="<?php echo $row->appsicon ?>" width="auto" height="80">
                      </span>



                      <div class="col mr-2 my-2">
                        <div class="font-weight-bold text-dark text-uppercase mb-sm-1"><?php echo $row->appname ?></div>
                        <div class="text-xs h5 mb-0 font-weight-bold text-gray-800"><?php echo $row->appdate ?></div>
                      </div>
                      <?php if ($this->session->userdata('logged_in')) { ?>
                        <div class="my-2">
                          <a href="<?= base_url('desc_page/download') ?>" class="btn btn-dark btn-icon-split btna">
                            <span class="">Unduh</span>
                          </a>
                            <?php if($get_fav>=1){ ?>
                          <div class="my-2"></div>
                          <a href="<?= base_url('favorit/batal/').$row->idapp?>" class="btn btn-dark btn-icon-split btna">
                            <span class="">Batalkan Favorit</span>
                          </a>
                        </div>
                      <?php } else { ?>
                          <div class="my-2"></div>
                          <a href="<?= base_url('favorit/tambah/').$row->idapp?>" class="btn btn-dark btn-icon-split btna">
                            <span class="">Favorit</span>
                          </a>
                        </div>
                   <?php   }} else {
                      ?>
                        <div class="btn">
                          <a href="<?= base_url('login') ?>" class="btn btn-primary">Login Here To Download The Application</a>
                        </div>
                      <?php } ?>
                    </div>

                <?php }
            } ?>

            <br>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Screenshots</div>

                <!--SCREENSHOT-->
                <div>



                  <div id="demo" class="carousel slide" data-ride="carousel" style="padding-top: 20px;">
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                      <li data-target="" data-slide-to="2"></li>
                    </ul>

                    <div class="carousel-inner">
                    <?php
                    $counter = 1;
                    if ($get_ss->num_rows() > 0) {
                      foreach ($get_ss->result() as $row) {
                        
                    ?>
                          <div id="carousel" class="carousel-item <?php if($counter <= 1){echo " active"; } ?>">

                            <picture>
                              <source srcset="<?php echo $row->screenshot ?>" media="(min-width: 1400px)">
                              <source srcset="<?php echo $row->screenshot ?>" media="(min-width: 769px)">
                              <source srcset="<?php echo $row->screenshot ?>" media="(min-width: 577px)">
                              <img srcset="<?php echo $row->screenshot ?>" alt="responsive image" class="d-block img-fluid">
                            </picture>

                          </div>
                          <?php
    $counter++;
    }
?>
  <?php  }?>

                      <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </a>
                      <!-- </div> -->
                    </div>




                    <div class="card-body"></div>
                    <?php
                    if ($get_app_join_where->num_rows() > 0) {
                      foreach ($get_app_join_where->result() as $row) {
                    ?>

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-sm-md mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-s font-weight-bold text-dark text-uppercase mb-1">Kategori</div>
                                    <?php
                                    if ($getappcat->num_rows() > 0) {
                                      foreach ($getappcat->result() as $row7) {
                                    ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><hr><?php echo $row7->namacat ?><hr></div>
                                    <?php }
                                    } ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        <div class="row">
                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-l font-weight-bold text-dark text-uppercase mb-1">Pembuat</div>
                                    <div class="text-xs h5 mb-0 font-weight-bold text-gray-800"><?php echo $row->namadev ?></div>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>



                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-s font-weight-bold text-dark text-uppercase mb-1">Penilaian</div>
                                    <div class="row no-gutters align-items-center">
                                      <div class="col-auto">
                                        <?php
                                        if ($getratenumber->num_rows() > 0) {
                                          foreach ($getratenumber->result() as $row8) {
                                        ?>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format($row8->rating, 1) ?></div>
                                      </div>
                                      <div class="col">
                                        <div class="progress progress-sm mr-2">
                                          <div class="progress-bar bg-dark" role="progressbar" style="width: <?php echo number_format($row8->rating, 1) / 5 * 100;
                                                                                                              echo "%"; ?>" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100 "></div>
                                        </div>
                                    <?php }
                                        } ?>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                          if ($get_version->num_rows() > 0) {
                            foreach ($get_version->result() as $row2) {
                          ?>
                              <!-- Pending Requests Card Example -->
                              <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-dark shadow h-100 py-2">
                                  <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="text-s font-weight-bold text-dark text-uppercase mb-1">Versi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row2->versi ?></div>
                                      </div>
                                      <div class="col-auto">
                                        <i class="fab fa-android fa-2x text-gray-300"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    <?php }
                          } ?>


                    <!-- Deskripsi -->
                    <div class="card shadow col-md mb-4 mr-4">
                      <a href="#collapseCardDesc" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardDesc">
                        <h6 class="m-0 font-weight-bold text-dark">Deskripsi</h6>
                      </a>
                      <div class="collapse show" id="collapseCardDesc">
                        <div class="card-body">
                          <?php echo $row->appdesc  ?>
                        </div>
                      </div>
                    </div>

                    <?php if ($this->session->userdata('logged_in')) { ?>
                            <div class="">
                              <button type="button" class="btn btn-primary btn-block btn-lg mb-4" data-toggle="modal" data-target="#Rating">
                                <span class="text-l">Rate This App</span>
                              </button>
                            </div>
                          <?php } else {
                          ?>
                            <div class="">
                              <a type="button" href="<?= base_url('login') ?>" class="btn btn-primary btn-block btn-lg mb-4">
                                <span class="text-l text-white">Login Here to Rate this Application</span>
                              </a>
                            </div>
                          <?php } ?>
                    <!-- Review -->
                    <div class="card shadow col-md mb-4 mr-4">

                      <a href="#collapseCardExamplee" class=" d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExamplee">
                        <h6 class="m-0 font-weight-bold text-dark">Review</h6>
                      </a>
                      <div class="collapse show" id="collapseCardExamplee">
                        <div class="card-body">


                          <div class="text-l font-weight-bold text-dark  mb-1">Comments:</div>
                          <hr class="divider">
                          <?php
                          if ($get_review->num_rows() > 0) {
                            foreach ($get_review->result() as $row4) {
                          ?>
                              <div class="p-2 hover">

                                <div class="text-l font-weight-bold text-dark  mb-1"><?php echo $row4->user ?></div>
                                <div class="text ml-2"><?php echo $row4->comment ?></div>
                                <hr class="divider">
                              </div>

                          <?php
                            }
                          }
                          ?>
                        </div>
                      </div>
                    </div>

                    <!-- Collapsable Card Example -->
                    <div class="card shadow col-md mb-4 mr-4">
                      <!-- Card Header - Accordion -->
                      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-dark">Change Log</h6>
                      </a>
                      <?php
                        if ($getupdateinfo->num_rows() > 0) {
                          foreach ($getupdateinfo->result() as $row3) {
                      ?>

                          <!-- Card Content - Collapse -->
                          <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">


                              <div class="text ml-4 font-weight-bold"><?php $date =  $row3->tanggal_log;
                                                                      $convertDate = date("d-m-Y", strtotime($date));
                                                                      echo $convertDate; ?>
                              </div>
                              <div class="text ml-5 mt-2"><?php echo $row3->deskripsi; ?></div>
                              <hr class="divider">
                            </div>

                          </div>
                      <?php
                          }
                        }
                      ?>
                    </div>


                  </div>
                </div>
                  </div>


                  <!-- /.container-fluid -->
              <?php
                      }
                    }
              ?>
                </div>
              </div>
            </div>
          </div>
        </div>
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