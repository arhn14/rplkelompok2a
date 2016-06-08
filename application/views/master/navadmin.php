<ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="<?php echo base_url('admin/profil') ?>"><img src="<?php echo base_url('assets/img/admin.png') ?>" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $this->session->userdata('nama'); ?></h5>
                    
                  <li class="mt">
                      <a href="<?php echo base_url('admin') ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Beranda</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('admin/rencanarapat') ?>">
                          <i class="fa fa-th"></i>
                          <span>Rencana Rapat</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('admin/datarapat') ?>">
                          <i class="fa fa-th"></i>
                          <span>Data Rapat</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('admin/infodosen') ?>">
                          <i class="fa fa-th"></i>
                          <span>Info Dosen</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('admin/pengaturan') ?>" >
                          <i class="fa fa-cogs"></i>
                          <span>Pengaturan</span>
                      </a>
                  </li>
              </ul>