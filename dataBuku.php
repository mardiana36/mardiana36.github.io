<?php
require 'functionphp.php';
cekLogin();
$activePage = 'dataBuku';
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
<?php include 'menu.php';?>
    <main  class="container-dashboard" id="kosong">
        <div class="container-anggota">
            <div class="div-tombol">
                <a href="tambahBuku.php">Tambah Buku</a>
            </div>
            <div class="div-carianggota">
            <form action="" method="post" id="cari-agt">
                    <input type="search" name="key" placeholder="Nama/Kode Angota...">
                    <button type=""  name="cari" alt="" id="cari"> <img src="aset/gambar/icons8-search-64.png" alt="Search" ></button>
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
    <?php include 'footer.php'; ?>
</body>
</html>