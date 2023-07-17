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
        alert('ukuran maksimal gambar = 2MB');
    </script>";
    return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpFile, 'aset/gambar/database/'.$namaFileBaru);
    return $namaFileBaru;
}
function tambahAnggota($post, $tableName,$data){
    global $connection;
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $data1 = htmlspecialchars( $post[$data[0]]);
    $data2 = htmlspecialchars( $post[$data[1]]);
    $data3 = htmlspecialchars( $post[$data[2]]);
    $data4 = htmlspecialchars( $post[$data[3]]);
    $data5 = $data[4];
   
    
    $query = "INSERT INTO $tableName
                VALUES 
            ('$gambar', '$data1', '$data2', '$data3', '$data4', '$data5', '')";
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

function edit($post, $tableName, $data,$colTable){
global $connection;
$kode = $post["kode"];
$gambarLama = $post["gambarLama"];
if($_FILES["foto"]["error"]===4){
    $gambar = $gambarLama;
}else{
    $gambar = upload();
}
if(!$gambar){
    return false;
}
$data1 = htmlspecialchars($post[$data[0]]);
$data2 = htmlspecialchars($post[$data[1]]);
$data3 = htmlspecialchars($post[$data[2]]);
$data4 = htmlspecialchars($post[$data[3]]);

$query ="UPDATE $tableName SET
         foto = '$gambar', 
         $colTable[0] = '$data1',
         $colTable[1] = '$data2',
         $colTable[2] = '$data3',
         $colTable[3] = '$data4'
         WHERE kode = $kode";
         mysqli_query($connection,$query);
         $error = mysqli_affected_rows($connection);
         return $error;
}

function cari($key,$tableName,$keySearch){
    $query = "SELECT * FROM $tableName
    WHERE 
    $keySearch[0] LIKE '%$key%' OR
    CONCAT($keySearch[1], $keySearch[2]) LIKE '%$key%'
    ";
    return query($query);
}
function maxData($nameTable, $maxData){
    $tampung = array();
    $jumlahData = total("anggota");
    $jumlahHalaman = ceil( $jumlahData / $maxData);
    $halamanAktif = isset($_GET["p"]) ? $_GET["p"] : 1;
    $awalData = ($maxData * $halamanAktif) - $maxData;
    $data = query("SELECT * FROM $nameTable LIMIT $awalData, $maxData");
    $tampung['data'] = $data;
    $tampung['jumlahHalaman'] = $jumlahHalaman;
    $tampung['halamanAktif'] = $halamanAktif;
    return $tampung;
}
?>