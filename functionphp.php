<?php
require 'koneksi.php';

function cekLogin() {
    session_start();
    if (isset($_SESSION['email'])) {
        return true;
    } else {
        echo "<script>
            alert('Halaman ini hanya bisa diakses oleh Admin. Silahkan login!');
            window.location.href = 'home.php';
        </script>";
        exit;
    }
}
function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    $tampung = [];
    while($tampungData = mysqli_fetch_assoc($result)){
        $tampung[] = $tampungData;
    }
    return $tampung;
}
function upload(){
    $namaFile = $_FILES["foto"]["name"];
    $ukuranFile = $_FILES["foto"]["size"];
    $tmpFile = $_FILES["foto"]["tmp_name"];
    $error = $_FILES["foto"]["error"];
    if($error===4){
        echo "<script>
            alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiValid)){
        echo "<script>
        alert('tipe file atau ekstensi file yang di izinkan hanya [jpg, jpeg, png]');
    </script>";
    return false;
    }

    if($ukuranFile > 2000000){
        echo "<script>
        alert('ukuran maksimal gambar = 1MB');
    </script>";
    return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpFile, 'aset/gambar/database/'.$namaFileBaru);
    return $namaFileBaru;
}
function tambahAnggota($post){
    global $connection;
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $nama = htmlspecialchars( $post["nama-anggota"]);
    $email = htmlspecialchars( $post["email-anggota"]);
    $alamat = htmlspecialchars( $post["alamat-anggota"]);
    $gender = $post["gender"];
    
    $query = "INSERT INTO anggota
                VALUES 
            ('$gambar', '$nama', '$alamat', '$gender', '$email', '23070', '')";
    mysqli_query($connection, $query);
    //mengetahui kesalahan atau eror padassat tambah data
    $error = mysqli_affected_rows($connection);
    return $error;
}

function hapus($kode, $dataBase){
global $connection;
$query = "DELETE FROM $dataBase WHERE kode = $kode";
mysqli_query($connection,$query);
$eror = mysqli_affected_rows($connection);
return $eror;
}

function total($dataBase){
    global $connection;
    $query = "SELECT COUNT(*) AS total FROM $dataBase";
$result = mysqli_query($connection, $query);
$jumlah = 0;
if($result){
    $row = mysqli_fetch_assoc($result);
    $jumlah = $row["total"];
}else {
    echo "Error: " . mysqli_error($connection);
    return false;
    exit;
}
return $jumlah;
}
?>