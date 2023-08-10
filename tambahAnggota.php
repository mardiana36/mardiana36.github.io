<?php
require 'functionphp.php';
cekLogin();
if(isset($_POST["tambah"])){
    $tableName = "anggota";
    $data = ['nama-anggota', 'alamat-anggota', 'gender','email-anggota','23070'];
    if(tambahAnggota($_POST, $tableName, $data) > 0 ){
        $query = "SELECT formatKode, kode FROM anggota ORDER BY kode DESC LIMIT 1";
        $result = mysqli_query($connection, $query);
        if($result){
            $row = mysqli_fetch_assoc($result);
            $formatKode = $row['formatKode'];
            $kode = $row['kode'];
            $kodeAnggota = $formatKode . $kode;
            echo "
            <script>
                alert('data berhasil ditambahkan. Dengan KODE ANGGOTA = [ ".$kodeAnggota." ]');
                document.location.href = 'dataAnggota.php';
            </script>    
        ";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        
    } else{
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
    <title>Tambah Anggota</title>
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
            <p class="p-tbh-agt">TAMBAH ANGGOTA</p>
                <form id="form-agt" class="form-tbh-agt" action="" method="post" enctype="multipart/form-data">
                    <div class="div-intbh-agt">
                        <label for="nama-anggota">Nama:</label>
                        <input type="text" name="nama-anggota" value="<?= isset($_POST['nama-anggota']) ? $_POST['nama-anggota'] : ''; ?>" id="nama-anggota" required >
                        <label for="email-anggota">Email: </label>
                        <input type="email" name="email-anggota" value="<?= isset($_POST['email-anggota']) ? $_POST['email-anggota'] : ''; ?>"  id="email-anggota" required>
                        <label for="alamat-anggota">Alamat:</label>
                        <input type="text" name="alamat-anggota" value="<?= isset($_POST['alamat-anggota']) ? $_POST['alamat-anggota'] : ''; ?>"  id="alamat-anggota" required>
                        <p>Jenis Kelamin:</p>
                        <input class="input-gender-agt" type="radio" name="gender" value="1" <?= (isset($_POST['gender']) && $_POST['gender'] === '1') ? 'checked' : ''; ?> id="pria" required>
                        <label class="label-gender-agt" for="pria">Pria</label> <br>
                        <input class="input-gender-agt" type="radio" name="gender" value="0" <?= (isset($_POST['gender']) && $_POST['gender'] === '0') ? 'checked' : ''; ?> id="wanita" required>
                        <label  class="label-gender-agt" for="wanita">Wanita</label>
                    </div>
                    <div class="div-intbh-agt">
                        <label for="foto">Foto Profil:</label>
                        <img id="img-agt" src="aset/gambar/daily-user-icon-2.png" alt="">
                        <input onchange="showImg()" type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png" required>
                    </div>
                </form>
                <div class="div-submit-agt">
                    <button  form="form-agt" class="submit-tbh-agt" type="submit" name="tambah" value="TAMBAH" id="tambah-anggota">Tambah</button>
                </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>