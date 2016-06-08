<?php $this->load->view('master/headeradmin'); ?>

      <aside>
          <div id="sidebar"  class="nav-collapse ">
            <?php $this->load->view('master/navadmin'); ?>
          </div>
      </aside>

      <section id="main-content">
          <section class="wrapper">

            <div class="row">
              <div class="col-lg-9">

                <div class="row mt">
                  <div class="col-lg-12"> 
                    <div class="form-panel">
                        <?php if ($this->session->flashdata('info')): ?>
                        <div class="alert"><?php echo $this->session->flashdata('info'); ?></div>
                        <?php endif; ?>
                        <center><h4 class="mb"><i class="fa"></i>Akun Dosen</h4></center>

                       <?php echo form_open(); ?> 
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>"></input>
                                </div>
                        </div><br><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>"></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nip" class="form-control" value="<?php echo set_value('nip'); ?>"></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>"></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                            <center><input type="submit" class="btn btn-primary" name="submit" value="Buat"></input></center>
                        </div>  
                      <?php echo form_close(); ?>
                    </div>
                  </div> 
                </div>
              </div><!-- /col-lg-9 END SECTION MIDDLE -->              
                  
              <div class="col-lg-3 ds">
                   <?php $this->load->view('master/kalender'); ?> 
              </div><!-- /col-lg-3 -->
          </div><! --/row -->
      </section>
  </section>

      <!--main content end-->
      <!--footer start-->
<?php $this->load->view('master/footer'); ?>  