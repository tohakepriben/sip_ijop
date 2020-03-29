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
                            $url_dl_ponpes=base_url('download/?kind=instrumen&lembaga=ponpes&file='.$r['file_ponpes']);
                            $url_dl_mdta=base_url('download/?kind=instrumen&lembaga=mdta&file='.$r['file_mdta']);
                            $url_dl_tpq=base_url('download/?kind=instrumen&lembaga=tpq&file='.$r['file_tpq']);
                            ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$r['berkas']?></td>
                                    <td>
                                    	<button 
                                    		class="btn btn-xs btn-primary"
                                    		onclick="location.href='<?=$url_dl_ponpes?>'">
                                    		<i class="fa fa-cloud-download"> Ponpes</i>
                                		</button>
                                    	<button 
                                    		class="btn btn-xs btn-success"
                                    		onclick="location.href='<?=$url_dl_mdta?>'">
                                    		<i class="fa fa-cloud-download"> MDTA</i>
                                		</button>
                                    	<button 
                                    		class="btn btn-xs btn-info"
                                    		onclick="location.href='<?=$url_dl_tpq?>'">
                                    		<i class="fa fa-cloud-download"> TPQ</i>
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
