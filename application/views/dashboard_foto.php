<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>NWI5 Jogja</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url();?>assets/js/ie-emulation-modes-warning.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
    <!--
    $(document).ready(function () {
     
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);

    });
    //-->
    </script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">NWI-5</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url(); ?>index.php/member/dashboard_home">Home</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/member/personal">Personal</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/member/foto">Foto </a></li>
            <li><a href="<?php echo base_url(); ?>index.php/member/kendaraan">Kendaraan</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/member/logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

   <br><br> 
   <div class=container>
	<!-- <img src=<?php echo base_url();?>assets/images/nwi.jpg class="img-responsive img-rounded">-->
	<h3>Foto Personil</h3>

<Br>


   <?php 
          
          $attributes = array('class' => 'col-lg-8 form-horizontal');
          echo form_open( 'member/update_foto', $attributes); 
          
          // jika sudah mengisi dan sukses
          if($this->session->flashdata('member') == 'sukses'){
            ?>

            <!-- konfirmasi sukses daftar via web -->
            <div class="alert alert-warning fade-in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Terima Kasih !</strong> Update Data berhasil
            </div>


          <?php 
            }
            if($this->session->flashdata('member') == 'gagal'){
              ?>
            <!-- konfirmasi gagal -->
            <div class="alert alert-info fade-in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Silahkan Coba Lagi !</strong> Terima kasih
            </div>

            <?php 
            }
            ?>

            <div class="form-group">
            <label for="exampleInputEmail1">File Scan Foto Ukuran 4x6 ( 150x200 pixel )</label>
             <input type="file" name="userfile" size="20" />
            </div>


             <div class="form-group">
            <label for="inputPassword" class="col-xs-2"></label>
            <div class="col-xs-6">
                <button type="submit" class="btn btn-primary">Submit </button>
            </div>
        </div>


      <?php echo form_close(); ?>





</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

