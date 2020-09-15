<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <?php if (session('success')) { ?>
                    <div class="alert-dismiss">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
                <?php if (session('danger')) { ?>
                    <div class="alert-dismiss">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session('danger'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>

                <?php if (session('role') == 4) { ?>
                    <div class="row">
                        <?php if ($page_header == 'Daftar Ilmiah Saya') { ?>
                            <div class="col-sm-2">
                                <select class="form-control btn-flat" id="filter-stase">
                                    <option value="">Semua Stase</option>
                                    <?php foreach ($stase as $stase) { ?>
                                        <option value="<?= $stase['stase']; ?>"><?= $stase['stase']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php } ?>

                        <div class="col-sm-2">
                            <?php if ($page_header == 'Daftar Ilmiah') { ?>
                                <a class="btn btn-flat btn-outline-dark btn-sm" href="<?= base_url('/tugas/tambah/ilmiah'); ?>">Unggah Ilmiah</a>
                            <?php } elseif ($page_header == 'Tugas Besar') { ?>
                                <a class="btn btn-flat btn-outline-dark btn-sm" href="<?= base_url('/tugas/tambah/tugas_besar'); ?>">Unggah Tugas Besar</a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-12 mt-3">
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th style="width: 25%;">Judul</th>
                                    <th style="width: 15%;">Stase</th>
                                    <th style="width: 15%;">Tanggal Sidang</th>
                                    <th style="width: 15%;">Nilai</th>
                                    <th style="width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $tugas) { ?>
                                    <tr>
                                        <td class="text-left">
                                            <b>
                                                <?= $tugas['judul']; ?>
                                            </b>
                                            <p>
                                                <?= $tugas['kategori']; ?>
                                            </p>
                                        </td>
                                        <td class="text-center"><?= $tugas['stase']; ?></td>
                                        <td class="text-center"><?= $tugas['jadwal_sidang']; ?></td>
                                        <td class="text-center"><?= $tugas['nilai']; ?></td>
                                        <td class="text-center">
                                            <!-- <a href="<?= base_url('/tugas/edit/' . $tugas['id']); ?>" class="btn btn-warning btn-xs"><span class="ti-pencil"></span></a> -->
                                            <a href="<?= base_url("/tugas/" . $tugas['id']); ?>" class="btn btn-flat btn-outline-success btn-xs"><span class="ti-info"></span></a>
                                            <form class="d-inline" action="<?= base_url('/tugas/' . $tugas['id']); ?>" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="" class="btn btn-flat btn-outline-danger btn-xs" onclick="return confirm('Hapus Ilmiah?')"><span class="ti-trash"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    var table = $('#dataTable3').DataTable();
    $('#filter-stase').on('change', function() {
        table.columns(1).search(this.value).draw();
    });
    $('#t-besar').addClass('in');
</script>
<?= $this->endSection(); ?>

<?= $this->section('data_css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<?= $this->endSection(); ?>