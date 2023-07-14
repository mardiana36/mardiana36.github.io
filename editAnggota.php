<?php
require 'functionphp.php';
cekLogin();
$kode = $_GET["kode"];
$query = "SELECT * FROM anggota WHERE kode = $kode";
$result = mysqli_query($connection, $query);
$row;
if($result){
    $row = mysqli_fetch_assoc($result);
}else{
    echo "Error: " . mysqli_error($connection);
}

if(isset($_POST['submit'])){
    $tableName = "anggota";
    $data = ['nama-anggota','alamat-anggota','gender','email-anggota'];
    $colTable = ['nama','alamat','gender','email'];
    if(edit($_POST,$tableName,$data,$colTable) > 0 ){
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'dataAnggota.php';
            </script>    
        ";
    } else{
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'editAnggota.php?kode=$kode';
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
    <title>Edit Anggota</title>
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
            <p class="p-tbh-agt">EDIT ANGGOTA</p>
                <form id="form-agt" class="form-tbh-agt" action="" method="post" enctype="multipart/form-data">
                    <div class="div-intbh-agt">
                        <input type="hidden" name="kode" value="<?= $row["kode"];?>">
                        <input type="hidden" name="gambarLama" value="<?= $row["foto"];?>">
                        <label for="nama-anggota">Nama:</label>
                        <input type="text" name="nama-anggota" id="nama-anggota" value="<?= $row["nama"]; ?>" required >
                        <label for="email-anggota">Email: </label>
                        <input type="email" name="email-anggota" id="email-anggota"  value="<?= $row["email"]; ?>" required>
                        <label for="alamat-anggota">Alamat:</label>
                        <input type="text" name="alamat-anggota" id="alamat-anggota"  value="<?= $row["alamat"]; ?>" required>
                        <p>Jenis Kelamin:</p>
                        <?php
                         $gender = $row["gender"];
                         $pria = ($gender == 1) ? 'checked'  : '';
                         $wanita = ($gender == 0) ? 'checked' : '';                     
                        ?>
                        <input class="input-gender-agt" type="radio" name="gender" value="1" <?= $pria; ?> id="pria" required>
                        <label class="label-gender-agt" for="pria">Pria</label> <br>
                        <input class="input-gender-agt" type="radio" name="gender" value="0" <?= $wanita; ?> id="wanita" required>
                        <label  class="label-gender-agt" for="wanita">Wanita</label>
                    </div>
                    <div class="div-intbh-agt">
                        <label for="foto">Foto Profil:</label>
                        <img id="img-agt" src="aset/gambar/database/<?= $row["foto"]; ?>" height="256px" alt="">
                        <input onchange="showImg()" type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png">
                    </div>
                </form>
                <div class="div-submit-agt">
                    <button  class="submit-tbh-agt" form="form-agt" type="submit" name="submit" id="tambah-anggota"> SIMPAN </button>
                </div>
        </div>
    </main>
</body>
</html>