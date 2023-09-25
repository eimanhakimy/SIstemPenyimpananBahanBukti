

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>


                    <!-- DATA TABLE MENU --->

                    <div class="row">
                        <div class="col-lg-6">


                            <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="newMenuModal">Add New Menu</a>



                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $m['menu']; ?> </td>
                                <td>
                                    <a href="" class="badge badge-success">Edit</a>
                                    <a href="" class="badge badge-danger">Delete</a>
                                </td>
                                
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach ?>
                              
                            </tbody>
                            </table>
                        </div>
                    </div>

                


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<!-- MODAL LIVE DEMO DULU AKAN DIGUNAKAN UNTUK EDIT -->


<!-- Modal FOR MENU MANAGEMENT -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newMenuModalLabel">Add New Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="">
      <div class="modal-body">

      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    </div>
  </div>                                                                                                                
</div>



