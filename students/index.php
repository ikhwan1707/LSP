<?php include('../template/_header.php') ?>
<?php include('../template/_navbar.php') ?>
<!-- Page Content -->
<div class="container">
    <?php
    if (isset($_SESSION['Notification'])) {
        if ($_SESSION['Notification'] == 'Success') {
            echo "<div class='alert alert-info alert-dismissible fade show' role='alert' id='info-alert' style='width: 50%;
                        float: right;
                        margin-right: 20px;'>
                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                <strong>Success!</strong> Data berhasil di simpan!</div>";
        } elseif ($_SESSION['Notification'] == 'SuccessDelete') {
            echo "<div class='alert alert-info alert-dismissible fade show' role='alert' id='info-alert' style='width: 50%;
        float: right;
        margin-right: 20px;'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Success!</strong> Data berhasil di hapus!</div>";
        }
    }
    unset($_SESSION['Notification']);
    ?>
    <div class="info"></div>
    <a href="<?= base_url('students/form.php') ?>" class="btn btn-primary  active" role="button">Tambah Data</a>
    <div class="info"></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>Jenis kelamin</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Hobi</th>
                <th class='text-center'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $datasiswa = mysqli_query($conn, "SELECT * FROM tb_siswa") or die(mysqli_errno($conn));
            if (mysqli_num_rows($datasiswa) > 0) {
                while ($data = mysqli_fetch_array($datasiswa)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['first_name'] . ' ' . $data['last_name'] ?></td>
                        <td><?= $data['gender'] == 'L' ? "Laki-laki" : "Perempuan" ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['course'] ?></td>
                        <td><?= $data['agama'] ?></td>
                        <td><?= $data['hobi'] ?></td>
                        <td>
                            <a href=<?= base_url('students/form.php?id=' . $data['id']) . '' ?> class='btn btn-info  active' role='button'>Ubah</a>
                            <a href=<?= base_url('students/proses.php?mode=hapus&id=' . $data['id']) . '' ?> class='btn btn-danger  active' role='button' onclick="return confirm('Yakin Data Ingin Dihapus?')">Hapus</a>
                        </td>
                    </tr>
            <?php  }
            } else {
                echo "<tr>
                    <td colspan=\"6\" align=\"center\">Data Tidak Tersedia</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include('../template/_footer.php') ?>