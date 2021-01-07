<?php
require_once('../koneksi/koneksi.php');

if (!isset($_SESSION['username'])) {
    echo "<script>window.location='" . base_url('auth/login.php') . "'</script>";
}
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
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap-grid.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        .info {
            height: 20px;
        }
    </style>
</head>

<body>