<?php
require 'functionphp.php';
$tableName = 'buku';
$dataBuku = query("SELECT * FROM buku LIMIT 5");
$keySearch = ['judul', 'namaP'];
if (isset($_POST["cari"])) {
    if (cariPK($_POST["search"], $tableName, $keySearch) != 0) {
        $dataBuku = cariPK($_POST["search"], $tableName, $keySearch);
    } else {
        $dataBuku = query("SELECT * FROM buku LIMIT 5");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
    <script src="script.js"></script>
</head>

<body>
    <nav class="container-nav">
        <ul class="ul-nav">
            <li id="logo" class="li-nav">PERPUSTAKAAN</li>
            <button class="login-nav li-nav"> <a href="login.php">LOGIN</a> </button>
        </ul>
    </nav>
    <div class="container-content">
        <div>
            <div class="content-home-1">
                <div class="gambar-samping">
                    <img src="aset/gambar/kucing-baca.png" alt="">
                </div>
                <div class="content-dlm">
                    <img onclick="fokusForm()" src="aset/gambar/orang-nunjuk.png" alt="">
                    <form action="" id="cari-buku" method="post">
                        <input type="search" name="search" id="search" value="<?= isset($_POST['search']) ? $_POST['search'] : '' ?>" placeholder="Judul Buku/Nama Pengarang...">
                        <input type="hidden" name="cari"></input>
                    </form>
                    <p>Buku Adalah Gerbang Dunia Dan Membaca Adalah Kuncinya</p>
                </div>
                <div class="gambar-samping">
                    <img src="aset/gambar/tumpukan-buku.png" alt="">
                </div>
            </div>
            <!-- mengabil dari gambar data base rencananya-->
            <div class="content-home-2">
                <?php foreach ($dataBuku as $bk) : ?>
                    <div class="flip-card" onclick="flipCard(this)">
                        <div class="flip-card-inner">
                            <div class="flip-card-front"><img src="aset/gambar/database/<?= $bk['foto'] ?>" alt=""></div>
                            <div class="flip-card-back">
                                <h3><?= $bk["judul"] ?></h3>
                                <table>
                                    <tr>
                                        <td>Pengarang</td>
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
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>