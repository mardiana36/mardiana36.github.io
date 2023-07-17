<?php
require 'functionphp.php';
cekLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Buku</title>
    <script src="script.js"></script>
</head>

<body>
    <nav class="container-nav">
        <ul class="ul-nav">
            <li id="logo" class="li-nav logo-anggota">PERPUSTAKAAN</li>
            <button class="login-nav li-nav kembali"> <a href="dataBuku.php">Kembali</a> </button>
        </ul>
    </nav>
    <main class="container-tbh-agt background-tambahbuku">
        <div class="div-tbh-agt">
            <p class="p-tbh-agt">EDIT BUKU</p>
                <form id="form-agt" class="form-tbh-agt" action="">
                    <div class="div-intbh-agt">
                        <label for="judul-buku">Judul Buku:</label>
                        <input type="text" name="judul-buku" id="judul-buku" required >
                        <label for="pengarang-buku">Nama Pengarang: </label>
                        <input type="text" name="pengarang-buku" id="pengarang-buku" required>
                        <label for="th-rilis">Tahun Rilis:</label>
                        <input type="text" name="th-rilis" id="th-rilis" required>
                        <label for="stok-buku">Stok Buku:</label>
                        <input type="number" name="stok-buku" id="stok-buku" required>
                    </div>
                    <div class="div-intbh-agt">
                        <label for="foto">Foto Buku:</label>
                        <img id="img-agt" src="aset/gambar/icons8-book-94.png" height="256px" alt="">
                        <input onchange="showImg()" type="file" id="foto" required>
                    </div>
                </form>
                <div class="div-submit-agt">
                    <input  onclick="submitForm('form-agt')" class="submit-tbh-agt" type="submit" value="SIMPAN" id="tambah-anggota">
                </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>