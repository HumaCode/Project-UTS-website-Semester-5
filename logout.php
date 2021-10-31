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

    session_start();
    session_destroy();

    echo "
    <script>
            Swal.fire({
                title: 'Berhasil logout',
                text: 'Terimakasih sudah berkunjung',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            }).then((result) => {
                document.location = 'index.php';
            })
    </script>";
    ?>

</body>

</html>