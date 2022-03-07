<!doctype html>

<head>

    <title>SoDevi - Notifikasi</title>
    <style>
        .card {
            margin-top: 30px;
            margin-left: 20px;
        }

        @media only screen and (max-width: 480px) {
            .card {
                margin-left: 12px;
                width: 400px;
            }

            .kanan .topbar {
                width: 400px;
            }
        }
    </style>
</head>
<html lang="en">

<div class="card p-4 rounded-1" style="height: auto; border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
    <div class="row p-2 mb-2">
        <div class="col-auto">
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/undraw_rocket.svg') ?>" width="60px" alt="">
        </div>
        <div class="col">
            <a class="" href="">
                <h5 style="color: black;"><b>Group Tester</b></h5>
            </a>
            <h6 style="color: grey"><b>David - Ok Siap</b></h6>
        </div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-auto">
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/undraw_rocket.svg') ?>" width="60px" alt="">
        </div>
        <div class="col">
            <a class="" href="">
                <h5 style="color: black;"><b>Group Tester</b></h5>
            </a>
            <h6 style="color: grey"><b>Sarah - David saya minta tolong di cek lagi ya</b></h6>
        </div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-auto">
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/undraw_rocket.svg') ?>" width="60px" alt="">
        </div>
        <div class="col">
            <a class="" href="">
                <h5 style="color: black;"><b>Group Tester</b></h5>
            </a>
            <h6 style="color: grey"><b>David - Saya sudah terima Report tester aplikasi hotel nya ya</b></h6>
        </div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-auto">
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/undraw_rocket.svg') ?>" width="60px" alt="">
        </div>
        <div class="col">
            <a class="" href="">
                <h5 style="color: black;"><b>Group Tester</b></h5>
            </a>
            <h6 style="color: grey"><b>Alex bergabung di group</b></h6>
        </div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-auto">
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/undraw_rocket.svg') ?>" width="60px" alt="">
        </div>
        <div class="col">
            <a class="" href="">
                <h5 style="color: black;"><b>Group Tester</b></h5>
            </a>
            <h6 style="color: grey"><b>Sarah - David report tester aplikasi hotel sudah saya kirim ya</b></h6>
        </div>
    </div>
    <div class="row p-2 mb-2">
        <div class="col-auto">
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/undraw_profile.svg') ?>" width="60px" alt="">
        </div>
        <div class="col">
            <a class="" href="">
                <h5 style="color: black;"><b>Group Tester</b></h5>
            </a>
            <h6 style="color: grey"><b>Hallo Rida saya sudah kirimkan hasil tester yang kemarin</b></h6>
        </div>
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