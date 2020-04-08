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
                    <i class="fa fa-list fa-fw"></i> <?=$sub_title?>
                </div>
                <div class="panel-body">
                    <table width="100%" id="tbl-pengajuan" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis Lembaga</th>
                                <th>Jenis Pengajuan</th>
                                <th>Nama Lembaga</th>
                                <th>Alamat Lembaga</th>
                                <th>Pengguna</th>
                                <th>Tgl. Pengajuan</th>
                                <th>Status</th>
                                <th>Lihat</th>
                                <th>Tgl. Respon</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        foreach($arr_pengajuan as $r): 
                        $kecamatan = $this->m_alamat->get_kecamatan($r['id_kecamatan']);
                        $alamat = '';
                        if($kecamatan!=''){
                            $kelurahan = $this->m_alamat->get_kelurahan($r['id_kelurahan']);
                            $rt = $r['rt'];
                            $rw = $r['rw'];
                            $alamat = $kelurahan.' RT '.$rt.'/'.$rw.' Kec.'.$kecamatan;								
						}
						$style_color = '';
						if($r['status']==2){
							$style_color = 'style="color: orange"';
						}elseif($r['status']==4){
							$style_color = 'style="color: green"';							
						}
						$url_lihat = base_url('admin/lihat_pengajuan/'.$r['id']);
                        ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=get_jns_lembaga($r['id_jenis_lembaga'])?></td>
                                <td><?=get_jns_pengajuan($r['id_jenis_pengajuan'])?></td>
                                <td><?=$r['nama_lembaga']?></td>
                                <td><?=$alamat?></td>
                                <td>
	                            	<button 
	                            		class="btn btn-xs btn-light"
										data-toggle="modal" data-target="#modal-info-pengguna"
	                            		data-email="<?=$r['email_user']?>"
	                            		data-hp="<?=$r['hp_user']?>"
	                            		data-log="<?=$r['log_user']?>"
	                            		><?=$r['nama_user']?></button>
                                </td>
                                <td><?=$r['tgl_pengajuan']?></td>
                                <td <?=$style_color?>><?=get_status($r['status'])?></td>
                                <td>
                                	<button 
                                    	class="btn btn-primary"
                                    	onclick="location.href='<?=$url_lihat?>'"
										>Lihat
									</button>
                                </td>
                                <td><?=$r['status']>2 ? $r['tgl_respon'] : '-'?></td>
                                <td><?=$r['keterangan']?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-info-pengguna" tabindex="-1" role="dialog" aria-labelledby="modal-infoLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Info Pengguna</h4>
      </div>
      <div class="modal-body">
            <form role="form" method="post">
				<div class="form-group">
                    <label>Nama</label>
                    <input id="txt-nama" class="form-control" readonly="" value="">
                </div>                    	

                <label>Email</label>
				<div class="form-group input-group">
                    <input type="text" id="txt-email" class="form-control" readonly="" value="">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                        	<a id="amailto" href="#"><i class="fa fa-envelope"></i></a>
                        </button>
                    </span>
                </div>

                <label>No. HP</label>
				<div class="form-group input-group">
                    <input type="text" id="txt-hp" class="form-control" readonly="" value="">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                        	<a id="atel" href="#"><i class="fa fa-phone-square"></i></a>
                        </button>
                    </span>
                </div>
                	
				<div class="form-group">
                    <label>Login Terakhir</label>
                    <input id="txt-log" class="form-control" readonly="" value="">
                </div>                    	
            </form>
        
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>



<script>
	$(document).ready(function(){ 
	$('#tbl-pengajuan').DataTable({
		responsive: true,
		dom: 'Bfrtip',
		buttons: ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5']
	});

	$('#modal-info-pengguna').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var mailaddr = button.data('email');
		var telnum = button.data('hp');
		$('#txt-nama').val(button.text());
		$('#txt-email').val(mailaddr);
		$('#amailto').attr('href', 'mailto:'+mailaddr);
		$('#txt-hp').val(telnum);
		$('#atel').attr('href', 'tel:'+telnum);
		$('#txt-log').val(button.data('log'));
	});

}); 
</script>
