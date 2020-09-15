<?= $this->extend('layouts/main'); ?>

<?php session() ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">

    <div class="col-lg-8 mt-5 ml-auto mr-auto">
        <div class="card">
            <div class="card-body">
                <form id="profile_form" method="POST" action="<?= base_url('tugas/post'); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Judul Tugas</label>
                        <div class="col-sm-8">
                            <input type="text" name="judul" class="form-control <?= $validation->hasError('judul') ? "is-invalid" : ""; ?>" id="judul" value="<?= old('judul'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea name="deskripsi" class="form-control <?= $validation->hasError('deskripsi') ? "is-invalid" : ""; ?>" rows="5"><?= old('deskripsi'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi'); ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($page_header == 'Ilmiah') { ?>
                        <div class="form-group row">
                            <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Kategori Tugas</label>
                            <div class="col-sm-8">
                                <select id="kategori" class="custom-select <?= $validation->hasError('id_kategori') ? "is-invalid" : ""; ?>" name="id_kategori">
                                    <option value="">Pilih kategori</option>
                                    <?php foreach ($kategori as $kategori) { ?>
                                        <option <?= $kategori['id'] == old('id_kategori') ? "selected" : ""; ?> value="<?= $kategori['id']; ?>"><?= $kategori['kategori']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_kategori'); ?>
                                </div>
                            </div>
                        </div>
                    <?php } elseif ($page_header == 'Tugas Besar') { ?>
                        <input type="hidden" name="id_kategori" value="2">
                    <?php } ?>

                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-4 col-form-label">File Tugas</label>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input form-control-sm <?= $validation->hasError('file') ? "is-invalid" : ""; ?>" id="customFile" value="<?= old('file'); ?>" onchange="onFileUpload()">
                                <label class="custom-file-label" for="customFile" id="nama-file-baru">format file yang didukung : pdf,docx,pptx</label>
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
                            <input type="date" name="jadwal_sidang" class="form-control <?= $validation->hasError('jadwal_sidang') ? "is-invalid" : ""; ?>" id="" value="<?= old('jadwal_sidang'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jadwal_sidang'); ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($page_header == 'Tugas Besar') { ?>
                        <div id="list-penguji" class="form-group row">
                            <label class="col-sm-4 col-form-label" for="exampleFormControlSelect2">Penguji</label>
                            <div class="col-sm-8">
                                <select id="penguji" name="penguji[]" multiple class="form-control" id="exampleFormControlSelect2" <?= $validation->hasError('penguji[]') ? "is-invalid" : ""; ?>>
                                    <?php foreach ($penguji as $penguji) { ?>
                                        <option value="<?= $penguji['id']; ?>"><?= $penguji['nama_lengkap']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('penguji[]'); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

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

    function onFileUpload() {
        var namaFile = $('#customFile')[0].files[0].name
        if (namaFile) {
            $('#nama-file-baru').html(namaFile)
        }
    }
</script>
<?= $this->endSection(); ?>