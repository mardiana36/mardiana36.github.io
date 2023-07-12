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
?>