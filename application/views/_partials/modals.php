          <!-- SELECT LOGIN MODAL -->

          <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabela" aria-hidden="true">

            <div class="modal-dialog" role="document">

              <div class="modal-content">

                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Silahkan pilih</h5>

                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                  </button>

                </div>

                <div class="modal-body">Silahkan pilih salah satu</div>

                <div class="modal-footer">

                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                  <button class="btn btn-warning" type="button" data-toggle="modal" data-dismiss="modal" data-target="#loginuserModal">User</button>

                  <button class="btn btn-primary" type="button" data-toggle="modal" data-dismiss="modal" data-target="#logincreatorModal">Creator</button>

                </div>

              </div>

            </div>

          </div>

          <!-- END SELECT LOGIN MODAL-->



          <!-- LOGIN USER MODAL -->

          <div class="modal fade" id="loginuserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabela" aria-hidden="true">

            <div class="modal-dialog" role="document">



              <div class="modal-content">

                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>

                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                  </button>

                </div>

                <div class="modal-body">

                  <div class="form-group row">

                    <label class="col-md-2 col-form-label">Username</label>

                    <div class="col-md-10">

                      <input type="text" name="username" id="username" class="form-control" pattern=".[a-z0-9_-]{3,10}" title="Three or more characters/no other symbol allowed except - and _" placeholder="Masukkan Username" required autofocus>

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-md-2 col-form-label">Password</label>

                    <div class="col-md-10">

                      <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password anda dengan betul" required>

                    </div>

                  </div>

                  <!-- TOAST-->

                  <div class="toast" data-delay="3000" data-autohide="true" role="alert">

                    <div class="toast-header" id="errmessage">

                    </div>

                  </div>

                  <!-- END TOAST-->

                  <?php echo $this->session->flashdata('err_message'); ?>

                </div>

                <div class="modal-footer">

                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                  <button type="submit" class="btn btn-primary btn-block" name="but_log" id="but_log" onclick="show_toast();">Sign In</button>

                </div>

              </div>

            </div>

          </div>

          <!-- END LOGIN USER MODAL-->



          <!-- LOGIN CREATOR MODAL -->

          <div class=" modal fade" id="logincreatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabela" aria-hidden="true">

            <div class="modal-dialog" role="document">

              <div class="modal-content">

                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>

                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                  </button>

                </div>

                <div class="modal-body">

                  <div class="form-group row">

                    <label class="col-md-2 col-form-label">Username</label>

                    <div class="col-md-10">

                      <input type="text" name="username2" id="username2" class="form-control" placeholder="Masukkan Username">

                    </div>

                  </div>

                  <div class="form-group row">

                    <label class="col-md-2 col-form-label">Password</label>

                    <div class="col-md-10">

                      <input type="password" name="password2" id="password2" class="form-control" placeholder="Masukkan Password anda dengan betul">

                    </div>

                  </div>

                </div>

                <div class="modal-footer">

                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                  <a class="btn btn-primary" href="<?= base_url('login/logout') ?>">Login as Creator</a>

                </div>

              </div>

            </div>

          </div>

          <!-- END LOGIN CREATOR MODAL-->



          <!--MODAL ERROR MESSAGE-->



          <!--END OF MODAL ERROR MESSAGE-->



          <!-- LOGOUT MODAL-->

          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabesl" aria-hidden="true">

            <div class="modal-dialog" role="document">

              <div class="modal-content">

                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>

                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                  </button>

                </div>

                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>

                <div class="modal-footer">

                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                  <a class="btn btn-primary" href="<?= base_url('login/logout') ?>">Logout</a>

                </div>

              </div>

            </div>

          </div>

          <!-- END LOGOUT MODAL -->



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

                  <a class="btn btn-danger" id="btn-delete" href="#">Hapus</a>

                </div>

              </div>

            </div>

          </div>

          <!-- END OF DELETE MODAL -->

          <!-- RATING MODAL -->

          <div class="modal fade" id="Rating" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabesl" aria-hidden="true">

            <div class="modal-dialog" role="document">

              <div class="modal-content">

                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabesl">Rate this APP</h5>

                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                  </button>

                </div>



                <form action="<?= base_url('desc_page/rate') ?>" method="post">

                  <div class="modal-body">



                    <div class="text">Give Rate From 1 to 5</div>

                    <label class="radio-inline ">

                      <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> 1

                    </label>

                    <label class="radio-inline">

                      <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2"> 2

                    </label>

                    <label class="radio-inline">

                      <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3"> 3

                    </label>

                    <label class="radio-inline">

                      <input type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4"> 4

                    </label>

                    <label class="radio-inline">

                      <input type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5"> 5

                    </label>

                    <hr class="divider">

                    <div class="text">Comment</div>

                    <textarea name="txtcomment" id="txtcomment" cols="50" rows="5" placeholder="Enter Your Comment here!"></textarea>



                  </div>



                  <div class="modal-footer">

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <button class="btn btn-primary" type="submit">Rate!</button>

                  </div>

                </form>

              </div>

            </div>

          </div>

          <!-- END RATING MODAL -->