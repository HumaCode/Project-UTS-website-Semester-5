<?php

// menampilkan data user
$user = query("SELECT * FROM tb_user ORDER BY id_user DESC");
?>

<!-- Content Column -->
<div class="col-lg mb-4">
    <!-- dashboard -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="?page=user&aksi=tambah" class="float-right btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah User</a>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <thead class="bg-dark text-white text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Status Akun</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        foreach ($user as $u) : ?>

                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $u['nm_depan'] . ' ' . $u['nm_belakang'] ?></td>
                                <td><?= $u['username'] ?></td>
                                <td><?= $u['email'] ?></td>
                                <td class="text-center">
                                    <img width="70" src="assets/img/<?= $u['foto'] ?>" alt="">

                                </td>
                                <td class="text-center ">
                                    <?php if ($u['is_active'] == 1) : ?>
                                        <span class="badge badge-success">Aktif</span>
                                    <?php else : ?>
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    <?php endif;  ?>
                                </td>
                                <td class="text-center ">
                                    <?php if ($u['role'] == 'Admin') : ?>
                                        <span class=" text-success"><?= $u['role'] ?></span>
                                    <?php else : ?>
                                        <span class=" text-danger"><?= $u['role'] ?></span>
                                    <?php endif;  ?>
                                </td>
                                <td class="text-center">
                                    <a href="?page=user&aksi=detail&id=<?= $u['id_user'] ?>" class="btn btn-sm btn-secondary mb-2" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fas fa-eye"></i></a>
                                    <a href="?page=user&aksi=edit&id=<?= $u['id_user'] ?>" class="btn btn-sm btn-success mb-2" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-pen-square"></i></a>
                                    <a href="?page=user&aksi=hapus&id=<?= $u['id_user'] ?>" class="btn btn-sm btn-danger hapus mb-2" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>

                        <?php $i++;
                        endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    $('.hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin..?',
            text: "Data yang sudah dihapus tidak bisa di kembalikan lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>