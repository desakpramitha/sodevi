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
    <script type="text/javascript">
        function resetForm($myform) {
            $myform.find('input:password, input:file, select, textarea').val('');
            $myform.find('input:radio,input:checkbox')
                .removeAttr('checked').removeAttr('selected');
        }
    </script>
</head>
<html lang="en">

<div class="content">
    <div class="description-product mb-4">
        <table>
            <tr>
                <td width=50%>
                    <h6><b>Product Name</b></h6>
                </td>
                <td width=5%>
                    <h6><b>:</b></h6>
                </td>
                <td>
                    <h6><b><?= $product[0]['NAME'] ?></b></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6><b>Abbreviation</b></h6>
                </td>
                <td>
                    <h6><b>:</b></h6>
                </td>
                <td>
                    <h6><b><?= $product[0]['ABBREVIATION'] ?></b></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6><b>Version</b></h6>
                </td>
                <td>
                    <h6><b>:</h6>
                </td>
                <td>
                    <h6><b><?= $product[0]['VERSION'] ?></b></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6><b>Build Date</b></h6>
                </td>
                <td>
                    <h6><b>:</h6>
                </td>
                <td>
                    <h6><b><?= date('d F Y', strtotime($product[0]['BUILD_DATE'])) ?></b></h6>
                </td>
            </tr>
        </table>
    </div>


    <div class="list-table">
        <?= $this->session->flashdata('message'); ?>
        <?php if (empty($module)) : ?>
            <tr>
                <td colspan="6">
                    <div class="alert alert-danger" role="alert">
                        No Module Available !
                    </div>
                </td>
            </tr>
        <?php else : ?>
            <div class="table-sm">
                <table class="table-responsive">
                    <h6>List Of Module</h6>
                    <thead class="table-borderless text-center" style="color:grey">
                        <tr>
                            <th width="5%">No</th>
                            <th>Module ID</th>
                            <th>Module</th>
                            <th>Test Item</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        <?php $no = 1; ?>
                        <?php foreach ($module as $mdl) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td>
                                    <?= $mdl['MODULE_ID'] ?>
                                </td>
                                <td>
                                    <?= $mdl['NAME'] ?>
                                </td>
                                <td>
                                    <?php if (empty($mdl['MOD_ITEM_ID'])) : ?>
                                        <a class="btn text-danger" data-toggle="modal" data-target="#addModuleItem<?= $mdl['MODULE_ID'] ?>" style="border-radius: 15px;"><i class="fa fa-plus"></i> Add Test Item</i></button>
                                        <?php else : ?>
                                            <a class="btn text-primary" data-toggle="modal" data-target="#editTestItem<?= $mdl['MOD_ITEM_ID'] ?>"><?= $mdl['ITEM_NAME'] ?></a><br>
                                        <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm fas fa-edit" data-toggle="modal" data-target="#editModule<?= $mdl['MODULE_ID'] ?>" data-toggle="tooltip" data-placement="right" title="Edit | <?= $mdl['MODULE_ID'] ?>">

                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <div class="">
            <div class="d-flex justify-content-start mt-4">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addModule" style="border-radius: 15px;"><i class="fa fa-plus"></i> Add New Module</i></button>

                <button class="btn btn-info ml-2" type="button" data-toggle="modal" data-target="#addModuleItem" style="border-radius: 15px;"><i class="fa fa-plus"></i> Add New Test Item</i></button>
            </div>
        </div>


        <!-- Modal Add Module-->
        <div class="modal fade" id="addModule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Module</h5>
                        <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('software_controller/insertModule/') ?>" method="post" enctype="multipart/form-data">
                            <div class=" form-group mb-3">
                                <label class="form-label" for="">Module</label><br>
                                <input type="hidden" name="MODULE_ID" value="<?= $moduleId; ?>" class=" form-control bg-white shadow-sm" id="">
                                <input type="hidden" name="APPLICATION_ID" value="<?= $product[0]['APPLICATION_ID']; ?>" class=" form-control bg-white shadow-sm" id="">
                                <input type="text" name="NAME" class=" form-control bg-white shadow-sm" id="" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Add Test Item-->
        <div class="modal fade" id="addModuleItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Test Item</h5>
                        <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="myform" action="<?php echo base_url('software_controller/insertModuleItem/') ?>" method="post" enctype="multipart/form-data">
                            <div class=" form-group mb-3">
                                <label class="form-label" for="">Module</label><br>
                                <input type="hidden" name="MOD_ITEM_ID" value="<?= $modItemId; ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                <select class="form-control" name="MODULE_ID" id="moduleSelect" select autofocus required>
                                    <option value="" read only>- CHOOSE MODULE -</option>
                                    <?php foreach ($dropdownModule as $drw) : ?>
                                        <!-- <input type="hidden" name="MODULE_ID" value="<?= $dropdownModule['MODULE_ID'] ?>" class=" form-control bg-white shadow-sm" id=""></button> -->
                                        <option value="<?= $drw['MODULE_ID'] ?>"><?= $drw['MODULE_ID'] ?> | <?= $drw['NAME'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class=" form-group mb-3">
                                <label class="form-label" for="">Item Name</label><br>
                                <input type="text" name="ITEM_NAME" class=" form-control  bg-white shadow-sm" id="" autocomplete="off" required></button>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add Test Item From table-->
        <?php foreach ($module as $mdl) : ?>
            <div class="modal fade" id="addModuleItem<?= $mdl['MODULE_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Test Item</h5>
                            <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="myform" action="<?= base_url('software_controller/insertModuleItem/') ?>" method="post" enctype="multipart/form-data">
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Module</label><br>
                                    <input type="hidden" name="MOD_ITEM_ID" value="<?= $modItemId; ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                    <input type="hidden" name="MODULE_ID" value="<?= $mdl['MODULE_ID'] ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                    <select class="form-control" id="moduleSelect" value="<?= $mdl['MODULE_ID'] ?>">

                                        <option value="<?= $mdl['MODULE_ID'] ?>"><?= $mdl['MODULE_ID'] ?> | <?= $mdl['NAME'] ?></option>

                                    </select>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Item Name</label><br>
                                    <input type="text" name="ITEM_NAME" class=" form-control  bg-white shadow-sm" id="" required></button>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Modal Edit Module-->
        <?php foreach ($module as $mdl) : ?>
            <div class="modal fade" id="editModule<?= $mdl['MODULE_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Module</h5>
                            <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="myform" action="<?php echo base_url('software_controller/updateModule/') ?>" method="post" enctype="multipart/form-data">
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Module</label><br>
                                    <input type="hidden" name="MODULE_ID" value="<?= $mdl['MODULE_ID']; ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                    <input type="text" name="NAME" value="<?= $mdl['NAME']; ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url(); ?>software_controller/deleteModule/<?= $mdl['MODULE_ID'] ?>" data-toggle="modal" data-target="#deleteModule<?= $mdl['MODULE_ID'] ?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                <small> DELETE</small>
                            </a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


        <!-- Modal Edit Test Item -->
        <?php foreach ($module as $mdl) : ?>
            <div class="modal fade" id="editTestItem<?= $mdl['MOD_ITEM_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Test Item</h5>
                            <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('software_controller/updateModuleItem/') ?>" method="post" enctype="multipart/form-data">
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Item</label><br>
                                    <input type="hidden" name="MOD_ITEM_ID" value="<?= $mdl['MOD_ITEM_ID'] ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                    <input type="text" name="ITEM_NAME" value="<?= $mdl['ITEM_NAME'] ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="" data-toggle="modal" data-target="#deleteModuleItem<?= $mdl['MOD_ITEM_ID'] ?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                <small> DELETE</small>
                            </a>
                            <a href="<?= base_url(); ?>software_controller/testItem/<?= $mdl['MOD_ITEM_ID'] ?>" class="btn btn-warning">
                                <i class="fas fa-pencil-alt"></i>
                                <small> EDIT TEST CASE</small>
                            </a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Modal Delete Module -->
        <?php foreach ($module as $mdl) : ?>
            <div class="modal fade" id="deleteModule<?= $mdl['MODULE_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="<?= base_url(); ?>software_controller/deleteModule/<?= $mdl['MODULE_ID'] ?>" method="post" enctype="multipart/form-data">
                                <h6>Are you sure to delete <span class="badge badge-warning"><?= $mdl['MODULE_ID']; ?> | <?= $mdl['NAME']; ?></span>?</h6>
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

        <!-- Modal Delete Module Item-->
        <?php foreach ($module as $mdl) : ?>
            <div class="modal fade" id="deleteModuleItem<?= $mdl['MOD_ITEM_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="<?= base_url(); ?>software_controller/deleteModuleitem/<?= $mdl['MOD_ITEM_ID'] ?>" method="post" enctype="multipart/form-data">
                                <h6>Are you sure to delete <span class="badge badge-warning"><?= $mdl['MOD_ITEM_ID']; ?> | <?= $mdl['ITEM_NAME']; ?></span>?</h6>
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

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>

</html>