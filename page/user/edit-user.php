<?php

// panggil id
$id = $_GET["id"];

// masukan query dari id yg ingin kita panggil
$user = query("SELECT * FROM tb_user WHERE id_user = $id")[0];


$role = ['Admin', 'Petugas'];
// cek apakah tombol sudah di tekan
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak 
    if (edit($_POST) > 0) {
        echo "
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data user berhasil diedit',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location = '?page=user';
                    }
                })
            </script>";
    } else {
        echo "
            <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data user gagal diedit',
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location = '?page=user';
                    }
                })
            </script>";
    }
}

?>

<!-- Content Column -->
<div class="col-lg mb-4">
    <!-- dashboard -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">
                <input type="hidden" name="gambarLama" value="<?= $user["foto"]; ?>">
                <input type="hidden" name="passwordLama" value="<?= $user["password"]; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nm_depan">Nama Depan</label>
                            <input type="text" class="form-control" id="nm_depan" name="nm_depan" value="<?= $user['nm_depan'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nm_belakang">Nama Belakang</label>
                            <input type="text" class="form-control" id="nm_belakang" name="nm_belakang" value="<?= $user['nm_belakang'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small>*Jika tidak ingin mengubah password boleh dikosongkan</small>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role">
                                <option value="">-- Pilih Role --</option>
                                <?php foreach ($role as $r) : ?>
                                    <?php if ($r == $user['role']) : ?>
                                        <option value="<?= $r ?>" selected><?= $r ?></option>
                                    <?php else : ?>
                                        <option value="<?= $r ?>"><?= $r ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="custom-file">
                                <input type="file" name="gambar" class="form-control" id="preview_gambar">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="ml-4">Preview</label>
                        <div class="form-group" align="center">
                            <img src="assets/img/<?= $user['foto'] ?>" class="img-thumbnail ml-4" width="250" alt="" id="gambar_load">
                        </div>
                    </div>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="flat" name="is_active" <?php if ($user['is_active'] == 1) : ?> checked="checked" value="<?= $user['is_active'] ?>" <?php else : ?> <?php endif; ?> id="check">
                    <label class="form-check-label" for="check">Aktif</label>
                </div>
                <button utton type="submit" name="submit" class="btn btn-primary">Edit</button>
                <a href="?page=user" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>