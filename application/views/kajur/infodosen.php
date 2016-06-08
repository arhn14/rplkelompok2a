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
                        <div class="form-panel">
                        <div><h3><center>Data Dosen</center></h3></div>
                            <!-- <?php echo $tabel; ?> -->
                          <table class="table table-bordered">
                          <thead>
                            <tr align="center">
                              <td width="3%"><b>NO</td>
                              <td width="20%"><b>NIP</td>
                              <td width="30%"><b>Nama</td>
                              <td width="20%"><b>Jabatan</td>
                              <td><b>Pengaturan</td>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $no = 1;
                              foreach($kajur as $v): 
                            ?>
                            <tr>
                              <td align="center"><?php echo $no; ?></td>
                              <td align="center"><?php echo $v->nip; ?></td>
                              <td><?php echo $v->nama; ?></td>
                              <td align="center"><?php echo $v->jabatan; ?></td>
                              <td align="center"><a href="detildosen/<?php echo $v->nip; ?>" class="btn btn-mini">Detil</a>||<a href="jadwaldosen/<?php echo $v->nip; ?>" class="btn btn-mini">Jadwal</a></td>
                            </tr>
                            <?php                     
                                $no++;
                                endforeach;
                            ?>
                            <?php 
                              $no = 2;
                              foreach($dosen as $d): 
                            ?>
                            <tr>
                              <td align="center"><?php echo $no; ?></td>
                              <td align="center"><?php echo $d->nip; ?></td>
                              <td><?php echo $d->nama; ?></td>
                              <td align="center"><?php echo $d->jabatan; ?></td>
                              <td align="center"><a href="detildosen/<?php echo $d->nip; ?>" class="btn btn-mini">Detil</a>||<a href="jadwaldosen/<?php echo $d->nip; ?>" class="btn btn-mini">Jadwal</a></td>
                            </tr>
                            <?php                     
                                $no++;
                                endforeach;
                            ?>
                          </tbody>
                          </table>
                        </div>      
                      </div>
                      <div class="row">
                        <div class="form-panel">
                          <div><h3><center>Info Jadwal Kosong</center></h3></div>
                          <div>
                          <?php echo form_open(); ?> 
                            <div class="form-group">                              
                                <label class="col-sm-2 col-sm-2 control-label">Cari Berdasarkan Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" class="form-control" value="<?php echo set_value('tanggal'); ?>"></input><br><input type="submit" class="btn btn-primary" name="submit" value="Cari"></input>
                                </div><br>
                            </div>
                          </div>
                          <div>
                            <table class="table table-bordered">
                          <thead>
                            <tr align="center">
                              <td width="3%"><b>NO</td>
                              <td width="10%"><b>NIP</td>
                              <td width="30%"><b>Nama</td>
                              <td width="15%"><b>Tanggal</td>
                              <td width="15%"><b>Jam</td>
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
                              <td align="center"><?php echo $v->id_user; ?></td>
                              <td><?php echo $v->nama; ?></td>
                              <td align="center"><?php echo $v->tanggal; ?></td>
                              <td align="center"><?php echo $v->shift; ?></td>
                            </tr>
                            <?php                     
                                $no++;
                                endforeach;
                            ?>
                          </tbody>
                          </table>
                          </div>
                          <?php echo form_close(); ?>
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