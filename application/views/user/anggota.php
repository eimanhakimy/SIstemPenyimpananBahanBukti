<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?= $this->session->flashdata('pesan'); ?>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <p class="mb-4">DataTables is a third-party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Add buttons for adding and printing data -->
            <a href="<?= base_url('anggota/addAnggota') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Daftar Anggota</a>
            <a href="<?= base_url('anggota/printAnggota') ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Cetak</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Anggota</th>
                            <th>No. Badan</th>
                            <th>Email</th>
                            <th>No. Telefon</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;
                        foreach($anggota as $ag) : ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $ag->anggota_name?></td>
                            <td><?= $ag->no_body?></td>
                            <td><?= $ag->anggota_email?></td>
                            <td><?= $ag->anggota_phoneNumber?></td>
                            <td><?= $ag->anggota_address?></td>
                            <td><?= $ag->department_name?></td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?= $ag->anggota_id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('anggota/delete/' . $ag->anggota_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Adakah Anda mahu buang data ini ?')"><i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modal untuk edit --->
    <?php foreach($anggota as $ag) : ?>
    <div class="modal fade" id="edit<?= $ag->anggota_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form tambah kategori -->
                    <form action="<?= base_url('anggota/edit/' . $ag->anggota_id) ?>" method="post">
                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <input type="text" name="anggota_name" class="form-control" value="<?= $ag->anggota_name ?>">
                            <?= form_error('anggota_name', '<div class="text-small text-danger">','</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nombor Badan</label>
                            <input type="text" name="no_body" class="form-control" value="<?= $ag->no_body ?>">
                            <?= form_error('no_body', '<div class="text-small text-danger">','</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Emel Anggota</label>
                            <input type="text" name="anggota_email" class="form-control" value="<?= $ag->anggota_email ?>">
                            <?= form_error('anggota_email', '<div class="text-small text-danger">','</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nombor Telefon</label>
                            <input type="number" name="anggota_phoneNumber" class="form-control" value="<?= $ag->anggota_phoneNumber ?>">
                            <?= form_error('anggota_phoneNumber', '<div class="text-small text-danger">','</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Alamat Anggota</label>
                            <input type="text" name="anggota_address" class="form-control" value="<?= $ag->anggota_address ?>">
                            <?= form_error('anggota_address', '<div class="text-small text-danger">','</div>'); ?>
                        </div>
                        <div class="form-group" id="status-dropdown">
                            <label>Jabatan</label>
                            <select name="department_name" class="form-control">
                            <?php foreach ($department_name as $department_name) : ?>
                                <option value="<?= $department_name->department_name ?>"><?= $department_name->department_name ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Kemaskini</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Set Semula</button>
                            <a href="<?= base_url('user/anggota') ?>" class="btn btn-dark btn-sm"> Tutup</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <!-- end of modal edit -->
</div>
<!-- /.container-fluid -->
