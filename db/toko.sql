-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Okt 2019 pada 13.51
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `user` varchar(44) NOT NULL,
  `pass` varchar(44) NOT NULL,
  `nama` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `user`, `pass`, `nama`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'fadil', 'fadil', 'fadil');
(3, 'rizqi', 'rizqi', 'rizqi');
-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(77) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Lumajang', 10000),
(2, 'Surabaya', 11000),
(3, 'Jember', 11500),
(4, 'Jogja', 13000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(55) NOT NULL,
  `pass_pelanggan` varchar(55) NOT NULL,
  `nama_pelanggan` varchar(55) NOT NULL,
  `telepon_pelanggan` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `pass_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'muha@gmail.com', 'muha06', 'muuha', '081515649469'),
(2, 'panji@gmail.com', 'panji06', 'panji', '089670420690');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(3, 62, 'adi', 'BNI', 66666, '2008-02-19', '20190208111709scanner_20190123_172352.jpg'),
(4, 63, 'adi', 'BNI', 2434242, '2008-02-19', '20190208111754scanner_20190126_194125.jpg'),
(5, 64, 'adi', 'BNI', 54534534, '2008-02-19', '20190208111920scanner_20190126_194125.jpg'),
(6, 65, 'maul', 'bni', 1, '2020-03-19', '20190320063035aa.jpg'),
(7, 66, 'mama', 'bni', 1, '2020-03-19', '20190320063102aa.jpg'),
(8, 70, 'adi', 'BNI', 270000, '2020-03-19', '20190320082826aa.jpg'),
(9, 71, 'maul', 'BNI', 130000, '2021-03-19', '20190321041549ajax-loader.gif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pembelian` text NOT NULL,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `alamat_pembelian`, `status_pembelian`, `resi_pengiriman`) VALUES
(72, 2, 4, '2019-10-22', 96000, 'sumobito', 'pending', ''),
(73, 2, 1, '2019-10-22', 20000, 'sasas', 'pending', ''),
(74, 2, 1, '2019-10-22', 20000, 'jkjkjk', 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(99, 72, 25, 1, 'Bibit Cabe Merah', 10000, 0, 0, 10000),
(100, 72, 26, 1, 'Bibit Cabe Rawit', 8000, 0, 0, 8000),
(101, 72, 27, 1, 'Bibit Terong belanda', 15000, 0, 0, 15000),
(102, 72, 35, 1, 'Pupuk Kandang', 25000, 0, 0, 25000),
(103, 72, 34, 1, 'Pupuk Cair', 25000, 0, 0, 25000),
(104, 73, 25, 1, 'Bibit Cabe Merah', 10000, 0, 0, 10000),
(105, 74, 25, 1, 'Bibit Cabe Merah', 10000, 0, 0, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(55) NOT NULL,
  `harga_produk` varchar(22) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(22) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(25, 'Bibit Cabe Merah', '10000', 0, 'cabe merah.jpg', ' 			Bibit Cabe Merah Organik 		', 97),
(26, 'Bibit Cabe Rawit', '8000', 0, 'cabe rawit.jpg', ' 			Bibit Cabe Rawit Organik 		', 99),
(27, 'Bibit Terong belanda', '15000', 0, 'terong belanda.jpg', ' 			Bibit Terong Belanda Organik 		', 99),
(28, 'Bibit Terong Ungu', '13000', 0, 'terong ungu.jpg', ' 			Bibit Terong Ungu Organik 		', 100),
(29, 'Bibit tomat', '10000', 0, 'tomat.jpg', ' 			Bibit Tomat Organik 		', 100),
(30, 'Bibit Jeruk Nipis', '15000', 0, 'jeruk nipis.jpg', ' 			Bibit Jeruk Nipis Organik 		', 100),
(31, 'Bibit Jambu Air', '20000', 0, 'jambu air.jpg', ' 			Bibit Jambu Air Organik 		', 100),
(32, 'Bibit Jambu Merah', '20000', 0, 'jambu merah.jpg', ' 			Bibit Jambu merah Organik 		', 100),
(33, 'Bibit Mangga', '20000', 0, 'mangga.jpg', ' 			Bibit Mangga Organik 		', 100),
(34, 'Pupuk Cair', '25000', 0, 'organik cair.jpg', ' 			Pupuk Organik Cair 		', 149),
(35, 'Pupuk Kandang', '25000', 0, 'pupuk kandang.jpg', ' 			Pupuk Kandang 		', 149),
(36, 'Pupuk Granul', '25000', 0, 'pupuk organik granul.j', ' 			Pupuk Organik Granul 		', 50);

--
-- Indexes for dumped tables
--
CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `teks_berita` text NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `id_admin` int(11) NOT NULL,
  `dilihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'pertanian'),
(2, 'perkebunan'),
(3, 'perikanan');
--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
