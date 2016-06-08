<?php $this->load->view('master/headerdosen'); ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
            <?php $this->load->view('master/navdosen'); ?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9">
                      <div class="row mt">
                      <center>Selamat Datang  <?php echo $this->session->userdata('nama'); ?><br>
                        Dosen Jurusan Sistem Informasi<br>
                        Fakultas Teknologi Informasi<br>
                        Universitas Andalas</center>
                      </div><!-- /row -->
          
          
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                 <div class="col-lg-3 ds">
                       <!-- <?php $this->load->view('master/kalender'); ?>  -->
                       <div class="row">
                         <div class="calendar">
                              <?php echo $notes;?>
                            </div>
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
<script>
    $(".detail").live('click',function(){
      $(".s_date").html("Kegiatan Tanggal "+$(this).attr('val')+" <?php echo "$month $year";?>");
      var day = $(this).attr('val');
      $.ajax({
        type: 'post',
        dataType: 'json',
        url: "<?php echo site_url("dosen/detail_event");?>",
        data:{<?php echo "year: $year, mon: $mon";?>, day: day},
        success: function( data ) {
          var html = '';
          if(data.status){
            var i = 1;
            $.each(data.data, function(index, value) {
                if(i % 2 == 0){
                html = html+'<div class="info1"><h4>'+value.time+'</h4><p>'+value.event+'</p></div>';
              }else{
                html = html+'<div class="info2"><h4>'+value.time+'</h4><p>'+value.event+'</p></div>';
              } 
              i++;
            });
          }else{
            html = '<div class="message"><h4>'+data.title_msg+'</h4></div>';
          }
          html = html;
          $( ".detail_event" ).fadeOut("slow").fadeIn("slow").html(html);
        } 
      });
    });
</script>

<?php $this->load->view('master/footer'); ?>  