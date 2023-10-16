<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <p class="mb-4">DataTables is a third-party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>


   <!-- form tambah kategori -->
<form action="<?= base_url('staff/addStaff_action') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Penuh</label>
        <input type="text" name="name" class="form-control">
        <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>email</label>
        <input type="text" name="email" class="form-control">
        <?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <?= form_error('password', '<div class="text-small text-danger">', '</div'); ?>
    </div>
    <div class="form-group" id="role-dropdown">
    <label>Role</label>
    <select name="role" class="form-control">
        <?php
        $roles = array(
            'admin' => 'Admin',
            'staff' => 'Staff'
        );

        foreach ($roles as $role_id => $role_name) :
        ?>
        <option value="<?= $role_id ?>"><?= $role_name ?></option>
        <?php endforeach; ?>
    </select>
</div>

    <div class="form-group">
        <label>Upload Gambar</label>
        <input type="file" name="image" class="form-control-file">
        <?= form_error('image', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">

    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Tambah</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Set Semula</button>
    <a href="<?= base_url('admin/staff') ?>" class="btn btn-dark btn-sm"> Kembali</a>
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
