<!doctype html>

<head>
    <style>
        .tabel {
            max-width: 500px;
        }

        .content {
            margin: 30px 0px 0px 165px;
        }

        .tombol {
            display: flex;
            justify-content: end;
        }

        .topbar {
            max-width: 1200px;
            width: 100%;
            margin-top: 40px;
            margin-bottom: 20px;
            margin-left: 30px;
            display: flex;
            justify-content: start;
        }

        @media only screen and (max-width: 800px) {
            .content {
                margin-left: 50px;
            }
        }

        @media only screen and (max-width: 600px) {
            .kanan .topbar {
                max-width: 400px;
                width: 100%;
            }

            .content {
                margin-left: 0px;
            }

            .tabel {
                width: 100%;
            }

            h1 {
                font-size: 24px;
            }

            h6 {
                font-size: 12px;
            }

            /* .bars i, .arrow i{
                font-size : 24px;
                padding : 0px 0px;
            } */
        }
    </style>

    <title>SoDevi - Application Build</title>
</head>
<html lang="en">

<div class="content p-4" style="height:auto;">
    <?php if (empty($appBuild)) : ?>
        <tr>
            <td colspan="6">
                <div class="alert alert-danger" role="alert">
                    No Application Build Available !
                </div>
            </td>
        </tr>
    <?php else : ?>
        <div class="tabel">
            <table class="table table-sm" style="margin-bottom: 40px">
                <thead class="table-borderless" style="color:grey">
                    <tr>
                        <th style="width: 50%">Application</th>
                        <th style="width: 50%">Build State</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-bordered shadow-sm">
                    <?php foreach ($appBuild as $ab) : ?>
                        <tr>
                            <td><?= $ab['NAME'] ?> <?= $ab['VERSION'] ?></td>
                            <td><?= date('d F Y', strtotime($ab['BUILD_DATE'])) ?></td>
                            <td class="text-center"><a class="btn btn-primary btn-sm fas fa-edit" data-toggle="modal" data-target="#editAppBuild<?= $ab['SOFT_APP_BUILD_ID'] ?>" data-toggle="tooltip" data-placement="right" title="Edit | <?= $ab['SOFT_APP_BUILD_ID'] ?>"></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <div class="tombol d-flex justify-content-end">
            <a href="<?= base_url(); ?>software_controller/saveEvaluation" class="btn btn-primary" style="border-radius: 10px;"><i class="fa fa-plus"></i> Add New Application</a>
        </div>


        </div>

        <!-- Modal Edit -->
        <?php foreach ($appBuild as $ab) : ?>
            <div class="modal fade" id="editAppBuild<?= $ab['SOFT_APP_BUILD_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Application Build</h5>
                            <button type="button" class="close" style="color: #0275d8" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('software_controller/updateAppBuild/' . $ab['SOFT_APP_BUILD_ID']); ?>" method="post" enctype="multipart/form-data">

                                <table class="table table-sm" style="margin-bottom: 40px">
                                    <thead class="table-borderless" style="color:grey">
                                        <tr>
                                            <th>Application</th>
                                            <th>Build State</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-bordered shadow-sm">
                                        <tr>
                                            <td>
                                                <input type="hidden" name="SOFT_APP_BUILD_ID" value="<?= $ab['SOFT_APP_BUILD_ID'] ?>">
                                                <select name="APPLICATION_ID" class="form-control form-control-sm" id="appProductSelect" required>
                                                    <option value="<?= $ab['SOFT_APP_BUILD_ID'] ?>"><?= $ab['NAME'] ?> <?= $ab['VERSION'] ?></option>
                                                    <?php foreach ($appProduct as $ap) : ?>
                                                        <option value="<?= $ap['APPLICATION_ID'] ?>"><?= $ap['NAME'] ?> <?= $ap['VERSION'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <td>
                                                <input value="<?= $ab['BUILD_DATE'] ?>" class="form-control form-control-sm" type="date" name="BUILD_DATE" required></input>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <div class="modal-footer">
                            <a href="" data-toggle="modal" data-target="#delete<?= $ab['SOFT_APP_BUILD_ID'] ?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                <small> DELETE</small>
                            </a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <!-- Modal Delete-->
        <?php foreach ($appBuild as $ab) : ?>
            <div class="modal fade" id="delete<?= $ab['SOFT_APP_BUILD_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="<?= base_url(); ?>software_controller/deleteAppBuild/<?= $ab['SOFT_APP_BUILD_ID'] ?>" method="post" enctype="multipart/form-data">
                                <h6>Are you sure to delete <span class="badge badge-warning"><?= $ab['SOFT_APP_BUILD_ID']; ?> | <?= $ab['VERSION']; ?></span>?</h6>
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