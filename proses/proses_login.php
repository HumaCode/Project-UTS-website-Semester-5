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
    session_start();
    include '../koneksi/koneksi.php';


    // echo $_POST['username'] . '<br>';
    // echo $_POST['password'];

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // cek usernamenya, apakah ada di dalam database
    $cek = mysqli_query($con, "select * from tb_user where username='$username'");

    if ($c = mysqli_num_rows($cek)) {
        $row = mysqli_fetch_assoc($cek);

        // samakan password yang diinput user dengan password hash yang berada di database
        if (password_verify($password, $row["password"])) {
            // echo 'password cocok';

            // cek akunya aktif atau tidak
            if ($row['is_active'] == 1) {

                if ($row['role'] == 'Admin') {
                    echo "
                            <script>
                                Swal.fire({
                                    title: 'Berhasil Login',
                                    icon: 'success',
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                }).then((result) => {
                                    document.location = '../dashboard.php';
                                })
                            </script>";

                    // header("location:../dashboard.php");
                } else if ($row['role'] == 'Petugas') {
                    echo "
                            <script>
                                Swal.fire({
                                    title: 'Berhasil Login',
                                    icon: 'success',
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                }).then((result) => {
                                    document.location = '../dashboard.php';
                                })
                            </script>";
                    // header("location:../dashboard.php");
                }

                // buat session
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['nm_depan'] = $row['nm_depan'];
                $_SESSION['nm_belakang'] = $row['nm_belakang'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['foto'] = $row['foto'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['date_created'] = $row['date_created'];
                $_SESSION['is_active'] = $row['is_active'];
            } else {
                // jika username belum diaktivasi
                echo "
                    <script>
                    Swal.fire({
                        title: 'Username belum diaktivasi',
                        text: 'Silahkan tunggu beberapa saat.',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ulangi.!'
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

                return false;
            }
        } else {
            // jika password tidak cocok
            echo "
                <script>
                    Swal.fire({
                        title: 'Password Salah.!',
                        text: 'Masukan ulang password',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ulangi.!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location = '../index.php';
                     
                        }
                    })
                </script>";

            return false;
        }
    } else {
        // jika username tidak cocok dengan yang ada di data base maka tampilkan alert
        echo "
                <script>
                    Swal.fire({
                        title: 'Username tidak terdaftar',
                        text: 'Masukan ulang username',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ulangi.!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location = '../index.php';
                        
                        }
                    })
                </script>";

        return false;
    } ?>



</body>

</html>