<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="margin-top: 10px;"><?=$title?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user fa-fw"></i> <?=$sub_title?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <form role="form" method="post">
                    	<input type="hidden" name="secret" value="1"/>
						<div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?=set_value('nama', $nama)?>">
                            <p class="text-danger"><?=form_error('nama')?></p>
                        </div>                    	
						<div class="form-group">
                            <label>Email (kosongkan jika tidak ingin merubah) *</label>
                            <input type="email" class="form-control" name="email" value="<?=set_value('email')?>">
                            <p class="text-danger"><?=form_error('email').$email_exists?></p>
                        </div>                    	
						<div class="form-group">
                            <label>No. HP (kosongkan jika tidak ingin merubah) *</label>
                            <input type="tel" class="form-control" name="hp" value="<?=set_value('hp')?>">
                            <p class="text-danger"><?=form_error('hp').$hp_exists?></p>
                        </div>

						<div class="form-group">
                            <label>Login terakhir</label>
                            <input disabled="" class="form-control" name="last_login" value="<?=$last_login?>">
                        </div>
                                                
						<div class="form-group">
                            <small>
                            *) Alamat Email dan No. HP harus unik (tidak boleh sama dengan milik pengguna lain) dan pastikan aktif karena konfirmasi persetujuan dan informasi lainnya akan disampaikan via Email dan No. HP yang anda gunakan
                            </small>
                        </div>

						<div class="well well-sm">
							<h4>Untuk menyimpan, silahkan masukkan Email dan No. HP anda</h4>
							<div class="form-group">
	                            <label>Email lama</label>
	                            <input type="email" class="form-control" name="email_lama">
	                        </div>                    	
							<div class="form-group">
	                            <label>No. HP lama</label>
	                            <input type="tel" class="form-control" name="hp_lama">
	                        </div>
                            <p class="text-danger"><?=$email_hp_lama_invalid ? 'Email atau No. HP lama tidak sesuai' : '' ?></p>
						</div>

						<button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="javascript:history.back();" class="btn btn-success">Kembali</a>
                    </form>
                    
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
