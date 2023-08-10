<?php
require 'functionphp.php';
cekLogin();
$activePage = 'pinjamKembalikan';
$anggota = query("SELECT * FROM anggota");
$buku = query("SELECT * FROM buku");
$tableName = "pinjamkem";
$keySc = ['nama', 'judul'];
if (isset($_POST['cari'])) {
    $key = $_POST['key'];
    $_SESSION['key'] = $key;
} elseif (isset($_SESSION['key']) && empty($_GET['p'])) {
    unset($_SESSION['key']);
    $key = '';
} else {
    $key = isset($_SESSION['key']) ? $_SESSION['key'] : '';
}

$data = cariTabel($tableName, $key, $keySc);
$jumlahHalaman = $data['jh'];
$halamanAktif = $data['ha'];
$awalData = $data['ad'];

$ambilData_perhalaman = $data['data'];

$startno = $data['startno'];
$endno = $data['endno'];

if (isset($_POST["simpan"])) {
    if ($_POST['buku'] == "1") {
        $ket = "pinjamkan";
    } else if ($_POST['buku'] == "0") {
        $ket = "kembalikan";
    }

    if (pinjamKem() > 0) {

        echo "
            <script>
                alert('Buku Berhasil Di" . $ket . "!');
                document.location.href = 'pinjamDanKembalikan.php';
            </script>    
        ";
    } else {
        echo "
        <script>
            alert('Buku Gagal Di" . $ket . "!');
        </script>    
    ";
    }
}
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

<body onload=" geserContain('togel', 'kosong')">
    <?php include 'menu.php'; ?>
    <main class="container-dashboard" id="kosong">
        <div class="div-pmn-buku">
            <form action="" method="post">
                <h3>Peminjaman dan Pengembalian Buku</h3>
                <label for="kodeA">Kode Anggota:</label>
                <select name="kodeA" id="kodeA">
                    <option disabled value="">Kode Anggota:</option>
                    <?php foreach ($anggota as $ag) : ?>
                        <option value="<?= $ag['nama'] . ',' . $ag['kode'] ?>"><?= $ag['formatKode'] . $ag['kode'] . '  (' . $ag['nama'] . ')' ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="kodeB">Kode Buku:</label>
                <select name="kodeB" id="kodeB">
                    <option disabled value="">Kode Buku:</option>
                    <?php foreach ($buku as $bk) : ?>
                        <option value="<?= $bk['judul'] . ',' . $bk['kode'] ?>"><?= $bk['formatKode'] . $bk['kode'] . '  (' . $bk['judul'] . ')' ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="tgl-pjm">Tanggal Peminjaman:</label>
                <input type="date" name="tgl-pjm" id="tgl-pjm">
                <label for="tgl-pgl">Tanggal Pengembalian:</label>
                <input type="date" name="tgl-pgl" id="tgl-pgl">

                <input class="input-pmn" type="radio" value="1" onclick="handleRadioChange()" name="buku" id="peminjaman">
                <label class="label-pmn" for="peminjaman">Peminjaman</label>
                <input class="input-pmn" type="radio" value="0" onclick="handleRadioChange()" name="buku" id="pengembalian">
                <label class="label-pmn" for="pengembalian">Pengembalian</label>
                <input type="submit" name="simpan" value="SIMPAN">

            </form>
        </div>
        <div class="container-anggota">
            <div class="div-tombol">
            </div>
            <div class="div-carianggota">
                <form action="" method="post" id="cari-agt">
                    <input type="search" name="key" value="<?= $key; ?>" placeholder="Nama/judul...">
                    <button type="" name="cari" alt="" id="cari"> <img src="aset/gambar/icons8-search-64.png" alt="Search"></button>
                </form>
            </div>
        </div>
        <div class="div-table">
            <table class="table">
                <tr class="tr-head">
                    <th>NO.</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = $awalData + 1; ?>
                <?php foreach ($ambilData_perhalaman as $pj) : ?>
                    <?php $warnaBg = '';
                    if ($pj['statusP'] == "Dalam Proses") {
                        $warnaBg = 'color:#5AB885';
                    } else  if ($pj['statusP'] == "Melewati Batas") {
                        $warnaBg = 'color:#b41818 ';
                    }
                    ?>
                    <tr id="pm" style=" <?= $warnaBg; ?>" class="tr-body">
                        <td class="td-no"><?= $no ?></td>
                        <td><?= $pj["nama"] ?></td>
                        <td><?= $pj["judul"] ?></td>
                        <td><?= $pj["tglPinjam"] ?></td>
                        <td><?= $pj["tglKembali"] ?></td>
                        <td><?php
                            $tanggal1 = $pj['tglKembali'];
                            $tanggal2 = $pj['tgl'];
                            $timestamp1 = strtotime($tanggal1);
                            $timestamp2 = strtotime($tanggal2);

                            $jarakHari = ($timestamp2 - $timestamp1) / (60 * 60 * 24);
                            if ($pj['statusP'] == "Dikembalikan") {
                                if ($pj["tglKembali"] >= $tanggal2) {
                                    if ($jarakHari == 0) {
                                        echo $pj['statusP'] . "<a id ='pma' onclick='showPopupDate(this)' data-date='$tanggal2' > (H-$jarakHari)</a>";
                                    } else {
                                        echo $pj['statusP'] . "<a id ='pma' onclick='showPopupDate(this)' data-date='$tanggal2' > (H$jarakHari)</a>";
                                    }
                                } else if ($pj["tglKembali"] < $tanggal2) {
                                    echo $pj['statusP'] .  "<a id ='pma'  onclick='showPopupDate(this)' data-date='$tanggal2' > (H+$jarakHari)</a>";
                                }
                            } else {
                                echo $pj['statusP'];
                            }
                            ?>
                            <div class="popup-date" style="display: none;"></div>
                        </td>


                        <td class="aksi">
                            <a id="hapus" href="hapus.php?kode=<?= $pj['idP']; ?> <?php $_SESSION['database'] = "pinjamkem"; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data\n dengan NAMA =[ <?= $pj['nama'] ?> ]?')"><img src="aset/gambar/hapus.png" alt=""></a>
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
                    <a class="next-page colorGreen" href="?p=<?= $halamanAktif + 1 ?>">
                        next &raquo;
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>