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
                    <i class="fa fa-cloud-download fa-fw"></i> <?=$sub_title?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Berkas</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach($instrumen as $r): 
                            if(strtolower($r['berkas'])=='null') continue;
                            $ada_ponpes=$r['file_1']!='';
                            $ada_mdta=$r['file_2']!='';
                            $ada_tpq=$r['file_3']!='';

                            $url_dl_ponpes=base_url('download/?kind=instrumen&id_jenis_lembaga=1&file='.$r['file_1']);
                            $url_dl_mdta=base_url('download/?kind=instrumen&id_jenis_lembaga=2&file='.$r['file_2']);
                            $url_dl_tpq=base_url('download/?kind=instrumen&id_jenis_lembaga=3&file='.$r['file_3']);
                            ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$r['berkas']?></td>
                                    <td>
                                    	<button 
                                    		<?php if($ada_ponpes): ?>
        	                            		class="btn btn-xs btn-primary"
	                                    		onclick="location.href='<?=$url_dl_ponpes?>'"
                                    		<?php else: ?>
        	                            		class="btn btn-xs btn-default disabled"
                                    		<?php endif; ?>
                                    		><i class="fa fa-cloud-download"> Ponpes</i>
                                		</button>
                                    	<button 
                                    		<?php if($ada_mdta): ?>
    	                                		class="btn btn-xs btn-success"
    	                                		onclick="location.href='<?=$url_dl_mdta?>'"
                                    		<?php else: ?>
        	                            		class="btn btn-xs btn-default disabled"
                                    		<?php endif; ?>
                                    		><i class="fa fa-cloud-download"> MDTA</i>
                                		</button>
                                    	<button 
                                    		<?php if($ada_tpq): ?>
	                                    		class="btn btn-xs btn-info"
        	                            		onclick="location.href='<?=$url_dl_tpq?>'"
                                    		<?php else: ?>
        	                            		class="btn btn-xs btn-default disabled"
                                    		<?php endif; ?>
                                    		><i class="fa fa-cloud-download"> TPQ</i>
                                		</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
