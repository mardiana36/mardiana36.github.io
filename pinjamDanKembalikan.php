<?php
require 'functionphp.php';
cekLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Dan Kembalikan</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body  onload=" geserContain('togel', 'kosong')">
<?php include 'menu.php' ?>
    <main class="container-dashboard" id="kosong">
        <div class="div-pmn-buku">
            <form action="">
            <h3>Peminjaman dan Pengembalian Buku</h3>
            <label for="kode-pmn">Kode Anggota:</label>
            <input type="text" name="kode-pmn" id="kode-pmn">
            <label for="kode-bpmn">Kode Buku:</label>
            <input type="text" name="kode-bpmn" id="kode-bpmn">
            <label for="tgl-pjm">Tanggal Peminjaman:</label>
            <input type="date" name="tgl-pjm" id="tgl-pjm">
            <label for="tgl-pgl">Tanggal Pengembalian:</label>
            <input type="date" name="tgl-pgl" id="tgl-pgl">
            <input class="input-pmn" type="radio" name="buku" id="peminjaman">
            <label class="label-pmn" for="peminjaman">Peminjaman</label>
            <input class="input-pmn" type="radio" name="buku" id="pengembalian">
            <label class="label-pmn" for="pengembalian">Pengembalian</label>
            <input type="submit" name="simpan-pmn" value="SIMPAN">
            </form>
        </div>
        <div class="container-anggota">
            <div class="div-tombol">
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
                    <th>Nama User</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                </tr>
                <tr class="tr-body">
                   <td class="td-no">1</td> 
                   <td>samsudin alindin maulana</td> 
                   <td>Langkah Menuju Sukses</td> 
                   <td>2023-05-15</td> 
                   <td>2023-05-22</td> 
                   <td>Dikembalikan</td> 
                </tr>
                <tr class="tr-body">
                   <td class="td-no">2</td> 
                   <td>mawar salista putri</td> 
                   <td>Hidup Tak Seindak Fiksi</td> 
                   <td>2023-05-20</td> 
                   <td>2023-06-01</td> 
                   <td>Dalam Proses</td> 
                </tr>
        </table>
        </div>
    </main>
</body>

</html>