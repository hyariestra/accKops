-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 05:46 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `level`, `nama`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ADMIN'),
(2, 'kasir@gmail.com', 'kasir', 'kasir', 'kasirrr');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE `halamanstatis` (
  `id_halaman` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `isi`, `gambar`) VALUES
(1, 'Cara Pembelian', '<p>1. Lakukan Pendaftaran sebelum melakukan pembelian, lalu login dengan menggunakan alamat email dan password yang telah digunakan untuk mendaftar</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/1.JPG\" style=\"height:154px; width:600px\" /></p>\r\n\r\n<p>2. Pilih produk yang ingin dibeli lalu masukan jumlah yang ingin dibeli lalu klik beli</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/2.JPG\" style=\"height:262px; width:534px\" /></p>\r\n\r\n<p>3. Klik lanjtkan belanja jika ingin berbelanja lagi dan klik&nbsp;Checkout untuk melanjutkan ke proses&nbsp;checkout</p>\r\n\r\n<p>&nbsp;<img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/3.JPG\" style=\"height:170px; width:589px\" /></p>\r\n\r\n<p>4. Pada halaman Checkout pilih kota, ekspedisi dan paket ekspedisi yang diinginkan, maka secara otomatis sistem akan menghitung jumlah pembayaran yang harus kamu bayar</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/4.JPG\" style=\"height:200px; width:594px\" /></p>\r\n\r\n<p>5. Masukan Alamat lengkap kamu lalu klik selesai belanja untuk melanjutkan ke proses pembayaran</p>\r\n\r\n<p>&nbsp;<img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/5.JPG\" style=\"height:127px; width:578px\" /></p>\r\n\r\n<p>6. Lakukan pembayaran dengan jumlah&nbsp;nominal yang telah ditetapkan ke Rekening bank yang sudah tertera di Nota, lalu&nbsp;klik Kirim Bukti Pembayaran</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/6.JPG\" style=\"height:285px; width:585px\" /></p>\r\n\r\n<p>7. Masukan tanggal pembayaran, nama kamu, Bank yang kamu gunakan saat melakukan pembayaran dan jumlah pembayaran serta upload bukti pembayaran yang telah kamu lakukan, lalu klik Kirim</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/7.JPG\" style=\"height:257px; width:590px\" /></p>\r\n\r\n<p>8. Jika sudah maka status pembelian anda kamu akan menjadi Sudah Konfirmasi</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/8(1).JPG\" style=\"height:32px; width:602px\" /></p>\r\n\r\n<p>9. Selajutnya pihak Moiroep akan melakukan pengecekan,&nbsp;jika pengecekan sudah sesuai status pembelian kamu akan berubah menjadi Lunas<img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/9.JPG\" style=\"height:35px; width:601px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', ''),
(4, 'Payment Methods', '<p>Payment can be made only&nbsp;Bank (Mandri) Transfer to the following:</p>\r\n\r\n<p>Mandiri acc: 7880-7505-04<br />\r\na/n Abrid<br />\r\nCabang: Yogyakarta</p>\r\n\r\n<p>&nbsp;</p>\r\n', ''),
(5, 'Tentang Kami', '<h4><strong><span style=\"color:#FFD700\">Tentang Moeroep Sticker</span></strong></h4>\r\n\r\n<p>Toko Moeroep Sticker&nbsp;merupakan sebuah usaha sticker yang dijalankan sejak tahun 2006 oleh pemilik toko, yang berawal dari sebuah hobi menggambar dan mendesain gambar dan akhirnya memutuskan untuk membuat sebuah usaha penjualan sticker.<br />\r\n<br />\r\n<strong><span style=\"color:#FFFF00\">concact us :</span></strong><br />\r\n0857 2966 1551 (telp/WA avaible)<br />\r\nJln. Plumbon, Banguntapan No 287, Bantul, DIY<br />\r\n<img alt=\"\" class=\"img-responsive\" src=\"http://localhost/trainit_ayud/aplikasi_2/assets/upload/images/save.jpg\" style=\"float:left\" /></p>\r\n', ''),
(6, 'Batas Konfirmasi Pembayaran', 'Batas Konfirmasi Pembayaran adalah H+1 setelah Pelanggan melakukan proses Checkout<br />\r\nJika sudah jatuh, maka Pelanggan tidak dapat melakukan dan harus mengulang kembali proses pembelian barang<br />\r\n<img alt=\"\" src=\"http://localhost/trainit_ayud/aplikasi_2/assets/upload/images/bukti.jpg\" style=\"height:431px; width:1141px\" /><br />\r\nGambar di atas adalah gambar ketika pelanggan telat melakukan konfirmasi pembayaran karena jatuh tempo, yang mana link bukti pembayaran telah hilang&nbsp;', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `gambar_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(8, 'Stikcer motor vario', ''),
(9, 'Stikcer Motor NMAX', ''),
(10, 'Stikcer mobil ayla', ''),
(11, 'Aksesoris Knalpot', ''),
(12, 'Stikcer mobil Satria FU', ''),
(13, 'Stikcer mobil Honda Jazz', ''),
(14, 'dsdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_komentar` datetime NOT NULL,
  `isi_komentar` text NOT NULL,
  `balas_komentar` text NOT NULL,
  `status_komentar` enum('draft','published') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_pelanggan`, `id_produk`, `tanggal_komentar`, `isi_komentar`, `balas_komentar`, `status_komentar`) VALUES
(1, 1, 47, '2016-07-19 00:00:00', 'dasdsadsa', 'hoo', 'published'),
(2, 13, 68, '2016-08-10 00:00:00', 'sdadsadsad', 'csdsfse', 'published'),
(3, 11, 68, '2016-08-10 00:00:00', 'dasdsadasdsa', '', 'published'),
(4, 7, 68, '2016-08-13 00:00:00', 'dsadsadsa', '', 'published'),
(5, 13, 69, '2016-08-15 10:28:55', 'dsadsa', '', 'draft'),
(6, 13, 69, '2016-08-15 10:29:08', 'tes komentar\r\n', '', 'published'),
(7, 13, 69, '2016-08-15 10:30:03', 'as', '', 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telepon_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'riswan', 'riswan@gmail.com', 'admin', '<p>ds</p>\r\n', '09877711'),
(19, 'sa', 'yudha@gmail.com', 'd0018664b0de22d7da3c330cafa2bba18cc47580', '-', 'dsa'),
(20, 'sdda', 'ggg@gmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '-', 'kk');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(225) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nama_pembayaran` varchar(100) NOT NULL,
  `bank_pembayaran` varchar(100) NOT NULL,
  `jumlah_pembayaran` int(20) NOT NULL,
  `bukti_pembayaran` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_pembelian` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_batas_bayar` date NOT NULL,
  `total_pembelian` int(20) NOT NULL,
  `biaya_pengiriman` int(20) NOT NULL,
  `total_bayar` int(20) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `ekspedisi` varchar(50) NOT NULL,
  `paket_ekspedisi` varchar(50) NOT NULL,
  `waktu_tempuh` varchar(50) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL,
  `pembayaran` int(20) NOT NULL,
  `resi_pengiriman` varchar(100) NOT NULL,
  `potongan_diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_beli` varchar(100) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `berat_beli` int(20) NOT NULL,
  `jumlah_beli` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `kolom` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `kolom`, `isi`) VALUES
(1, 'judul_seo', 'Moerop Sticker - Aksesoris Motor'),
(2, 'keyword', 'Sticker Motor Moeroep'),
(3, 'nama_web', 'Koperasi UMY'),
(4, 'tagline', 'kerajinan sticker '),
(5, 'alamat_usaha', 'Jln, Jendral Sudirman, no.139 tidar selatan, magelang selatan, kota magelang, jawa tengah'),
(6, 'telepon_usaha', '082199636311'),
(7, 'email_usaha', 'moeroepsticker@gmail.com'),
(8, 'tentang_footer', 'desain sticker'),
(9, 'nama_usaha', 'Koperasi UMY'),
(10, 'rek_usaha', 'Mandiri acc: 7880-7505-04<br />\r\nRiswan Afandy<br />\r\nCabang: Magelang'),
(11, 'logo_web', '<img alt=\"\" class=\"img-responsive\" src=\"http://localhost/trainit_ayud/aplikasi/assets/upload/images/Untitled-1(1).png\" style=\"height:147px; margin-left:40px; margin-right:40px; width:150px\" />'),
(12, 'ig', 'moeroep');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `tanggal_produk` datetime NOT NULL,
  `keterangan_produk` text NOT NULL,
  `gambar_produk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `kode_produk`, `nama_produk`, `stok_produk`, `harga_produk`, `berat_produk`, `tanggal_produk`, `keterangan_produk`, `gambar_produk`) VALUES
(85, 8, 'STV001', 'Sticker motor vario full body', 12, 40000, 1, '2017-10-03 22:12:58', 'sticker motor vario full body', '351358_6a242281-300d-4e0a-899f-3d8cee2c2715.jpg'),
(86, 11, 'AK001', 'knalpot racing', 2, 90000, 1, '2017-10-03 22:18:12', 'knalpot racing', 'Knalpot-HRP.jpg'),
(87, 10, 'SM001', 'Sticker mobil ayla', 5, 120000, 100, '2017-10-05 01:10:22', 'sticker motor ayla&nbsp;', 'Stiker_Mobil_Agya_Ayla.jpg'),
(88, 12, 'SM002', 'Sticker motor  satria FU kuning', 10, 40000, 200, '2017-10-05 01:12:18', 'sticker motor satria FU kuning', 'striping-satria-new-gray.jpg'),
(89, 11, 'AK002', 'Aksesoris knalpot', 2, 12000, 100, '2017-10-05 01:13:36', 'aksesoris knalpot', 'racing-CLD.jpg'),
(90, 11, 'AK002', 'Aksesoris knalpot', 2, 12000, 100, '2017-10-05 01:13:36', 'aksesoris knalpot', 'racing-CLD.jpg'),
(91, 13, 'SMHND01', 'Sticker Mobil Honda jazz', 12, 10000, 200, '2017-10-05 20:23:20', 'sticker mobil honda jazz', 'pic1-inside-Modifikasi_Virtual_Honda_All_New_Jazz.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `judul_slider` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar_slider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul_slider`, `isi`, `gambar_slider`) VALUES
(0, 'We Are Moeroep', '', 'moeroep.jpg'),
(1, 'New Product Arrival', 'Siap siap kedatangan product baru di bulan Oktober', '479120_1735acc2-a547-4075-aa4f-54ed49c5debc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `kode_voucher` varchar(100) NOT NULL,
  `nominal_voucher` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

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
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`kode_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  MODIFY `id_halaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
