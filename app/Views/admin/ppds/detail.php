<?php helper('data_helper') ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">
    <div class="row m-4">
        <div class="col-sm-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <div class="text-center">
                            <div style="background-image: url('<?= base_url('images/profile/dummy.png'); ?>');width:200px;height:200px;background-position:center center;background-size:100%;border-radius: 100%;background-repeat: no-repeat;" class="ml-auto mr-auto">
                            </div>
                            <p class="mt-2"><b><?= $ppds->nama_lengkap; ?></b></p>
                        </div>
                        <div class="mt-3 ml-auto mr-auto">
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Stase</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $ppds->stase; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Tahap</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $ppds->tahap; ?></label>
                            </div>
                            <div class="form-group row">
                                <button type="button" class="btn btn-flat btn-outline-dark mb-3 btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">Stase Selesai</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 mt-5">
            <div class="col">
                <div>
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="col-sm-12 mt-4">
                                    <?php foreach ($tahap as $tahap) { ?>
                                        <div id="headingOne">
                                            <h2 class="mb-0">
                                                <a href="#" class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?= $tahap['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $tahap['id'] ?>">
                                                    Tahap <?= $tahap['tahap']; ?>
                                                </a>
                                            </h2>
                                        </div>
                                        <div id="collapse<?= $tahap['id'] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                                <?php foreach (getStasePpdsBasedOnTahap($tahap['tahap'], $ppds->id_ppds) as $stase) { ?>
                                                    <div id="headingOne">
                                                        <h2 class="mb-0">
                                                            <a href="#" class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#ChildCollapse<?= $stase['id_stase'] ?>" aria-expanded="true" aria-controls="ChildCollapse<?= $stase['id_stase'] ?>">
                                                                <?= $stase['stase']; ?> (<?= $stase['tanggal_mulai']; ?> s.d <?= $stase['tanggal_selesai']; ?>)
                                                            </a>
                                                        </h2>
                                                    </div>
                                                    <div id="ChildCollapse<?= $stase['id_stase'] ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                                            <table class="table" style="border: solid #EAECEE;border-width: thin;">
                                                                <h5>ilmiah</h5>
                                                                <thead>
                                                                    <tr style="background-color: #F8F9FB;">
                                                                        <th scope="col" style="width: 60%;">Judul Ilmiah</th>
                                                                        <th scope="col" style="width: 20%;">Kategori</th>
                                                                        <th scope="col" style="width: 20%;">Unduh</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach (getPpdsTugas(1, $ppds->id_ppds, $stase['id_stase']) as $ilmiah) { ?>
                                                                        <tr>
                                                                            <th><?= $ilmiah['judul']; ?></th>
                                                                            <td><?= $ilmiah['kategori']; ?></td>
                                                                            <td><a href="">Unduh</a></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <br>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url('admin/ppds/staseselesai'); ?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close mb-3" data-dismiss="modal"><span>×</span></button>
                        <input type="hidden" name="id_ppds" value="<?= $ppds->id_ppds; ?>">
                        <br>
                        <div class="text-center">
                            <img src="<?= base_url('images/icon/warning.svg'); ?>" style="width: 110px;" alt="" srcset="">
                        </div>
                        <br>
                        <h3 class="text-center">Anda yakin?</h3>
                        <p class="text-center mt-2">
                            Aksi ini tidak dapat dibatalkan. Pastikan PPDS sudah menyelesaikan semua tugas ilmiah sebelum melanjutkan.
                        </p>
                        <br>
                        <div class="text-center">
                            <button type="button" class="btn btn-flat btn-outline-secondary mb-3" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-flat btn-outline-danger mb-3" value="Ya">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>

    <?= $this->section('data_table'); ?>
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <?= $this->endSection(); ?>

    <?= $this->section('js'); ?>
    <script>
    </script>
    <?= $this->endSection(); ?>