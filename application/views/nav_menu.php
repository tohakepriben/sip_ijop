
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?=base_url()?>"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
            </li>
            <li>
                <a href="<?=base_url('alur_pengajuan')?>"><i class="fa fa-tasks fa-fw"></i> Alur Pengajuan</a>
            </li>
            <li>
                <a href="<?=base_url('download')?>"><i class="fa fa-download fa-fw"></i> Download Instrumen</a>
            </li>

            <?php if($this->session->userdata('level')==2): ?>
            <li>
                <a href="#"><i class="fa fa-list fa-fw"></i> Pengajuan Saya<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=base_url('pengajuan_ijop_baru')?>">Ijop Baru</a>
                    </li>
                    <li>
                        <a href="<?=base_url('pengajuan_ijop_perpanjangan')?>">Ijop Perpanjangan</a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($this->session->userdata('level')==1): ?>
            <li>
                <a href="#"><i class="fa fa-list fa-fw"></i> Data Pengajuan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=base_url('pengajuan_ijop_baru')?>">Ijop Baru</a>
                    </li>
                    <li>
                        <a href="<?=base_url('pengajuan_ijop_perpanjangan')?>">Ijop Perpanjangan</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?=base_url('pengguna')?>"><i class="fa fa-users fa-fw"></i> Data Pengguna</a>
            </li>
            <?php endif; ?>

            <li>
                <a href="<?=base_url('tentang')?>"><i class="fa fa-info-circle fa-fw"></i> Tentang SIP Ijop</a>
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
