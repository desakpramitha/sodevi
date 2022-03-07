<!doctype html>

<head>
    <style>
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: .2rem;
            margin-top: 1rem;
            margin-left: 10px;
        }

        .card {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            border-radius: 2px;

        }

        /* 
    .cards .card.card1{
        width: 800px;
        margin-right: 50px;
    } */

        @media only screen and (max-width: 2000px) {
            .card.card2 {
                width: auto;
            }

            .cards {
                grid-template-columns: 40% 60%;
                grid-gap: 1rem;
            }
        }

        @media only screen and (max-width: 700px) {
            .cards {
                grid-template-columns: 100%;
                grid-gap: 1rem;
            }

            .card.card2 {
                width: auto;
            }

            .card.card1 {
                width: auto;
            }

            .card.card2 button .btn {
                width: 50px;
            }
        }

        @media only screen and (max-width: 500px) {
            .card.card1 {
                width: 100%;
            }
        }

        @media only screen and (max-width: 300px) {
            .cards {
                width: 200px;
            }

            .card.card1 {
                width: 210px;
            }
        }
    </style>
    <title>SoDevi - Profile</title>
</head>
<html lang="en">

<div class="cards row p-4" style="height:auto; width: 100%;">

    <div class="card card1 col-auto mr-5 rounded-1 d-flex justify-content-start " style="width:300px; text-align: center;border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
        <div class="d-flex justify-content-center mt-3 p-3 mb-3">
            <img class="img-profile rounded-circle d-flex align-items-center" src="<?= base_url('assets/img/profile/') . $user['image'] ?>" width="100px" alt="" style="color: lightgray; position:relative;">
        </div>
        <h5><b>Head Of Production</b></h5>
        <h6 style="color: grey"><?= $user['name'] ?></h6>
    </div>

    <div class="card card2 col-auto rounded-1" style=" width: 500px;border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
        <div class="row mt-3 p-3">
            <div class="col-auto">
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image'] ?>" width="100px" alt="">
                <span style="position: absolute; right: 10px; transform:translate(0,-60%); top:85%; cursor:pointer; color:#0275d8; font-size:30px" toggle="#password-field" class="fas fa-edit field_icon toggle-password"></span></button>
            </div>
            <div class="col d-flex justify-content-end mr-3" style="font-size:28px">
                <h3>Edit profile
            </div>

        </div>

        <div class="p-4 mx-auto" style="width:380px">

            <div class="form-group mb-3">
                <label class="form-label" for="">Departement</label><br>
                <input type="text" name="departement" class=" form-control bg-white shadow-sm" id=""></button>
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="">Full Name</label><br>
                <input type="text" name="fullName" class="form-control bg-white shadow-sm" id="">
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="">Email</label><br>
                <input type="text" name="email" class="form-control bg-white shadow-sm " id="">
            </div>
            <div class="form-group">
                <label for="">Password</label><br>
                <div class="input-group border rounded">
                    <input type="password" name="password" class="form-control bg-white shadow-sm border-0 small" id="pass_log_id">
                    <div class="input-group-append">
                        <span class="input-group-text bg-white shadow-sm border-0 bi bi-eye-slash-fill field_icon toggle-password" style="cursor:pointer; color:#0275d8; font-size:24px" toggle="#password-field"></span>
                    </div>
                </div>
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="mt-4 mb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary" style="font-size:15px; width:150px; height: 50px;" name="save" id="">SAVE</button>
            </div>
        </div>

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