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
                        <div><h3><center>Data Rapat</center></h3></div>
                      </div><!-- /row -->
                      <div class="row">
                        <div class="form-panel">
                            <table class="table table-bordered">
                          <thead>
                            <tr align="center">
                              <td width="3%"><b>NO</td>
                              <td width="10%"><b>ID Rapat</td>
                              <td width="30%"><b>Perihal</td>
                              <td width="15%"><b>Tanggal</td>
                              <td width="15%"><b>Shift</td>
                              <td width="15%"><b>Status</td>
                              <td><b>Pengaturan</td>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if(empty($table)):?>
                            <?php 
                              $no = 1;
                              foreach($tabel as $v): 
                            ?>
                            <tr>
                              <td align="center"><?php echo $no; ?></td>
                              <td align="center"><?php echo $v->id_rapat; ?></td>
                              <td><?php echo $v->perihal; ?></td>
                              <td align="center"><?php echo $v->tanggal; ?></td>
                              <td align="center"><?php echo $v->shift; ?></td>
                              <td align="center"><?php echo $v->status; ?></td>
                              <td align="center"><a href="detilrapat/<?php echo $v->id_rapat; ?>" class="btn btn-mini">Detail</a><a href="hasilrapat/<?php echo $v->id_rapat; ?>" class="btn btn-mini">Hasil</a><a href="hapusrapat/<?php echo $v->id_rapat; ?>" class="btn btn-mini">Hapus</a></td>
                            </tr>
                            <?php                     
                                $no++;
                                endforeach;
                            ?>
                          <?php endif;?>
                          </tbody>
                          </table>
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