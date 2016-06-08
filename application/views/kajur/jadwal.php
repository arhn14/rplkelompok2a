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
                  <?php if ($this->session->flashdata('info')): ?>
                    <div class="alert"><?php echo $this->session->flashdata('info'); ?></div>
                  <?php endif; ?>
                      <div class="row mt">                        
                        <div class="col-lg-12"> 
                          <?php echo form_open(); ?>
                          <div class="form-panel">
                            <div><h3><center>Input Jadwal Kosong</center></h3></div>
                            <div>
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" class="form-control"></input>
                                </div>
                              </div><br><br><br>
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Jam Kosong</label>
                                <div class="col-sm-10">
                                    <input type="time" name="jam" class="form-control"></input>
                                </div>
                              </div><br><br>
                              <div class="form-group">
                                <div class="col-sm-10">
                                    <center><input type="submit" class="btn btn-primary" name="submit" value="Kirim"></input></center>
                                </div>
                              </div><br><br>
                            </div>
                          </div>
                          <?php echo form_close(); ?>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-lg-12">
                        <div class="form-panel"> 
                          <div><h3><center>Jadwal Kosong</center></h3></div>
                          <div>
                            <?php echo $tabel; ?>
                          </div>
                        </div>
                        </div>
                      </div><!-- /row -->      
          
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                                
                  
                  <div class="col-lg-3 ds">
                    <div class="row">
                        <?php $this->load->view('master/kalender'); ?>                       
                    </div>
                    <div class="row">
                         <div class="event_detail">
                              <h4 class="s_date">Kegiatan Tanggal <?php echo "$day $month $year";?></h4>
                              <div class="detail_event">
                                <?php 
                                  if(isset($events)){
                                    $i = 1;
                                    foreach($events as $e){
                                     if($i % 2 == 0){
                                        echo '<div class="info1"><h4>'.$e['time'].'</h4><p>'.$e['event'].'</p></div>';
                                      }else{
                                        echo '<div class="info2"><h4>'.$e['time'].'</h4><p>'.$e['event'].'</p></div>';
                                      } 
                                      $i++;
                                    }
                                  }else{
                                    echo '<div class="message"><h4>Tidak Ada Rapat</h4></div>';
                                  }
                                ?>
                              </div>
                            </div>
                       </div>
                  </div><!-- /col-lg-3 -->
            </div><! --/row -->
        </section>
    </section>

      <!--main content end-->
      <!--footer start-->
<?php $this->load->view('master/footer'); ?>  