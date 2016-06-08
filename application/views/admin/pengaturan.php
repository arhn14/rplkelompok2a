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
                        <div><h3><center>Pengaturan User</center></h3></div>
                      </div><!-- /row -->
                      <div class="form-panel">
                      <div class="row">
                          	<h4><center>Admin</center></h4>
					      	<table class="table-bordered" width="50%" align="center">
					      		<thead>
					      			<tr>
					      				<th width="5%">No</th>
					      				<th width="15%">Nama</th>
					      				<th width="10%">Pilihan</th>
					      			</tr>
					      		</thead>
					      		<tbody>
					      			<?php 
					                    $no=1;
					                  ?>
					      			<tr align="center">
					      				<td><?php echo $no; ?></td>
					      				<td><?php echo $admin->nama; ?></td>
					      				<td><a href="editadmin/<?php echo $admin->username; ?>" class="btn btn-mini">Atur</a></td>
					      			</tr>
					      		</tbody>
					      	</table>
                      <br><br>

                      	<h4><center>Ketua Jurusan</center></h4>
					    <table class="table-bordered" width="50%" align="center">
					    	<thead>
					    		<tr>
					    		<th width="5%">No</th>
					    			<th width="15%">Nama</th>
					      		<th width="10%">Pilihan</th>
					      		</tr>
					      	</thead>
					      	<tbody>
					      		<?php 
					                   $no=1;
					                 ?>
					      		<tr align="center">
					      			<td><?php echo $no; ?></td>
					      			<td><?php echo $kajur->nama; ?></td>
					      			<td><a href="editkajur/<?php echo $kajur->username; ?>" class="btn btn-mini">Atur</a></td>
					      		</tr>
					      	</tbody>
					    </table>
                      <br><br>

                      	<h4><center>Dosen</center></h4>
						<table class="table-bordered" width="50%" align="center">
						   	<thead>
						   		<tr>
						   			<th width="5%">No</th>
									<th width="15%">Nama</th>
							   		<th width="10%">Pilihan</th>
						 		</tr>
							</thead>
						   	<tbody>
						   		<?php 
						            $no=1;
						            foreach ($dosen as $v):
						        ?>
						   		<tr align="center">
						   			<td><?php echo $no; ?></td>
						   			<td><?php echo $v->nama; ?></td>
						   			<td><a href="editdosen/<?php echo $v->username; ?>" class="btn btn-mini">Atur</a>||<a href="hapusdosen/<?php echo $v->nip; ?>" class="btn btn-mini">Hapus</a></td>
							    </tr>
						   		<?php                     
						            $no++;
						            endforeach;
						        ?>
						   	</tbody>
						</table>
                      </div><br><br>

                      <div class="row-mt">
                        <center><a href="dosenbaru"><button class="btn btn-primary">Buat Akun Dosen</button></a></center>
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