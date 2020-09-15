<?= $this->extend('layouts/main'); ?>

<?php session() ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">

    <div class="col-lg-8 mt-5 ml-auto mr-auto">
        <div class="card">
            <div class="card-body">
                <form id="profile_form" method="POST" action="<?= base_url('tugas/edit'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_tugas" value="<?= $data_tugas['id']; ?>">
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Judul Ilmiah</label>
                        <div class="col-sm-8">
                            <input type="text" name="judul" class="form-control <?= $validation->hasError('judul') ? "is-invalid" : ""; ?>" id="judul" value="<?= $data_tugas['judul']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea name="deskripsi" class="form-control <?= $validation->hasError('deskripsi') ? "is-invalid" : ""; ?>" rows="5"><?= $data_tugas['judul']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Kategori Tugas</label>
                        <div class="col-sm-8">
                            <select class="custom-select <?= $validation->hasError('id_kategori') ? "is-invalid" : ""; ?>" name="id_kategori">
                                <option value="">Pilih kategori</option>
                                <?php foreach ($kategori as $kategori) { ?>
                                    <option <?= $kategori['id'] == $data_tugas['id_kategori'] ? "selected" : ""; ?> value="<?= $kategori['id']; ?>"><?= $kategori['kategori']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_kategori'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">File Tugas</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input form-control-sm <?= $validation->hasError('file') ? "is-invalid" : ""; ?>" id="customFile" value="<?= $data_tugas['file']; ?>">
                                <label class="custom-file-label" for="customFile">format file yang didukung : pdf,docx,pptx</label>
                            </div>
                            <?php if ($validation->hasError('file')) { ?>
                                <small id="error_file" class="text-danger">
                                    <?= $validation->getError('file'); ?>
                                </small>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Tanggal Sidang</label>
                        <div class="col-sm-8">
                            <input type="date" name="jadwal_sidang" class="form-control <?= $validation->hasError('jadwal_sidang') ? "is-invalid" : ""; ?>" id="" value="<?= $data_tugas['jadwal_sidang']; ?>">
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jadwal_sidang'); ?>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-dark mb-3 float-right" style="background: #370EFA;border-color: #370EFA;" value="Unggah">
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
</script>
<?= $this->endSection(); ?>