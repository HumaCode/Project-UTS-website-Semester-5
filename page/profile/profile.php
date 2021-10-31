<?php

// ambil session
$tgl            = $_SESSION['date_created'];
$nm_depan       = $_SESSION['nm_depan'];
$nm_belakang    = $_SESSION['nm_belakang'];
$email          = $_SESSION['email'];
$username       = $_SESSION['username'];
$foto           = $_SESSION['foto'];
$rule           = $_SESSION['role'];
$aktif          = $_SESSION['is_active'];


$tanggal = $tgl;
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
            <h6 class="m-0 font-weight-bold text-primary">Halaman Profil <?= $nm_depan ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">

                    <div class="card">
                        <div class="text-center bg-secondary p-3">
                            <img src="assets/img/<?= $foto ?>" class="img-fluid" width="270" alt="...">
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
                                        <td><?= $nm_depan . ' ' . $nm_belakang ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td><?= $username ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?= $email ?></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>:</td>
                                        <td><?= $rule ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Akun</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($aktif == 1) { ?>
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
                            <a href="dashboard.php" class="btn btn-block btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>