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
                    <i class="fa fa-files-o fa-fw"></i> <?=$sub_title?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="well well-sm">
	                    <form role="form" method="post">
							<div class="form-group">
	                            <div class="row">
		                            <div class="col col-sm-6">
			                            <label>Jenis Lembaga</label>
										<select name="id_jenis_lembaga" class="form-control" id="jenis-lembaga">
					                        <option value="1" <?=$id_jenis_lembaga==1?'selected':''?>>Ponpes</option>
					                        <option value="2" <?=$id_jenis_lembaga==2?'selected':''?>>MDTA</option>
					                        <option value="3" <?=$id_jenis_lembaga==3?'selected':''?>>TPQ</option>
					                    </select>
		                            </div>
		                            <div class="col col-sm-6">
			                            <label>Jenis Pengajuan</label>
										<select name="id_jenis_pengajuan" class="form-control" id="jenis-pengajuan">
					                        <option value="1" <?=$id_jenis_pengajuan==1?'selected':''?>>Ijop Baru</option>
					                        <option value="2" <?=$id_jenis_pengajuan==2?'selected':''?>>Perpanjangan Ijop</option>
					                    </select>
		                            </div>
	                            </div>
	                        </div>
							<button type="submit" id="btn-tampilkan" class="btn btn-info">Tampilkan data</button>
	                    </form>
                    </div>

				    <input 
				    	type="file" 
				    	id="browse-file" 
				    	data-idberkas=""
				    	style="display: none" 
				    />
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Berkas (Tipe File)</th>
                                    <th>File Berkas</th>
                                    <th>Disyaratkan</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-berkas">
			                <?php 
			                $no=1;
			                foreach($syarat_berkas as $sb): 
			                $ya_active 		= $sb['disyaratkan'] == 1 ? 'active' : '';
			                $ya_checked 	= $sb['disyaratkan'] == 1 ? 'checked' : '';
			                $tidak_active 	= $sb['disyaratkan'] == 0 ? 'active' : '';
			                $tidak_checked 	= $sb['disyaratkan'] == 0 ? 'checked' : '';

			                $file=$this->m_berkas->ref_get_detil_berkas($sb['id_berkas'], 'file_'.$id_jenis_lembaga);
			                $ada=$file!='';
			                $url_dl=base_url('download/?kind=instrumen'
			                				.'&id_jenis_lembaga='.$id_jenis_lembaga
			                				.'&file='.$file);
			                
			                ?>
                                <tr id="tr-berkas">
                                    <td><?=$no++?></td>
                                    <td>
                                    	<?=$sb['berkas'].' ('.$sb['file_ext'].') '?>
										<button 
										class="btn btn-xs btn-link"
										id="btn-edit"
										data-toggle="modal" data-target="#modal-edit-berkas"
										data-idberkas="<?=$sb['id_berkas']?>"
										data-namaberkas="<?=$sb['berkas']?>"
										data-tipeberkas="<?=$sb['file_ext']?>"
										title="Edit" 
										><i class="fa fa-edit"></i></button>                                    		
                                    </td>
                                    <td>

										<button 
										<?=$ada ? 'class="btn btn-sm" disabled' : 'class="btn btn-sm btn-primary"'?>
										id="btn-upload<?=$sb['id']?>"
										onclick="upload_berkas(<?=$sb['id_berkas']?>);"
										><i class="fa fa-cloud-upload"> Upload</i></button>
										
										<button 
										<?=$ada ? 'class="btn btn-sm btn-success"' : 'class="btn btn-sm" disabled'?>
										id="btn-download<?=$sb['id_berkas']?>"
										onclick="location.href='<?=$url_dl?>'"
										><i class="fa fa-cloud-download"> Download</i></button>

										<button 
										<?=$ada ? 'class="btn btn-sm btn-danger"' : 'class="btn btn-sm" disabled'?>
										id="btn-hapus<?=$sb['id_berkas']?>"
										data-toggle="modal" data-target="#modal-hapus-berkas"
										data-idberkas="<?=$sb['id_berkas']?>" 
										data-file="<?=$file?>"
										><i class="fa fa-trash"> Hapus</i></button>


                                    </td>
                                    <td>
                                    <input type="hidden" name="id-syarat" value="<?=$sb['id']?>" />
									<div class="btn-group" data-toggle="buttons">
									  <label class="btn btn-warning btn-sm <?=$ya_active?>">
									    <input 
									    	type="radio" 
									    	value="1" 
									    	onchange="simpan_syarat(<?=$sb['id']?>,1);"
									    	name="berkas<?=$sb['id_berkas']?>" <?=$ya_checked?>
									    > Ya
									  </label>
									  <label class="btn btn-warning btn-sm <?=$tidak_active?>">
									    <input 
									    	type="radio" 
									    	value="0" 
									    	onchange="simpan_syarat(<?=$sb['id']?>,0);"
									    	name="berkas<?=$sb['id_berkas']?>" <?=$tidak_checked?>
									    > Tidak
									  </label>
									</div>
                                    
                                    	
                                    </td>
                                </tr>
			                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button class="btn btn-info" id="btn-tambah" data-toggle="modal" data-target="#modal-edit-berkas" style="width: 200px">Tambah Berkas</button>
                    </div>
                	<br />
                	<div class="well well-sm">
                		<strong>Catatan!</strong>
                		<ol>
                			<li>
                				Maksimal ukuran berkas adalah 1 Mb (1024 Kb)
                			</li>
                			<li>
                				Nama Berkas dan File Berkas berlaku sama untuk semua jenis lembaga dan pengajuan
                			</li>
                			<li>
                				Status Disyaratkan berlaku berbeda untuk masing-masing jenis lembaga dan jenis pengajuan
                			</li>
                		</ol>
                	</div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-berkas" tabindex="-1" role="dialog" aria-labelledby="modal-editLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-edit-title">Edit Berkas</h4>
      </div>
      <div class="modal-body">
            <form role="form" method="post">
				<div class="form-group">
                    <label>Nama Berkas</label>
                    <input id="nama-berkas" class="form-control" />
                    <p class="text-danger"></p>
                </div>                    	
				<div class="form-group">
                    <label>Tipe File</label>
                    <input id="tipe-berkas" class="form-control" />
                    <p class="text-danger">Jika lebih dari satu, pisah dengan brvbar (|)</p>
                </div>                    	
            </form>
			<div class="well well-sm bg-danger">
				<strong>Perhatian!!!</strong>
				<p>Data tidak dapat dihapus. Sebelum menambahkan atau merubah data persyaratan pastikan sudah dipertimbangkan matang karena akan berdampak pada user lembaga ketika Pengajuan Ijop</p>
			</div>
      </div>
      <div class="modal-footer">
        <button id="btn-simpan-berkas" class="btn btn-primary">Simpan</button>
        <button class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-hapus-berkas" tabindex="-1" role="dialog" aria-labelledby="modal-hapusLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
      Hapus berkas?
      </div>
      <div class="modal-footer">
        <button id="btn-hapus-berkas" class="btn btn-danger">Hapus</button>
        <button class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>



<script>
function upload_berkas(id_berkas){
	$('#browse-file').val('');
	$('#browse-file').data('idberkas', id_berkas);
	$('#browse-file').click();
};

function simpan_syarat(id, val){
	$.post('<?=base_url("api/simpan_syarat/?callback=?")?>',
		{id : id, disyaratkan : val},
		function(data) {
			if(data!=1) alert('Error: Tidak dapat menyimpan perubahan');
		}
	);
};

$(function(){	
	$('#modal-edit-berkas').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		$('input#nama-berkas').val('');
		$('input#tipe-berkas').val('');
		$('#btn-simpan-berkas').off('click');
		if(button.attr('id')=='btn-edit'){
			$('#modal-edit-title').text('Edit Berkas');
			$('input#nama-berkas').val(button.data('namaberkas'));
			$('input#tipe-berkas').val(button.data('tipeberkas'));
			$('#btn-simpan-berkas').on('click', function(){
				$.post('<?=base_url("api/ref_edit_berkas/?callback=?")?>',
					{
						id : button.data('idberkas'),
						berkas : $('input#nama-berkas').val(),
						file_ext : $('input#tipe-berkas').val()
					},
					function(data){
						if(data=='nama_berkas_exists'){
							alert('Error: Nama berkas sudah ada!');
						}else if(data==1){
							$('#btn-tampilkan').click();
						}else if(data=='belum lengkap'){
							alert('Error: Data belum lengkap!')
						}else{
							alert('Error: Tidak dapat menyimpan perubahan');
						}
					}
				);
			});

		}else{
			$('#modal-edit-title').text('Tambah Berkas');
			$('#btn-simpan-berkas').on('click', function(){
				$.post('<?=base_url("api/ref_tambah_berkas/?callback=?")?>',
					{
						berkas : $('input#nama-berkas').val(),
						file_ext : $('input#tipe-berkas').val()
					},
					function(data){
						if(data=='nama_berkas_exists'){
							alert('Error: Nama berkas sudah ada!')
						}else if(data=='belum lengkap'){
							alert('Error: Data belum lengkap!')
						}else{
							$('#btn-tampilkan').click();
						}
					}
				);
			});
			
		}

	});

	$('#modal-hapus-berkas').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id_berkas = button.data('idberkas');
		var id_lembaga = <?=$id_jenis_lembaga?>;
		var file = button.data('file');
		$('#btn-hapus-berkas').off('click');
		$('#btn-hapus-berkas').on('click', function(){
			$.post('<?=base_url("api/ref_hapus_file_berkas/?callback=?")?>',
				{
					id : button.data('idberkas'),
					id_lembaga : id_lembaga,
					file : file
				},
				function(data){
					if(data==1) $('#btn-tampilkan').click();
					else alert('Error: Tidak dapat menyimpan perubahan');
				}
			);
		});


	});

	$('#browse-file').change(function(){
		var ctl_file = $(this);
    	if(ctl_file.val()==''){
    		return;				
		}

	    var id_lembaga = <?=$id_jenis_lembaga?>;
		var id_berkas = ctl_file.data('idberkas');

	    var form_data = new FormData();                  
	    form_data.append('id_lembaga', id_lembaga);
	    form_data.append('id_berkas', id_berkas);
	    form_data.append('file_data', ctl_file.prop('files')[0]);
	    form_data.append('file_name', ctl_file.val());

	    $.ajax({
	        type		: 'post',
	        url			: '<?=base_url("api/upload_berkas_instrumen")?>', // point to server-side PHP script 
	        data		: form_data,                         
	        dataType	: 'text',  // what to expect back from the PHP script, if anything
	        cache		: false,
	        contentType	: false,
	        processData	: false,
	        success		: function(data){
	        				if(data==1){
	        					$('#btn-tampilkan').click();
							}else{
	            				alert(data);
							}
	        			  }
	     });			    	

	});


});

</script>

