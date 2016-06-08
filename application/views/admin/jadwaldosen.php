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
                  <?php if ($this->session->flashdata('info')): ?>
                    <div class="alert"><?php echo $this->session->flashdata('info'); ?></div>
                  <?php endif; ?>
                      <div class="row mt">
                        <div><h3><center>Jadwal Kosong</center></h3></div>
                      </div><!-- /row -->
                      <div class="row">
                        <div class="form-panel">
                        <?php echo $tabel; ?>
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