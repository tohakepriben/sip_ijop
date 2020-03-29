<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="margin-top: 10px;"><?=$title?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-university fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?=$jp_ponpes?></div>
                            <div>Pengajuan Ponpes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-university fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?=$jp_mdta?></div>
                            <div>Pengajuan MDTA</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-university fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?=$jp_tpq?></div>
                            <div>Pengajuan TPQ</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-university fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?=$jp_ponpes+$jp_mdta+$jp_tpq?></div>
                            <div>Total Pengajuan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comment fa-fw"></i> <?=$sub_title?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                	<div tabindex="-1" style="float:left;">
                	<figure style="text-align: center">
                		<span>
	                        <img src="<?=base_url('assets/kasi-pd-pontren-bbs.jpg')?>" style="margin-right:10px; width:300px; height:auto;" >
                        </span>

						<figcaption>
							<strong>H. Akrom Jangka Daosat</strong>
							<p class="small text-info">Kasi PD Pontren Brebes</p>
						</figcaption>
						
					</figure>
					</div>
                    <div class="small text-primary">
                        Brebes, Sabtu 28 Maret 2020
                    </div>

                	<h3 style="margin-top: 10px">Assalamu'alaikum Wr. Wb.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur sita adipiscing elit. Proin molestie accumsan orci suneget placerat. Etiama faucibuss orci quis posuere vestibulu. Ut id purusos ultricies, dictumax quam id, ullamcorper urna. Curabitur sitdown nisi vitae nisi vestotana vestibul ut non massa. Aliquam erat volutpat. Morbi nect nunc et orci euismode finibus. Donec lobortis venenatis turpis. Aenean act congue arcu, nect porttitor magna. Nam consequa ligula nibh, in maximus gravida. Vivamus nuornare masa. Quisque sed honcus leo, ullamcorper auctor mi. Maecenas mollis purus, mattis nisl condimentum. Nam eros elementu, congue diam imperdiet, interdum tellus.</p>

                    <p>Mauris dapibus turpis vel ialis tempor. Morbi turpis leon, pulvinar vitae convallis vitae, scelerisque necto eros. Suspendisse vitae pharetra risus. Pellentesque varius, felis in lacinia faucibus, ipsum liula aliquam nulla, non honcus nunc ipsum eu risus. Nunc finibus euismod magna sagittis. Sed dictum libero consectetur.</p>

                    <ul>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Duis blandit maximus tellus, sagittis volutpat tellus sandi.</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Etiam vel auctor elit. Usaceros suscipit, lobortis felis non.</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Integer sagittis finibus nequer, euster tincidunt misult.</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Pellentesque euismod semeget diam ege</li>
                    </ul>
                    <p>Aliquam venenatis dui elit, et viverra mi maximus quis. Etiam vel auctor elit. Ut ac eros suscipit, lobortis felison, vulputate tellus. Suspendisse hendrerit aliquet lectus.</p>
                
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
		<div class="col-lg-4">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Pengajuan Perbulan
                </div>
                <div class="panel-body">
					<div class="progress" id="loading-chart1">
						<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" 
						style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><strong>Memuat data</strong>
						</div>
					</div>                                    	
                    <canvas id="chart-bar-jumlah" height="200"></canvas>
                </div>
            </div>
			
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Prosentase Jumlah
                </div>
                <div class="panel-body">
					<div class="progress" id="loading-chart2">
						<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" 
						style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><strong>Memuat data</strong>
						</div>
					</div>                                    	
                    <canvas id="chart-pie-prosentase" height="250"></canvas>
                </div>
            </div>            
		</div>
    </div>
    <!-- /.row -->
</div>

<script>
	var ctl = document.getElementById('chart-bar-jumlah').getContext('2d');
	var chart1 = new Chart(ctl, {
		type: 'bar', 
		data: {
	        labels : [],
	        datasets : [
	            {label : 'Ponpes', 	backgroundColor: '#337AB7', data : []},
	            {label : 'MDTA',	backgroundColor: '#5CB85C', data : []},
	            {label : 'TPQ',		backgroundColor: '#F0AD4E', data : []}
	         ]
	    }, 
		options: {plugins: {datalabels: {color: '#fff'}}}
	});

	$.post('<?=base_url("api/get_bln_pengajuan")?>',
		function(data){
			$.each(JSON.parse(data), function(){
				chart1.data.labels.push(this.bulan);
				chart1.update();
	
				$.post('<?=base_url("api/get_jumlah_pengajuan_by_bulan/1/")?>'+this.bln_pengajuan+'/4',
					function(data){
						chart1.data.datasets[0].data.push(parseInt(data));
						chart1.update();
					}
				);
				$.post('<?=base_url("api/get_jumlah_pengajuan_by_bulan/2/")?>'+this.bln_pengajuan+'/4',
					function(data){
						chart1.data.datasets[1].data.push(parseInt(data));
						chart1.update();
					}
				);
				$.post('<?=base_url("api/get_jumlah_pengajuan_by_bulan/3/")?>'+this.bln_pengajuan+'/4',
					function(data){
						chart1.data.datasets[2].data.push(parseInt(data));
						chart1.update();
					}
				);
            });
			$('#loading-chart1').remove();
		}
	);

	// Chart prosentase =======================================	
	var options = {
	    plugins: {datalabels: {
            formatter: (value, ctx) => {
                let sum = 0;
                let dataArr = ctx.chart.data.datasets[0].data;
                dataArr.map(data => {sum += data;});
                let percentage = value + ' (' + (value*100 / sum).toFixed(1) + '%)';
                return percentage;
            },
            color: '#fff',
        }}
	};

	var ctx = document.getElementById('chart-pie-prosentase').getContext('2d');
	var chart2 = new Chart(ctx, {
	    type: 'pie',
		data:{
			labels: [],
			datasets: [{
				data: [],
				backgroundColor: []}
			]
		},
	    options: options
	});
	

	$.post('<?=base_url("api/get_jumlah_pengajuan/1/0/4")?>',
		function(data){
			chart2.data.labels.push('Ponpes');
			chart2.data.datasets.forEach((dataset) => {
		        dataset.data.push(parseInt(data));
		        dataset.backgroundColor.push('#337AB7');
		    });
			chart2.update();

			$.post('<?=base_url("api/get_jumlah_pengajuan/2/0/4")?>',
				function(data){
					chart2.data.labels.push('MDTA');
					chart2.data.datasets.forEach((dataset) => {
				        dataset.data.push(parseInt(data));
				        dataset.backgroundColor.push('#5CB85C');
				    });
					chart2.update();

					$.post('<?=base_url("api/get_jumlah_pengajuan/3/0/4")?>',
						function(data){
							chart2.data.labels.push('TPQ');
							chart2.data.datasets.forEach((dataset) => {
						        dataset.data.push(parseInt(data));
						        dataset.backgroundColor.push('#F0AD4E');
						    });
							chart2.update();
						}
					);
				}
			);
			$('#loading-chart2').remove();
		}
	);
	
	
</script>