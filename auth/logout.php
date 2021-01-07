<?php
require_once('../koneksi/koneksi.php');

session_destroy();
echo "<script>window.location='" . base_url('auth/login.php') . "'</script>";
