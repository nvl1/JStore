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
            <p class="login-box-msg">Update Data Creator</p>
            <?php echo form_open_multipart('setting_creator/update'); ?>            
            <div class="col-sm-md">
            <div class="form-group">
            <label for="kategori">ID</label>
            <input type="text" id="id" name="id" class="form-control" value="<?=$this->session->userdata("username") ?>" readonly>
            </div>
          </div>
          <div class="col-sm-md">
          <div class="form-group">
            <label for="kategori">Username</label>
            <input type="text" id="user" name="user" class="form-control" value="<?=$this->session->userdata("id") ?>">
            </div>          
            <div class="col-sm-md">
            <div class="form-group">
            <label for="kategori">Nama Lengkap</label>
              <input type="text" id="nama" name="nama" class="form-control" value="<?=$this->session->userdata("nama") ?>" readonly>
              </div>
            </div>
            <div class="col-sm-md">
            <div class="form-group">
            <label for="kategori">Password</label>
              <input type="password" id="password" name="password" class="form-control" value="<?=$this->session->userdata("password") ?>" maxlength="255">
              </div>
            </div>
            <div class="col-sm-md">
            <div class="form-group">
            <label for="kategori">Email</label>
              <input type="email" id="email" name="email" class="form-control" value="<?=$this->session->userdata("email") ?>" maxlength="255">
              </div>
            </div>
            <div class="col-sm-md">
              <div class="form-group">
                <label for="kategori">Tanggal lahir</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?=$this->session->userdata("tanggal") ?>" readonly>
              </div>
            </div>

            <div class="col-sm-md">
            <div class="form-group">
              <h5>Foto Profil User</h5>
              <input type='file' id="userfile" name="userfile" size="20" />
            </div>
            </div>

            <!-- /.col -->
            <div class="col-sm-md">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Update Data</button>
            </div>
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