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
                    <i class="fa fa-link fa-fw"></i> <?=$sub_title?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

		                <ul class="nav nav-tabs">
		                    <li id="tab-ponpes" class="active"><a href="#ponpes" data-toggle="tab" aria-expanded="true">Ponpes</a></li>
		                    <li id="tab-mdta" class=""><a href="#mdta" data-toggle="tab" aria-expanded="false">MDTA</a></li>
		                    <li id="tab-tpq" class=""><a href="#tpq" data-toggle="tab" aria-expanded="false">TPQ</a></li>
		                </ul>

		                <!-- Tab Anggota -->
		                <div class="tab-content" style="padding-top: 10px">
							<div class="tab-pane fade active in" id="ponpes">
								<div class="table-responsive">
									<img src="<?=base_url('assets/alur-ponpes.jpg')?>" 
									style="max-width:100%; width: 700px" >
								</div>
							</div>
							<div class="tab-pane fade" id="mdta">
								<div class="table-responsive">
									<img src="<?=base_url('assets/alur-mdta-tpq.jpg')?>" 
									style="max-width:100%; width: 700px" >
							    </div>
							</div>
							<div class="tab-pane fade" id="tpq">
								<div class="table-responsive">
									<img src="<?=base_url('assets/alur-mdta-tpq.jpg')?>" 
									style="max-width:100%; width: 700px" >
							    </div>
							</div>

		                </div>                    
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
