<?php
// koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$db = "db_uts";

$con = mysqli_connect($host, $user, $password, $db);

// tes koneksi
// if ($con) {
//     echo "Terhubung";
// } else {
//     echo "Database tidak ditemukan";
// }


function query($query)
{
    global $con;
    $result = mysqli_query($con, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return  $rows;
}

function tambah($data)
{
    // ambil data dari tiap elemen dalam form
    global $con;

    $nm_depan = htmlspecialchars($data['nm_depan']);
    $nm_belakang = htmlspecialchars($data['nm_belakang']);
    $username = htmlspecialchars($data['username']);
    $email = htmlspecialchars($data['email']);
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $role = htmlspecialchars($data['role']);
    $foto = 'default.svg';
    $date_created = time();
    $is_active = 1;


    // query insert data
    $query = "INSERT INTO tb_user VALUES ('','$nm_depan','$nm_belakang','$username','$email','$password','$foto', '$role','$date_created', '$is_active')";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

// fungsi hapus.
function hapus($id)
{
    global $con;
    mysqli_query($con, "DELETE FROM tb_user WHERE id_user = $id ");
    return mysqli_affected_rows($con);
}

function upload()
{

    $namaFile       = $_FILES['gambar']['name'];
    $ukuranFile     = $_FILES['gambar']['size'];
    $error          = $_FILES['gambar']['error'];
    $tmpFile        = $_FILES['gambar']['tmp_name'];


    // cek apakah yang di uplode itu adalah gambar
    $ekstensiGambarValid        = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar             = explode('.', $namaFile);
    $ekstensiGambar             = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

        echo "<script>
				alert('yang anda UPLOAD bukan Gambar!');
			</script>";

        return false;
    }

    // kita batasi ukuran gambar menjadi 1.5 MB / 1500000 byte
    if ($ukuranFile > 1500000) {

        echo "<script>
					alert('Gambar yang anda upload melebihi batas!');
				</script>";

        return false;
    }

    // Jika lolos pengecekan gambar siap di upload
    // generate nama baru/random -> fungsinya ketika user memiliki foto berbeda namun namanya sama dengan user lain maka foto user lain tidak akan berubah.
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;



    move_uploaded_file($tmpFile, 'assets/img/' . $namaFileBaru);

    return $namaFileBaru;
}

// fungsi edit
function edit($data)
{
    global $con;

    $id             = $data["id_user"];
    $nm_depan       = htmlspecialchars($data['nm_depan']);
    $nm_belakang    = htmlspecialchars($data['nm_belakang']);
    $username       = htmlspecialchars($data['username']);
    $email          = htmlspecialchars($data['email']);
    $role           = htmlspecialchars($data['role']);
    $is_active      = htmlspecialchars($data['is_active']);



    $gambarLama     = htmlspecialchars($data["gambarLama"]);
    $passwordLama   = htmlspecialchars($data["passwordLama"]);

    // cek apakah user mengubah gambar atau tidak
    if ($_FILES["gambar"]["error"] === 4) {
        $gb = $gambarLama;
    } else {
        $gb     = upload();
    }

    // cek apakah user mengubah password
    if ($_POST['password'] === '') {
        $password = $passwordLama;
    } else {
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
    }

    // cek is_active nya
    if ($is_active == null) {
        $aktif = 0;
    } else {
        $aktif = 1;
    }

    // query insert data
    $query = "UPDATE tb_user SET
            nm_depan	= '$nm_depan',
            nm_belakang	= '$nm_belakang',
            username 	= '$username',
            email 	    = '$email',
            password 	= '$password',
            foto        = '$gb',
            role	    = '$role',
            is_active 	= '$aktif'

            WHERE id_user = $id";



    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}
