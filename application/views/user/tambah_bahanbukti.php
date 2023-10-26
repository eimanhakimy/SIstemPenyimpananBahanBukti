<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <p class="mb-4">DataTables is a third-party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

<form action="<?= base_url('bahanbukti/addBahanBukti_action') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Barang Kes</label>
        <input type="text" name="item_name" class="form-control">
        <?= form_error('item_name', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Nombor Kes</label>
        <input type="text" name="case_no" class="form-control">
        <?= form_error('case_no', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group" id="category-dropdown">
    <label>Kategori</label>
    <select name="category" class="form-control">
        <?php foreach ($category as $category) : ?>
            <option value="<?= $category->category ?>"><?= $category->category ?></option>
        <?php endforeach; ?>
    </select>
</div>
    <div class="form-group">
        <label>Kuantiti Barang</label>
        <input type="number" name="item_quantity" class="form-control">
        <?= form_error('item_quantity', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Berat Barang (in kilograms)</label>
        <input type="number" step="0.01" name="item_weight" class="form-control">
        <?= form_error('item_weight', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group" id="rack-dropdown">
    <label>Rak</label>
    <select name="rack" class="form-control">
        <?php foreach ($rack as $rack) : ?>
            <option value="<?= $rack->rack ?>"><?= $rack->rack ?></option>
        <?php endforeach; ?>
    </select>
</div>
    <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" name="image_url" class="form-control-file">
        <?= form_error('image_url', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Tarikh</label>
        <input type="date" name="date" class="form-control">
        <?= form_error('date', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Masa Check-In</label>
        <input type="text" name="time_check_in" class="form-control" value="<?= date('H:i:s'); ?>" readonly>
    </div>

    <div class="form-group" id="anggota-dropdown">
    <label>Nama Anggota</label>
    <select name="anggota_name" class="form-control">
        <?php foreach ($anggota_name as $anggota_name) : ?>
            <option value="<?= $anggota_name->anggota_name ?>"><?= $anggota_name->anggota_name ?></option>
        <?php endforeach; ?>
    </select>
</div>
    <div class="form-group" id="status-dropdown">
    <label>Status</label>
    <select name="status_message" class="form-control">
        <?php foreach ($status_messages as $status_message) : ?>
            <option value="<?= $status_message->status_message ?>"><?= $status_message->status_message ?></option>
        <?php endforeach; ?>
    </select>
</div>
    <div class="form-group">

    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Tambah</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Set Semula</button>
    <a href="<?= base_url('user/bahanbukti') ?>" class="btn btn-dark btn-sm"> Kembali</a>
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
