<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

    <?php
    include '../koneksi/koneksi.php';

    // ambil datanya
    $nm_depan = htmlspecialchars($_POST['nm_depan']);
    $nm_belakang = htmlspecialchars($_POST['nm_belakang']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password1 = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);


    // cek apakah email sudah terdaftar atau belum
    $result = mysqli_query($con, "SELECT email FROM tb_user WHERE email = '$email'");

    // cek apakah username sudah digunakan oleh user lain atau belum
    $result2 = mysqli_query($con, "SELECT username FROM tb_user WHERE username = '$username'");

    // jika sudah ada maka tampilkan alert
    if (mysqli_fetch_assoc($result)) {
        echo "
                <script>
                    Swal.fire({
                        title: 'Email sudah terdaftar',
                        text: 'Masukan ulang email',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ulangi.!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location = '../register.php';
                        }
                    })
                </script>";

        return false;
    }

    // jika sudah ada maka tampilkan alert
    if (mysqli_fetch_assoc($result2)) {
        echo "
        <script>
                    Swal.fire({
                        title: 'Username sudah digunakan oleh user lain',
                        text: 'Masukan ulang username',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ulangi.!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location = '../register.php';
                        
                            //   Swal.fire(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        //   )
                        }
                    })
                </script>";

        return false;
    }

    // cek konfirmasi password apakah password1 sama dengan password2
    if ($password1 !== $password2) {
        echo  "
            <script>
                    Swal.fire({
                        title: 'Password tidak cocok',
                        text: 'Masukan ulang password',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ulangi.!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location = '../register.php';
                        
                            //   Swal.fire(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        //   )
                        }
                    })
                </script>";

        return false;
    } else {
        // jika cocok maka

        $pass = password_hash($password1, PASSWORD_DEFAULT);
        $foto = 'default.svg';
        $role = 'Petugas';
        $date = time();
        $is_active = 1;

        mysqli_query($con, "INSERT INTO `tb_user` (`id_user`, `nm_depan`, `nm_belakang`, `username`, `email`, `password`, `foto`, `role`, `date_created`, `is_active`) VALUES (NULL, '$nm_depan', '$nm_belakang', '$username', '$email', '$pass', '$foto', '$role', '$date', '$is_active');");

        echo "
        <script>
                    Swal.fire({
                        title: 'Selamat akun berhasil dibuat',
                        text: 'Silahkan login.',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location = '../index.php';
                        
                            //   Swal.fire(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        //   )
                        }
                    })
                </script>";
    }
    ?>



</body>

</html>