<?php
require 'koneksi.php';

function cekLogin()
{
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
function query($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);
    $tampung = [];
    while ($tampungData = mysqli_fetch_assoc($result)) {
        $tampung[] = $tampungData;
    }
    return $tampung;
}

function upload()
{
    $namaFile = $_FILES["foto"]["name"];
    $ukuranFile = $_FILES["foto"]["size"];
    $tmpFile = $_FILES["foto"]["tmp_name"];
    $error = $_FILES["foto"]["error"];
    if ($error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script>
        alert('tipe file atau ekstensi file yang di izinkan hanya [jpg, jpeg, png]');
    </script>";
        return false;
    }

    if ($ukuranFile > 2000000) {
        echo "<script>
        alert('ukuran maksimal gambar = 2MB');
    </script>";
        return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpFile, 'aset/gambar/database/' . $namaFileBaru);
    return $namaFileBaru;
}
function tambahAnggota($post, $tableName, $data)
{
    global $connection;
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $data1 = htmlspecialchars($post[$data[0]]);
    $data2 = htmlspecialchars($post[$data[1]]);
    $data3 = htmlspecialchars($post[$data[2]]);
    $data4 = htmlspecialchars($post[$data[3]]);
    $data5 = $data[4];


    $query = "INSERT INTO $tableName
                VALUES 
            ('$gambar', '$data1', '$data2', '$data3', '$data4', '$data5', '')";
    mysqli_query($connection, $query);
    //mengetahui kesalahan atau eror padassat tambah data
    $error = mysqli_affected_rows($connection);
    return $error;
}

function hapus($kode, $dataBase)
{
    global $connection;
    if ($dataBase == "pinjamkem") {
        $kodeDb = 'idP';
    } else {
        $kodeDb = 'kode';
    }
    $query = "DELETE FROM $dataBase WHERE $kodeDb = $kode";
    mysqli_query($connection, $query);
    $eror = mysqli_affected_rows($connection);
    return $eror;
}

function total($dataBase)
{
    global $connection;
    $query = "SELECT COUNT(*) AS total FROM $dataBase";
    $result = mysqli_query($connection, $query);
    $jumlah = 0;
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $jumlah = $row["total"];
    } else {
        echo "Error: " . mysqli_error($connection);
        return false;
        exit;
    }
    return $jumlah;
}
function sum($dataBase, $nameTable)
{
    global $connection;
    $query = "SELECT SUM($nameTable) AS total FROM $dataBase";
    $result = mysqli_query($connection, $query);
    $jumlah = 0;
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $jumlah = $row["total"];
    } else {
        echo "Error: " . mysqli_error($connection);
        return false;
        exit;
    }
    return $jumlah;
}

function edit($post, $tableName, $data, $colTable)
{
    global $connection;
    $kode = $post["kode"];
    $gambarLama = $post["gambarLama"];
    if ($_FILES["foto"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    if (!$gambar) {
        return false;
    }
    $data1 = htmlspecialchars($post[$data[0]]);
    $data2 = htmlspecialchars($post[$data[1]]);
    $data3 = htmlspecialchars($post[$data[2]]);
    $data4 = htmlspecialchars($post[$data[3]]);

    $query = "UPDATE $tableName SET
         foto = '$gambar', 
         $colTable[0] = '$data1',
         $colTable[1] = '$data2',
         $colTable[2] = '$data3',
         $colTable[3] = '$data4'
         WHERE kode = $kode";
    mysqli_query($connection, $query);
    $error = mysqli_affected_rows($connection);
    return $error;
}

function cariPK($key, $tableName, $keySearch)
{
    if (!empty($key)) {
        $query = "SELECT * FROM $tableName
        WHERE 
        $keySearch[0] LIKE '$key%' OR
        $keySearch[1] LIKE '$key%'
        ";
        return query($query);
    } else {
        return 0; // Jika $key kosong, kembalikan array kosong
    };
}
function cariTabel($tableName, $key, $keySc)
{
    global $connection;
    $tampung = array();
    if ($tableName != 'anggota' && $tableName != 'buku') {
        $ambilData = mysqli_query($connection, "SELECT * FROM $tableName WHERE $keySc[0] LIKE '%$key%' OR $keySc[1] LIKE '%$key%'");
    } else {
        $ambilData = mysqli_query($connection, "SELECT * FROM $tableName WHERE $keySc[0] LIKE '%$key%' OR CONCAT($keySc[1], $keySc[2]) LIKE '%$key%'");
    }
    $jumlahData = 5;
    $totalData = mysqli_num_rows($ambilData);
    $jumlahHalaman = ceil($totalData / $jumlahData);
    $halamanAktif = isset($_GET["p"]) && isset($_POST['cari'])== '' ? $_GET["p"] : 1;
    $awalData = ($jumlahData * $halamanAktif) - $jumlahData;

    $jumlahLink = 2;
    $startno = ($halamanAktif > $jumlahLink) ? $halamanAktif - $jumlahLink : 1;
    $endno = ($halamanAktif < ($jumlahHalaman - $jumlahLink)) ? $halamanAktif + $jumlahLink : $jumlahHalaman;


    if ($tableName != 'anggota' && $tableName != 'buku') {
        $ambilData_perhalaman  = mysqli_query($connection, "SELECT * FROM $tableName WHERE $keySc[0] LIKE '%$key%' OR $keySc[1] LIKE '%$key%' LIMIT $awalData, $jumlahData");
        if ($tableName == 'pinjamkem') {
            $ambilData_perhalaman  = mysqli_query($connection, "SELECT * FROM $tableName WHERE $keySc[0] LIKE '%$key%' OR $keySc[1] LIKE '%$key%'  ORDER BY statusP ASC LIMIT $awalData, $jumlahData");
        }
    } else {
        $ambilData_perhalaman = mysqli_query($connection, "SELECT * FROM $tableName WHERE $keySc[0] LIKE '%$key%' OR CONCAT($keySc[1], $keySc[2]) LIKE '%$key%' LIMIT $awalData, $jumlahData");
    }
    $tampung['jh'] = $jumlahHalaman;
    $tampung['ha'] = $halamanAktif;
    $tampung['ad'] = $awalData;
    $tampung['data'] = $ambilData_perhalaman;
    $tampung['startno'] = $startno;
    $tampung['endno'] = $endno;
    return $tampung;
}

function pinjamKem()
{
    global $connection;
    $option1 = $_POST["kodeA"];
    list($nama, $kodeA) = explode(',', $option1);
    $option2 = $_POST["kodeB"];
    list($judul, $kodeB) = explode(',', $option2);

    $tglpinjam = $_POST["tgl-pjm"];
    $tglkembali = $_POST["tgl-pgl"];
    $status = $_POST["buku"];
    $tglsekarang = date("Y-m-d");


    if ($tglpinjam <= $tglkembali && $tglsekarang <= $tglkembali) {
        $statusdb = 'Dalam Proses'; //dalam proses di pinjam
    } else if ($tglpinjam > $tglkembali || $tglpinjam < $tglkembali && $tglsekarang > $tglkembali) {
        $statusdb = 'Melewati Batas'; // melewati batas waktu
    }

    if ($status == "1") {
        $queryCek = query("SELECT * FROM pinjamkem");
        $bantu = true;
        foreach ($queryCek as $qc) {
            if ($qc['nama'] == $nama && $qc['judul'] == $judul &&  $qc['tglPinjam'] == $tglpinjam) {
                $bantu = false;
                break;
            }
        }
        if ($bantu != false) {
            $query = "INSERT INTO pinjamkem VALUES 
                ('', '$nama', '$judul', '$tglpinjam', '$tglkembali', '$statusdb', '$kodeA', '$kodeB', '')";
            mysqli_query($connection, $query);
            //mengetahui kesalahan atau eror padassat tambah data
            $error = mysqli_affected_rows($connection);
        } else {
            return 0;
            exit;
        }
    } else if ($status == "0") {
        $statusdb = 'Dikembalikan'; // Dikembalikan
        $query = "UPDATE pinjamkem SET
        statusP = '$statusdb',
        tgl = '$tglkembali'
        WHERE kodeA = '$kodeA' AND kodeB = '$kodeB' AND tglPinjam = '$tglpinjam'";
        mysqli_query($connection, $query);
        //mengetahui kesalahan atau eror padassat tambah data
        $error = mysqli_affected_rows($connection);
    }
    return $error;
}
