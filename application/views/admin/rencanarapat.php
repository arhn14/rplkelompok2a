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
                        <div><h3><center>Data Rencana Rapat</center></h3></div>
                      </div><!-- /row -->                  
                      <div class="row">
                        <a href="tambahrencana" class="btn btn-primary">Buat Rencana Rapat</a>
                      </div>
                      <div class="row">
                        <div class="form-panel">
                         <table class="table table-bordered">
                          <thead>
                            <tr align="center">
                              <td width="3%"><b>NO</td>
                              <td width="10%"><b>ID Rapat</td>
                              <td width="30%"><b>Perihal</td>
                              <td width="15%"><b>Tanggal</td>
                              <td width="15%"><b>Jam</td>
                              <td><b>Pengaturan</td>
                            </tr>
                          </thead>
                          <tbody>
                          
                            <br>
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
                              <td align="center"><a href="editrencana/<?php echo $v->id_rapat; ?>" class="btn btn-mini">Edit</a>||<a href="undanganrencana/<?php echo $v->id_rapat; ?>" class="btn btn-mini">Undangan</a>||<a href="batalrencana/<?php echo $v->id_rapat; ?>" class="btn btn-mini">Batal</a></td>
                            </tr>
                            <?php                     
                                $no++;
                                endforeach;
                            ?>
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