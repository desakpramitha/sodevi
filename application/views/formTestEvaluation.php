<!doctype html>

<head>
    <style>
        .content {
            padding: 1rem;
            border-radius: 2px;
            /* margin-left: 100px; */
            margin-left: 15px;
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
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>
<html lang="en">

<div class="content" style="height:auto;">
    <div class="description-product mb-4">
        <table width=100%>
            <tr>
                <td width=10%>
                    <h6><b>Project</b></h6>
                </td>
                <td>
                    <h6><b>:</b></h6>
                </td>
                <td>
                    <h6>

                        Sistem SODEVi version 1
                        <!-- <= $product[0]['NAME'] ?> -->

                    </h6>
                </td>

                <td width=10%>
                    <h6><b>Build Date</b></h6>
                </td>
                <td>
                    <h6><b>:</b></h6>
                </td>
                <td>
                    <h6>
                        10 March 2021
                    </h6>
                </td>

                <td width=15%>
                    <h6><b>Browser</b></h6>
                </td>
                <td>
                    <h6><b>:</b></h6>
                </td>
                <td>
                    <h6>
                        Chrome 89.0.4389.82
                        <!-- <= $product[0]['NAME'] ?> -->
                    </h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6><b>Tester</b></h6>
                </td>
                <td>
                    <h6><b>:</b></h6>
                </td>
                <td>
                    <h6>
                        Rida
                        <!-- <= $product[0]['ABBREVIATION'] ?> -->
                    </h6>
                </td>

                <td>
                    <h6><b>Server OS</b></h6>
                </td>
                <td>
                    <h6><b>:</b></h6>
                </td>
                <td>
                    <h6>
                        Windows XP
                        <!-- <= $product[0]['ABBREVIATION'] ?> -->
                    </h6>
                </td>

                <td>
                    <h6><b>Workstation OS</b></h6>
                </td>
                <td>
                    <h6><b>:</b></h6>
                </td>
                <td>
                    <h6>
                        Kali Linux
                        <!-- <= $product[0]['ABBREVIATION'] ?> -->
                    </h6>
                </td>
            </tr>
        </table>
    </div>
    <hr>

    <div class="mb-3">

        <table width="50%">
            <tr>
                <td width="10%"><label class="form-label" for=""><b>Module</b></label><br></td>
                <td width="30%">
                    <select name="APPLICATION_ID" class="form-control form-control-sm" id="appProductSelect" value="<?= $ap['APPLICATION_ID'] ?>">
                        <option value="">- CHOOSE MODULE -</option>
                        <?php foreach ($appProduct as $ap) : ?>
                            <option value="<?= $ap['APPLICATION_ID'] ?>"><?= $ap['NAME'] ?> <?= $ap['VERSION'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        </table>

        <?php if (empty($testscript)) : ?>
            <tr>
                <td colspan="6">
                    <div class="alert alert-danger" role="alert">
                        No Test Script Available !
                    </div>
                </td>
            </tr>
        <?php else : ?>
        <?php endif; ?>

        <table class="table table-sm" style="margin-bottom: 40px">
            <thead class="table-borderless text-muted">
                <tr class="text-center">
                    <th>No</th>
                    <th>Test Item</th>
                    <th>Test Scenario</th>
                    <th>Test Input</th>
                    <th>Test Result</th>
                    <th>Issue</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody class="table-bordered shadow-sm">
                <?php $no = 1; ?>
                <!-- <php foreach ($testscript as $ts) : ?> -->
                <tr>
                    <td><?php $no++ ?></td>
                    <td>
                        <div class="form-group">
                            <label class="form-label" for="">TEST DATE</label><br>
                            <input type="date" name="TEST_DATE" class=" form-control bg-white shadow-sm" id="" autocomplete="off" required></button>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">PROGRAMMER</label><br>
                            <select class="form-control" name="PROGRAMMER" id="">
                                <option value="">Select Programmer</option>
                                <?php foreach ($programmer as $pr) : ?>
                                    <option value="<?= $pr['EMPLOYEE_ID'] ?>"><?= $pr['FULL_NAME'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">SEVERITY</label><br>
                            <select class="form-control" name="SEVERITY" id="">
                                <option value="">Select Severity</option>
                                <option name="SEVERITY" value="OK">OK</option>
                                <option name="SEVERITY" value="System">System</option>
                                <option name="SEVERITY" value="Major">Major</option>
                                <option name="SEVERITY" value="Medium">Medium</option>
                                <option name="SEVERITY" value="Minor">Minor</option>
                                <option name="SEVERITY" value="Request">Request</option>
                                <option name="SEVERITY" value="Priority">Priority</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">FIXED DATE</label><br>
                            <input type="date" name="FIXED_DATE" class="form-control bg-white shadow-sm" id="" autocomplete="off" required>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" name="OK" for="defaultCheck1">
                                    OK
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">TEST ITEM</label><br>
                            <select class="form-control" name="TEST_ITEM" id="">
                                <option value="">Select Test</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">TEST CASE</label><br>
                            <select class="form-control" name="TEST_CASE" id="">
                                <option value="">Select Test Case</option>

                            </select>
                        </div>

                        <a class="nav-link" href=""><i class="fas fa-plus"></i> ADD NEW TEST CASES</a>
                    </td>
                    <td>
                        <textarea name="TEST_SCENARIO" id="TEST_SCENARIO"></textarea>
                        <script>
                            CKEDITOR.replace('TEST_SCENARIO', {
                                filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                height: '400px'
                            });
                        </script>
                    </td>
                    <td>
                        <textarea name="TEST_INPUT" id="TEST_INPUT"></textarea>
                        <script>
                            CKEDITOR.replace('TEST_INPUT', {
                                filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                height: '400px'
                            });
                        </script>
                    </td>
                    <td>
                        <textarea name="TEST_RESULT" id="TEST_RESULT"></textarea>
                        <script>
                            CKEDITOR.replace('TEST_RESULT', {
                                filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                height: '400px'
                            });
                        </script>
                    </td>
                    <td>
                        <textarea name="ISSUE" id="ISSUE"></textarea>
                        <script>
                            CKEDITOR.replace('ISSUE', {
                                filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
                                height: '400px'
                            });
                        </script>
                    </td>
                    <td>
                        <a href="">update</a>
                        <a href="">delete</a>
                    </td>
                </tr>
                <!-- <php endforeach; ?> -->
            </tbody>
        </table>
        <h6>No test script available</h6>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" data-toggle="modal" data-target="#addTestScript" class="btn btn-primary mt-4" style="width:250px; border-radius: 15px;"><i class="fa fa-plus"></i> Add New Test Script</i></button>
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