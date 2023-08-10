<?php
require 'functionphp.php';
cekLogin();
$activePage = 'dataBuku';
$tableName = "buku";
$keySc = ['judul', 'formatKode', 'kode'];
if(isset($_POST['cari'])){
    $key = $_POST['key'];
    $_SESSION['key'] = $key;
}elseif (isset($_SESSION['key']) && empty($_GET['p'])) {
    unset($_SESSION['key']);
    $key = '';
}
else{
    $key = isset($_SESSION['key']) ? $_SESSION['key'] : '';
}

$data = cariTabel($tableName,$key,$keySc);
$jumlahHalaman = $data['jh'];
$halamanAktif = $data['ha'];
$awalData = $data['ad'];

$ambilData_perhalaman = $data['data'];

$startno = $data['startno'];
$endno = $data['endno'];

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
                    <input type="search" value="<?= $key ?>" name="key" placeholder="Judul Buku/Kode Buku...">
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
                <?php $no = $awalData+1; ?>
                <?php foreach ($ambilData_perhalaman as $da) : ?>
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
            <?php if ($halamanAktif > 1) : ?>
                <div>
                    <a class="next-page colorGreen" href="?p=<?= $halamanAktif - 1 ?>">
                    &laquo; prev
                    </a>
                </div>
            <?php endif; ?>
            <?php for ($i = $startno; $i <= $endno; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                    <div><a class="next-page colordarkGreen" href="?p=<?= $i ?>"><?= $i; ?></a></div>
                <?php else : ?>
                    <div><a class="next-page colorGreen" href="?p=<?= $i ?>"><?= $i; ?></a></div>
                <?php endif; ?>

            <?php endfor; ?>

            <?php if ($halamanAktif < $jumlahHalaman) : ?>
                <div>
                    <a class="next-page colorGreen" href="?p=<?= $halamanAktif +1 ?>">
                    next &raquo;
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>