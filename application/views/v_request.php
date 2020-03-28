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



            <p class="login-box-msg">Request Form</p>

            <?php echo form_open_multipart('req/tambah'); ?> 



            <div class="col-sm-md"> 

            <div class="form-group">      

            <label for="kategori">Pilih Kategori</label>          

            <select class="form-control" name="kategori" id="kategori">            

            <?php

            foreach ($get_cat->result() as $value) {

                echo "<option value='$value->nama'>$value->nama</option>";

            }

            ?>

            </select>

            </div>

            </div>

            

            <div class="col-sm-md">

            <div class="form-group">

                <label for="kategori">Subjek Permintaan</label>

                <input type="text" id="subject" name="subject" class="form-control" placeholder="Subjek permintaan seperti kategori baru, aplikasi baru, atau hal baru lainnya"></textarea>

            </div>

            </div>



            <div class="col-sm-md">

            <div class="form-group">

                <label for="kategori">Teks Permintaan</label>

                <textarea id="reqtext" name="reqtext" class="form-control" placeholder="Sebutkan request anda"></textarea>

            </div>

            </div>



            <!-- /.col -->

            <div class="col-sm-md">

            <div class="form-group">

              <button type="submit" class="btn btn-primary btn-block">Post</button>

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