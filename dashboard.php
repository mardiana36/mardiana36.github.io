<?php
require 'functionphp.php';
cekLogin();
$totalAgt = total("anggota");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body onload="geserContain('togel', 'kosong')">
    <nav class="nav-dashboard" id="nav-ds">
        <div>
            <div class="div-drop">
                <input type="checkbox" checked name="togel" id="togel">
                <label for="togel" id="icon-menu"><img src="aset/gambar/icons8-menu-78.png" alt=""></label>
                <label for="togel" id="icon-drop"><img src="aset/gambar/icons8-downward-64.png" alt=""></label>
                <label for="togel">MENU</label>
                <div class="menu-drop" id="menu">
                    <ul class="list">
                        <li class="aktive"><a href="#">Dashboard</a></li>
                        <li><a href="dataAnggota.php">Data Anggota</a></li>
                        <li><a href="dataBuku.php">Data Buku</a></li>
                        <li><a href="pinjamDanKembalikan.php">PINJAMKAN & KEMBALIKAN</a></li>
                    </ul>
                </div>
            </div>
            <div class="li-nav logo-dashboard" id="logo"><a href="">PERPUSTAKAAN</a></div>
            <div class="logout"><a href="logout.php" onclick="return confirm('Apakah yakin anda ingin LOGOUT?')">LOGOUT</a></div>
        </div>
    </nav>
    <main class="container-dashboard" id="kosong">
        <div class="div-dashboard">
            <div class="card-dashboard">
                <div><img src="aset/gambar/Rectangle 49.png" alt=""></div>
                <div>
                    <p>Anggota</p>
                    <p><?= $totalAgt; ?></p>
                </div>
            </div>
            <div class="card-dashboard">
                <div><img src="aset/gambar/Rectangle 50.png" alt=""></div>
                <div>
                    <p>Buku</p>
                    <p>100</p>
                </div>
            </div>
            <div class="card-dashboard">
                <div><img src="aset/gambar/Rectangle 51.png" alt=""></div>
                <div>
                    <p>Peminjam</p>
                    <p>2</p>
                </div>
            </div>
        </div>
        <div class="underline">
        </div>
        <div class="div-text">
            <!-- rencana mengabil di data base -->
            <p>Buku Terpopuler</p>
        </div>
        <div class="card-dashboard2">
            <div class="card-div">
                <img src="aset/gambar/buku.jpg" alt="">
                <p>TEXT</p>
            </div>
            <div class="card-div">
                <img src="aset/gambar/buku.jpg" alt="">
                <p>TEXT</p>
            </div>
            <div class="card-div">
                <img src="aset/gambar/buku.jpg" alt="">
                <p>TEXT</p>
            </div>
            <div class="card-div">
                <img src="aset/gambar/buku.jpg" alt="">
                <p>111111111111111111111111111111111111111</p>
            </div>
        </div>
    </main>
</body>

</html>