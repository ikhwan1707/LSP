<?php
require_once('../koneksi/koneksi.php');

if (isset($_SESSION['username'])) {
    echo "<script>window.location='" . base_url() . "'</script>";
} else {
?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <title>LSP</title>

        <!-- CSS -->
        <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/css/bootstrap-grid.min.css" rel="stylesheet" />
        <style>
            .info {
                height: 20px;
            }
        </style>
    </head>

    <body>
        <!-- Page Content -->
        <div class="container">
            <div class="info"></div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            Please Login!!
                        </div>
                        <div class="card-body">

                            <?php
                            if (isset($_POST['login'])) {
                                $username = trim(mysqli_escape_string($conn, $_POST['username']));
                                $password = sha1(mysqli_escape_string($conn, $_POST['password']));

                                $query = "SELECT * FROM tb_users WHERE user_name = '$username' AND password = '$password'";
                                $sql_login = mysqli_query($conn, $query) or die(mysqli_error($conn));

                                if (mysqli_num_rows($sql_login) > 0) {
                                    $data = mysqli_fetch_assoc($sql_login);

                                    $_SESSION['name'] = $data['nama_user'];
                                    $_SESSION['username'] = $username;
                                    echo "<script>window.location='" . base_url() . "'</script>";
                                } else { ?>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class='alert alert-danger alert-dismissible fade show' role='alert' id='danger-alert'>
                                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                <strong>Danger!</strong> Username and Password do not match!</div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>

                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- Bootstrap core JavaScript -->
        <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php

}
?>