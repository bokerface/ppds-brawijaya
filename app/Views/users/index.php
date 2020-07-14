<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $page_header; ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table-user" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Updated at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $user) { ?>
                            <tr>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['created_at']; ?></td>
                                <td><?= $user['updated_at']; ?></td>
                                <td><?= $user['updated_at']; ?></td>
                                <td><?= $user['updated_at']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<!-- Page level plugins -->
<script src="<?= base_url('vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('js/demo/datatables-demo.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#table-user').DataTable();
    });
</script>
<?= $this->endSection(); ?>