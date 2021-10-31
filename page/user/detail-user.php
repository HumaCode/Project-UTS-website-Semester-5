<?php

$id = $_GET["id"];

// masukan query dari id yg ingin kita panggil
$user = query("SELECT * FROM tb_user WHERE id_user = $id")[0];


$tanggal = $user['date_created'];
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<!-- Content Column -->
<div class="col-lg">
    <!-- dashboard -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 border-bottom-primary">
            <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">

                    <div class="card">
                        <div class="text-center bg-secondary p-3">
                            <img src="assets/img/<?= $user['foto'] ?>" class="img-fluid" width="270" alt="...">
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="bg-dark">
                                    <tr>
                                        <th colspan="3" class="text-center text-white">Mendaftar pada <?= tgl_indo(date('Y-m-d')) ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="160">Nama</td>
                                        <td width="20">:</td>
                                        <td><?= $user['nm_depan'] . ' ' . $user['nm_belakang'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td><?= $user['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?= $user['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>:</td>
                                        <td><?= $user['role'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Akun</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($user['is_active'] == 1) { ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="?page=user" class="btn btn-block btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>