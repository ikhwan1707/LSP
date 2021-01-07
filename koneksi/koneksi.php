<?php
//setting  default timezone
date_default_timezone_set('Asia/Jakarta');
session_start();

//koneksi
$conn = mysqli_connect("localhost", "root", "", "students") or die('MySQL Connection Error:' . mysqli_connect_error());

//fungsi base url
function base_url($path = '')
{
    $base_url = 'http://localhost/LSP/';

    if (!empty($path)) {
        $base_url .= $path;
    }
    return $base_url;
}
