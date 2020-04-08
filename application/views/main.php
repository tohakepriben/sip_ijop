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
    <meta name="description" content="Sistem Informasi Pelayanan Ijin Operasional Ponpes, MDTA dan TPQ Kab. Brebes">
    <meta name="author" content="Toha Kepriben">
    <link href="<?=base_url('assets/favicon.png')?>" rel="icon" type="image/png" />	

    <title>SIP IJOP Brebes</title>

    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <link rel="stylesheet" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/vendor/metisMenu/metisMenu.min.css')?>">

	<?php if($this->session->userdata('level')==1): ?>
    <link rel="stylesheet" href="<?=base_url('assets/vendor/datatables/datatables.min.css')?>">	
	<?php endif; ?>

    <link rel="stylesheet" href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/sb-admin-2.css')?>">

	<?php if($uri1==''): ?>
    <link rel="stylesheet" href="<?=base_url('assets/vendor/chart/chart.min.css')?>">	
    <script src="<?=base_url('assets/vendor/chart/chart.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/chart/chartjs-plugin-datalabels.js')?>"></script>
	<?php endif; ?>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&family=Ubuntu:wght@500&display=swap">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navigasi</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>" 
                	style="font-family: 'Pacifico', cursive;">
                	SIP Ijop Kab. Brebes
                </a>
            </div>

            <?php $this->load->view('nav_top') ?>

            <?php $this->load->view('nav_menu') ?>
            
        </nav>

        <?php 
        	if($uri1=='daftar'){
	        	$this->load->view('daftar');

			}elseif($uri1=='pengajuan'){
	        	if($uri2=='alur_pengajuan'){
		        	$this->load->view('alur_pengajuan');
				}elseif($uri2=='pengajuan_saya'){
		        	$this->load->view('user/pengajuan_saya');
				}elseif($uri2=='edit_pengajuan'){
		        	$this->load->view('user/form_pengajuan');
				}
	        	
			}elseif($uri1=='admin'){
	        	if($uri2=='syarat_berkas'){
		        	$this->load->view('admin/set_persyaratan');
				}elseif($uri2=='approval'){
		        	$this->load->view('admin/approval');
				}elseif($uri2=='pengajuan_diterima'){
		        	$this->load->view('admin/pengajuan_diterima');
				}elseif($uri2=='lihat_pengajuan'){
		        	$this->load->view('admin/lihat_pengajuan');
				}elseif($uri2=='pengguna'){
		        	$this->load->view('admin/set_pengguna');
				}
	        	
			}elseif($uri1=='download_instrumen'){
				$this->load->view('download_instrumen');
				
			}elseif($uri1=='info'){
				$this->load->view('info');

			}elseif($uri1=='profil_saya'){
				$this->load->view('profil_saya');

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

	    
	<?php if($this->session->userdata('level')==1): ?>
    <script src="<?=base_url('assets/vendor/datatables/datatables.min.js')?>"></script>
	<?php endif; ?>
    
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/metisMenu/metisMenu.min.js')?>"></script>
    <script src="<?=base_url('assets/dist/js/sb-admin-2.js')?>"></script>








	<?php if($this->session->flashdata('registrasi_sukses')): ?>
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
	<script type="text/javascript">
		$('#modal-sukses-daftar').modal('show');	
	</script>

	<?php elseif($this->session->flashdata('login_sukses')): ?>	    
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
	<script type="text/javascript">
		$('#modal-sukses-login').modal('show');	
	</script>

	<?php elseif($this->session->flashdata('update_profil_sukses')): ?>	    
	<div class="modal fade" id="modal-sukses-update-profil" tabindex="-1" role="dialog" aria-labelledby="modal-suksesLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="modal-logoutLabel">Update Profil Berhasil</h4>
	      </div>
	      <div class="modal-body">
	        Perubahan profil anda berhasil disimpan
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript">
		$('#modal-sukses-update-profil').modal('show');	
	</script>

	<?php elseif($this->session->flashdata('pengajuan_sukses')): ?>	    
	<div class="modal fade" id="modal-sukses-pengajuan" tabindex="-1" role="dialog" aria-labelledby="modal-suksesLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Pengajuan Ijop Berhasil</h4>
	      </div>
	      <div class="modal-body">
	        Silahkan menunggu Tim dari PD Pontren melakukan validasi data pengajuan dan visitasi ke lembaga anda.<br />
	        Penolakan atau penerimaan pengajuan akan kami informasikan melalui website ini dan email atau nomor HP anda.<br />
	        Terimakasih
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript">
		$('#modal-sukses-pengajuan').modal('show');	
	</script>
	<?php endif; ?>
	
<script type="text/javascript">
$(function(){
	$('#logout,#logout2').click(function(){
		$('#modal-logout').modal('show');
	});
	
});	
</script>

</body>

</html>
