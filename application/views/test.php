<!doctype html>

<head>
    <style>
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: .5rem;
            margin-top: 1rem;
        }

        .card {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            border-radius: 2px;
            margin-left: 95px;
        }

        @media only screen and (max-width: 850px) {
            .cards {
                grid-template-columns: 100%;
                grid-gap: 1rem;
            }
        }
    </style>
    <title>SoDevi - Test</title>
</head>
<html lang="en">

<div class="cards row p-4" style="width: 75%;">
    <!-- Test Script -->
    <a class="nav-link" href="<?= base_url('test_controller/testScript') ?>">
        <div class="card col" type="button" style="border-radius: 15px; width:210px; height:210px; border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1); background-color: #f2ac57;">
            <div class="col d-flex justify-content-end">
                <img class="img-profile" src="assets/img/combine.svg" width="80px" alt="">
            </div>
            <div class="col" style="color: white">
                <small>Test</small>
                <h5><b>Test Script</b></h5>
                <small>Test Script Description</small>
            </div>
        </div>
    </a>

    <!-- View Result -->
    <a class="nav-link" href="<?= base_url('test_controller/viewResult') ?>">
        <div class="card col" type="button" style="border-radius: 15px; width:210px; height:210px; border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1); background-color: #ff7171;">
            <div class="col d-flex justify-content-end">
                <img class="img-profile" src="assets/img/combine.svg" width="80px" alt="">
            </div>
            <div class="col" style="color: white">
                <small>Test</small>
                <h5><b>View Result</b></h5>
                <small>View Result Description</small>
            </div>
        </div>
    </a>

    <!-- Test Report -->
    <a class="nav-link" href="<?= base_url('test_controller/testReport') ?>">
        <div class="card col" type="button" style="border-radius: 15px; width:210px; height:210px; border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1); background-color: #14a38b;">
            <div class="col d-flex justify-content-end">
                <img class="img-profile" src="assets/img/combine.svg" width="80px" alt="">
            </div>
            <div class="col" style="color: white">
                <small>Test</small>
                <h5><b>Test Report</b></h5>
                <small>Test Report Description</small>
            </div>
        </div>
    </a>
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