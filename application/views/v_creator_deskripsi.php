<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/plugins.php") ?>
  <?php
  if ($get_Creatorapp->num_rows() > 0) {
    foreach ($get_Creatorapp->result() as $row) {
  ?>
      <title><?php echo $row->nama ?></title>
      <style>
        me {
          padding: 70px;
        }
      </style>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php $this->load->view("_partials/sidebar.php") ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php $this->load->view("_partials/topbar.php") ?>

          <!-- Page Heading -->


          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">


              <!-- Main Content -->
              <div id="content">

                <!-- Begin Page Content -->
                <div class="container">
      <?php }}?>
      
                
                <div>
                  <div id="demo" class="carousel slide" data-ride="carousel" style="padding-top: 20px;">
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
                          <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </a>
                      <!-- </div> -->
                    </div>
                          <a href="<?= base_url() ?>tambah_ss?id=<?php echo $row->id ?>" class="btn btn-dark btn-icon-split">

                          <span class="">Upload Screenshot</span>
                        </a>
            <div class="row">
            </div>   
        <?php } else {?>
          <a href="<?= base_url() ?>tambah_ss?id=<?php echo $row->id ?>" class="btn btn-dark btn-icon-split">
                          <span class="">Upload Screenshot</span>
                        </a>
            <div class="row">
            </div>
        <?php }?>

                      

        

                  <!-- Page Heading -->                  
                  <?php
                  if ($get_Creatorapp->num_rows() > 0) {
                   foreach ($get_Creatorapp->result() as $row) {
                  ?>
                  <div class="col-md-12 col-md-6 mb-6">
                    <div class="row align-items-center">
                      <span class="icon">
                        <img src="<?php echo $row->icon ?>" width="auto" height="80">
                      </span>



                      <div class="col mr-2 my-2">
                        <div class="font-weight-bold text-dark text-uppercase mb-sm-1"><?php echo $row->nama ?></div>
                        <div class="text-xs h5 mb-0 font-weight-bold text-gray-800"><?= $this->session->userdata('nama')?>
                        </div>
                      </div>                        
                      <div class="my-2">
                        <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-icon-split btna">

                          <span class="">Hapus Aplikasi</span>
                        </button>
                        <div class="my-2"></div>
                        <a href="<?= base_url() ?>update_apps?id=<?php echo $row->id ?>" class="btn btn-dark btn-icon-split btna">

                          <span class="">Update Aplikasi</span>
                        </a>
                        <div class="my-2"></div>
                        <a href="<?= base_url() ?>update_apk?id=<?php echo $row->id ?>" class="btn btn-dark btn-icon-split btna">

                          <span class="">Update Apk</span>
                        </a>
                      </div>
                     
                      </div>
                    </div>

                          <!-- Default Card Example -->                         
                      <div>
                        
                      <?php                                                                                                                         
                   }}
                        ?>
                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-sm-md mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-l font-weight-bold text-dark text-uppercase mb-1">Kategori</div>
                                    <?php
                                    if ($getappcat->num_rows() > 0) {
                                      foreach ($getappcat->result() as $row7) {
                                    ?>
                                    <div class="text-xs h5 mb-0 font-weight-bold text-gray-800"><hr><?php print_r($row7->namacat) ?><hr></div>
                                    <?php }
                                    } ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-l font-weight-bold text-dark text-uppercase mb-1">Tanggal Dibuat</div>
                                    <div class="text-xs h5 mb-0 font-weight-bold text-gray-800"><?php print_r($row->date_created)?></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-l font-weight-bold text-dark text-uppercase mb-1">Rata - Rata Review</div>
                                    <div class="text-xs h5 mb-0 font-weight-bold text-gray-800"><?php print_r(number_format($avgrate,1)) ?></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-l font-weight-bold text-dark text-uppercase mb-1">Versi APK</div>
                                    <div class="text-xs h5 mb-0 font-weight-bold text-gray-800"><?php print_r($maxversi) ?></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                    <div class="text-l font-weight-bold text-dark text-uppercase mb-1">Size APK</div>
                                    <div id="size" class="text-xs h5 mb-0 font-weight-bold text-gray-800"><?php print_r($maxsize) ?> Bytes</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>

                    <div class="card shadow col-md mb-4 mr-4">
                      <a href="#collapseCardDesc" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardDesc">
                        <h6 class="m-0 font-weight-bold text-dark">Deskripsi</h6>
                      </a>
                      <div class="collapse show" id="collapseCardDesc">
                        <div class="card-body">
                        <?php print_r($row->description) ?>
                        </div>
                      </div>
                    </div>
                      </div>


                      <!-- /.container-fluid --> 
                    </div>
                    <!-- End of Main Content -->

<!-- DELETE MODAL-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabesl" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Aplikasi yang anda hapus tidak dapat dikembalikan</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn btn-danger" id="btn-delete" href="<?= base_url('').'creatorapp/delete/'.$row->id?>">Hapus</a>
    </div>
  </div>
</div>
</div>
<!-- END OF DELETE MODAL -->

                    <?php $this->load->view("_partials/footer.php") ?>
                    <?php $this->load->view("_partials/modals.php") ?>
                    <?php $this->load->view("_partials/scripts.php") ?>

</body>

</html>