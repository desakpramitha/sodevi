<!doctype html>

<head>
    <style>
        .card {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            border-radius: 2px;
            margin-left: 95px;
            margin-top: 50px;
        }

        @media only screen and (max-width: 850px) {
            .card {
                grid-template-columns: 100%;
                grid-gap: 1rem;
            }
        }

        @media only screen and (max-width: 500px) {
            .card {
                grid-template-columns: 100%;
                grid-gap: 1rem;
                margin-left: 15px
            }
        }

        @media only screen and (max-width: 500px) {
            .card {
                grid-template-columns: 100%;
                grid-gap: 1rem;
                margin-left: 15px
            }
        }

        @media only screen and (max-width: 400px) {
            .card {
                grid-template-columns: 100%;
                grid-gap: 1rem;
                margin-left: 15px;
                width: 320px;
            }
        }

        @media only screen and (max-width: 280px) {
            .card {
                grid-template-columns: 100%;
                grid-gap: 1rem;
                margin-left: 15px;
                width: 245px;
            }
        }
    </style>
    <title>SoDevi - Test Report</title>
</head>
<html lang="en">

<div class="content" style="height:auto;">
    <div class="card" style="border-radius:20px; border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
        <div class="p-3 mt-3">
            <h2><b>Search by</b></h2>
            <h6><small>Description</small></h6>
        </div>

        <div class="p-3" style="max-width: 600px">
            <div class="form-group mb-3">
                <label class="form-label" for="">Application</label><br>
                <select name="APPLICATION_ID" class="form-control bg-white shadow-sm" id="APPLICATION_ID" required>
                    <option value="">- Select Application -</option>
                    <?php foreach ($appProduct as $ap) : ?>
                        <option value="<?= $ap['APPLICATION_ID'] ?>"><?= $ap['NAME'] ?> <?= $ap['VERSION'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="colom2 row">
                <div class="col-5 form-group mb-3 mr-5">
                    <label class="form-label" for="">Build date</label><br>
                    <select name="BUILD_DATE" class="form-control bg-white shadow-sm" id="BUILD_DATE" required>
                        <option value="">- Select Build Date -</option>
                    </select>
                </div>

                <div class="col form-group mb-3">
                    <label class="form-label" for="">Tester</label><br>
                    <select class="form-control bg-white shadow-sm" name="PROGRAMMER" id="">
                        <option value="">Select Programmer</option>
                        <?php foreach ($programmer as $pr) : ?>
                            <option value="<?= $pr['EMPLOYEE_ID'] ?>"><?= $pr['FULL_NAME'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="">
                <label class="form-label" for="">Test Date</label><br>
            </div>

            <div class="row">
                <div class="col-5 form-group mb-3">
                    <input type="date" name="testdate" class="form-control bg-white shadow-sm" id="">
                </div>
                <div class="col-auto align-self-center">
                    <h6 class="" style="color: grey">To</h6>
                </div>
                <div class="col-5 form-group mb-3">
                    <input type="date" name="testdate2" class="form-control bg-white shadow-sm " id="">
                </div>
            </div>

            <div class="d-flex justify-content-end mt-5 mb-5">
                <button type="submit" class="btn btn-lg btn-primary" style="font-size:15px; width:150px;" name="save" id="">GET LIST</button>
            </div>

        </div>

    </div>
</div>

</div>

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

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

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