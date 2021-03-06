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
                        <div><h3><center>Data Rencana Rapat</center></h3></div>
                      </div><!-- /row -->
                      <div class="row">
                        <div class="form-panel">
                         <!--  <?php echo $tabel; ?> -->
                          <div>
                            <a href="tambahrencana"><button class="btn btn-primary">Buat Rencana Rapat</button></a>
                          </div><br>
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
                              <td align="center"><a href="editrencana/<?php echo $v->id_rapat; ?>" class="btn btn-mini">Edit</a>||<a href="batalrencana/<?php echo $v->id_rapat; ?>" class="btn btn-mini">Batal</a></td>
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