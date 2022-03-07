<div class="kanan">
    <div class="mt-4 mb-1 ml-3 d-flex justify-content-start">
        <div class="col-auto align-self-center" style="min-width:90px">
            <i class="fas fa-bars fa-3x" id="menu-toggle" style="color: grey;"></i>
        </div>

        <div class="col-auto align-self-center" style="min-width:90px">
            <a style="cursor:pointer" onclick="goBack()"><i class="fas fa-arrow-left fa-3x" style="color: black;"></i></a>
        </div>

        <div class="col flex-grow-1">
            <div class="row">
                <h1><?= $header ?></h1>
            </div>
            <div class="row mt-2" style="color:lightgray">
                <h6><?= $subheader ?></h6>
            </div>
        </div>

        <div class="col-md-auto align-self-center">
            <a href=""><i class="fas fa-bell fa-3x fa-secondary align-middle" style="color: lightgray; position:relative;"><span class="badge rounded-circle bg-primary p-2" style="position: absolute; right: 0px; transform:translate(0,-60%); top:20%;"><span class="visually-hidden"></span></span></i></a>
        </div>

        <div class="col-md-auto d-flex align-self-center">
            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="60px" alt="">
        </div>

        <div class="col-md-auto align-self-center">
            <a class="" style="color: grey" href="<?= $profile ?>">
                <h6><?= $user['name']; ?></h6>
            </a>
        </div>
    </div>