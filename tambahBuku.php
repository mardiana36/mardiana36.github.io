<?php
require 'functionphp.php';
cekLogin();
if (isset($_POST["tambah"])) {
    $tableName = "buku";
    $data = ['judul-buku', 'pengarang-buku', 'th-rilis', 'stok-buku', '22110'];
    if (tambahAnggota($_POST, $tableName, $data) > 0) {
        $query = "SELECT formatKode, kode FROM buku ORDER BY kode DESC LIMIT 1";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $formatKode = $row['formatKode'];
            $kode = $row['kode'];
            $kodeBuku = $formatKode . $kode;
            echo "
            <script>
                alert('data berhasil ditambahkan. Dengan KODE BUKU = [ " . $kodeBuku . " ]');
                document.location.href = 'dataBuku.php';
            </script>    
        ";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
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
            <p class="p-tbh-agt">TAMBAH BUKU</p>
            <form id="form-agt" class="form-tbh-agt" action="" method="post" enctype="multipart/form-data">
                <div class="div-intbh-agt">
                    <label for="judul-buku">Judul Buku:</label>
                    <input type="text" name="judul-buku" id="judul-buku" value="<?= isset($_POST['judul-buku']) ? $_POST['judul-buku'] : ''; ?>" required>
                    <label for="pengarang-buku">Nama Pengarang: </label>
                    <input type="text" name="pengarang-buku" id="pengarang-buku" value="<?= isset($_POST['pengarang-buku']) ? $_POST['pengarang-buku'] : ''; ?>" required>
                    <label for="th-rilis">Tahun Rilis:</label>
                    <input type="text" name="th-rilis" id="th-rilis" value="<?= isset($_POST['th-rilis']) ? $_POST['th-rilis'] : ''; ?>" required>
                    <label for="stok-buku">Stok Buku:</label>
                    <input type="number" name="stok-buku" id="stok-buku" value="<?= isset($_POST['stok-buku']) ? $_POST['stok-buku'] : ''; ?>" required>
                </div>
                <div class="div-intbh-agt">
                    <label for="foto">Foto Buku:</label>
                    <img id="img-agt" src="aset/gambar/icons8-book-94.png" height="256px" alt="">
                    <input onchange="showImg()" type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png" required>
                </div>
            </form>
            </form>
            <div class="div-submit-agt">
                <button form="form-agt" class="submit-tbh-agt" type="submit" name="tambah" value="TAMBAH" id="tambah-anggota">Tambah</button>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>