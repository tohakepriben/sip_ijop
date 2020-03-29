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
                            <input type="text" class="form-control" name="nama" value="<?=set_value('nama')?>">
                            <p class="text-danger"><?=form_error('nama')?></p>
                        </div>                    	
						<div class="form-group">
                            <label>Email *</label>
                            <input type="email" class="form-control" name="email" value="<?=set_value('email')?>">
                            <p class="text-danger"><?=form_error('email')?></p>
                        </div>                    	
						<div class="form-group">
                            <label>No. HP *</label>
                            <input type="tel" class="form-control" name="hp" value="<?=set_value('hp')?>">
                            <p class="text-danger"><?=form_error('hp')?></p>
                        </div>
                                                
						<div class="form-group">
                            <small>
                            *) Alamat Email dan No. HP harus unik (tidak boleh sama dengan milik pengguna lain) dan pastikan aktif karena konfirmasi persetujuan dan informasi lainnya akan disampaikan via Email dan No. HP yang anda gunakan
                            </small>
                        </div>

						<button type="submit" class="btn btn-primary">Daftar</button>
                        <button type="reset" class="btn btn-default">Reset Form</button>                        
                    </form>
                    
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
