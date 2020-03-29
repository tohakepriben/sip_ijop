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
                    <i class="fa fa-check-square fa-fw"></i> <?=$sub_title?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="well well-sm">
	                    <form role="form" method="post">
							<div class="form-group">
	                            <div class="row">
		                            <div class="col col-sm-6">
			                            <label>Jenis Lembaga</label>
										<select class="form-control" id="jenis-lembaga">
					                        <option value="1" selected="">Ponpes</option>
					                        <option value="2">MDTA</option>
					                        <option value="3">TPQ</option>
					                    </select>
		                            </div>
		                            <div class="col col-sm-6">
			                            <label>Jenis Pengajuan</label>
										<select class="form-control" id="jenis-pengajuan">
					                        <option value="1" selected="">Ijop Baru</option>
					                        <option value="2">Perpanjangan Ijop</option>
					                    </select>
		                            </div>
	                            </div>
	                        </div>
	                    </form>
						<button id="btn-tampilkan" class="btn btn-info">Tampilkan data</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Berkas</th>
                                    <th>Tipe File</th>
                                    <th>Disyaratkan</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-berkas">
			                <?php 
			                $no=1;
			                foreach($syarat_berkas as $sb): 
			                $ya_active = $sb['disyaratkan'] == 1 ? 'active' : '';
			                $ya_checked = $sb['disyaratkan'] == 1 ? 'checked' : '';
			                $tidak_active = $sb['disyaratkan'] == 0 ? 'active' : '';
			                $tidak_checked = $sb['disyaratkan'] == 0 ? 'checked' : '';
			                ?>
                                <tr id="tr-berkas">
                                    <td><?=$no++?></td>
                                    <td><?=$sb['berkas']?></td>
                                    <td><?=$sb['file_ext']?></td>
                                    <td>
                                    <input type="hidden" name="id-syarat" value="<?=$sb['id']?>" />
									<div class="btn-group" data-toggle="buttons">
									  <label class="btn btn-success btn-sm <?=$ya_active?>">
									    <input type="radio" value="1" name="berkas<?=$sb['id_berkas']?>" <?=$ya_checked?>> Ya
									  </label>
									  <label class="btn btn-success btn-sm <?=$tidak_active?>">
									    <input type="radio" value="0" name="berkas<?=$sb['id_berkas']?>" <?=$tidak_checked?>> Tidak
									  </label>
									</div>
                                    
                                    	
                                    </td>
                                </tr>
			                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" id="btn-simpan" style="width: 200px">Simpan</button>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
<script>
$(function(){
    $('#btn-tampilkan').click(function(){
    	$("#tbody-berkas tr").remove();
    	var no = 1;
		$.post('<?=base_url("api/get_persyaratan/?callback=?")?>',
			{
				jenis_lembaga	: $('#jenis-lembaga').val(),
				jenis_pengajuan	: $('#jenis-pengajuan').val()
			},
			function(data){
	            $.each(JSON.parse(data), function(){
	                var ya_active = this.disyaratkan == 1 ? 'active' : '';
	                var ya_checked = this.disyaratkan == 1 ? 'checked' : '';
	                var tidak_active = this.disyaratkan == 0 ? 'active' : '';
	                var tidak_checked = this.disyaratkan == 0 ? 'checked' : '';
	                var data_row = '<tr id="tr-berkas"><td>' + no++ + 
	                	'</td><td>' + this.berkas + 
	                	'</td><td>' + this.file_ext + 
	                	'</td><td>' + 
	                	'<input type="hidden" name="id-syarat" value="' + this.id + '" />' +
						'<div class="btn-group" data-toggle="buttons">' + 
						  '<label class="btn btn-success btn-sm ' + ya_active + '">' +
						    '<input type="radio" value="1" name="berkas' + this.id_berkas + '" ' + ya_checked + '> Ya' +
						  '</label>' +
						  '<label class="btn btn-success btn-sm ' + tidak_active + '">' +
						    '<input type="radio" value="0" name="berkas' + this.id_berkas + '" ' + tidak_checked + '> Tidak' +
						  '</label>' +
						'</div>' +
	                	'</td></tr>';
	                $('#tbody-berkas').append(data_row);
	            });
			}
		);				
	});	

    $('#btn-simpan').click(function(){
    	var arrdata='';
		$('tr#tr-berkas').each(function () {
			var ctl = $(this).find('td').last();
			var id_berkas = ctl.find('input[name="id-syarat"]').val();
			var status = ctl.find('input:checked').val();
		    arrdata = arrdata + id_berkas + '-' + status + '|';
		});
		arrdata = arrdata.substring(0, arrdata.length - 1);
		alert(arrdata);
		$.post('<?=base_url("api/simpan_persyaratan/?callback=?")?>',
			{arr_data : arrdata},
			function(data){
				if(data==1){
					alert('Pengaturan berhasil disimpan');
				}else{
					alert('Error: Tidak dapat menyimpan');
				}
			}
		);
	});		
});
</script>

