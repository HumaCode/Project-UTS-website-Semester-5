<?php
include '../koneksi/koneksi.php';

// echo $_POST['username'] . '<br>';
// echo $_POST['password'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    // ambil datanya
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // cek dulu apakah ada user yng usernamenya sama dengan inputan
    // cek usernamenya, apakah ada di dalam database
    $cek = mysqli_query($con, "select * from tb_user where username='$username'");

    // jika username sama maka boleh mengganti password
    if (mysqli_num_rows($cek)) {
        $row = mysqli_fetch_assoc($cek);
        $id_user = $row['id_user'];
        // jika sama maka update passwordnya
        $sql = "UPDATE tb_user SET 
                password = '$password' 
                
           WHERE id_user='$id_user'";

        mysqli_query($con, $sql);


        echo "
                <script>
                    Swal.fire({
                        title: 'Berhasi',
                        text: 'Password berhasil direset',
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location = '../index.php';
                        }
                    })
                </script>";
    } else {
        // jika username tidak cocok dengan yang ada di data base maka tampilkan alert
        echo "
        <script>
            Swal.fire({
                title: 'Uppss,,',
                text: 'Password gagal direset',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location = '../lupa_password.php';
                }
            })
        </script>";


        return false;
    }
    ?>
</body>

</html>