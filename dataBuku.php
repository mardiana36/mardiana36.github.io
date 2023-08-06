<?php
require 'functionphp.php';
cekLogin();
$activePage = 'dataBuku';
$tableName = "buku";
$keySearch = ['judul', 'formatKode', 'kode'];
$data = maxData($tableName, 5);
$jumlahHalaman = $data['jumlahHalaman'];
$halamanAktif = $data["halamanAktif"];
$dataBuku = $data['data'];
if (isset($_POST["cari"])) {
    $dataBuku =  cari($_POST["key"], $tableName, $keySearch);
}

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

<body onload=" geserContain('togel', 'kosong')">
    <?php include 'menu.php'; ?>
    <main class="container-dashboard" id="kosong">
        <div class="container-anggota">
            <div class="div-tombol">
                <a href="tambahBuku.php">Tambah Buku</a>
            </div>
            <div class="div-carianggota">
                <form action="" method="post" id="cari-agt">
                    <input type="search" name="key" placeholder="Judul Buku/Kode Buku...">
                    <button type="" name="cari" alt="" id="cari"> <img src="aset/gambar/icons8-search-64.png" alt="Search"></button>
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
                <?php $no = 1; ?>
                <?php foreach ($dataBuku as $da) : ?>
                    <tr class="tr-body">
                        <td class="td-no"><?= $no ?></td>
                        <td><img width="100" src="aset/gambar/database/<?= $da["foto"]; ?>" alt=""></td>
                        <td><?= $da["judul"] ?></td>
                        <td><?= $da["namaP"] ?></td>
                        <td><?= $da["tahun"] ?></td>
                        <td><?= $da["stok"] ?></td>
                        <td><?= $da["formatKode"] . $da["kode"] ?></td>
                        <td class="aksi">
                            <a href="editBuku.php?kode=<?= $da['kode']; ?>"><img src="aset/gambar/edit.png" alt=""></a>
                            <a id="hapus" href="hapus.php?kode=<?= $da['kode']; ?> <?php $_SESSION['database'] = "buku"; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data\n dengan KODE ANGGOTA =[ <?= $da['formatKode'] . $da['kode'] ?> ]?')"><img src="aset/gambar/hapus.png" alt=""></a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="div-nextpage">
            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                    <div><a class="next-page colordarkGreen" href="?p=<?= $i ?>"><?= $i; ?></a></div>
                <?php else : ?>
                    <div><a class="next-page colorGreen" href="?p=<?= $i ?>"><?= $i; ?></a></div>
                <?php endif; ?>

            <?php endfor; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>