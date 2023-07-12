<?php
require 'functionphp.php';
cekLogin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body  onload=" geserContain('togel', 'kosong')">
    <nav class="nav-dashboard" id="nav-ds">
        <div>
            <div class="div-drop">
                <input type="checkbox" checked name="togel" id="togel">
                <label for="togel" id="icon-menu"><img src="aset/gambar/icons8-menu-78.png" alt=""></label>
                <label for="togel" id="icon-drop"><img src="aset/gambar/icons8-downward-64.png" alt=""></label>
                <label for="togel">MENU</label>
                <div class="menu-drop" id="menu">
                    <ul class="list">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="dataAnggota.php">Data Anggota</a></li>
                        <li class="aktive"><a href="dataBuku.php">Data Buku</a></li>
                        <li><a href="pinjamDanKembalikan.php">PINJAMKAN & KEMBALIKAN</a></li>
                    </ul>
                </div>
            </div>
            <div class="li-nav logo-dashboard" id="logo"><a href="">PERPUSTAKAAN</a></div>
            <div class="logout"><a href="logout.php" onclick="return confirm('Apakah yakin anda ingin LOGOUT?')">LOGOUT</a></div>
    </nav>
    <main  class="container-dashboard" id="kosong">
        <div class="container-anggota">
            <div class="div-tombol">
                <a href="tambahBuku.php">Tambah Buku</a>
            </div>
            <div class="div-carianggota">
                <form action="" id="cari-agt">
                    <input type="search" placeholder="Judul Buku/Kode Buku...">
                    <img onclick="submitForm('cari-agt')" src="aset/gambar/icons8-search-64.png" alt="">
                </form>
            </div>
        </div>
        <div class="div-table">
            <table class="table">
                <tr class="tr-head">
                    <th>NO.</th>
                    <th>Foto Buku</th>
                    <th>Judul Buku</th>
                    <th>Nama Pengarang</th>
                    <th>Tahun Rilis</th>
                    <th>Stok Buku</th>
                    <th>Kode Buku</th>
                    <th>Aksi</th>
                </tr>
                <tr class="tr-body">
                   <td class="td-no">1</td> 
                   <td>1</td> 
                   <td>Langkah Menuju Sukses</td> 
                   <td>Jokotingkir</td> 
                   <td>2023</td> 
                   <td>11</td> 
                   <td>12301</td> 
                   <td class="aksi">
                    <a href="editBuku.php">Edit</a>
                    <a href="">Hapus</a>
                   </td> 
                </tr>
                <tr class="tr-body">
                   <td class="td-no">2</td> 
                   <td>2</td> 
                   <td>Hidup Tak Seindak Fiksi</td> 
                   <td>danang putar jaya</td> 
                   <td>2016</td> 
                   <td>2</td> 
                   <td>12302</td> 
                   <td class="aksi">
                    <a href="editBuku.php">Edit</a>
                    <a href="">Hapus</a>
                   </td> 
                </tr>
        </table>
        </div>
    </main>
</body>
</html>