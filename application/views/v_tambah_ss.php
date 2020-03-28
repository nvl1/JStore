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

      <?php 
      if ($get_app->num_rows() > 0) {
        foreach ($get_app->result() as $row) {    
                                  
        }
      }
      ?>

<?php $this->load->view("_partials/topbar.php") ?>
            <!-- Page Heading -->
            <div class="card">
      <div class="card-body register-card-body">
      <div class="form-group">
          <a href="<?= base_url() ?>creatorapp?id=<?php echo $row->id ?>?>"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        <p class="login-box-msg">Tambah Aplikasi Screenshot</p>
        <?php echo form_open_multipart('tambah_ss/tambah'); ?>
        <label for="kategori">Id Aplikasi</label>  
        <div class="input-group mb-3">
            <input type="text" id="id" name="id" class="form-control" value="<?=$row->id?>" placeholder="<?=$row->id?>" readonly>
          </div>
          <div class="form-group mb-3">        
          <label for="kategori">Nama Screenshot</label>          
            <select class="form-control" name="nama" id="nama" >            
            <option value="Screenshot 1">Screenshot 1</option>
            <option value="Screenshot 2">Screenshot 2</option>
            <option value="Screenshot 3">Screenshot 3</option>
            <option value="Screenshot 4">Screenshot 4</option>
            <option value="Screenshot 5">Screenshot 5</option>
            </select>
          </div>                                      
          <div class="col-sm-md">
          <div class="form-group">
            <h5 >Screenshot Aplikasi</h5>
            <input type='file' id="userfile" name="userfile" size="20" />            
          </div>
          </div>
            <!-- /.col -->
            <div class="col-sm-md">
              <button type="submit" class="btn btn-primary btn-block">Tambah Screenshot</button>
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