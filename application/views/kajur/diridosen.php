<?php $this->load->view('master/headerkajur'); ?>

      <aside>
          <div id="sidebar"  class="nav-collapse ">
            <?php $this->load->view('master/navkajur'); ?>
          </div>
      </aside>

      <section id="main-content">
          <section class="wrapper">

            <div class="row">
              <div class="col-lg-9">

                <div class="row mt">
                  <div class="col-lg-12"> 
                    <div class="form-panel">
                        <center><h4 class="mb"><i class="fa"></i>Biodata</h4></center>

                       <?php echo form_open(); ?> 
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $editdata->nip; ?>" disabled></input>
                                </div>
                        </div><br><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $editdata->nama; ?>" class="form-control" disabled></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text"  value="<?php echo $editdata->jabatan; ?>" class="form-control" disabled></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $editdata->alamat; ?>" class="form-control" disabled></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $editdata->tempat_lahir; ?>" class="form-control" disabled></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" value="<?php echo $editdata->tanggal_lahir; ?>" class="form-control" disabled></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $editdata->email; ?>" class="form-control" disabled></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">No HP</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo $editdata->no_hp; ?>" class="form-control" disabled></input>
                                </div>
                        </div><br><br>
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