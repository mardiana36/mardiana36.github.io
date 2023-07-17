<?php
require 'functionphp.php';
cekLogin();
$tableName = "anggota";
$keySearch = ['nama', 'formatKode', 'kode'];
$data = maxData($tableName, 5);
$jumlahHalaman = $data['jumlahHalaman'];
$halamanAktif = $data["halamanAktif"];
$dataAnggota = $data['data'];
if (isset($_POST["cari"])) {
    $dataAnggota =  cari($_POST["key"], $tableName, $keySearch);
}
$activePage = 'dataAnggota';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dataAngota</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body onload=" geserContain('togel', 'kosong')">
    <?php include 'menu.php'; ?>
    <main class="container-dashboard" id="kosong">
        <div class="container-anggota">
            <div class="div-tombol">
                <a href="tambahAnggota.php">Tambah Anggota</a>
            </div>
            <div class="div-carianggota">
                <form action="" method="post" id="cari-agt">
                    <input type="search" name="key" placeholder="Nama/Kode Angota...">
                    <button type="" name="cari" alt="" id="cari"> <img src="aset/gambar/icons8-search-64.png" alt="Search"></button>
                </form>
            </div>
        </div>
        <div class="div-table">
            <table class="table">
                <tr class="tr-head">
                    <th>NO.</th>
                    <th>Foto profil</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Kode Anggota</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = 1; ?>
                <?php foreach ($dataAnggota as $da) : ?>
                    <tr class="tr-body">
                        <td class="td-no"><?= $no . '.'; ?></td>
                        <td><img width="100" src="aset/gambar/database/<?= $da["foto"]; ?>" alt=""></td>
                        <td><?= $da["nama"]; ?></td>
                        <td><?= $da["alamat"]; ?></td>
                        <?php $gender = "Pria"; ?>
                        <?php if ($da["gender"] == 0) {
                            $gender = "Wanita";
                        } ?>
                        <td><?= $gender; ?></td>
                        <td><?= $da["email"] ?></td>
                        </td>
                        <td><?= $da["formatKode"] . $da["kode"] ?></td>
                        <td class="aksi">
                            <a href="editAnggota.php?kode=<?= $da['kode']; ?>"><img src="aset/gambar/edit.png" alt=""></a>
                            <a id="hapus" href="hapus.php?kode=<?= $da['kode']; ?> <?php $_SESSION['database'] = "anggota"; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data\n dengan KODE ANGGOTA =[ <?= $da['formatKode'] . $da['kode'] ?> ]?')"><img src="aset/gambar/hapus.png" alt=""></a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="div-nextpage">
        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if($i == $halamanAktif) : ?>
                <div><a class="next-page colordarkGreen" href="?p=<?= $i; ?>"><?= $i; ?></a></div>
                <?php else :?>
                <div><a class="next-page colorGreen" href="?p=<?= $i; ?>"><?= $i; ?></a></div>
            <?php endif; ?>
            
        <?php endfor; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>