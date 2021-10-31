<?php

// cek apakah tombol sudah di tekan
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak 
    if (tambah($_POST) > 0) {
        echo "
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data user berhasil ditambahkan',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location = '?page=user';
                    
                        //   Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    //   )
                    }
                })
            </script>";
    } else {
        echo "
            <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data user gagal ditambahkan',
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location = '?page=user&aksi=tambah';
                    
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
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nm_depan">Nama Depan</label>
                            <input type="text" class="form-control" id="nm_depan" name="nm_depan" placeholder="Masukan nama depan">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nm_belakang">Nama Belakang</label>
                            <input type="text" class="form-control" id="nm_belakang" name="nm_belakang" placeholder="Masukan nama belakang">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role">
                                <option value="">-- Pilih Role --</option>
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>
                    </div>
                </div>


                <button utton type="submit" name="submit" class="btn btn-primary">Tambah</button>
                <a href="?page=user" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>