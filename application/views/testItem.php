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
    <!-- <script src="<= base_url('assets/ckeditor/ckeditor.js'); ?>"></script> -->
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <title>SoDevi - Test Case</title>
</head>
<html lang="en">

<div class="content">
    <div class="description-product mb-5">
        <table>
            <tr>
                <td width="40%">
                    <h6><b>Product Name</b></h6>
                </td>
                <td width="5%">
                    <h6><b>:</h6>
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
                    <h6><b>:</h6>
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
                    <h6><b>Module</h6>
                </td>
                <td>
                    <h6><b>:</h6>
                </td>
                <td>
                    <h6><b><?= $product[0]['MODULE_NAME'] ?></b></h6>
                </td>
            </tr>
        </table>
    </div>


    <div class=" list-table">
        <?php if (empty($item)) : ?>
            <tr>
                <td colspan="6">
                    <div class="alert alert-danger" role="alert">
                        No Test Case Available !
                    </div>
                </td>
            </tr>
        <?php else : ?>
            <div class="table-sm">
                <table class="table-responsive">
                    <h6>List Of Test Case</h6>
                    <thead class="table-borderless text-center" style="color:grey">
                        <tr>
                            <th width="5%">No</th>
                            <th>Test Item</th>
                            <th>Test Case</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        <?php $no = 1; ?>
                        <?php foreach ($item as $itm) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td>
                                    <?= $itm['ITEM_NAME'] ?>
                                </td>
                                <td>
                                    <?php if (empty($itm['TEST_CASE'])) : ?>
                                        <a class="btn text-danger" data-toggle="modal" data-target="#addTestCaseTable<?= $itm['TEST_CASE_ID'] ?>" style="border-radius: 15px;"><i class="fa fa-plus"></i> Add Test Item</i></button>
                                        <?php else : ?>
                                            <a class="btn text-primary" data-toggle="modal" data-target="#editTestCase<?= $itm['TEST_CASE_ID'] ?>"><?= $itm['TEST_CASE'] ?></a><br>
                                        <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm fas fa-edit" data-toggle="modal" data-target="#editTestItem<?= $itm['TEST_ITEM_ID'] ?>" data-toggle="tooltip" data-placement="right" title="Edit | <?= $itm['TEST_ITEM_ID'] ?>">

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
                <button class="btn btn-info" type="button" data-toggle="modal" data-target="#addTestItem" style="border-radius: 15px;"><i class="fa fa-plus"></i> Add New Test Item</i></button>
                <button class="btn btn-primary ml-2 " type="button" data-toggle="modal" data-target="#addTestCase" style="border-radius: 15px;"><i class="fa fa-plus"></i> Add New Test Case</i></button>

            </div>
        </div>

        <!-- Modal Add test item-->
        <div class="modal fade" id="addTestItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Test Item</h5>
                        <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('software_controller/insertTestItem/') ?>" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="MOD_ITEM_ID" value="<?= $modItemId; ?>" class=" form-control bg-white shadow-sm" id=""></button>
                            <input type="hidden" name="MODULE_ID" value="<?= $item[0]['MODULE_ID'] ?>" class=" form-control bg-white shadow-sm" id=""></button>

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

        <!-- Modal Edit Test Item-->
        <?php foreach ($item as $itm) : ?>
            <div class="modal fade" id="editTestItem<?= $itm['TEST_ITEM_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Test Item</h5>
                            <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('software_controller/updateTestItem/') ?>" method="post" enctype="multipart/form-data">
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Item Name</label><br>
                                    <input type="hidden" name="TEST_ITEM_ID" value="<?= $itm['TEST_ITEM_ID']; ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                    <input type="text" name="ITEM_NAME" value="<?= $itm['ITEM_NAME']; ?>" class=" form-control bg-white shadow-sm" id=""></button>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url(); ?>software_controller/deleteTestItem/<?= $itm['TEST_ITEM_ID'] ?>" data-toggle="modal" data-target="#deleteTestItem<?= $itm['TEST_ITEM_ID'] ?>" class="btn btn-danger">
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

        <!-- Modal Delete Test item -->
        <?php foreach ($item as $itm) : ?>
            <div class="modal fade" id="deleteTestItem<?= $itm['TEST_ITEM_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="<?= base_url(); ?>software_controller/deleteTestItem/<?= $itm['TEST_ITEM_ID'] ?>" method="post" enctype="multipart/form-data">
                                <h6>Are you sure to delete <span class="badge badge-warning"><?= $itm['TEST_ITEM_ID']; ?> | <?= $itm['ITEM_NAME']; ?></span>?</h6>
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


        <!-- Modal Add Test Case -->
        <div class="modal fade" id="addTestCase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Test Case</h5>
                        <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('software_controller/insertTestCase/') ?>" method="post" enctype="multipart/form-data">
                            <div class=" form-group mb-3">
                                <label class="form-label" for="">Test Item</label><br>
                                <select class="form-control" name="TEST_ITEM_ID" id="itemSelect" value="" required>
                                    <option value="" read only>- CHOOSE TEST ITEM -</option>
                                    <?php foreach ($item as $itm) : ?>
                                        <option value="<?= $itm['TEST_ITEM_ID'] ?>"><?= $itm['TEST_ITEM_ID'] ?> | <?= $itm['ITEM_NAME'] ?></option>
                                        <?php endforeach; ?>value="<?php echo set_value('alamat') ? set_value('alamat') : $siswa['alamat']; ?>"
                                </select>
                            </div>
                            <div class=" form-group mb-3">
                                <label class="form-label" for="">Test Case</label><br>
                                <input type="text" name="TEST_CASE" class=" form-control bg-white shadow-sm" id="" required></button>
                            </div>
                            <div class=" form-group mb-3">
                                <label class="form-label" for="">Test Scenario</label><br>
                                <textarea name="TEST_SCENARIO" required></textarea>
                                <script>
                                    CKEDITOR.replace('TEST_SCENARIO', {
                                        filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                        height: '400px'
                                    });
                                </script>
                            </div>
                            <div class=" form-group mb-3">
                                <label class="form-label" for="">Test Scenario</label><br>
                                <textarea name="DATA_INPUT" required></textarea>
                                <script>
                                    CKEDITOR.replace('DATA_INPUT', {
                                        filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                        height: '400px'
                                    });
                                </script>
                            </div>
                            <div class=" form-group mb-3">
                                <label class="form-label" for="">Expected Result</label><br>
                                <textarea name="TEST_RESULT" required></textarea>
                                <script>
                                    CKEDITOR.replace('TEST_RESULT', {
                                        filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                        height: '400px'
                                    });
                                </script>
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

        <!-- Modal Add Test Case From table-->
        <?php foreach ($item as $itm) : ?>
            <div class="modal fade" id="addTestCaseTable<?= $itm['TEST_CASE_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Test Case</h5>
                            <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('software_controller/insertTestCase/') ?>" method="post" enctype="multipart/form-data">
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Item</label><br>
                                    <select class="form-control" name="TEST_ITEM_ID" id="itemSelect" value="" required>
                                        <option value="<?= $itm['TEST_ITEM_ID'] ?>"><?= $itm['TEST_ITEM_ID'] ?> | <?= $itm['ITEM_NAME'] ?></option>
                                    </select>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Case</label><br>
                                    <input type="text" name="TEST_CASE" class=" form-control bg-white shadow-sm" id="" required></button>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Scenario</label><br>
                                    <textarea name="editor1" id="editor1"></textarea>
                                    <script>
                                        CKEDITOR.replace('editor1');
                                    </script>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Scenario</label><br>
                                    <textarea name="DATA_INPUT_" required></textarea>
                                    <script>
                                        CKEDITOR.replace('DATA_INPUT_', {
                                            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                            height: '400px'
                                        });
                                    </script>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Expected Result</label><br>
                                    <textarea name="TEST_RESULT_" required></textarea>
                                    <script>
                                        CKEDITOR.replace('TEST_RESULT_', {
                                            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                            height: '400px'
                                        });
                                    </script>
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
        <?php endforeach; ?>

        <!-- Modal Edit Test Case -->
        <?php foreach ($item as $itm) : ?>
            <div class="modal fade" id="editTestCase<?= $itm['TEST_CASE_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Test Case</h5>
                            <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('software_controller/updateTestCase/') ?>" method="post" enctype="multipart/form-data">
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Item</label><br>
                                    <input type="hidden" name="TEST_CASE_ID" value=" <?= $itm['TEST_CASE_ID'] ?>"></input>
                                    <select class="form-control" name="TEST_ITEM_ID" id="itemSelect" value=" <?= $itm['TEST_ITEM_ID'] ?>"><?= $itm['TEST_ITEM_ID'] ?> | <?= $itm['ITEM_NAME'] ?>" required>
                                        <option value="<?= $itm['TEST_ITEM_ID'] ?>"><?= $itm['TEST_ITEM_ID'] ?> | <?= $itm['ITEM_NAME'] ?></option>
                                    </select>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Case</label><br>
                                    <input type="text" name="EDIT_TEST_CASE" value="<?= $itm['TEST_CASE'] ?>" class=" form-control bg-white shadow-sm" id="" required></input>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Scenario</label><br>
                                    <textarea name="EDIT_TEST_SCENARIO" value="<?= $itm['TEST_SCENARIO'] ?>" required><?= $itm['TEST_SCENARIO'] ?></textarea>
                                    <script>
                                        CKEDITOR.replace('EDIT_TEST_SCENARIO', {
                                            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                            height: '400px'
                                        });
                                    </script>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Test Scenario</label><br>
                                    <textarea name="EDIT_DATA_INPUT" required><?= $itm['DATA_INPUT'] ?></textarea>
                                    <script>
                                        CKEDITOR.replace('EDIT_DATA_INPUT', {
                                            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                            height: '400px'
                                        });
                                    </script>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="">Expected Result</label><br>
                                    <textarea name="EDIT_TEST_RESULT" required><?= $itm['TEST_RESULT'] ?></textarea>
                                    <script>
                                        CKEDITOR.replace('EDIT_TEST_RESULT', {
                                            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                            height: '400px'
                                        });
                                    </script>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url(); ?>software_controller/deleteTestCase/<?= $itm['TEST_CASE_ID'] ?>" data-toggle="modal" data-target="#deleteTestCase<?= $itm['TEST_CASE_ID'] ?>" class="btn btn-danger">
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

        <!-- Modal Delete Test Case -->
        <?php foreach ($item as $itm) : ?>
            <div class="modal fade" id="deleteTestCase<?= $itm['TEST_CASE_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="<?= base_url(); ?>software_controller/deleteTestCase/<?= $itm['TEST_CASE_ID'] ?>" method="post" enctype="multipart/form-data">
                                <h6>Are you sure to delete <span class="badge badge-warning"><?= $itm['TEST_CASE_ID']; ?> | <?= $itm['TEST_CASE']; ?></span>?</h6>
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
<script script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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