<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>    
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/stylelogin.css'); ?>">    
  </head>
  <body>
  <?php echo form_open('login/getMasuk'); ?>

    <div class="login-form">
     <center><h3>Sistem Informasi Rapat</h3></center>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username " id="UserName" name="username" value="<?php echo set_value('username'); ?>">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" id="Passwod" name="password" value="<?php echo set_value('password'); ?>">
       <i class="fa fa-lock"></i>
     </div>
      <?php if ($this->session->flashdata('info')): ?>
        <div><center><h5><?php echo $this->session->flashdata('info'); ?></h5></center></div>
      <?php endif; ?>
      <a class="link" href="#">Lupa Password?</a>
     <input type="submit" class="log-btn" name="submit" value="Masuk"></input>    
   </div>
<?php echo form_close(); ?>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </body>
</html>