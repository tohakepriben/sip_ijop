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
                    <i class="fa fa-users fa-fw"></i> <?=$sub_title?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                            <table width="100%" class="table table-striped table-bordered table-hover" 
                            id="tbl-pengguna">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Hp</th>
                                        <th>Tgl. Registrasi</th>
                                        <th>Log Terakhir</th>
                                        <th><i class="fa fa-key fa-fw"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
                                	$i=1;
                                	foreach($pengguna as $r):
                                	?>
                                    <tr class="odd gradeX" <?=$r['locked'] ? 'style="color: red"' : ''?>>
                                        <td><?=$i++?></td>
                                        <td><?=$r['nama']?></td>
                                        <td><?=$r['email']?></td>
                                        <td><?=$r['hp']?></td>
                                        <td><?=$r['created']?></td>
                                        <td><?=$r['last_login']?></td>
                                        <td id="aksi">
											<?php if($r['locked']): ?>
		                                    	<button id="usr<?=$r['id']?>"
		                                    		onclick="lock_user(<?=$r['id']?>, 0);"
		                                    		class="btn btn-xs btn-danger">
		                                    		<i class="fa fa-lock fw"></i>
		                                    	</button>
											<?php else: ?>
		                                    	<button id="usr<?=$r['id']?>"
		                                    		onclick="lock_user(<?=$r['id']?>, 1);"
		                                    		class="btn btn-xs btn-success">
		                                    		<i class="fa fa-unlock fw"></i>
		                                    	</button>
											<?php endif; ?>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <button onclick="location.reload()" class="btn btn-primary" style="width: 200px">Refresh</button>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>


<script>
function lock_user(id, val){
	var ctl = $('button#usr'+id);
	$.post('<?=base_url("api/lock_user/?callback=?")?>',
		{id:id,val:val},
		function(data){
			if(data==1){
				if(ctl.hasClass('btn-success')){
					ctl.removeClass('btn-success');
					ctl.addClass('btn-danger');
					ctl.html('<i class="fa fa-lock fw">');
				}else{
					ctl.removeClass('btn-danger');						
					ctl.addClass('btn-success');
					ctl.html('<i class="fa fa-unlock fw">');
				}
			}else{
				alert('Error: Gagal merubah data');
			}
		}
	);
}

$(document).ready(function(){ 
	$('#tbl-pengguna').DataTable(
		{responsive: true,
		dom: 'Bfrtip',
		buttons: ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5']}
	);
});
</script>