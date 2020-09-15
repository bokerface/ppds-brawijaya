<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="<?= base_url('assets/images/icon/logo.png'); ?>" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li id="dashboard">
                        <a href="<?= base_url('/'); ?>">
                            <i class="ti-home"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li id="tugas">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-book"></i>
                            <span>Ilmiah</span>
                        </a>
                        <ul class="collapse">
                            <li id="tugas_divisi">
                                <a href="<?= base_url('/tugas/jenis/ilmiah'); ?>">Semua Ilmiah</a>
                            </li>
                            <li>
                                <a href="<?= base_url('/tugas/saya'); ?>">Ilmiah Saya</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-book"></i>
                            <span>Tugas Besar</span>
                        </a>
                        <ul id="tugas-besar" class="collapse">
                            <li id="tugas_divisi">
                                <a href="<?= base_url('/tugas/jenis/tugas_besar'); ?>">Semua Tugas</a>
                            </li>
                            <li>
                                <a href="<?= base_url('/tugas/saya'); ?>">Tugas Saya</a>
                            </li>
                        </ul>
                    </li>

                    <li id="stase">
                        <a href="<?= base_url('/user/stase'); ?>">
                            <i class="ti-home"></i> <span>Stase Saya</span>
                        </a>
                    </li>

                    <li id="dashboard">
                        <a href="<?= base_url('/'); ?>">
                            <i class="ti-book"></i> <span>Log Book</span>
                        </a>
                    </li>

                    <li id="dashboard">
                        <a href="<?= base_url('/'); ?>">
                            <i class="ti-book"></i> <span>Sidang</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>