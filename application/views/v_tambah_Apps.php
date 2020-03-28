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
            <!-- Page Heading -->
            <div class="card">
      <div class="card-body register-card-body">
      <div class="form-group">
          <a href="javascript:window.history.go(-1);"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        <p class="login-box-msg">Tambah Aplikasi</p>
        <?php echo form_open_multipart('tambah_apps/tambah'); ?>
        <div class="col-sm-md">
        <div class="form-group">
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Aplikasi">
            </div>
            </div>
          <div class="col-sm-md">
          <div class="form-group">
            <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi Aplikasi" maxlength="255">
          </div>
          </div>
          <div class="col-sm-md">
          <div class="form-group">
            <input type="text" id="versi" name="versi" class="form-control" placeholder="Versi Aplikasi" maxlength="255">
          </div>
          </div>               
          <div class="col-sm-md">   
          <div class="form-group">   
          <label for="kategori">Pilih Kategori</label>          
            <select class="bootstrap-select" name="kategori[]" id="kategori" multiple required data-live-search="true">            
            <?php
            foreach ($get_cat->result() as $value) {
                echo "<option value='$value->id'>$value->nama</option>";
            }
            ?>
            </select>
          </div>
          </div>          
          <div class="col-sm-md">
          <div class="form-group">
            <h5 >Ikon Aplikasi</h5>
            <input type='file' id="userfile" name="userfile" size="20" />            
          </div>
          </div>
          <div class="col-sm-md">
          <div class="form-group">
            <h5 >APK Aplikasi</h5>
            <input type='file' id="APKfile" name="APKfile" size="100"/>            
          </div>
          </div>
            <!-- /.col -->
            <div class="col-sm-md">
              <button type="submit" class="btn btn-primary btn-block">Tambah Aplikasi</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        </div>
        </div>
          <!-- /.container-fluid -->
          <!-- End of Main Content -->

          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
          </a>

<?php $this->load->view("_partials/footer.php") ?>
<?php $this->load->view("_partials/modals.php") ?>
<?php $this->load->view("_partials/scripts.php") ?>
            
</body>

</html>