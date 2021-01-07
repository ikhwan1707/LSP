<?php
error_reporting(0);
include '../koneksi/koneksi.php';
$mode = $_REQUEST['mode'] ? $_REQUEST['mode'] : "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['simpan'])) {

        $first_name     = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name      = mysqli_real_escape_string($conn, $_POST['last_name']);
        $gender         = mysqli_real_escape_string($conn, $_POST['gender']);
        $email          = mysqli_real_escape_string($conn, $_POST['email']);
        $course         = mysqli_real_escape_string($conn, $_POST['alamat']);
        $agama          = mysqli_real_escape_string($conn, $_POST['agama']);
        $d_hobi         = $_POST['hobi'];
        $hobi           = implode(',', $d_hobi);
        $id             = mysqli_real_escape_string($conn, $_POST['id']);

        $data = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id = $id");
        if (mysqli_num_rows($data) < 1) {
            $sql = "INSERT INTO tb_siswa (first_name,last_name,gender,email,course,agama, hobi) 
            VALUES('$first_name','$last_name','$gender','$email','$course','$agama','$hobi')";
        } else {
            $sql = "UPDATE tb_siswa SET 
            first_name='$first_name', 
            last_name='$last_name', 
            gender='$gender', 
            email ='$email', 
            course='$course', 
            agama='$agama', 
            hobi='$hobi' WHERE id='$id'";
        }

        if (mysqli_query($conn, $sql)) {
            $_SESSION['Notification']      = "Success";
            echo "<script>window.location='" . base_url('students') . "'</script>";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}

if ($mode == 'hapus') {
    if (!empty($_REQUEST['id'])) {
        $delete = mysqli_query($conn, "DELETE from tb_siswa WHERE id='{$_REQUEST['id']}'");

        if ($delete) {
            $_SESSION['Notification']      = "SuccessDelete";
            echo "<script>window.location='" . base_url('students') . "'</script>";
        }
    }
}
