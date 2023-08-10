<?php
require 'functionphp.php';
cekLogin();
$kode = $_GET["kode"];
$query = "SELECT * FROM buku WHERE kode = $kode";
$result = mysqli_query($connection, $query);
$row;
if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Error: " . mysqli_error($connection);
}

if (isset($_POST['submit'])) {
    $tableName = "buku";
    $data = ['judul-buku', 'pengarang-buku', 'th-rilis', 'stok-buku'];
    $colTable = ['judul', 'namaP', 'tahun', 'stok'];
    if (edit($_POST, $tableName, $data, $colTable) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'dataBuku.php';
            </script>    
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'editBuku.php?kode=$kode';
        </script>    
    ";
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
            <form id="form-agt" class="form-tbh-agt" action="" method="post" enctype="multipart/form-data">
                <div class="div-intbh-agt">
                    <input type="hidden" name="kode" value="<?= $row["kode"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $row["foto"]; ?>">
                    <label for="judul-buku">Judul Buku:</label>
                    <input type="text" name="judul-buku" id="judul-buku" value="<?= $row["judul"]; ?>" required>
                    <label for="pengarang-buku">Nama Pengarang: </label>
                    <input type="text" name="pengarang-buku" id="pengarang-buku" value="<?= $row["namaP"]; ?>" required>
                    <label for="th-rilis">Tahun Rilis:</label>
                    <input type="text" name="th-rilis" id="th-rilis" value="<?= $row["tahun"]; ?>" required>
                    <label for="stok-buku">Stok Buku:</label>
                    <input type="number" name="stok-buku" id="stok-buku" value="<?= $row["stok"]; ?>" required>
                </div>
                <div class="div-intbh-agt">
                    <label for="foto">Foto Buku:</label>
                    <img id="img-agt" src="aset/gambar/database/<?= $row["foto"]; ?>"  alt="">
                        <input onchange="showImg()" type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png">
                </div>
            </form>
            <div class="div-submit-agt">
                    <button  class="submit-tbh-agt" form="form-agt" type="submit" name="submit" id="tambah-anggota"> SIMPAN </button>
                </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>