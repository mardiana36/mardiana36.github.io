<?php
require "functionphp.php";
session_start();
$kode = $_GET["kode"];
$dataBase = $_SESSION['database'];
$namaFile = "";
if ($dataBase == "anggota"){
$namaFile = "dataAnggota.php";
} else if ($dataBase == "buku"){
    $namaFile = "dataBuku.php";
}else if ($dataBase == "pinjamkem"){
    $namaFile = "pinjamDanKembalikan.php";
}
if( hapus($kode,$dataBase) > 0){
    echo "
        <script>
        alert('Data berhasil di hapus!');
        document.location.href = '$namaFile';
        </script>
    ";
}else{
    echo "
        <script>
        alert('Data gagal di hapus!');
        document.location.href = '$namaFile';
        </script>
    ";
}
?>