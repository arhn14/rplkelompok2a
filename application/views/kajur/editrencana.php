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
                        <?php if ($this->session->flashdata('info')): ?>
                        <div class="alert"><?php echo $this->session->flashdata('info'); ?></div>
                        <?php endif; ?>
                        <center><h4 class="mb"><i class="fa"></i>Edit Rencana Rapat</h4></center>

                       <?php echo form_open(); ?> 
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Perihal</label>
                                <div class="col-sm-10">
                                    <input type="text" name="perihal" class="form-control" value="<?php echo $editdata->perihal; ?>"></input>
                                </div>
                        </div><br><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" value="<?php echo $editdata->tanggal; ?>" class="form-control" ></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Jam</label>
                                <div class="col-sm-10">
                                    <input type="time" name="time" value="<?php echo $editdata->shift; ?>" class="form-control" ></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="textarea" name="keterangan" value="<?php echo $editdata->keterangan; ?>" class="form-control" ></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                            <center><input type="submit" class="btn btn-primary" name="submit" value="Edit"></input></center>
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