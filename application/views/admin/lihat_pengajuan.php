<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header" style="margin-top: 10px; font-family: 'Ubuntu', sans-serif;"><?=$title?></h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list-alt fa-fw"></i> <?=$sub_title?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php 
                    foreach($data_pengajuan as $r): 
                    ?>                    
			            <div class="panel panel-default">
			                <div class="panel-heading">
			                    <i class="fa fa-list fa-fw"></i> Detil Pengajuan
			                </div>
			                <div class="panel-body">
								<div style="padding: 5px" class="form-group bg-info">
		                            <label>Jenis Lembaga</label>
		                            <input type="text" class="form-control" value="<?=get_jns_lembaga($r['id_jenis_lembaga'])?>" disabled="">
		                        </div>
								<div style="padding: 5px" class="form-group bg-info">
		                            <label>Jenis Pengajuan</label>
		                            <input type="text" class="form-control" value="<?=get_jns_pengajuan($r['id_jenis_pengajuan'])?>" disabled="">
		                        </div>
			                
							</div>
						</div>

			            <div class="panel panel-default">
			                <div class="panel-heading">
			                    <i class="fa fa-university fa-fw"></i> Lembaga
			                </div>
							<form role="form" id="form-data-lembaga">
	                    	<input name="id" type="hidden" id="id-pengajuan" value="<?=$r['id']?>"/>
			                <div class="panel-body">
								<div style="padding: 5px" class="form-group <?=$r['nama_lembaga']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>Nama Lembaga</label>
		                            <input disabled
		                            name="nama_lembaga" 
		                            type="text" class="form-control" value="<?=$r['nama_lembaga']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['tahun_berdiri']>1900 ? 'bg-info' : 'bg-danger'?>">
		                            <label>Tahun Berdiri</label>
		                            <input disabled
		                            name="tahun_berdiri"
		                            type="number" class="form-control" value="<?=$r['tahun_berdiri']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['nama_pimpinan']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>Nama Pimpinan Lembaga</label>
		                            <input disabled
		                            name="nama_pimpinan"
		                            type="text" class="form-control" value="<?=$r['nama_pimpinan']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['hp']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>No. HP</label>
		                            <input disabled
		                            name="hp"
		                            type="tel" class="form-control" value="<?=$r['hp']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['nama_yayasan']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>Nama Yayasan / Badan Hukum</label>
		                            <input disabled
		                            name="nama_yayasan"
		                            type="text" class="form-control" value="<?=$r['nama_yayasan']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['id_kecamatan']>0 ? 'bg-info' : 'bg-danger'?>">
		                            <label>Kecamatan</label>
									<select disabled
									name="id_kecamatan"
									id="pil-kecamatan"
									class="form-control">
				                        <option value="0">--Pilih salah satu--</option>
					                    <?php 
					                    foreach($kecamatan as $kec): 
					                    $is_selected = '';
					                    if($kec['id'] == $r['id_kecamatan']) {$is_selected='selected';}
					                    ?>
					                    <option value="<?=$kec['id']?>" <?=$is_selected?>><?=$kec['kecamatan']?></option>
					                    <?php endforeach; ?>
				                    </select>
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['id_kelurahan']>0 ? 'bg-info' : 'bg-danger'?>">
		                            <label>Kelurahan</label>
									<select disabled
									name="id_kelurahan"
									id="pil-kelurahan"
									class="form-control">
				                        <option value="0">--Pilih salah satu--</option>
					                    <?php 
					                    $kelurahan = $this->m_alamat->get_all_kelurahan($r['id_kecamatan']);
					                    foreach($kelurahan as $kel): 
					                    $is_selected = '';
					                    if($kel['id'] == $r['id_kelurahan']) {$is_selected='selected';}
					                    ?>
					                    <option value="<?=$kel['id']?>" <?=$is_selected?>><?=$kel['kelurahan'].' ('.$kel['kd_pos'].')'?></option>
					                    <?php endforeach; ?>
				                    </select>
		                        </div>
								<div style="padding: 5px" class="form-group <?=($r['rt']>0 && $r['rw']>0) ? 'bg-info' : 'bg-danger'?>">
		                            <div class="row">
			                            <div class="col col-sm-6">
				                            <label>RT</label>
			                            	<input disabled
			                            	name="rt"
			                            	type="number" class="form-control" value="<?=$r['rt']?>">
			                            </div>
			                            <div class="col col-sm-6">
				                            <label>RW</label>
			                            	<input disabled
			                            	name="rw"
			                            	type="number" class="form-control" value="<?=$r['rw']?>">
			                            </div>
		                            </div>
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['dukuh']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>Dukuh</label>
		                            <input disabled
		                            name="dukuh"
		                            type="text" class="form-control" value="<?=$r['dukuh']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['jalan_gang']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>Jalan/Gang</label>
		                            <input disabled
		                            name="jalan_gang"
		                            type="text" class="form-control" value="<?=$r['jalan_gang']?>">
		                        </div>
							</div>
							</form>
						</div>
						
			            <div class="panel panel-default">
			                <div class="panel-heading">
			                    <i class="fa fa-files-o fa-fw"></i> Berkas-berkas
			                </div>
			                <div id="panel-berkas" class="panel-body">
			                <?php 
			                $get_persyaratan = $this->m_pengajuan->get_persyaratan($r['id_jenis_lembaga'], $r['id_jenis_pengajuan']);
			                foreach($get_persyaratan as $p): 
			                $file=$this->m_berkas->berkas_exists($r['id'],$p['id_berkas']);
			                $ada=$file!='';
			                $url_dl=base_url('download/?kind=berkas_pengajuan'
			                				.'&id_user='.$r['id_user']
			                				.'&id_pengajuan='.$r['id']
			                				.'&file='.$file);
			                $fix_file_ext = str_replace('|', ' / ', $p['file_ext']);
			                ?>
								<div style="padding: 5px" class="form-group <?=$ada ? 'bg-info' : 'bg-danger'?>">
		                            <label id="lbl<?=$p['id_berkas']?>"><?=$p['berkas']?></label>
		                            <div class="row">
			                            <div class="col col-sm-7">
			                            	<input type="file" class="form-control" disabled
			                            	id="<?=$p['id_berkas']?>" data-filetype="<?=$p['file_ext']?>" >
				                            <div class="text-danger">Tipe file: <?=$fix_file_ext?></div>
			                            </div>
			                            <div class="col col-sm-5">
											<button 
											class="btn btn-sm" disabled=""
											><i class="fa fa-cloud-upload"> Upload</i></button>
											
											<button 
											<?=$ada ? 'class="btn btn-sm btn-success"' : 'class="btn btn-sm" disabled'?>
											id="btn-download"
											data-idberkas="<?=$p['id_berkas']?>" 
											onclick="location.href='<?=$url_dl?>'"
											><i class="fa fa-cloud-download"> Download</i></button>

											<button 
											class="btn btn-sm" disabled=""
											><i class="fa fa-trash"> Hapus</i></button>

			                            </div>
		                            </div>
		                        </div>
							<?php endforeach; ?>
							</div>
						</div>

                    <?php 
                    endforeach;
                    if($r['status']==2):
                    ?>
                	
                	<div class="well well-sm">
                		<button class="btn btn-danger" data-toggle="modal" data-target="#modal-tolak-terima">Tolak</button>
                		<button class="btn btn-primary" data-toggle="modal" data-target="#modal-tolak-terima">Terima</button>
            		</div>
            		
            		<?php endif; ?>
            		
            	</div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tolak-terima" tabindex="-1" role="dialog" aria-labelledby="modal-tambahLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-label">Label</h4>
      </div>
      <div class="modal-body">
            <form role="form" method="post">
				<div class="form-group">
                    <label>Keterangan / Alasan</label>
                    <textarea class="form-control" id="keterangan">Ket</textarea>
                    <small>Informasi ini juga akan dikirim ke email user</small>
                </div>                    	
            </form>
        
      </div>
      <div class="modal-footer">
      	<span id="spanblink" class="pull-left text-danger"></span>
        <button id="btn-simpan" class="btn btn-primary">Ok</button>
        <button class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
function blink_text() {
    $('#spanblink').fadeOut(500);
    $('#spanblink').fadeIn(500);
}
$(function(){
	$('#modal-tolak-terima').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id_pengajuan = $('#id-pengajuan').val();
		var tolak_terima;
		
		if(button.hasClass('btn-danger')){
			$('#modal-label').text('Tolak Pengajuan');
			$('#keterangan').text('');
			tolak_terima='tolak';
		}else{
			$('#modal-label').text('Terima Pengajuan');
			$('#keterangan').text('Silahkan datang ke kantor PD Pontren Brebes untuk mengambil SK Ijop dengan membawa Berkas Pengajuan yang telah diupload sebelumnya');
			tolak_terima='terima';			
		}
		
		$('#btn-simpan').off('click');
		$('#btn-simpan').on('click', function(){
			if($('#keterangan').val()==''){
				alert('Keterangan wajib diisi');
				return;
			}
			$('#btn-simpan').attr('disabled', true);
			myTimer = setInterval(blink_text, 1000);
			$('#spanblink').text('Tunggu sebentar....');
			$.post('<?=base_url("api/tolak_terima_pengajuan/?callback=?")?>',
				{
					id_pengajuan : id_pengajuan,
					tolak_terima : tolak_terima,
					id_user : <?=$r['id_user']?>,
					keterangan : $('#keterangan').val()
				},
				function(data){
					if(data==1){
						location.href='<?=base_url("admin/approval")?>';
					}else{
						alert('Error: Tidak dapat menyimpan data');
						$('#btn-simpan').attr('disabled', false);
						clearInterval(myTimer);
						$('#spanblink').text('');
					}
				}
			);
		});
	});

});
</script>

