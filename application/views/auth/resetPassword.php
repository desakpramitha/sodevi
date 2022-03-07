<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        .header h2 {
            text-align: center;
        }

        @media only screen and (max-width: 800px) {
            .card {
                width: 400px;
            }
        }

        @media only screen and (max-width: 500px) {
            .card {
                width: 330px;
            }
        }

        @media only screen and (max-width: 400px) {
            .card {
                width: 280px;
            }
        }

        @media only screen and (max-width: 300px) {
            .card {
                width: 250px;
            }
        }
    </style>
    <title>SoDevi - Reset Password</title>
</head>

<body>
    <div class="container" style="align-items:center;">
        <div class="header mt-5 mb-5" style=" width: 100%; margin: auto">
            <h2>Software Development Information System</h2>
        </div>

        <div class="card mx-auto rounded-3" style="max-width: 400px;border-radius: 25px;box-shadow: 10px 10px #dddddd;">
            <div class="container">
                <div class="mt-5 mb-4">
                    <h2><b>Reset Password</b></h2>
                    <h6>Enter your email for a password reset link</h6>
                    <a href="">Forgot email?</a>
                </div>

                <form action="<?= base_url('auth_controller/resetPassword') ?>" method="post">
                    <div class="form-group mb-3">
                        <label for="">Email</label><br>
                        <input type="email" name="email" class="form-control bg-light border-1 small" id="">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="mt-4 mb-3">
                        <button type="submit" class="btn btn-lg btn-primary btn-block" name="sendlink" id="">Send Reset Link</button>
                    </div>
                </form>

                <div class="mb-5">
                    <a href="<?= base_url() ?>auth_controller/index">Back to Sign in</a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>