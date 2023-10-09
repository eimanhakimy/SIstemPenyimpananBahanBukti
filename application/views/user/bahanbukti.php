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
                            <th>Kuantiti</th>
                            <th>Berat (KG)</th>
                            <th>Tarikh Daftar</th>
                            <th>Masa Masuk</th>
                            <th>Masa Keluar</th>
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
                                <td><?= $evi->item_quantity?></td>
                                <td><?= $evi->item_weight?></td>
                                <td><?= $evi->date?></td>
                                <td><?= $evi->time_check_in?></td>
                                <td><?= $evi->time_check_out?></td>
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

<!-- end ofmodel edit -->
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
