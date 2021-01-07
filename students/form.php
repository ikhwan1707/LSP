<?php include('../template/_header.php') ?>
<?php include('../template/_navbar.php') ?>
<!-- Page Content -->
<div class="container">
    <div class="info"></div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    Tambah Data
                </div>
                <div class="card-body">
                    <?php
                    $id     = empty($_GET['id']) ? '0' : $_GET['id'];
                    $data   = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id='$id'");
                    $d      = mysqli_fetch_array($data);
                    $hobi   = explode(',', $d['hobi']);
                    ?>

                    <form method="POST" action="<?= base_url("students/proses.php") ?>">
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo empty($_GET['id']) ? '0' : $_GET['id'] ?> " hidden>
                        <div class="form-group">
                            <label>Nama Depan</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?= empty($d['first_name']) ? "" : $d['first_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Belakang</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= empty($d['last_name']) ? "" : $d['last_name'] ?>">
                        </div>
                        <div class=" form-group">
                            <label>Jenis Kelamin</label>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="L" <?= (!empty($d['gender']) && $d['gender'] == 'L') ? "checked" : "" ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="P" <?= (!empty($d['gender']) && $d['gender'] == 'P') ? "checked" : "" ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= empty($d['email']) ? "" : $d['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" id="agama" name="agama">
                                <option>-- Pilih --</option>
                                <option value="Islam" <?= (!empty($d['agama']) && $d['agama'] == 'Islam') ? "selected" : "" ?>>Islam</option>
                                <option value="Hindu" <?= (!empty($d['agama']) && $d['agama'] == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                                <option value="Budha" <?= (!empty($d['agama']) && $d['agama'] == 'Budha') ? "selected" : "" ?>>Budha</option>
                                <option value="Katholik" <?= (!empty($d['agama']) && $d['agama'] == 'Katholik') ? "selected" : "" ?>>Katholik</option>
                                <option value="Kristen" <?= (!empty($d['agama']) && $d['agama'] == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hobi</label>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hobi" name="hobi[]" value="membaca" <?= (!empty($d['hobi']) && in_array('membaca', $hobi)) ? "checked" : "" ?>>
                                        <label class="form-check-label" for="gridCheck1">
                                            Membaca
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hobi" name="hobi[]" value="futsal" <?= (!empty($d['hobi']) && in_array('futsal', $hobi)) ? "checked" : "" ?>>
                                        <label class="form-check-label" for="gridCheck1">
                                            Futsal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hobi" name="hobi[]" value="makan" <?= (!empty($d['hobi']) && in_array('makan', $hobi)) ? "checked" : "" ?>>
                                        <label class="form-check-label" for="gridCheck1">
                                            Makan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= empty($d['course']) ? "" : $d['course'] ?></textarea>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" onclick=self.history.back()>Batal</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<?php include('../template/_footer.php') ?>