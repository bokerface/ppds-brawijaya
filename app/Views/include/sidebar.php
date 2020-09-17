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
                            <i class="ti-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li id="tugas">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-book"></i>
                            <span>Tugas</span>
                        </a>
                        <ul class="collapse">
                            <li>
                                <a href="#" aria-expanded="true">Ilmiah</a>
                                <ul id="tugas_divisi" class="collapse">
                                    <li id="tugas_saya"><a href="<?= base_url('tugas/jenis/ilmiah'); ?>">Semua Ilmiah</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" aria-expanded="true">Tugas Besar</a>
                                <ul id="tugas_besar" class="collapse">
                                    <li id="tugas_saya"><a href="<?= base_url('tugas/jenis/tugas_besar'); ?>">Semua Tugas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li id="dashboard">
                        <a href="<?= base_url('/sidang'); ?>">
                            <i class="ti-dashboard"></i> <span>Sidang</span>
                        </a>
                    </li>
                    <li id="pdps">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>Users</span>
                        </a>
                        <ul class="collapse">
                            <li>
                                <a href="<?= base_url('admin/users'); ?>" aria-expanded="true">Daftar Users</a>
                            </li>
                            <!-- <li>
                                <a href="<?= base_url('admin/ppds/lobby'); ?>" aria-expanded="true">Lobby PPDS</a>
                            </li> -->
                            <!-- <li>
                                <a href="#" aria-expanded="true">Tambah Pengguna</a>
                            </li> -->
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>