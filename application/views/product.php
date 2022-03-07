<!doctype html>

<head>
    <style>
        @media only screen and (max-width: 2000px) {
            .content .bar {
                padding-left: 195px;
                padding-top: 20px;

            }

            .content .tabel {
                padding-left: 190px;

            }
        }

        @media only screen and (max-width: 700px) {
            .content .bar {
                padding-left: 30px;
                padding-top: 40px;

            }

            .content .tabel {
                padding-left: 10px;
            }
        }
    </style>
    <title>SoDevi - Product</title>
</head>
<html lang="en">
<div class="content">
    <div class="bar mb-2 d-flex justify-content-center">
        <div class="flex-grow-1" style="font-size:20px;color: lightgray">
            <h5>List 1-10, Total: <?= $total_product ?></h5>
        </div>
        <form class="d-flex" method="post" action="<?= base_url() . 'software_controller/product' ?>">
            <div class="input-group bg-light" style="border :none; border-radius: 19px; overflow-x: hidden;">
                <!-- <input class="btn" type="submit" name="submit" id="button-addon1" style="border-radius: 30px; overflow-x: hidden;"><i class="fas fa-search text-primary"></i></input> -->
                <input class="btn" type="submit" name="submit" id="button-addon1" style="border-radius: 30px; overflow-x: hidden;"></input>
                <input type="search" name="keyword" value="<?= set_value('keyword'); ?>" class="form-control bg-light" placeholder="Search" style="outline: none; border: none; width: 210px;" autocomplete="off" autofocus>
            </div>
        </form>
    </div>

    <div class="tabel">
        <?= $this->session->flashdata('message'); ?>
        <div class="table-sm" style="width:100%;">
            <table class="table-responsive">
                <thead class="table-borderless text-center" style="color:grey">
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Code</th>
                        <th width="15%">Name</th>
                        <th>Abbreviation</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    <?php if (empty($product)) : ?>
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-danger" role="alert">
                                    data not found!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($product as $pdt) : ?>
                        <tr>
                            <td class="text-center"><?= ++$start ?></td>
                            <td class="text-center"><?= $pdt['PRODUCT_CODE'] ?></td>
                            <td><?= $pdt['NAME'] ?></td>
                            <td><?= $pdt['ABBREVIATION'] ?></td>
                            <td><?= $pdt['DESCRIPTION'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm fas fa-edit" data-toggle="modal" data-target="#edit<?= $pdt['PRODUCT_id'] ?>" data-toggle="tooltip" data-placement="right" title="Edit | <?= $pdt['PRODUCT_CODE'] ?>">
                                </a>
                                <!-- <a href="<?= base_url(); ?>software_controller/deleteProduct/<= $pdt['PRODUCT_id'] ?>" data-toggle="modal" data-target="#delete<?= $pdt['PRODUCT_id'] ?>" class="btn btn-danger btn-sm fas fa-trash">
                                </a> -->
                                <!-- <a href="<= base_url(); ?>software_controller/deleteProduct/<= $pdt['PRODUCT_id'] ?>" data-toggle="modal" data-target="#delete<?= $pdt['PRODUCT_id'] ?>" class="btn btn-danger btn-sm fas fa-trash" onclick="return confirm('Are you sure to delete ?');">
                                </a> -->

                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <h6>Result : <?= $total_rows ?></h6>

            <div class="mb-2 d-flex justify-content-start" style="margin-top: 30px;">

                <div class="flex-grow-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add" style="border-radius: 15px;">+ Add New Application Build</i></button>
                </div>

                <!-- <div class="col d-flex justify-content-center">
                                
                            </div> -->

                <div class="d-flex justify-content-end">
                    <!-- <button class="btn btn-outline-primary mr-3" style="border-radius: 15px;"><i class="bi bi-arrow-left"></i> Previous</button>
                        <button class="btn btn-primary" style="border-radius: 15px;">Next List <i class="bi bi-arrow-right"></i></button> -->
                    <?= $this->pagination->create_links() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal ADD-->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Add New Application Build</b></h5>
                <!-- <br><small >Description</small> -->
                <button type="button" class="close" style="color: #0275d8;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url('software_controller/insertProduct'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Code</label><br>
                        <input type="text" name="PRODUCT_CODE" class=" form-control bg-white shadow-sm" id="" required></button>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Name</label><br>
                        <input type="text" name="NAME" class="form-control bg-white shadow-sm" id="" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Abbreviation</label><br>
                        <input type="text" name="ABBREVIATION" class="form-control bg-white shadow-sm " id="" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Description</label><br>
                        <!-- <input type="text" name="description" class="form-control bg-white shadow-sm" id="pass_log_id"> -->
                        <textarea class="form-control" name="DESCRIPTION" id="" cols="30" rows=""></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary" style="width:100px"><small>SAVE</small></button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Update-->
<?php foreach ($product as $pdt) : ?>
    <div class="modal fade" id="edit<?= $pdt['PRODUCT_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Edit Product</b></h5>
                    <!-- <br><small >Description</small> -->
                    <button type="button" class="close" style="color: #0275d8;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?php echo base_url('software_controller/updateProduct'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label class="form-label" for="">Code</label><br>
                            <input type="hidden" value="<?= $pdt['PRODUCT_id']; ?>" name="PRODUCT_id" class=" form-control bg-white shadow-sm" id="" required></button>
                            <input type="text" value="<?= $pdt['PRODUCT_CODE']; ?>" name="PRODUCT_CODE" class=" form-control bg-white shadow-sm" id="" required></button>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="">Name</label><br>
                            <input type="text" value="<?= $pdt['NAME']; ?>" name="NAME" class="form-control bg-white shadow-sm" id="" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="">Abbreviation</label><br>
                            <input type="text" value="<?= $pdt['ABBREVIATION']; ?>" name="ABBREVIATION" class="form-control bg-white shadow-sm " id="" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="">Description</label><br>
                            <!-- <input type="text" name="description" class="form-control bg-white shadow-sm" id="pass_log_id"> -->
                            <textarea class="form-control" value="" name="DESCRIPTION" id="" cols="30" rows=""><?= $pdt['DESCRIPTION']; ?></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <a href="<?= base_url(); ?>software_controller/deleteProduct/<?= $pdt['PRODUCT_id'] ?>" data-toggle="modal" data-target="#delete<?= $pdt['PRODUCT_id'] ?>" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        <small> DELETE</small>
                    </a>
                    <a href="<?= base_url(); ?>software_controller/application/<?= $pdt['PRODUCT_id'] ?>" class="btn btn-warning">
                        <i class="fas fa-pencil-alt"></i>
                        <small> EDIT APPLICATION</small>
                    </a>
                    <button type="submit" class="btn btn-primary"><small>SAVE CHANGES</small></button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Delete-->
<?php foreach ($product as $pdt) : ?>
    <div class="modal fade" id="delete<?= $pdt['PRODUCT_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Confirmation</b></h5>
                    <!-- <br><small >Description</small> -->
                    <button type="button" class="close" style="color: #0275d8;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>software_controller/deleteProduct/<?= $pdt['PRODUCT_id'] ?>" method="post" enctype="multipart/form-data">
                        <h6>Are you sure to delete <span class="badge badge-secondary"><?= $pdt['PRODUCT_CODE']; ?> | <?= $pdt['NAME']; ?></span>?</h6>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><small>CANCEL</small></button>
                    <button type="submit" class="btn btn-danger"><small>DELETE</small></button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>