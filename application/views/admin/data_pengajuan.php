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
                                <td><?=$r['nama_user']?></td>
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


<script>
	$(document).ready(function(){ 
	$('#tbl-pengajuan').DataTable({
		responsive: true,
		dom: 'Bfrtip',
		buttons: ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5']
		});
	}); 
</script>
