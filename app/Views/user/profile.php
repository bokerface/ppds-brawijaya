<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <form method="POST">

        <div class="row">
            <div class="col-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://static.toiimg.com/photo/msid-67586673/67586673.jpg?resizemode=4&width=400" style="height: 200px; width: 200px;" class="rounded-circle" alt="Cinque Terre">
                            <hr class="sidebar-divider">
                            <div class="upload-btn-wrapper">
                                <input type="file" name="photo" id="photo" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-7">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" disabled class="form-control" placeholder="Email" value="<?= $query['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_lengkap" id="nama_lengkap" disabled class="form-control" placeholder="Nama Lengkap" value="<?= $query['nama_lengkap']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" id="password" disabled class="form-control" placeholder="Password">
                                <input type="hidden" name="hidden_pass" class="form-control" value="<?= $query['password']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button id="editprofile" onclick="return false" class="btn btn-success">Edit Profile</button>
                                <input type="submit" disabled class="btn btn-primary" value="Save Change">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $("#editprofile").click(function() {
        $(":disabled").prop('disabled', false);
    });
</script>
<?= $this->endSection(); ?>