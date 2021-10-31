<?php
session_start();

$id = $_GET["id"];


if ($_SESSION) { ?>

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
        if (hapus($id) > 0) {
            echo "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data user berhasil dihapus',
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
                        text: 'Data user gagal dihapus',
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
        ?>


    </body>

    </html>

<?php } else { ?>

<?php } ?>