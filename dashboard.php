<?php
require 'functionphp.php';
cekLogin();
$totalAgt = total("anggota");
$activePage = 'dashboard';
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
                <div class="caver-div">
                    <div class="front-caver">
                        <img src="aset/gambar/buku.jpg" alt="">
                    </div>
                    <div class="back-caver">
                        <p>TEXT</p>
                    </div>
                </div>
            </div>
            <div class="card-div">
                <div class="caver-div">
                    <div class="front-caver">
                        <img src="aset/gambar/buku.jpg" alt="">
                    </div>
                    <div class="back-caver">
                        <p>TEXT</p>
                    </div>
                </div>
            </div>
            <div class="card-div">
                <div class="caver-div">
                    <div class="front-caver">
                        <img src="aset/gambar/buku.jpg" alt="">
                    </div>
                    <div class="back-caver">
                        <p>TEXT</p>
                    </div>
                </div>
            </div>
            <div class="card-div">
                <div class="caver-div">
                    <div class="front-caver">
                        <img src="aset/gambar/buku.jpg" alt="">
                    </div>
                    <div class="back-caver">
                        <p>TEXT</p>
                    </div>
                </div>
            </div>
           
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>