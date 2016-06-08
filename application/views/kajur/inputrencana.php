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
                <?php echo form_open(); ?> 
                <div class="row mt">
                  <div class="col-lg-12"> 
                    <div class="form-panel">
                        <?php if ($this->session->flashdata('info')): ?>
                        <div class="alert"><?php echo $this->session->flashdata('info'); ?></div>
                        <?php endif; ?>
                        <center><h4 class="mb"><i class="fa"></i>Input Rencana Rapat</h4></center>
                       
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Perihal</label>
                                <div class="col-sm-10">
                                    <input type="text" name="perihal" class="form-control" value="<?php echo set_value('perihal'); ?>"></input>
                                </div>
                        </div><br><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" value="<?php echo set_value('tanggal'); ?>" class="form-control" ></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Jam</label>
                                <div class="col-sm-10">
                                    <input type="time" name="time" value="<?php echo set_value('time'); ?>" class="form-control" ></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="textarea" name="keterangan" class="form-control" ><?php echo set_value('keterangan'); ?></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Tujuan</label>
                          <div class="col-sm-10">
                            <table width="50%" class="table-bordered">
                              <thead>
                                <tr align="center">
                                  <td width="3%">No</td>
                                  <td width="15%">Nama Dosen</td>
                                  <td width="10%">Jabatan</td>
                                  <td width="5%">Pilih</td>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no=1;
                                  foreach ($kajur as $m):
                                ?>
                                <tr>
                                  <td align="center"><?php echo $no; ?></td>
                                  <td><?php echo $m->nama; ?></td>
                                  <td align="center"><?php echo $m->jabatan; ?></td>
                                  <td align="center"><input type="checkbox" name="cek<?php  echo $m->nip; ?>"></input></td>
                                </tr>
                                <?php                     
                                  $no++;
                                  endforeach;
                                ?>
                                <?php 
                                  $no=2;
                                  foreach ($data as $v):
                                ?>
                                <tr>
                                  <td align="center"><?php echo $no; ?></td>
                                  <td><?php echo $v->nama; ?></td>
                                  <td align="center"><?php echo $v->jabatan; ?></td>
                                  <td align="center"><input type="checkbox" name="cek<?php  echo $v->nip; ?>"></input></td>
                                </tr>
                                <?php                     
                                  $no++;
                                  endforeach;
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="form-group" align="right">
                            <input type="submit" class="btn btn-primary" name="submit" value="Kirim"></input>
                        </div>
                    </div>
                  </div> 
                </div>
                <?php echo form_close(); ?>
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