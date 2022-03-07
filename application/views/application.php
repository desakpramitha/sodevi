<!doctype html>

<head>
    <style>
        .content {
            padding: 1rem;
            border-radius: 2px;
            margin-left: 180px;
            margin-top: 20px;
        }

        @media only screen and (max-width: 850px) {
            .content {
                grid-template-columns: 100%;
                grid-gap: 1rem;
            }
        }

        @media only screen and (max-width: 500px) {
            .content {
                grid-template-columns: 100%;
                grid-gap: 1rem;
                margin-left: 15px
            }
        }

        @media only screen and (max-width: 554px) {
            .content {
                grid-template-columns: 100%;
                grid-gap: 1rem;
                margin-left: 15px;
                width: 450px;
            }
        }

        @media only screen and (max-width: 433px) {
            .content {
                grid-template-columns: 100%;
                grid-gap: 1rem;
                margin-left: 15px;
                width: 350px;
            }
        }

        @media only screen and (max-width: 350px) {
            .content {
                grid-template-columns: 100%;
                grid-gap: 1rem;
                margin-left: 15px;
                width: 280px;
            }
        }

        @media only screen and (max-width: 280px) {
            .content {
                grid-template-columns: 100%;
                grid-gap: 1rem;
                margin-left: 15px;
                width: 245px;
            }
        }
    </style>
    <title>SoDevi - Application</title>
</head>
<html lang="en">

<div class="content">
    <div class="description-product mb-3">
        <table class="">
            <tr>
                <td width="40%">
                    <h6><b>Product Name</b></h6>
                </td>
                <td width="5%">
                    <h6><b>:</h6>
                </td>
                <td>
                    <h6><b><?= $product['NAME'] ?></b></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6><b>Abbreviation</b></h6>
                </td>
                <td>
                    <h6><b>:</h6>
                </td>
                <td>
                    <h6><b><?= $product['ABBREVIATION'] ?></b></h6>
                </td>
            </tr>
        </table>
    </div>


    <div class="list-table">
        <?php if (empty($apps)) : ?>
            <tr>
                <td colspan="6">
                    <div class="alert alert-danger" role="alert">
                        No Application Available !
                    </div>
                </td>
            </tr>
        <?php else : ?>
            <div class="table-sm">
                <table class="table-responsive">
                    <h6>List Of Application</h6>
                    <thead class="table-borderless text-center" style="color:grey">
                        <tr>
                            <th width="5%">No</th>
                            <th>Version</th>
                            <th>Build Date</th>
                            <th>Command</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        <?php $no = 1; ?>
                        <?php foreach ($apps as $a) : ?>

                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td>
                                    <?= $a['VERSION'] ?>
                                </td>
                                <td>
                                    <?= date('d F Y', strtotime($a['BUILD_DATE'])) ?>
                                </td>
                                <td><a class="btn text-primary" href="<?= base_url() ?>software_controller/applicationModule/<?= $a['APPLICATION_ID'] ?>">
                                        List Module</a></td>
                                <td class=" text-center">
                                    <a class="btn btn-primary btn-sm fas fa-edit" data-toggle="modal" data-target="#editApps<?= $a['APPLICATION_ID'] ?>" data-toggle="tooltip" data-placement="right" title="Edit | <?= $a['APPLICATION_ID'] ?>">
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>


        <div class="d-flex justify-content-start">
            <button type="button" data-toggle="modal" data-target="#addApps" class="btn btn-primary mt-4" style="width:250px; border-radius: 15px;"><i class="fa fa-plus"></i> Add New Test Script</i></button>
        </div>


        <!-- Modal Add -->
        <div class="modal fade" id="addApps" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Application</h5>
                        <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('software_controller/insertApplication/' . $product['PRODUCT_id']); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label class="form-label" for="">Version</label><br>
                                <input type="hidden" name="PRODUCT_ID" value="<?= $product['PRODUCT_id'] ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                <input type="text" name="VERSION" class=" form-control bg-white shadow-sm" id="" required></button>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="">Application Build</label><br>
                                <input type="date" name="BUILD_DATE" class=" form-control bg-white shadow-sm" required id=""></button>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <?php foreach ($apps as $a) : ?>
            <div class="modal fade" id="editApps<?= $a['APPLICATION_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Application</h5>
                            <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('software_controller/updateApplication/' . $a['APPLICATION_ID']); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="">Version</label><br>
                                    <input type="hidden" name="APPLICATION_ID" value="<?= $a['APPLICATION_ID']; ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                    <input type="text" name="VERSION" value="<?= $a['VERSION']; ?>" class=" form-control bg-white shadow-sm" required id=""></button>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="">Application Build</label><br>
                                    <input type="date" name="BUILD_DATE" value="<?= $a['BUILD_DATE']; ?>" class=" form-control bg-white shadow-sm" required id=""></button>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url(); ?>software_controller/deleteApplication/<?= $a['APPLICATION_ID'] ?>" data-toggle="modal" data-target="#delete<?= $a['APPLICATION_ID'] ?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                <small> DELETE</small>
                            </a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                            <button href="<?= base_url(); ?>software_controller/Application/<?= $a['APPLICATION_ID'] ?>" type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <!-- Modal Delete-->
        <?php foreach ($apps as $a) : ?>
            <div class="modal fade" id="delete<?= $a['APPLICATION_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="<?= base_url(); ?>software_controller/deleteApplication/<?= $a['APPLICATION_ID'] ?>" method="post" enctype="multipart/form-data">
                                <h6>Are you sure to delete <span class="badge badge-warning"><?= $a['APPLICATION_ID']; ?> | <?= $a['VERSION']; ?></span>?</h6>
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

    </div>
</div>


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