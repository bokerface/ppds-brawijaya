<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="col-12 mt-3">
                    <div class="data-tables datatable-dark">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>PPDS</th>
                                    <th>Diperiksa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $logbook) { ?>
                                    <tr>
                                        <td><?= $logbook['judul']; ?></td>
                                        <td><?= $logbook['tanggal']; ?></td>
                                        <td><?= $logbook['nama_lengkap']; ?></td>
                                        <td><i class="ti-check"></i></td>
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
    $('#daftar-sidang').addClass('active');
</script>
<?= $this->endSection(); ?>

<?= $this->section('data_css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<?= $this->endSection(); ?>