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
    <title>Edit Anggota</title>
    <script src="script.js"></script>
</head>

<body>
    <nav class="container-nav">
        <ul class="ul-nav">
            <li id="logo" class="li-nav logo-anggota">PERPUSTAKAAN</li>
            <button class="login-nav li-nav kembali"> <a href="dataAnggota.php">Kembali</a> </button>
        </ul>
    </nav>
    <main class="container-tbh-agt background-tambahagt">
        <div class="div-tbh-agt">
            <p class="p-tbh-agt">EDIT ANGGOTA</p>
                <form id="form-agt" class="form-tbh-agt" action="">
                    <div class="div-intbh-agt">
                        <label for="nama-anggota">Nama:</label>
                        <input type="text" name="nama-anggota" id="nama-anggota" required >
                        <label for="email-anggota">Email: </label>
                        <input type="email" name="email-anggota" id="email-anggota" required>
                        <label for="alamat-anggota">Alamat:</label>
                        <input type="text" name="alamat-anggota" id="alamat-anggota" required>
                        <p>Jenis Kelamin:</p>
                        <input class="input-gender-agt" type="radio" name="gender" id="pria">
                        <label class="label-gender-agt" for="pria">Pria</label> <br>
                        <input class="input-gender-agt" type="radio" name="gender" id="wanita">
                        <label  class="label-gender-agt" for="wanita">Wanita</label>
                    </div>
                    <div class="div-intbh-agt">
                        <label for="foto">Foto Profil:</label>
                        <img id="img-agt" src="aset/gambar/daily-user-icon-2.png" height="256px" alt="">
                        <input onchange="showImg()" type="file" id="foto" required>
                    </div>
                </form>
                <div class="div-submit-agt">
                    <input onclick="submitForm('form-agt')" class="submit-tbh-agt" type="submit" value="SIMPAN" id="tambah-anggota">
                </div>
        </div>
    </main>
</body>
</html>