<?php
// $page = isset($page['page']) ? $page : null;

$page = $_GET['page'];
$aksi = $_GET['aksi'];

if ($page == "user") {
    if ($aksi == "") {
        include "page/user/daftar-user.php";
    } else if ($aksi == "tambah") {
        include "page/user/tambah-user.php";
    } else if ($aksi == "edit") {
        include "page/user/edit-user.php";
    } else if ($aksi == "hapus") {
        include "page/user/hapus-user.php";
    } else if ($aksi == "detail") {
        include "page/user/detail-user.php";
    }
} else if ($page == "profile") {
    if ($aksi == "") {
        include "page/profile/profile.php";
    }
} else {
    include "page/home/home.php";
}
// switch ($page) {
//     case "user";
//         require_once("page/user/daftar-user.php");
//         break;
//     default:
//         require_once("page/home/home.php");
//         break;
// }
