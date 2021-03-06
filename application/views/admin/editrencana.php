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

                <div class="row mt">
                  <div class="col-lg-12"> 
                    <div class="form-panel">
                        <?php if ($this->session->flashdata('info')): ?>
                        <div class="alert"><?php echo $this->session->flashdata('info'); ?></div>
                        <?php endif; ?>
                        <center><h4 class="mb"><i class="fa"></i>Edit Rencana Rapat</h4></center>

                       <?php echo form_open(); ?> 
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Perihal</label>
                                <div class="col-sm-10">
                                    <input type="text" name="perihal" class="form-control" value="<?php echo $editdata->perihal; ?>"></input>
                                </div>
                        </div><br><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" value="<?php echo $editdata->tanggal; ?>" class="form-control" ></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Jam</label>
                                <div class="col-sm-10">
                                    <input type="time" name="time" value="<?php echo $editdata->shift; ?>" class="form-control" ></input>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea name="keterangan" class="form-control" ><?php echo $editdata->keterangan; ?></textarea>
                                </div>
                        </div><br><br>
                        <div class="form-group">
                            <center><input type="submit" class="btn btn-primary" name="submit" value="Edit"></input></center>
                        </div>  
                      <?php echo form_close(); ?>
                    </div>
                  </div> 
                </div>
              </div><!-- /col-lg-9 END SECTION MIDDLE -->              
                  
              <div class="col-lg-3 ds">
                   <?php $this->load->view('master/kalender'); ?> 
              </div><!-- /col-lg-3 -->
          </div><! --/row -->
      </section>
  </section>

  <script src="<?php echo base_url('assets/tinymce/tinymce.min.js'); ?>"></script> 
      <script>
  tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern codesample"
    ],
    external_plugins: {
      //"moxiemanager": "/moxiemanager-php/plugin.js"
    },
    content_css: "css/development.css",
    add_unload_trigger: false,

    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table codesample",

    image_advtab: true,
    image_caption: true,

    style_formats: [
      {title: 'Bold text', format: 'h1'},
      {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
      {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
      {title: 'Example 1', inline: 'span', classes: 'example1'},
      {title: 'Example 2', inline: 'span', classes: 'example2'},
      {title: 'Table styles'},
      {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],

    template_replace_values : {
      username : "Jack Black"
    },

    template_preview_replace_values : {
      username : "Preview user name"
    },

    link_class_list: [
      {title: 'Example 1', value: 'example1'},
      {title: 'Example 2', value: 'example2'}
    ],

    image_class_list: [
      {title: 'Example 1', value: 'example1'},
      {title: 'Example 2', value: 'example2'}
    ],

    templates: [
      {title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'},
      {title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
    ],

    setup: function(ed) {
      /*ed.on(
        'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
        'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
        'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
        console.log(e.type, e);
      });*/
    },

    spellchecker_callback: function(method, data, success) {
      if (method == "spellcheck") {
        var words = data.match(this.getWordCharPattern());
        var suggestions = {};

        for (var i = 0; i < words.length; i++) {
          suggestions[words[i]] = ["First", "second"];
        }

        success({words: suggestions, dictionary: true});
      }

      if (method == "addToDictionary") {
        success();
      }
    }
  });
</script>

      <!--main content end-->
      <!--footer start-->
<?php $this->load->view('master/footer'); ?>  