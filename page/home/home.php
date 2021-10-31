<?php

$rule = $_SESSION['role'];

if ($rule == 'Admin') {
    $r = 'Admin';
} else {
    $r = 'Petugas';
}

$tanggal = $_SESSION['date_created'];
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
<div class="col-lg-8 mb-4">
    <!-- dashboard -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dasboard</h6>
        </div>
        <div class="card-body">
            <p>Selamat datang <?= $_SESSION['nm_depan'] . ' ' . $_SESSION['nm_belakang'] ?>... Kamu login sebagai <?= $r ?></p>

            <?php if ($_SESSION['role'] == 'Petugas') : ?>
                <p>Jika user akses kamu sebagai petugas, maka tidak bisa mengakses halaman daftar user.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($_SESSION['role'] == 'Admin') : ?>
        <!-- chart -->
        <canvas id="myChart"></canvas>
        <?php
        // Koneksikan ke database
        // $kon = mysqli_connect("localhost", "root", "", "akademik");
        //Inisialisasi nilai variabel awal
        $role = "";
        $jumlah = null;
        //Query SQL
        $sql = "select role,COUNT(*) as 'total' from tb_user GROUP by role";
        $hasil = mysqli_query($con, $sql);

        while ($data = mysqli_fetch_array($hasil)) {
            //Mengambil nilai jurusan dari database
            $r = $data['role'];
            $role .= "'$r'" . ", ";
            //Mengambil nilai total dari database
            $jum = $data['total'];
            $jumlah .= "$jum" . ", ";
        }
        ?>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'pie',
                // The data for our dataset
                data: {
                    labels: [<?php echo $role; ?>],
                    datasets: [{
                        label: 'Data User Terdaftar ',
                        backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                        borderColor: ['rgb(255, 99, 132)'],
                        data: [<?php echo $jumlah; ?>]
                    }]
                },

                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    <?php endif; ?>
</div>

<div class="col-lg-4 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Deskripsi User</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
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
                            <td><?= $_SESSION['nm_depan'] . ' ' . $_SESSION['nm_belakang'] ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?= $_SESSION['username'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $_SESSION['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>:</td>
                            <td><?= $_SESSION['role'] ?></td>
                        </tr>
                        <tr>
                            <td>Status Akun</td>
                            <td>:</td>
                            <td>
                                <?php if ($_SESSION['is_active'] == 1) { ?>
                                    <span class="badge badge-success">Aktif</span>
                                <?php } else { ?>
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>