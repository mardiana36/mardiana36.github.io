<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
    <script src="script.js"></script>
</head>

<body>
    <nav class="container-nav">
        <ul class="ul-nav">
            <li id="logo" class="li-nav">PERPUSTAKAAN</li>
            <button class="login-nav li-nav"> <a href="login.php">LOGIN</a> </button>
        </ul>
    </nav>
    <div class="container-content">
        <div>
            <div class="content-home-1">
                <div class="gambar-samping">
                    <img src="aset/gambar/kucing-baca.png" alt="">
                </div>
                <div class="content-dlm">
                    <img onclick="fokusForm()" src="aset/gambar/orang-nunjuk.png" alt="">
                    <form action="" id = "cari-buku">
                        <input type="search" name="search" id="search" placeholder="Judul Buku...">
                    </form>
                    <p>Buku adalah gerbang dunia dan membaca adalah kuncinya</p>
                </div>
                <div class="gambar-samping">
                    <img src="aset/gambar/tumpukan-buku.png" alt="">
                </div>
            </div>
            <!-- mengabil dari gambar data base rencananya-->
            <div class="content-home-2">
                <div><img src="aset/gambar/buku.jpg" alt=""></div>
                <div><img src="aset/gambar/buku.jpg" alt=""></div>
                <div><img src="aset/gambar/buku.jpg" alt=""></div>
                <div><img src="aset/gambar/buku.jpg" alt=""></div>
                <div><img src="aset/gambar/buku.jpg" alt=""></div>
            </div>
        </div>
    </div>
    <div class="footer">
    <footer class="footer-home">
        <p>Copyright PGR06</p>
    </footer>
</div>
</body>

</html>