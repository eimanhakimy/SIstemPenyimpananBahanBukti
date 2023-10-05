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
            <a href="<?= base_url('category/addCategory') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Kategori</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $no=1;
                        foreach($category as $ct) : ?>
                        <tbody>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $ct->id?></td>
                                <td><?= $ct->category?></td>
                                <td><?= $ct->description?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit<?= $ct->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
<?php foreach($category as $ct) : ?>
<div class="modal fade" id="edit<?= $ct->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <!-- form tambah kategori -->
            <form action="<?= base_url('category/edit/' . $ct->id) ?>" method="post"> 
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="category" class="form-control" value="<?= $ct->category ?>">
                    <?= form_error('category', '<div class="text-small text-danger">','</div>'); ?>
                </div>
                <div class="form-group">
                    <label>Kategori Description</label>
                    <input type="text" name="description" class="form-control" value="<?= $ct->description ?>">
                    <?= form_error('description', '<div class="text-small text-danger">','</div>'); ?>
                </div>
                <div class="modal-footer">         
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Kemaskini</button>
                        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Set Semula</button>
                        <a href="<?= base_url('user/category') ?>" class="btn btn-dark btn-sm"> Tutup</a>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>

<?php endforeach ?>
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
