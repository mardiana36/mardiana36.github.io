-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Agu 2023 pada 01.49
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progress`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `foto` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(191) NOT NULL,
  `formatKode` varchar(5) NOT NULL,
  `kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`foto`, `nama`, `alamat`, `gender`, `email`, `formatKode`, `kode`) VALUES
('64d334fae69bb.png', 'Ahmad Malik', 'Jl. Harmoni 5A, Kota Megah, Provinsi Sentosa', 1, 'ahmad.malik@emailcontoh.com', '23070', 4),
('64d335c4ddd05.png', 'Nurul Aisyah', 'Jl. Mawar 17, Kota Damai, Provinsi Bahagia', 0, 'nurul.aisyah@emailcontoh.com', '23070', 5),
('64d335eb3a15d.png', 'Budi Santoso', ' Jl. Teratai 8B, Kota Indah, Provinsi Makmur', 1, 'budi.santoso@emailcontoh.com', '23070', 7),
('64d3361dca1aa.png', 'Siti Rahayu', 'Jl. Anggrek 23, Kota Sejati, Provinsi Ceria', 0, 'siti.rahayu@emailcontoh.com', '23070', 8),
('64d33649c2e26.png', 'Eko Wijaya', 'Jl. Cendana 12, Kota Bahagia, Provinsi Makmur', 1, 'eko.wijaya@emailcontoh.com', '23070', 9),
('64d336b418b97.png', 'Indah Sari', 'Jl. Melati 6C, Kota Harmoni, Provinsi Sejahtera', 0, 'indah.sari@emailcontoh.com', '23070', 10),
('64d336dfdcb32.png', 'joko sutejo', 'Jl. Anggrek 23, Kota Sejati, Provinsi Ceria', 1, 'joko.sutejo@gmail.com', '23070', 11),
('64d337354b760.png', 'I wanyan nengah pramana', 'Jl. Melati 6C, Kota Harmoni, Provinsi Sejahtera', 1, 'nengah23@gmail.com', '23070', 12),
('64d33774aedac.png', 'supriadi yanto', 'Jl. Mawar 17, Kota Damai, Provinsi Bahagia', 1, 'supri@gmail.com', '23070', 13),
('64d3379c76d46.png', 'sumato atmajo ', 'Jl. Melati 6C, Kota Harmoni, Provinsi Sejahtera', 1, 'sumanto@gmail.com', '23070', 16),
('64d337b72e787.png', 'sang putu mardiana', 'Jln.Kresna Keliki,Tegallalang,Gianyar, Bali', 1, 'putumrda34@gmail.com', '23070', 17),
('64d337e2bda2b.png', 'gusti ayu devi maha dewi', 'Jl. Melati 6C, Kota Harmoni, Provinsi Sejahtera', 0, 'devi@gmail.com', '23070', 19),
('64d337f3f41d4.png', 'jokowidodo', 'jln.ketupang no.03 kupang nusa tenggara timur', 1, 'jokowi@gmail.com', '23070', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `foto` varchar(200) NOT NULL,
  `judul` varchar(191) NOT NULL,
  `namaP` varchar(200) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `stok` int(200) NOT NULL,
  `formatKode` varchar(5) NOT NULL,
  `kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`foto`, `judul`, `namaP`, `tahun`, `stok`, `formatKode`, `kode`) VALUES
('64d3134f49947.jpg', 'To Kill a Mockingbird', 'Harper Lee', '1960', 12, '22110', 2),
('64d3140030fef.jpg', 'The Great Gatsby', 'F. Scott Fitzgerald', '1925', 5, '22110', 3),
('64d3146e30841.jpg', 'Pride and Prejudice', 'Jane Austen', '1813', 3, '22110', 4),
('64d314ef883ae.jpg', 'Laskar Pelangi', 'Andrea Hirata', '2005', 10, '22110', 5),
('64d315b9cf263.jpg', 'Anak Semua Bangsa', 'Pramoedya Ananta Toer', '1980', 8, '22110', 6),
('64d316bac7252.jpg', 'Pulang', 'tere liye', '2015', 3, '22110', 7),
('64d317c86c4fb.jpeg', 'Mantappu jiwa', 'Jerome Polin Sijabat', '2019', 6, '22110', 8),
('64d3186d2f507.jpeg', 'Kunci Kesuksesan', 'Eric Kanadi', '2020', 12, '22110', 9),
('64d318d214c5f.jpeg', 'Rahasia Sukses Toko Tionghoa', 'Istijanto Oei', '2008', 3, '22110', 10),
('64d31970537b1.jpeg', 'Dilan', 'Pidi Baiq', '2015', 15, '22110', 11),
('64d319f099ef8.jpeg', 'Badai Pasti Berlalu - CU format baru', 'Marga T', '2021', 4, '22110', 12),
('64d31bbe088c1.jpeg', 'Buku Pintar Percakapan Bahasa Inggris Sehari-hari ', 'Silvester Goridur Sukur', '2013', 9, '22110', 13),
('64d31c6899faa.jpeg', 'Lebih Senyap dari Bisikan', ' Andina Dwifatma', '2021', 5, '22110', 14),
('64d31d8258d0e.jpg', 'Ensiklopedia Anak Cerdas : Olahraga', 'Maincent, Geraldine', '2019', 8, '22110', 15),
('64d31e69a00a3.jpeg', 'Solusi sehat mengatasi asam urat dan rematik', 'AgroMedia Pustaka', '2021', 4, '22110', 16),
('64d31f6f742ca.jpeg', 'Enampuluh menu sehat minim minyak', 'J. Edward', '2021', 8, '22110', 17),
('64d3293986515.jpeg', 'Media Pembelajaran Buku Bacaan Wajib Dosen, Guru dan Calon Pendidik', ' Rudy Sumiharsono, Hisbiyatul Hasanah', '2017', 7, '22110', 18),
('64d329f69dbdc.jpeg', 'Building Personal Brand Equity', 'Antoni Ludfi Arifin,Sari Rahma', '2015', 12, '22110', 19),
('64d32a7da01e1.jpeg', 'Atlas binatang: Mamalia', 'Genevieve De Becker, Rosana Hariyanti', '2007', 4, '22110', 20),
('64d32aece9e68.jpeg', 'Sejarah Dunia yang Disembunyikan', ' Jonathan Black', '2015', 3, '22110', 21),
('64d32bdaadfce.png', 'Pengantar Pendidikan Abad 21', 'Mansyur M La Ode Kaimudin', '2022', 4, '22110', 22),
('64d32c96d8ff8.jpg', 'Fur Immer Dein Ian', 'Kawah Media Pustaka Pt', '2022', 6, '22110', 23),
('64d32d02626ff.jpg', 'Negara dan Agama Edisi Ketiga', ' Reka Cipta', '2023', 2, '22110', 24),
('64d32d5233c12.jpg', 'Bioetika Edisi Ketiga', 'Buku Kompas', '2022', 4, '22110', 25),
('64d32db587946.jpg', 'Metode Penelitian Bahasa Edisi Ketiga', 'RajaGrafindo Persada', '2017', 7, '22110', 26),
('64d32e3a91876.jpg', 'Kyai Tapa', 'CV Geger Sunten', '2022', 6, '22110', 27),
('64d32ec3107b2.jpg', 'Buku Pintar Akuntansi Dasar', 'Anak Hebat Indonesia', '2023', 2, '22110', 28),
('64d32f28e8885.jpg', 'The Leadership Tricks', 'Ayu R. Noviandaru', '2023', 15, '22110', 29),
('64d3303d3eb3a.jpg', 'Harry Potter And The Sorcerers Stone', 'J.K. Rowling', '2001', 7, '22110', 30),
('64d330f4c7a3d.jpg', 'The Power of Habit', ' Charles Duhigg', '2012', 4, '22110', 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `loginadmin`
--

CREATE TABLE `loginadmin` (
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `loginadmin`
--

INSERT INTO `loginadmin` (`email`, `password`) VALUES
('admin@gmail.com', '$2y$10$zpjtGlMTFtOC3ABVBqIBqepd9qdJwyKUwtA1IFPDcKO9B0OSJz8ES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjamkem`
--

CREATE TABLE `pinjamkem` (
  `idP` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tglPinjam` date NOT NULL,
  `tglKembali` date NOT NULL,
  `statusP` enum('Dalam Proses','Melewati Batas','Dikembalikan') NOT NULL,
  `kodeA` int(200) NOT NULL,
  `kodeB` int(200) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjamkem`
--

INSERT INTO `pinjamkem` (`idP`, `nama`, `judul`, `tglPinjam`, `tglKembali`, `statusP`, `kodeA`, `kodeB`, `tgl`) VALUES
(39, 'Ahmad Malik', 'Laskar Pelangi', '2023-07-09', '2023-08-09', 'Dikembalikan', 4, 5, '2023-08-09'),
(40, 'Siti Rahayu', 'Dilan', '2023-07-19', '2023-08-06', 'Melewati Batas', 8, 11, '0000-00-00'),
(41, 'Nurul Aisyah', 'The Great Gatsby', '2023-08-09', '2023-08-14', 'Dalam Proses', 5, 3, '0000-00-00'),
(42, 'sang putu mardiana', 'Mantappu jiwa', '2023-08-09', '2023-09-09', 'Dalam Proses', 17, 8, '0000-00-00'),
(43, 'gusti ayu devi maha dewi', 'Kunci Kesuksesan', '2023-06-06', '2023-07-06', 'Dikembalikan', 19, 9, '2023-08-09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `pinjamkem`
--
ALTER TABLE `pinjamkem`
  ADD PRIMARY KEY (`idP`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pinjamkem`
--
ALTER TABLE `pinjamkem`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
