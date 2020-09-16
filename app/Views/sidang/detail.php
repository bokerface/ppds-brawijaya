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
                            <p class="mt-2"><b><?= $tugas['nama_lengkap']; ?></b></p>
                        </div>
                        <div class="mt-3 ml-auto mr-auto">
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Diunggah</label>
                                <label class="col-sm-5 col-form-label text-right">20-06-2020</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Tanggal Sidang</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $tugas['jadwal_sidang']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Stase</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $tugas['stase']; ?></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Nilai</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $tugas['nilai']; ?></label>
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
                            <div class="ml-4 mr-3">
                                <h1><?= $tugas['judul']; ?></h1>
                                <div class="mt-4">
                                    <p><?= $tugas['deskripsi']; ?></p>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <div class="row">
                                        <a href="<?= base_url('ppds_tugas/' . $tugas['file']); ?>" class="btn btn-flat btn-xl btn-outline-dark mb-3 mr-3 btn-block">Unduh File</a>
                                        <?php if (session('role') == 3) { ?>
                                            <button type="button" class="btn btn-flat btn-xl btn-outline-dark mb-3 mr-3" data-toggle="modal" data-target="#exampleModalCenter">Masukkan Nilai</button>
                                            <button type="button" class="btn btn-flat btn-xl btn-outline-dark mb-3 mr-3">Konfirmasi</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius voluptates explicabo natus nobis, aperiam placeat aliquid nisi ut exercitationem dolor quisquam nam tempora voluptatem. Unde dignissimos est aliquid quidem porro dolorum ipsam suscipit animi quas, debitis ea, sunt quo distinctio doloribus eveniet dolores tempore delectus voluptatum! Possimus earum asperiores animi.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
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