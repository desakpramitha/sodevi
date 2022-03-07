<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/simple-sidebar.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <style>
        @media screen and (min-width: 500px) {
            .kanan {
                margin-left: 0px;
                width: 100%;
                margin-right: 20px;
            }
        }

        nav {
            height: 100%;
            /* background-color: #fafafa; */
            outline: none;

        }

        .navigation button {
            /* margin: .5em;
            padding: .7em 1.5em;
            font-family: sans-serif;
            font-size: 1.3em;
            font-weight: bold; */
            color: grey;
            background-color: #fff;
            border: 2px solid rgba(112, 11, 211, 0);
            outline: none;
            cursor: pointer;
            transition: .3s;
        }

        h6:focus,
        h6:active {
            color: #adb5bd;
        }

        .sidebar button:focus,
        .sidebar button:active,
        .sidebar button:hover {
            background-color: #ffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            animation: anima-shadow 1s forwards;

        }

        @keyframes anima-shadow {
            100% {
                color: #0275d8;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }
        }

        p {
            font-size: 10pt;
        }

        .warna:focus,
        .warna:active {
            color: #4c4f4d;
        }

        .navigation {
            position: fixed;
            width: 100px;
            height: 100%;
            background: white;

        }
    </style>

</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white shadow" style="width :141px;" id="sidebar-wrapper">
            <div class="sidebar list-group list-group-flush d-flex" style="border: none;width :141px;">
                <a class="" href="<?= base_url('dashboard_controller/index') ?>">
                    <button type="button" toggle="#aktif" class="btn btn-lg btn-block rounded-1 mb-4 aktif" style="color: lightgray; width:120px;  margin-top : 10px;  margin-left : 10px;"><i class="fas fa-2x fa-tachometer-alt align-middle mb-3"></i><br>
                        <h6><b>Dashboard</b></h6>
                    </button>
                </a>

                <a class="" href="<?= base_url('software_controller/index') ?>">
                    <button type="button" toggle="#aktif" class="btn btn-lg btn-block rounded-1 mb-4 aktif" style="color: lightgray; width:120px;  margin-top : 10px;  margin-left : 10px;"><i class="fas fa-2x fa-desktop align-middle mb-3"></i><br>
                        <h6><b>Software</b></h6>
                    </button>
                </a>

                <?= anchor(
                    'test_controller',
                    '<button type="button" class="btn btn-lg btn-block rounded-1 mb-4" style="color: lightgray; width:120px; margin-left : 10px;"><i class="fas fa-2x fa-code align-middle mb-3 "></i><br>
                    <h6><b>Test</b></h6></button>'
                ) ?>

                <?= anchor(
                    'chat_controller',
                    '<button type="button" class="btn btn-lg btn-block rounded-1 mb-5" style="color: lightgray; width:120px; margin-left : 10px;"><i class="fas fa-2x fa-comment align-middle mb-3"></i><br>
                    <h6><b>Chat</b></h6></button>'
                ) ?>

                <button type="button" data-toggle="modal" data-target="#logout" class="btn btn-lg btn-block rounded-1 mb-3" style="color: lightgray; width:120px; margin-left : 10px;"><i class="fas fa-2x fa-sign-out-alt align-middle mb-3"></i><br>
                    <h6><b>Log out</b></h6>
                </button>

            </div>

            <!-- Modal Logout-->
            <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logout">Konfirmasi Logout</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'auth_controller/logout'; ?>" method="post" enctype="multipart/form-data">
                                <p>Do you want to log out ?</p>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>