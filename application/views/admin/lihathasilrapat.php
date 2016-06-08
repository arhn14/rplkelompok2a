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
                        <center><h4 class="mb"><i class="fa"></i>Hasil Rapat</h4></center>

                       <?php echo form_open(); ?> 
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Perihal</label>
                                <div class="col-sm-10">
                                    <input type="text" name="perihal" class="form-control" value="<?php echo $editdata->perihal; ?>" disabled></input>
                                </div>
                        </div><br><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" value="<?php echo $editdata->tanggal; ?>" class="form-control" disabled></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Jam</label>
                                <div class="col-sm-10">
                                    <input type="time" name="time" value="<?php echo $editdata->shift; ?>" class="form-control" disabled></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                  <textarea name="keterangan" class="form-control" disabled><?php echo $editdata->keterangan; ?></textarea>
                                </div><br>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Undangan</label>
                                <div class="col-sm-10">
                                    <textarea name="undangan" class="form-control" disabled><?php echo $editdata->undangan; ?></textarea>
                                </div><br>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Hasil</label>
                                <div class="col-sm-10">
                                    <textarea name="hasil" class="form-control" disabled><?php echo $editdata->hasil; ?></textarea>
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