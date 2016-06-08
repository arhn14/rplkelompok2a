<ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="<?php echo base_url('dosen/profil') ?>"><img src="<?php echo base_url('assets/img/kajur.ico') ?>" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $this->session->userdata('nama'); ?></h5>
                    
                  <li class="mt">
                      <a href="<?php echo base_url('dosen') ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Beranda</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('dosen/datarapat') ?>">
                          <i class="fa fa-th"></i>
                          <span>Data Rapat</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('dosen/jadwal') ?>">
                          <i class="fa fa-th"></i>
                          <span>Jadwal</span>
                      </a>
                  </li>
              </ul>