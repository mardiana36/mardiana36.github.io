<script src="script.js"></script>
<nav class="nav-dashboard" id="nav-ds">
    <div>
        <div class="div-drop">
            <input type="checkbox" checked  name="togel" id="togel">
            <label for="togel" id="icon-menu"><img src="aset/gambar/icons8-menu-78.png" alt=""></label>
            <label for="togel" id="icon-drop"><img src="aset/gambar/icons8-downward-64.png" alt=""></label>
            <label for="togel">MENU</label>
            <div class="menu-drop" id="menu">
                <ul class="list">
                    <li <?= isset($activePage) && $activePage === 'dashboard' ? 'class="active"' : ''; ?>>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li <?= isset($activePage) && $activePage === 'dataAnggota' ? 'class="active"' : ''; ?>>
                        <a href="dataAnggota.php">Data Anggota</a>
                    </li>
                    <li <?= isset($activePage) && $activePage === 'dataBuku' ? 'class="active"' : ''; ?>>
                        <a href="dataBuku.php">Data Buku</a>
                    </li>
                    <li <?= isset($activePage) && $activePage === 'pinjamKembalikan' ? 'class="active"' : ''; ?>>
                        <a href="pinjamDanKembalikan.php">Pinjam / Kembalikan </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="li-nav logo-dashboard" id="logo"><a href="">PERPUSTAKAAN</a></div>
        <div class="logout"><a href="logout.php" onclick="return confirm('Apakah yakin anda ingin LOGOUT?')"><img src="aset/gambar/Logo_Perpustakaan_4.png" alt=""></a></div>
    </div>
</nav>