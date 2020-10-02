<?= $this->extend('layouts/main'); ?>

<?php session() ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">

    <div class="col-lg-8 mt-5 ml-auto mr-auto">
        <div class="card">
            <div class="card-body">
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
                <form id="profile_form" method="POST" action="<?= base_url('logbook/tambah'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Judul</label>
                        <div class="col-sm-8">
                            <input type="text" name="judul" class="form-control" id="username" value="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea name="keterangan" class="form-control" rows="5"></textarea>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Waktu</label>
                        <div class="col-sm-8">
                            <input type="date" name="waktu" class="form-control" id="password" value="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Supervisor</label>
                        <div class="col-sm-8">
                            <select id="kategori" class="custom-select" name="id_spv">
                                <option value="">Pilih supervisor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Nama Pasien</label>
                        <div class="col-sm-8">
                            <input type="text" name="pasien" class="form-control" id="nama_pasien" value="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Usia Pasien</label>
                        <div class="col-sm-8">
                            <input type="number" name="usia" class="form-control" id="usia" value="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Rekam Medik</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" name="rekam_medik" class="custom-file-input form-control-sm" id="customFile" value="" onchange="onFileUpload()">
                                <label class="custom-file-label" for="customFile" id="nama-file-baru">format file yang didukung : pdf,docx,pptx</label>
                            </div>
                            <small id="error_file" class="text-danger">
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Tindakan</label>
                        <div class="col-sm-8">
                            <input type="jenis_tindakan" name="usia" class="form-control" id="username" value="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-dark mb-3 float-right" style="background: #370EFA;border-color: #370EFA;" value="Tambah">
                </form>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    // $('#tugas').addClass('active');
    // $('#tugas_divisi').addClass('active');
    // $('#semua_tugas').addClass('active');
    $("#role").change(function() {

        if ($(this).val() == "4") {
            $('#spvr').show()
        } else {
            $('#spvr').hide()
        }
    });
</script>
<?= $this->endSection(); ?>