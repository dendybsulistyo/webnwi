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
            <li><a href="<?php echo base_url(); ?>index.php/member/kendaraan">Kendaraan</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/member/logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

   <br><br> 
   <div class=container>
	<!-- <img src=<?php echo base_url();?>assets/images/nwi.jpg class="img-responsive img-rounded">-->
	<h3>Form Data Personal</h3>

<Br>


   <?php 
          
          $attributes = array('class' => 'form-horizontal');
          echo form_open( 'member/update_personal', $attributes); 
          
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
            <label for="inputPassword" class="col-xs-2">Nama </label>
            <div class="col-xs-6">
                <input type="text" name="nama" class="form-control"  placeholder="Nama Lengkap" 
                value="<?php if(isset($session_nama)) echo $session_nama; ?>">
            </div>
            </div>


            <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Panggilan </label>
            <div class="col-xs-6">
                <input type="text" name="panggilan" class="form-control" placeholder="Nama Panggilan" 
                value="<?php if(isset($panggilan)) echo $panggilan; ?>">
            </div>
             </div>

            <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Tempat Lahir </label>
            <div class="col-xs-6">
                <input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir" 
                value="<?php if(isset($tmp_lahir)) echo $tmp_lahir; ?>">
            </div>
             </div>

            <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Tanggal Lahir </label>
            <div class="col-xs-2">
                <input type="text" maxlength=10 name="tgl_lahir" class="form-control" placeholder="dd-mm-yyyy" 
                value="<?php if(isset($tgl_lahir)) echo $tgl_lahir; ?>">
            </div>
             </div>

             <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Gol Darah </label>
            <div class="col-xs-2">
                <input type="text" maxlength=2 name="gol_darah" class="form-control" placeholder="" 
                value="<?php if(isset($gol_darah)) echo $gol_darah; ?>">
            </div>
             </div>

              <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Jenis Kelamin </label>
            <div class="col-xs-2">
                <input type="text" maxlength=1 name="jenis_kelamin" class="form-control" placeholder="P / W" 
                value="<?php if(isset($jenis_kelamin)) echo $jenis_kelamin; ?>">
            </div>
             </div>

            <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Alamat </label>
            <div class="col-xs-6">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat Rumah" 
                value="<?php if(isset($alamat)) echo $alamat; ?>">
            </div>
             </div>

             <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Kode Pos </label>
            <div class="col-xs-4">
                <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" 
                value="<?php if(isset($kode_pos)) echo $kode_pos; ?>">
            </div>
             </div>

              <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Telpon </label>
            <div class="col-xs-4">
                <input type="text"  name="telpon" class="form-control" placeholder="Telpon Rumah" 
                value="<?php if(isset($telpon)) echo $telpon; ?>">
            </div>
             </div>

              <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Handphone </label>
            <div class="col-xs-4">
                <input type="text"  name="no_hp" class="form-control" placeholder="No HP" 
                value="<?php if(isset($no_hp)) echo $no_hp; ?>">
            </div>
             </div>

               <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Pekerjaan </label>
            <div class="col-xs-6">
                <input type="text"  name="pekerjaan" class="form-control" placeholder="Pekerjaan" 
                value="<?php if(isset($pekerjaan)) echo $pekerjaan; ?>">
            </div>
             </div>

            <div class="form-group">
            <label for="inputPassword" class="col-xs-2">Gabung </label>
            <div class="col-xs-2">
                <input type="text" maxlength=10 name="gabung" class="form-control" placeholder="dd-mm-yyyy" 
                value="<?php if(isset($gabung)) echo $gabung; ?>">
            </div>
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

