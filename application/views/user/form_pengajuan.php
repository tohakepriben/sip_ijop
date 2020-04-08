<?php
$removable = FALSE;
$prosen = 100;
$id_pengajuan=0;

?>

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
                	$disabled='disabled';
                    if($r['status']==1 || $r['status']==3){
                    	$removable=TRUE;
                    	$disabled='';
					}
                    if($r['status']==1) $prosen=$this->m_pengajuan->hitung_prosen($r['id']);
                    $id_pengajuan=$r['id'];
                    
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
		                            <input <?=$disabled?>
		                            name="nama_lembaga" 
		                            type="text" class="form-control" value="<?=$r['nama_lembaga']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['tahun_berdiri']>1900 ? 'bg-info' : 'bg-danger'?>">
		                            <label>Tahun Berdiri</label>
		                            <input <?=$disabled?>
		                            name="tahun_berdiri"
		                            type="number" class="form-control" value="<?=$r['tahun_berdiri']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['nama_pimpinan']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>Nama Pimpinan Lembaga</label>
		                            <input <?=$disabled?>
		                            name="nama_pimpinan"
		                            type="text" class="form-control" value="<?=$r['nama_pimpinan']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['hp']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>No. HP</label>
		                            <input <?=$disabled?>
		                            name="hp"
		                            type="tel" class="form-control" value="<?=$r['hp']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['nama_yayasan']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>Nama Yayasan / Badan Hukum</label>
		                            <input <?=$disabled?>
		                            name="nama_yayasan"
		                            type="text" class="form-control" value="<?=$r['nama_yayasan']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['id_kecamatan']>0 ? 'bg-info' : 'bg-danger'?>">
		                            <label>Kecamatan</label>
									<select <?=$disabled?>
									name="id_kecamatan"
									id="pil-kecamatan"
									class="form-control">
				                        <option>--Pilih salah satu--</option>
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
									<select <?=$disabled?>
									name="id_kelurahan"
									id="pil-kelurahan"
									class="form-control">
				                        <option>--Pilih salah satu--</option>
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
			                            	<input <?=$disabled?>
			                            	name="rt"
			                            	type="number" class="form-control" value="<?=$r['rt']?>">
			                            </div>
			                            <div class="col col-sm-6">
				                            <label>RW</label>
			                            	<input <?=$disabled?>
			                            	name="rw"
			                            	type="number" class="form-control" value="<?=$r['rw']?>">
			                            </div>
		                            </div>
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['dukuh']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>Dukuh</label>
		                            <input <?=$disabled?>
		                            name="dukuh"
		                            type="text" class="form-control" value="<?=$r['dukuh']?>">
		                        </div>
								<div style="padding: 5px" class="form-group <?=$r['jalan_gang']!='' ? 'bg-info' : 'bg-danger'?>">
		                            <label>Jalan/Gang</label>
		                            <input <?=$disabled?>
		                            name="jalan_gang"
		                            type="text" class="form-control" value="<?=$r['jalan_gang']?>">
		                        </div>
		                        <?php if($removable): ?>
								<a id="btn-simpan-lembaga" class="btn btn-primary">
								<i class="fa fa-save"> Simpan Data Lembaga</i></a>
		                        <?php endif; ?>
							</div>
							</form>
						</div>
						
			            <div class="panel panel-default">
			                <div class="panel-heading">
			                    <i class="fa fa-files-o fa-fw"></i> Berkas-berkas <span class="text-danger">(Maks 1Mb)</span>
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
			                            	<input type="file" class="form-control" <?=$ada ? 'disabled' : ''?>
			                            	id="<?=$p['id_berkas']?>" data-filetype="<?=$p['file_ext']?>" >
				                            <div class="text-danger">Tipe file: <?=$fix_file_ext?></div>
			                            </div>
			                            <div class="col col-sm-5">
											<?php if($removable): ?>
											<button 
											<?=$ada ? 'class="btn btn-sm" disabled' : 'class="btn btn-sm btn-primary"'?>
											id="btn-upload"
											data-idberkas="<?=$p['id_berkas']?>" 
											><i class="fa fa-cloud-upload"> Upload</i></button>
											<?php endif; ?>
											
											<button 
											<?=$ada ? 'class="btn btn-sm btn-success"' : 'class="btn btn-sm" disabled'?>
											id="btn-download"
											data-idberkas="<?=$p['id_berkas']?>" 
											onclick="location.href='<?=$url_dl?>'"
											><i class="fa fa-cloud-download"> Download</i></button>

											<?php if($removable): ?>
											<button 
											<?=$ada ? 'class="btn btn-sm btn-danger"' : 'class="btn btn-sm" disabled'?>
											data-toggle="modal" data-target="#modal-hapus-berkas"
											id="btn-hapus"
											data-idberkas="<?=$p['id_berkas']?>" 
											data-file="<?=$file?>"
											><i class="fa fa-trash"> Hapus</i></button>
											<?php endif; ?>

			                            </div>
		                            </div>
		                        </div>
							<?php endforeach; ?>
							</div>
						</div>

                    <?php 
                    endforeach;
                    ?>
                	
                	<div class="well-sm">
	            		<?php if($removable): ?>                	
                		<h4>Progres Kelengkapan Data Pengajuan</h4>
                		<div class="col-lg">
							<div class="progress">
							  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" 
							  <?php echo 'style="width: '.$prosen.'%;"' ?> 
							  aria-valuenow="<?=$prosen?>" aria-valuemin="0" aria-valuemax="100"><strong><?=$prosen?>%</strong>
							  </div>
							</div>                                    	
	                		
                		</div>
	            		Silahkan klik <button onclick="location.reload()" class="btn btn-xs btn-primary"> Refresh</button> atau tekan F5 pada keyboard untuk mengetahui progres
	            		<p>Jika sudah 100% dan tidak ada yang masih merah anda bisa meng-klik tombol Ajukan di bawah ini</p>
	            		<button id="btn-ajukan" class="btn btn-block <?=$prosen==100 ? 'btn-primary' : 'btn-dark disabled'?>">Ajukan Permohonan</button>
	            		<?php elseif($r['status']==2): ?>                	
                		<h4>Data sudah diajukan. Silahkan menunggu validasi</h4>
	            		<?php elseif($r['status']==4): ?>                	
                		<h4>Data sudah diterima. Terima kasih</h4>
		        		<?php endif; ?>
            		</div>
            	</div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

<?php if($removable): ?>
<div class="modal fade" id="modal-hapus-berkas" tabindex="-1" role="dialog" aria-labelledby="modal-hapusLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-logoutLabel">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        Hapus berkas <strong><span id="nama-berkas-hapus"></span></strong>?
      </div>
      <div class="modal-footer">
        <button id="btn-hapus-konfirmasi" class="btn btn-danger">Hapus</button>
        <button class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<script>
$(function(){
    $('#btn-simpan-lembaga').click(function(){
    	$.ajax({
            type:'POST',
            url:'<?=base_url("api/update_data_lembaga/?callback=?")?>',
            data:$('form#form-data-lembaga').serialize(),
            success: function(data){
				if(data==1){
			    	alert('Data lembaga berhasil disimpan');
				}else{
					alert('Error: Tidak dapat menghapus berkas');
				}
            }
        });
    });
	
    $('#pil-kecamatan').change(function(){
    	if($('#pil-kecamatan').val()==''){
			return;
		}
		var id_kecamatan = $('#pil-kecamatan').val();

		$('#pil-kelurahan option').remove();
		var data_row = '<option selected>--Pilih salah satu--</option>';
        $('#pil-kelurahan').append(data_row);
        $.getJSON('<?=base_url('api/get_all_kelurahan/')?>'+id_kecamatan, 
        	function(data) {
            $.each(data, function(){
                var data_row = '<option value=' + this.id + '>' + 
                	this.kelurahan + ' (' + this.kd_pos + ')</option>';
                $('#pil-kelurahan').append(data_row);
            });
        });        
	});		
	
    $('button#btn-upload').click(function(){
    	var curr_btn = $(this);
    	var id_berkas = curr_btn.data('idberkas');
    	var ctl_file = $('input#'+id_berkas);
    	if(ctl_file.attr('disabled')) return;
    	if(ctl_file.val() == ''){
    		alert('Error: File masih kosong');
    		return;			
		}
	    var id_pengajuan =  $("#id-pengajuan").val();
	    var file_data = $('input#'+id_berkas).prop('files')[0];   
	    var form_data = new FormData();                  

	    form_data.append('id_pengajuan', id_pengajuan);
	    form_data.append('id_berkas', id_berkas);
	    form_data.append('file_data', file_data);
	    form_data.append('file_name', ctl_file.val());
	    form_data.append('file_type', ctl_file.data('filetype'));

	    $.ajax({
	        type		: 'post',
	        url			: '<?=base_url("api/upload_berkas_persyaratan")?>', // point to server-side PHP script 
	        data		: form_data,                         
	        dataType	: 'text',  // what to expect back from the PHP script, if anything
	        cache		: false,
	        contentType	: false,
	        processData	: false,
	        success		: function(data){
	        				if(data==1){
	        					curr_btn.removeClass('btn-primary');
	        					curr_btn.attr('disabled', true);
	        					ctl_file.attr('disabled', true);
	        					alert('Sukses. Silahkan klik tombol Refresh atau tekan F5 pada keyboard untuk melihat perubahan');
							}else{
	            				alert(data);
							}
	        			  }
	     });			    	

	});

	<?php if($removable): ?>
	$('#modal-hapus-berkas').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id_berkas = button.data('idberkas');
		var file_name = button.data('file');
		var id_user = <?=$this->session->userdata('id_user')?>;
		
		$('#nama-berkas-hapus').text($('label#lbl'+id_berkas).text());
		$('#btn-hapus-konfirmasi').off('click');
		$('#btn-hapus-konfirmasi').on('click', function(){
			$.post('<?=base_url("api/hapus_berkas_persyaratan/?callback=?")?>',
				{
					id_user : id_user,
					file_name : file_name,
					id_pengajuan : <?=$id_pengajuan?>
				},
				function(data){
					if(data==1){
						location.reload();
					}else{
						alert('Error: Tidak dapat menghapus berkas');
					}
				}
			);
		});
	});
	<?php endif; ?>
	
	<?php if($prosen==100): ?>
    $('#btn-ajukan').click(function(){
		$.post('<?=base_url("api/ajukan_permohonan/?callback=?")?>',
			{
				id_pengajuan : <?=$id_pengajuan?>
			},
			function(data){
				if(data==1){
					location.href='<?=base_url("pengajuan/pengajuan_saya")?>';
				}else{
					alert('Error: Tidak dapat memproses pengajuan');
				}
			}
		);    	
	});
	<?php endif; ?>
});
</script>

