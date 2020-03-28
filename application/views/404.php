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
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
      <?php $this->load->view("_partials/topbar.php") ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Halaman tidak dapat ditemukan</p>
            <p class="text-gray-500 mb-0">Sepertinya halaman yang anda cari hilang atau lenyap bisa dibuktikan dengan angka 404 yang anda lihat goyang - goyang</p>
            <a href="<?= base_url('welcome') ?>">&larr; Kembali ke halaman utama</a>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php $this->load->view("_partials/footer.php") ?>
  <?php $this->load->view("_partials/modals.php") ?>
  <?php $this->load->view("_partials/scripts.php") ?>

</body>

</html>