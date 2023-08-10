<?php
require 'functionphp.php';
cekLogin();
$totalAgt = total("anggota");
$totalpm = total("pinjamkem");
$totalbk = sum("buku", "stok");
$activePage = 'dashboard';
$dataBuku = query("SELECT * FROM buku ORDER BY stok DESC LIMIT 4")
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

<body id="1" onload="geserContain('togel', 'kosong')">
   <?php include 'menu.php'; 
   ?>
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
                    <p><?= $totalbk ?></p>
                </div>
            </div>
            <div class="card-dashboard">
                <div><img src="aset/gambar/Rectangle 51.png" alt=""></div>
                <div>
                    <p>Peminjam</p>
                    <p><?= $totalpm; ?></p>
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
            <?php foreach($dataBuku as $bk): ?>
            <div class="card-div">
                <div class="caver-div">
                    <div class="front-caver">
                        <img src="aset/gambar/database/<?= $bk['foto'] ?>" alt="">
                    </div>
                    <div class="back-caver">
                        <h3><?= $bk["judul"] ?></h3>
                        <table id="tb-ds" >
                            <tr>
                                <td>Penerbit/Pengarang</td>
                                <td>:</td>
                                <td><?= $bk["namaP"] ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td>:</td>
                                <td><?= $bk["tahun"] ?></td>
                            </tr>
                            <tr>
                                <td>Stok Buku</td>
                                <td>:</td>
                                <td><?= $bk["stok"] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
           <?php endforeach; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>