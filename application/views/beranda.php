<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header" style="margin-top: 10px; font-family: 'Ubuntu', sans-serif;"><?=$title?></h2>
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
							<p></p>
						</figcaption>
						
					</figure>
					</div>

                	<h3 style="margin-top: 10px">Assalamu'alaikum Wr. Wb.</h3>
					<p>Segala Puji bagi Allah Swt. yang telah memberikan nikmat Iman, Islam dan Ihsan kepada kita semua.</p>
					<p>Sholawat serta salam semoga selalu tercurahkan kehadiran Nabi Muhammad Saw.</p>
					<p>Pertama-tama kami ingin menyampaikan  terima kasih kepada:</p>
					<ol>
						<li>Kepala Kantor Kementerian Agama Kabupaten Brebes yang telah membimbing selama ini terutama saat PKP angkatan ke XXVI</li>
						<li>Seluruh stakeholder baik internal maupun eksternal</li>
						<li>Juga Tim IT baik internal maupun external.</li>
						<li>Tim efektif yang selalu mendampingi.</li>
					</ol>
					<p>Aplikasi SIP IJOP merupakan aksi perubahan menuju peningkatan pelayanan sekaligus mempermudah pelayanan Ijin Operasional (IJOP) di Seksi PD Pontren Kankemenag Kab.Brebes </p>
					<p>SIP IJOP ini sebagai pusat informasi pelayanan di Seksi PD Pontren Kantor Kementerian Agama Kabupaten Brebes.</p>
					<p>Sistem layanan  ini merupakan program berbasis website yang dirintis untuk mengembangkan secara mandiri namun terintegrasi Layanan yang berbasisOnline.</p>
					<p>Melalui layanan Online ini, diharapkan menjadi lebih mudah dan cepat karena masyarakat dalam hal ini TPQ, MADIN dan PONPES bisa mengajukan Ijop tetap dari domisili masing-masing. Salah satu sisi manfaat program ini, akan diperoleh data yang akurat. Dengan layanan SIP IJOP Online ini Kankemenag melibatkan secara langsung MDTA/TPQ/PONPES dalam proses peningkatan pelayanan. </p>
					<p>Mari kita bangun bersama peningkatan mutu MDTA/TPQ/PONPES dengan pemanfaatan Teknologi Informasi terkini yang lebih cepat, mudah, akurat, akuntabel dan berkesinambungan.terima kasih</p>
					<p><strong>Wassalamu’alaikum Wr.Wb.</strong></p>
                    <div class="small text-primary">
                        Brebes, Sabtu 28 Maret 2020
                    </div>
					<p>Kasi PD Pontren Kab.Brebes</p>
					<p class="text-capitalize">H. Akrom Jangka Daosat</p>
                
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
                    <canvas id="chart-bar-jumlah" height="170"></canvas>
                </div>
            </div>
			
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Prosentase Jumlah
                </div>
                <div class="panel-body">
                    <canvas id="chart-pie-prosentase" height="230"></canvas>
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
		}
	);
	
	
</script>