<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>SoDevi - Login</title>
    <style>
        @media only screen and (max-width: 800px) {
            .card {
                width: 300px;
            }
        }

        @media only screen and (max-width: 300px) {
            .card {
                width: auto;
            }

            .text h2 {
                display: flex;
                justify-content: center;
                /* font-size: 24px; */
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="text mt-5 mb-5">
            <h2 style="text-align:center;">Software Development Information System</h2>
        </div>

        <div class="card mx-auto rounded-3" style="max-width: 300px;border-radius: 25px; box-shadow: 10px 10px #dddddd;">
            <div class="container">
                <div class="mt-4 mb-4">
                    <h2><b>Sign in</b></h2>
                    <h6>Don't have account yet</h6>
                    <a href="<?= base_url() ?>auth_controller/registration">Sign up now</a>
                </div>

                <?= $this->session->flashdata('message'); ?>

                <form method="post" action="<?= base_url('auth_controller/index'); ?>">
                    <div class="form-group mb-3">
                        <label for="">Email</label><br>
                        <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control bg-light border-1 small" id="email">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label><br>
                        <div class="input-group border border-muted rounded">
                            <input type="password" name="password" class="form-control bg-light border-0 small" id="pass_log_id">
                            <div class="input-group-append">
                                <span class="input-group-text bg-light border-0 bi bi-eye-slash-fill field_icon toggle-password" style="cursor:pointer; color:#0275d8; font-size:24px" toggle="#password-field"></span>
                            </div>
                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="mt-4 mb-3">
                        <button type="submit" class="btn btn-lg btn-primary btn-block" name="signin" id="">Sign in</button>
                    </div>
                </form>
            </div>


            <div class="pl-3 mb-4">
                <a href="<?= base_url() ?>auth_controller/resetPassword">Forgot password?</a>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $("body").on('click', '.toggle-password', function() {
            $(this).toggleClass("bi bi-eye-slash-fill bi-eye-fill");
            var input = $("#pass_log_id");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });
    </script>
</body>

</html>