<div class="kanan">
    <div class="mt-4 mb-2 ml-3 d-flex justify-content-start">
        <div class="col-auto align-self-center" style="min-width:90px">
            <i class="fas fa-bars fa-3x" id="menu-toggle" style="color: grey;"></i>
        </div>

        <!-- <div class="col-auto align-self-center" style="min-width:90px">
                    <a href=""><i class="fas fa-arrow-left fa-3x" style="color: black;"></i></a> 
                </div> -->

        <div class="col flex-grow-1">
            <div class="row">
                <h1><?= $header ?></h1>
            </div>
            <div class="row mt-2" style="color:lightgray">
                <h6>Welcome back, <?= $user['name']; ?></h6>
            </div>
        </div>
        <!-- 
        <div class="col-md-auto align-self-center">
            <a href=""><i class="fas fa-bell fa-3x fa-secondary align-middle" style="color: lightgray; position:relative;"><span class="badge rounded-circle bg-primary p-2" style="position: absolute; right: 0px; transform:translate(0,-60%); top:20%;"><span class="visually-hidden"></span></span></i></a>
        </div> -->

        <div class="col-md-auto align-self-center">
            <div class="dropdown">
                <a class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-3x fa-secondary align-middle" style="color: lightgray; position:relative;"><span class="badge rounded-circle bg-primary p-2" style="position: absolute; right: 0px; transform:translate(0,-60%); top:20%;"><span class="visually-hidden"></span></span></i>
                </a>
                <div class="dropdown-menu" style="width: 275px; border-radius: 20px; border: 0px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item mt-2" href="#">
                        <div class="row">
                            <div class="col-auto">
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/default.svg') ?>" width="50px" alt="">
                            </div>
                            <div class="align-self-center">
                                <b>Group Tester</b>
                                <h6 class="text-primary" style="font-size:13px;"><b>5 Pesan</b></h6>
                            </div>
                        </div>
                    </a>

                    <a class="dropdown-item" href="#">
                        <div class="row">
                            <div class="col-auto">
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/default.svg') ?>" width="50px" alt="">
                            </div>
                            <div class="align-self-center">
                                <b>Group Tester</b>
                                <h6 class="text-primary" style="font-size:13px;"><b>5 Pesan</b></h6>
                            </div>
                        </div>
                    </a>

                    <a class="dropdown-item" href="#">
                        <div class="row">
                            <div class="col-auto">
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/default.svg') ?>" width="50px" alt="">
                            </div>
                            <div class="align-self-center">
                                <b>Group Tester</b>
                                <h6 class="text-primary" style="font-size:13px;"><b>5 Pesan</b></h6>
                            </div>
                        </div>
                    </a>

                    <a class="dropdown-text text-primary d-flex justify-content-center mt-3" href="<?= base_url('auth_controller/notification') ?>">See all notification</a>
                </div>
            </div>
        </div>

        <div class="col-md-auto d-flex align-self-center">
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="60px" alt="">
        </div>

        <div class="col-md-auto align-self-center">
            <a class="nav-link" style="color: grey" href="<?= $profile ?>">
                <h6><?= $user['name']; ?></h6>
            </a>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->