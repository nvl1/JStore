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
        <?php
        if ($get_Creatorapp->num_rows() > 0) {
          foreach ($get_Creatorapp->result() as $row) {                                    
          }
        }
        ?>
        <!-- Page Heading -->
        <div class="card">
          <div class="card-body register-card-body">
          <div class="form-group">
          <a href="<?= base_url() ?>creatorapp?id=<?php echo $row->id ?>?>"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
            <p class="login-box-msg">Update Aplikasi</p>
            <?php echo form_open_multipart('update_apk/update'); ?>            
            <div class="col-sm-md">
            <label for="kategori">ID Aplikasi</label>
            <div class="form-group">
            <input type="text" id="id" name="id" class="form-control" value="<?=$row->id?>" placeholder="<?=$row->id?>" readonly>
          </div>
      </div>   
          <div class="col-sm-md">
          <div class="form-group">
            <label for="kategori">Deskripsi Update</label>
              <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi Update" maxlength="255">
            </div>
      </div>
            <div class="col-sm-md">
            <div class="form-group">
            <label for="kategori">Versi Aplikasi</label>
              <input type="text" id="versi" name="versi" class="form-control" value="<?= $maxversi ?>" maxlength="255">
            </div>
      </div>
            <div class="col-sm-md">
              <div class="form-group">
              <h5>APK Aplikasi</h5>
              <input type='file' id="APKfile" name="APKfile" size="100" />
            </div>
      </div>
            <!-- /.col -->
            <div class="col-sm-md">
              <button type="submit" class="btn btn-primary btn-block">Update Apk</button>
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