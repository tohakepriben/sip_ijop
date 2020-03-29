<ul class="nav navbar-top-links navbar-right" style="margin-top: 10px;">
<?php if($this->session->has_userdata('level')): ?>
<ul class="nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <?=$this->session->userdata('nama')?> <i class="fa fa-user fa-fw"> </i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a id="user-profile" href="<?=base_url('profil_saya')?>"><i class="fa fa-user fa-fw"></i> Profil saya</a>
            </li>
            <li class="divider"></li>
            <li>
            <a id="logout2" href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>


<?php else: ?>
<div class="col-md-9">
<table>
	<tr>
		<td>
		<div class="form-group input-group" style="margin-right: 5px;">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input id="log-email" type="email" class="form-control" placeholder="Email" name="username">
        </div>                    	
			
		</td>
		<td>
		<div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input id="log-hp" type="tel" class="form-control" placeholder="No. HP" name="password">
        </div>                    	                    	
			
		</td>
		<td>
			<button id="login" type="button" class="btn btn-primary btn-sm" style="margin-right: 10px;margin-top: -16px;margin-left: 5px;margin-right: 10px;">Login</button> 

		</td>
	</tr>
</table>
</div>
<div class="col-md-3" style="text-align: center;">
	atau <a href="<?=base_url('daftar')?>" class="btn btn-success btn-sm" style="width: 100px;margin-top: 2px;margin-bottom: 5px;">  Daftar  </a>
</div>

<script>
$(function(){
	
	function masuk(){
		$.post('<?=base_url("auth/login/?callback=?")?>',
			{
				email		: $('#log-email').val(),
				hp			: $('#log-hp').val()
			},
			function(data){
				if(data==1){
					location.href='<?=base_url()?>';
				}else if(data=='locked'){
					alert('Akun anda terkunci. Silakan hubungi administrator!');
				}else{
					alert('Kombinasi Email dan No. HP salah!');
				}
			}
		);				
	}
		
	$('#log-email, #log-hp').on('keypress',function(e) {
	    if(e.which == 13) {
	        masuk();
	    }
	});
	
	$('#login').click(function(){
        masuk();
	});
	
		
});
</script>
<?php endif; ?>

</ul>
