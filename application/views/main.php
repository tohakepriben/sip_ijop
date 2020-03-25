<?php
$uri1	= $this->uri->segment(1);
$uri2	= $this->uri->segment(2);
   
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Permohonan Ijin Operasional Ponpes, MDTA dan TPQ">
    <meta name="author" content="Toha Kepriben">

    <title>SIP IJOP Kab. Brebes</title>

    <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/metisMenu/metisMenu.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/dist/css/sb-admin-2.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/morrisjs/morris.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>">SIP Ijop Kab. Brebes</a>
            </div>

            <?php $this->load->view('nav_top') ?>

            <?php $this->load->view('nav_menu') ?>
            
        </nav>

        <?php 
        	if($uri1=='daftar'){
	        	$this->load->view('daftar');

			}elseif($uri1=='alur_pengajuan'){
	        	$this->load->view('alur_pengajuan');

			}else{
	        	$this->load->view('beranda');
			}
        
        ?>


    </div>
    
	<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="modal-logoutLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="modal-logoutLabel">Konfirmasi</h4>
	      </div>
	      <div class="modal-body">
	        Logout dari aplikasi?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" onclick="location.href='<?=base_url("auth/logout")?>'">Logout</button>
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
	      </div>
	    </div>
	  </div>
	</div>    


	<div class="modal fade" id="modal-sukses-daftar" tabindex="-1" role="dialog" aria-labelledby="modal-suksesLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="modal-logoutLabel">Registrasi Sukses</h4>
	      </div>
	      <div class="modal-body">
	        Silahkan gunakan Email dan No. HP yang anda daftarkan untuk login
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
	      </div>
	    </div>
	  </div>
	</div>
	    
	<div class="modal fade" id="modal-sukses-login" tabindex="-1" role="dialog" aria-labelledby="modal-suksesLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="modal-logoutLabel">Login Berhasil</h4>
	      </div>
	      <div class="modal-body">
	        Selamat datang, <strong><?=$this->session->userdata('nama')?></strong>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
	      </div>
	    </div>
	  </div>
	</div>
	    
    
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/metisMenu/metisMenu.min.js')?>"></script>
    <script src="<?=base_url('assets/dist/js/sb-admin-2.js')?>"></script>

	<?php if($this->session->flashdata('registrasi_sukses')): ?>
	<script type="text/javascript">
		$('#modal-sukses-daftar').modal('show');	
	</script>
	<?php elseif($this->session->flashdata('login_sukses')): ?>
	<script type="text/javascript">
		$('#modal-sukses-login').modal('show');	
	</script>
	<?php endif; ?>
	
<script type="text/javascript">
$(function(){
	$('#side-menu').metisMenu();
	$('#logout,#logout2').click(function(){
		$('#modal-logout').modal('show');
	});
	
});	
</script>

</body>

</html>
