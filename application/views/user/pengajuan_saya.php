<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list fa-fw"></i> <?=$sub_title?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Lembaga</th>
                                    <th>Jenis Pengajuan</th>
                                    <th>Nama Lembaga</th>
                                    <th>Alamat Lembaga</th>
                                    <th>Progres Kelengkapan</th>
                                    <th>Tgl. Pengajuan</th>
                                    <th>Status Approval</th>
                                    <th>Tgl. Respon</th>
                                    <th>Keterangan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach($data_pengajuan as $r): 
                            $kecamatan = $this->m_alamat->get_kecamatan($r['id_kecamatan']);
                            if($kecamatan==''){
	                            $alamat = '';
								
							}else{
	                            $kelurahan = $this->m_alamat->get_kelurahan($r['id_kelurahan']);
	                            $rt = $r['rt'];
	                            $rw = $r['rw'];
	                            $dukuh = $r['dukuh'];
	                            if($dukuh == $kelurahan){
	                            	$alamat = $kelurahan.' RT '.$rt.'/'.$rw.' Kec.'.$kecamatan;									
								}else{
	                            	$alamat = $dukuh.' - '.$kelurahan.' RT '.$rt.'/'.$rw.' Kec.'.$kecamatan;									
								}
							}
                            $prosen = 100;
							$style_color = '';
							if($r['status']==1){
								$prosen = $this->m_pengajuan->hitung_prosen($r['id']);
							}elseif($r['status']==2){
								$style_color = 'style="color: orange"';
							}elseif($r['status']==3){
								$style_color = 'style="color: red"';							
							}elseif($r['status']==4){
								$style_color = 'style="color: green"';							
							}
							$url_edit=base_url('pengajuan/edit_pengajuan/'.$r['id']);
                            ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=get_jns_lembaga($r['id_jenis_lembaga'])?></td>
                                    <td><?=get_jns_pengajuan($r['id_jenis_pengajuan'])?></td>
                                    <td><?=$r['nama_lembaga']?></td>
                                    <td><?=$alamat?></td>
                                    <td>
										<div class="progress">
										  <div class="progress-bar bg-dark" role="progressbar" <?php echo 'style="width: '.$prosen.'%;"' ?> aria-valuenow="<?=$prosen?>" aria-valuemin="0" aria-valuemax="100"><?=$prosen?>%</div>
										</div>                                    	
                                    </td>
                                    <td><?=$r['tgl_pengajuan']?></td>
                                    <td <?=$style_color?>><?=get_status($r['status'])?></td>
                                    <td><?=$r['status']>2 ? $r['tgl_respon'] : '-'?></td>
                                    <td><?=$r['keterangan']?></td>
                                    <td>
                                    	<button 
                                    		class="btn btn-xs btn-primary"
                                    		onclick="location.href='<?=$url_edit?>'">
                                    		Ubah
                                    	</button>
                                    	<?php if($r['status']==1 || $r['status']==3): ?>
                                    	<button 
                                    		class="btn btn-xs btn-danger"
											data-toggle="modal" data-target="#modal-hapus-pengajuan"
                                    		data-idpengajuan="<?=$r['id']?>">
                                    		Hapus
                                    	</button>
                                    	<?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <!-- /.panel-body -->
				<div class="panel-footer">
					<button id="btn-tambah-pengajuan" class="btn btn-primary btn-sm">Tambah Pengajuan</button>
                </div> 
                <br />
				
				<div class="panel panel-default" style="margin: 15px">
                    <div class="panel-heading">
		                Keterangan Status Approval
                    </div>
                    <div class="panel-body">
		                <strong>1. Belum diajukan</strong>
		                <p><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Permohonan belum diajukan atau belum lengkap 100%</small></p>
		                <strong>2. Menunggu validasi</strong>
		                <p><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tim dari PD Pontren sedang memeriksa validitas data yang diajukan. Data pengajuan tidak dapat diubah kecuali ditolak</small></p>
		                <strong>3. Ditolak</strong>
		                <p><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pengajuan ditolak karena data yang diajukan tidak valid. Anda bisa mengubah lagi data pengajuan untuk memperbaiki kekurangan</small></p>
		                <strong>4. Diterima</strong>
		                <p><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pengajuan diterima. Anda bisa datang ke kantor PD Pontren membawa berkas yang sudah diupload</small></p>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-tambah-pengajuan" tabindex="-1" role="dialog" aria-labelledby="modal-tambahLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-logoutLabel">Tambah Pengajuan Ijop</h4>
      </div>
      <div class="modal-body">
            <form role="form" method="post">
				<div class="form-group">
                    <label>Jenis Lembaga</label>
					<select class="form-control" id="jenis-lembaga">
                        <option value="0">--Pilih salah satu--</option>
                        <option value="1">Ponpes (Pondok Pesantren)</option>
                        <option value="2">MDTA (Madrasah Diniyah Takmiliyah Awaliyah)</option>
                        <option value="3">TPQ (Taman Pendidikan al-Qur'an')</option>
                    </select>
                </div>                    	
				<div class="form-group">
                    <label>Jenis Pengajuan</label>
					<select class="form-control" id="jenis-pengajuan">
                        <option value="0">--Pilih salah satu--</option>
                        <option value="1">Ijop Baru</option>
                        <option value="2">Perpanjangan Ijop</option>
                    </select>
                </div>                    	
            </form>
        
      </div>
      <div class="modal-footer">
        <button id="btn-simpan-pengajuan" class="btn btn-primary">Simpan</button>
        <button class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-hapus-pengajuan" tabindex="-1" role="dialog" aria-labelledby="modal-hapusLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-logoutLabel">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        Hapus pengajuan?
      </div>
      <div class="modal-footer">
        <button id="btn-hapus-konfirmasi" class="btn btn-danger">Hapus</button>
        <button class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
	$('#btn-tambah-pengajuan').click(function(){
		$('#modal-tambah-pengajuan').modal('show');
	});

	$('#btn-simpan-pengajuan').click(function(){
		jenis_lembaga = $('#jenis-lembaga').val();
		jenis_pengajuan = $('#jenis-pengajuan').val();
		if(jenis_lembaga == 0 || jenis_pengajuan == 0){
			alert('Error: Form belum lengkap');
			return;
		}
		$.post('<?=base_url("api/tambah_pengajuan/?callback=?")?>',
			{
				jenis_lembaga : jenis_lembaga,
				jenis_pengajuan : jenis_pengajuan
			},
			function(data){
				if(data==1){
					location.reload();
				}else{
					alert('Tidak dapat menambahkan data pengajuan');
				}
			}
		);				
	});

	$('#modal-hapus-pengajuan').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id_pengajuan = button.data('idpengajuan');

		$('#btn-hapus-konfirmasi').on('click', function(){
			$.post('<?=base_url("api/hapus_pengajuan/?callback=?")?>',
				{
					id_user : <?=$this->session->userdata('id_user')?>,
					id_pengajuan : id_pengajuan
				},
				function(data){
					if(data==1){
						location.reload();
					}else{
						alert('Error: Tidak dapat menghapus pengajuan');
					}
				}
			);
		});
	});

});	
</script>
