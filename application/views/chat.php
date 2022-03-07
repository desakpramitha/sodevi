<!doctype html>

<head>
    <style>
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: .3rem;
            margin-top: 1rem;
            margin-left: 12px;
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

        @media only screen and (max-width: 300px) {
            .cards {
                width: 200px;
            }

            .card.card1 {
                width: 210px;
            }
        }
    </style>
    <title>SoDevi - Chat</title>
</head>
<html lang="en">

<div class="cards row" style="height:auto; width: 100%;">

    <div class="card card1 col-auto rounded-1 d-flex justify-content-start " style="max-width:300px; text-align: center;border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1); margin-left: 20px;">
        <form class="d-flex mt-3 mb-5">
            <div class="input-group">
                <button class="btn btn-lg btn-light btn-primary" type="button" id="button-addon1"><i style="color: #0275d8" class="fas fa-search"></i></button>
                <input type="search" class="form-control form-control-lg bg-light" placeholder="Search" style="border: none; width: 210px;" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
        </form>

        <div class="mb-4">
            <div class="row mb-3">
                <div class="col-auto d-flex justify-content-start">
                    <h5><b>Group</b></h5>
                </div>

                <div class="col d-flex justify-content-end">
                    <i class="fas fa-plus align-self-center"></i>
                </div>

            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <img class="img-profile rounded-circle" src="assets/img/undraw_rocket.svg" width="50px" alt="">
                </div>
                <div class="col d-flex justify-content-start">
                    <a class="align-self-center" href="">
                        <h6 style="color: lightgray">Tester<span class="badge rounded-circle bg-primary p-2" style="color:white; position: absolute; left:auto; transform:translate(0,-60%); top:20%;"><span class="visually-hidden">5</span></span></h6>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-auto">
                    <img class="img-profile rounded-circle" src="assets/img/undraw_profile_1.svg" width="50px" alt="">
                </div>
                <div class="col d-flex justify-content-start">
                    <a class="align-self-center" href="">
                        <h6 style="color: lightgray">Developer<span class="badge rounded-circle bg-primary p-2" style="color:white; position: absolute; left:auto; transform:translate(0,-60%); top:20%;"><span class="visually-hidden">3</span></span></h6>
                    </a>
                </div>
            </div>
        </div>

        <div class="">
            <div class="row mb-3">
                <div class="col-auto d-flex justify-content-start">
                    <h5><b>Direct Messages</b></h5>
                </div>

                <div class="col d-flex justify-content-end">
                    <i class="fas fa-plus align-self-center"></i>
                </div>

            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <img class="img-profile rounded-circle" src="assets/img/undraw_profile_3.svg" width="50px" alt="">
                </div>
                <div class="col d-flex justify-content-start">
                    <a class="align-self-center" href="">
                        <h6 style="color: black;"><b>Sarah</b></h6>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-auto">
                    <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg" width="50px" alt="">
                </div>
                <div class="col d-flex justify-content-start">
                    <a class="align-self-center" href="">
                        <h6 style="color: lightgray">Alex<span class="badge rounded-circle bg-primary p-2" style="color:white; position: absolute; left:auto; transform:translate(0,-60%); top:20%;"><span class="visually-hidden">1</span></span></h6>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-auto">
                    <img class="img-profile rounded-circle" src="assets/img/undraw_profile_2.svg" width="50px" alt="">
                </div>
                <div class="col d-flex justify-content-start">
                    <a class="align-self-center" href="">
                        <h6 style="color: lightgray">David</h6>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="card card2 col-auto rounded-1" style="margin: 0px 0px 0px 20px; max-width: 1200px;border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
        <div class="row p-4" style=" max-width: 1200px;border:none; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
            <div class="col-auto">
                <img class="img-profile rounded-circle" src="assets/img/undraw_profile_3.svg" width="50px" alt="">
            </div>

            <div class="col d-flex justify-content-start">
                <a class="align-self-center" href="">
                    <h4 style="color: black; text-align: center"><b>Sarah</b></h4>
                </a>
            </div>

            <div class="col d-flex justify-content-end">
                <i class="align-self-center bi bi-three-dots-vertical" style="font-size:30px; color: gray"></i>
            </div>
        </div>

        <div class="p-3">
            <div class="row d-flex justify-content-center mb-3">
                <h5 class="badge p-2 bg-secondary" style="color: white">Today</h5>
            </div>

            <div class="row mb-2" style="height:280px;">
                <div class="col-auto">
                    <img class="img-profile rounded-circle" src="assets/img/undraw_profile_1.svg" width="50px" alt="">
                </div>

                <div class="col">
                    <label for="" class="bg-light p-3" style="border-radius: 10px 10px; border: none">Hello Sarah<br>Apakah bisa kirimkan tester aplikasi kemarin </label>
                </div>
            </div>

            <div class="row p-2">
                <input type="text" class="form-control form-control-lg bg-light mb-2" style="border: none; border-radius:15px" placeholder="Type here...">
            </div>

            <div class="row d-flex justify-content-start">
                <div class="col-auto align-self-center">
                    <span style="color: lightgray"><i class="fas fa-image fa-2x" style="color: lightgray"></i><b> Image</b></span>
                </div>
                <div class="col">
                    <span style="color: lightgray;"><i class="fas fa-paperclip fa-2x"></i><b> File</b></span>
                </div>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" style="max-width: 150px">SEND</button>
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