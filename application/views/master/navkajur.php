<ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="<?php echo base_url('kajur/profil') ?>"><img src="<?php echo base_url('assets/img/dosen.png') ?>" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $this->session->userdata('nama'); ?></h5>
                    
                  <li class="mt">
                      <a href="<?php echo base_url('kajur') ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Beranda</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('kajur/rencanarapat') ?>">
                          <i class="fa fa-th"></i>
                          <span>Rencana Rapat</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('kajur/datarapat') ?>">
                          <i class="fa fa-th"></i>
                          <span>Data Rapat</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('kajur/jadwal') ?>">
                          <i class="fa fa-th"></i>
                          <span>Jadwal</span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="<?php echo base_url('kajur/infodosen') ?>">
                          <i class="fa fa-th"></i>
                          <span>Info Dosen</span>
                      </a>
                  </li>
              </ul>