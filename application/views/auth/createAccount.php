<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>SoDevi - Create Account</title>
    <style>
        .card {
            width: 400px;
        }

        @media only screen and (max-width: 800px) {
            .card {
                width: 400px;
            }
        }

        @media only screen and (max-width: 300px) {
            .card {
                width: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container" style="width: 100%; margin: auto">
        <div class="mt-5 mb-5">
            <h2 style="text-align:center;">Software Development Information System</h2>
        </div>

        <div class="card mx-auto rounded-3 mb-5" style="border-radius: 25px;box-shadow: 10px 10px #dddddd;">
            <div class="container">
                <div class="mt-5 mb-4">
                    <h2><b>Create an account</b></h2>
                    <h6>Already have an account?</h6>
                    <a href="<?= base_url() ?>auth_controller/index">Sign in</a>
                </div>

                <form action="<?= base_url('auth_controller/registration'); ?>" method="post">
                    <!-- Full Name -->
                    <div class="form-group mb-3">
                        <label for="">Full Name</label><br>
                        <input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control bg-light border-1 small" id="">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="">Email</label><br>
                        <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control bg-light border-1 small" id="">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <!-- Password -->
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

                    <div class="mb-5">
                        <input type="checkbox" name="checkbox" onclick="myFunctionChecked()" id=""> By signing up, I agree to the term.
                    </div>

                    <div class="mb-5">
                        <button type="submit" class="btn btn-lg btn-primary btn-block" name="signup" id="btnSignUp" disabled="disable">Sign up</button>
                        <!-- <button type="submit" class="btn btn-lg btn-primary btn-block" name="signup" id="">Sign up</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function myFunctionChecked() {
            var x = document.getElementById("btnSignUp");
            if (x.disabled === true) {
                x.disabled = false;
            } else {
                x.disabled = true;
            }
        }
    </script>

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