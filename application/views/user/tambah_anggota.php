<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <p class="mb-4">DataTables is a third-party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>


   <!-- form tambah kategori -->
<form action="<?= base_url('anggota/addAnggota_action') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Anggota</label>
        <input type="text" name="anggota_name" class="form-control">
        <?= form_error('anggota_name', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Nombor Badan</label>
        <input type="text" name="no_body" class="form-control">
        <?= form_error('no_body', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Emel Anggota</label>
        <input type="text" name="anggota_email" class="form-control">
        <?= form_error('anggota_email', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Nombor Telefon</label>
        <input type="text" name="anggota_phoneNumber" class="form-control">
        <?= form_error('anggota_phoneNumber', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Alamat Rumah</label>
        <input type="text" name="anggota_address" class="form-control">
        <?= form_error('anggota_address', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group" id="status-dropdown">
    <label>Jabatan</label>
    <select name="department_name" class="form-control">
        <?php foreach ($department_name as $department_name) : ?>
            <option value="<?= $department_name->department_name ?>"><?= $department_name->department_name ?></option>
        <?php endforeach; ?>
    </select>
</div>
    <div class="form-group">

    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Tambah</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Set Semula</button>
    <a href="<?= base_url('user/anggota') ?>" class="btn btn-dark btn-sm"> Kembali</a>
</form>


</div>
<!-- /.container-fluid -->

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript -->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>

<!-- Custom styles for this page -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet'); ?>">

<!-- custom form -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custom.css'); ?>">




<!-- End of Main Content -->
