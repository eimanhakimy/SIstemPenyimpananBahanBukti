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
          
           <!--  <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="<?= base_url('bahanbukti/addBahanBukti') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Daftar Masuk Bahan </a>
            <a href="<?= base_url('bahanbukti/printBahanBukti') ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Cetak</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Kes</th>
                            <th>Nama Bahan Bukti</th>
                            <th>Kategori</th>
                            <th>Kuantiti</th>
                            <th>Berat (KG)</th>
                            <th>Tarikh Daftar</th>
                            <th>Masa Masuk</th>
                            <th>Tarikh Keluar</th>
                            <th>Masa Keluar</th>
                            <th>Rak</th>
                            <th>Nama Anggota</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $no=1;
                        foreach($evidences as $evi) : ?>
                        <tbody>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $evi->case_no?></td>
                                <td><?= $evi->item_name?></td>
                                <td><?= $evi->category?></td>
                                <td><?= $evi->item_quantity?></td>
                                <td><?= $evi->item_weight?></td>
                                <td><?= $evi->date?></td>
                                <td><?= $evi->time_check_in?></td>
                                <td><?= $evi->date_out?></td>
                                <td><?= $evi->time_check_out?></td>
                                <td><?= $evi->rack?></td>
                                <td><?= $evi->anggota_name?></td>
                                <td><?= $evi->status_message?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit<?= $evi->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                    <a href="<?= base_url('bahanbukti/delete/' . $evi->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Adakah Anda mahu buang data ini ?')"><i class="fas fa-trash"></i></a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>


                                </td>
                            </tr>
                            <!-- Add more table rows here as needed -->
                        </tbody>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>

</div>



<!-- modal untuk edit --->
<?php foreach($evidences as $evi) : ?>
    <div class="modal fade" id="edit<?= $evi->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kemaskini Barang Kes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form action="<?= base_url('bahanbukti/edit/' . $evi->id) ?>" method="post">
                        <div class="form-group">
                            <label>Nombor Kes</label>
                            <input type="text" name="case_no" class="form-control" value="<?= $evi->case_no ?>"readonly>
                            <?= form_error('case_no', '<div class="text-small text-danger">','</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Tarikh</label>
                            <input type="date" name="date" class="form-control" value="<?= date('Y-m-d', strtotime($evi->date)) ?>" readonly>
                            <?= form_error('date', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Masa Check-In</label>
                            <input type="time" name="time_check_in" class="form-control" value="<?= date('H:i:s'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tarikh Keluar</label>
                            <input type="date" name="date_out" class="form-control" value="<?= date('Y-m-d', strtotime($evi->date_out)) ?>" >
                            <?= form_error('date_out', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Masa Check-out</label>
                            <input type="time" name="time_check_out" class="form-control" value="<?= date('H:i:s'); ?>">
                        </div>  

                        <div class="form-group" id="status-dropdown">
                            <label>Status</label>
                            <select name="status_message" class="form-control">
                            <?php foreach ($status_messages as $status_message) : ?>
                                <option value="<?= $status_message->status_message ?>"><?= $status_message->status_message ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>

                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Kemaskini</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Set Semula</button>
                            <a href="<?= base_url('user/bahanbukti') ?>" class="btn btn-dark btn-sm"> Tutup</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <!-- end of modal edit -->
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


<!-- End of Main Content -->



             