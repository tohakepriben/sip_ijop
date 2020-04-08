
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?=base_url()?>"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
            </li>
            <li>
                <a href="<?=base_url('pengajuan/alur_pengajuan')?>"><i class="fa fa-link fa-fw"></i> Alur Pengajuan</a>
            </li>
            <li>
                <a href="<?=base_url('download_instrumen')?>"><i class="fa fa-download fa-fw"></i> Download Instrumen</a>
            </li>

            <?php if($this->session->userdata('level')==2): ?>
            <li>
                <a href="<?=base_url('pengajuan/pengajuan_saya')?>"><i class="fa fa-list fa-fw"></i> Pengajuan Saya</a>
            </li>
            <?php endif; ?>

            <?php 
            if($this->session->userdata('level')==1): 
            $jml_diajukan = $this->m_pengajuan->get_jumlah_diajukan();
            ?>
            <li>
                <a href="<?=base_url('admin/approval')?>"><i class="fa fa-ticket fa-fw"></i> Approval Pengajuan 
                	<?php if($jml_diajukan>0): ?>
                	<span class="pull-right badge" style="background: orange"><?=$jml_diajukan?></span>
                	<?php endif; ?>
                </a>
            </li>
            <li>
                <a href="<?=base_url('admin/pengajuan_diterima')?>"><i class="fa fa-archive fa-fw"></i> Pengajuan Diterima</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Pengaturan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=base_url('admin/syarat_berkas')?>">Persyaratan Berkas</a>
                    </li>
                    <li>
                        <a href="<?=base_url('admin/pengguna')?>">Pengguna</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <?php endif; ?>

            <li>
                <a href="<?=base_url('info')?>"><i class="fa fa-info-circle fa-fw"></i> Info dan Panduan</a>
            </li>

            <?php if($this->session->has_userdata('level')): ?>
            <li>
                <a id="logout" href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
