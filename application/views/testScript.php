<!doctype html>

<head>
    <style>
        .content {
            padding: 1rem;
            border-radius: 2px;
            margin-left: 100px;
            margin-top: 30px;
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
    <title>SoDevi - Test Script</title>

</head>
<html lang="en">

<div class="content" style="height:auto;">
    <div class="mb-3">
        <!-- <php if (empty($testscript)) : ?>
            <tr>
                <td colspan="6">
                    <div class="alert alert-danger" role="alert">
                        No Test Script Available !
                    </div>
                </td>
            </tr>
        <php else : ?>
        <php endif; ?> -->
        <table class="table table-sm" style="margin-bottom: 40px">
            <h6>List Of Test Script</h6>
            <thead class="table-borderless text-muted">
                <tr class="text-center">
                    <th>No</th>
                    <th>Application</th>
                    <th>Build Date</th>
                    <th>Tester</th>
                    <th>Browser</th>
                    <th>Version</th>
                    <th>Server OS</th>
                    <th>OS</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody class="table-bordered shadow-sm">
                <?php $no = 1; ?>
                <?php foreach ($testscript as $ts) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td>
                            <?= $ts['NAME'] ?>
                            <?= $ts['VERSION'] ?>
                        </td>
                        <td><?= $ts['SOFT_APP_BUILD_ID'] ?></td>
                        <td></td>
                        <td><?= $ts['BROWSER'] ?></td>
                        <td><?= $ts['VERSION_BROW'] ?></td>
                        <td><?= $ts['SERVER_OS_ID'] ?></td>
                        <td><?= $ts['OS_ID'] ?></td>
                        <td class="text-center"><a class="btn btn-primary btn-sm fas fa-edit" data-toggle="modal" data-target="#editTestScript<?= $ts['TEST_ID'] ?>" data-toggle="tooltip" data-placement="right" title="Edit | <?= $ts['TEST_ID'] ?>"></a></td>
                        <td class="text-center"><a class="btn btn-danger btn-sm fas fa-trash" data-toggle="modal" data-target="#deleteTestScript<?= $ts['TEST_ID'] ?>" data-toggle="tooltip" data-placement="right" title="Edit | <= $ts[''] ?>"></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- <a href="<?= base_url('test_controller/test/') ?>">No test script available</a>
        <a href="<?= base_url('test_controller/testEvaluation/') ?>">Test Evaluation</a> -->
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" data-toggle="modal" data-target="#addTestScript" class="btn btn-primary mt-4" style="width:250px; border-radius: 15px;"><i class="fa fa-plus"></i> Add New Test Script</i></button>
    </div>


    <!-- Modal add test script-->
    <div class="modal fade" id="addTestScript" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Test Script</h5>
                    <h6><small>Description</small></h6>
                    <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('test_controller/insertTestScript/') ?>" method="POST">
                        <input type="hidden" name="PASSWORD" value="<?= $user['password']; ?>">
                        <input type="hidden" name="BROWSER" value="<?= $browser ?>">
                        <input type="hidden" name="VERSION_BROW" value="<?= $browser_version ?>">

                        <!-- application -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="">Application</label><br>
                            <select name="APPLICATION_ID" class="form-control form-control-sm" id="APPLICATION_ID">
                                <option value="">- CHOOSE APPLICATION -</option>
                                <?php foreach ($appProduct as $ap) : ?>
                                    <option value="<?= $ap['APPLICATION_ID'] ?>"><?= $ap['NAME'] ?> <?= $ap['VERSION'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Build Date -->

                        <div class="form-group mb-3">
                            <label class="form-label" for="">Build Date</label><br>
                            <select name="BUILD_DATE" class="form-control form-control-sm" id="BUILD_DATE">
                                <option value="">- Choose Build Date -</option>

                            </select>
                        </div>


                        <div class="row">
                            <!-- server os -->
                            <div class="col form-group mb-3">
                                <label class="form-label" for="">Server Operating System</label><br>
                                <select class="form-control" name="SERVER_OS_ID" id="applicationSelect" value="" required>
                                    <option value="" read only>- Choose Server Operating System -</option>
                                    <?php foreach ($os as $s) : ?>
                                        <option value="<?= $s['OS_ID'] ?>"><?= $s['OS_NAME'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- os -->
                            <div class="col form-group mb-3">
                                <label class="form-label" for="">Operating system</label><br>
                                <select class="form-control" name="OS_ID" id="applicationSelect" value="" required>
                                    <option value="" read only>- Choose Operating System -</option>
                                    <?php foreach ($os as $os) : ?>
                                        <option value="<?= $os['OS_ID'] ?>"><?= $os['OS_NAME'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- server detail -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="">Server detail</label><br>
                            <textarea class="form-control" name="SERVER_DETAIL" id="" cols="30" rows=""></textarea>
                        </div>

                        <!-- workstation detail -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="">Workstation detail</label><br>
                            <textarea class="form-control" name="WORKS_DETAIL" id="" cols="30" rows=""></textarea>
                        </div>

                        <!-- note -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="">Note</label><br>
                            <textarea class="form-control" name="NOTE" id="" cols="30" rows=""></textarea>
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

    <!-- Modal EDIT test script-->
    <?php foreach ($testscript as $ts) : ?>
        <div class="modal fade" id="editTestScript<?= $ts['TEST_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Test Script</h5>
                        <h6><small>Description</small></h6>
                        <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('test_controller/updateTestScript/') ?>" method="POST">
                            <input type="hidden" name="PASSWORD" value="<?= $user['password']; ?>">
                            <input type="hidden" name="BROWSER" value="<?= $ts['BROWSER'] ?>">
                            <input type="hidden" name="VERSION_BROW" value="<?= $browser_version ?>">

                            <!-- application -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="">Application</label><br>
                                <select name="APPLICATION_ID" class="form-control form-control-sm" id="appProductSelect" value="<?= $ts['APPLICATION_ID'] ?>">
                                    <option value="<?= $ts['APPLICATION_ID'] ?>"><?= $ts['NAME'] ?> <?= $ts['VERSION'] ?></option>
                                    <?php foreach ($appProduct as $ap) : ?>
                                        <option value="<?= $ap['APPLICATION_ID'] ?>"><?= $ap['NAME'] ?> <?= $ap['VERSION'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Build Date -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="">Build Date</label><br>
                                <select name="BUILD_DATE" class="form-control form-control-sm" id="BUILD_DATE">
                                    <option value="<?= $ts['SOFT_APP_BUILD_ID'] ?>"><?= $ts['BUILD_DATE'] ?></option>
                                    <option value=""></option>

                                </select>
                            </div>

                            <div class="row">
                                <!-- server os -->
                                <div class="col form-group mb-3">
                                    <label class="form-label" for="">Server Operating System</label><br>
                                    <select class="form-control" name="SERVER_OS_ID" id="applicationSelect" value="" required>
                                        <option value="" read only>- Choose Server Operating System -</option>
                                        <?php foreach ($os as $s) : ?>
                                            <option value="<?= $s['OS_ID'] ?>"><?= $s['OS_NAME'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- os -->
                                <div class="col form-group mb-3">
                                    <label class="form-label" for="">Operating system</label><br>
                                    <select class="form-control" name="OS_ID" id="applicationSelect" value="" required>
                                        <option value="" read only>- Choose Operating System -</option>
                                        <?php foreach ($os as $os) : ?>
                                            <option value="<?= $os['OS_ID'] ?>"><?= $os['OS_NAME'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- server detail -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="">Server detail</label><br>
                                <textarea class="form-control" name="SERVER_DETAIL" id="" cols="30" rows=""><?= $ts['SERVER_DETAIL'] ?></textarea>
                            </div>

                            <!-- workstation detail -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="">Workstation detail</label><br>
                                <textarea class="form-control" name="WORKS_DETAIL" id="" cols="30" rows=""><?= $ts['WORKS_DETAIL'] ?></textarea>
                            </div>

                            <!-- note -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="">Note</label><br>
                                <textarea class="form-control" name="NOTE" id="" cols="30" rows=""><?= $ts['NOTE'] ?></textarea>
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

    <!-- Modal Delete -->
    <?php foreach ($testscript as $ts) : ?>
        <div class="modal fade" id="deleteTestScript<?= $ts['TEST_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form action="<?= base_url(); ?>software_controller/deleteTestScript/<?= $ts['TEST_ID'] ?>" method="post" enctype="multipart/form-data">
                            <h6>Are you sure to delete <span class="badge badge-warning"><?= $ts['TEST_ID']; ?> </span>?</h6>
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
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#APPLICATION_ID').change(function() {

            var id = $(this).val();
            $.ajax({
                url: "<?= base_url(''); ?>/test_controller/getBuildDate/",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id
                },
                cache: false,
                success: function(array) {
                    var html = '';
                    var i;
                    for (i = 0; i < array.length; i++) {
                        html += '<option value=' + array[i].SOFT_APP_BUILD_ID + '>' + array[i].BUILD_DATE + '</option>';
                    }
                    $('#BUILD_DATE').html(html);

                }
            });

        });

    });
</script>


<!-- Option 2: Separate Popper and Bootstrap JS -->

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
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