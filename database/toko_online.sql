-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql309.epizy.com
-- Generation Time: Jun 13, 2022 at 01:13 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31923708_toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `nama`, `nilai`) VALUES
(1, 'logo', 'logo-20220611133500.png'),
(2, 'tujuan rekening', 'BCA\n01202012\na.n. XX');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_pemesanan` varchar(100) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `jumlah_pembayaran` double NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_customer`, `nama_pemesanan`, `alamat_pengiriman`, `jumlah_pembayaran`, `bukti_pembayaran`, `keterangan`, `created`) VALUES
(1, 1, 'budii', '                                                                        jln sini2                                                               ', 535000, 'pembayaran-1-20220612001732.png', 'tolong kirim secepatnya', '2022-06-11 17:17:32'),
(2, 1, 'admin', 'jln jln', 484000, '', '-', '2022-06-11 16:07:33'),
(3, 2, 'cynthia', '                                                                        jln haha 122, kodepos 67665                                                                ', 470000, 'pembayaran-3-20220613223731.jpg', 'hoodie spektakulernya warna hitam L', '2022-06-13 15:35:24'),
(4, 3, 'dummy', 'jln dummy 11, JAKSEL', 295000, '', '-', '2022-06-13 15:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_produk`, `jumlah`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 1),
(3, 2, 3, 1),
(4, 2, 2, 1),
(5, 3, 5, 1),
(6, 3, 1, 1),
(7, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(200) NOT NULL,
  `stok` double NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL COMMENT '0 = nonactive; 1 = active',
  `keterangan` text NOT NULL COMMENT 'deskripsi produk',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `foto`, `stok`, `status`, `keterangan`, `created`, `updated`) VALUES
(1, 'Hoodie IM Possible', 240000, 'Produk-1-20220611105310.jpg', 100, 1, '                                    Sudah menggunakan bahan Fleece, tidak terlalu tebal dan juga tidak terlalu tipis sehingga sangat cocok dan nyaman digunakan di iklim tropis Indonesia                                ', '2022-06-11 01:13:04', '2022-06-11 02:53:10'),
(2, 'Kaos MerryForTees', 295000, 'Produk-2-20220611104350.jpg', 325, 1, 'Cotton, Denim                                ', '2022-06-11 01:20:00', '2022-06-11 02:43:50'),
(3, 'PRIMERRY 2 TEES CROWN', 189000, 'Produk-3-20220611134107.jpg', 0, 1, '                               Round Neck                                     ', '2022-06-11 05:41:07', '2022-06-11 06:41:07'),
(4, 'PRIMERRY 2 TEES STRIPS', 295000, 'Produk-4-20220612002211.jpg', 5, 1, '                                    hitam                                                              ', '2022-06-11 16:22:11', '2022-06-11 16:22:21'),
(5, 'Hoodie IM POSSIBLE Spektakuler Merry Riana', 230000, 'Produk-5-20220613220744.jpg', 884, 1, 'Bahan dasar FLEECE yang berkualitas (adem, halus) serta dengan jahitan yang rapi                                       ', '2022-06-14 02:07:44', '2022-06-13 15:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` varchar(10) NOT NULL COMMENT 'admin/customer',
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `tipe`, `email`, `no_hp`, `alamat`, `created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'customer', 'xx@gmail.com', '081112', 'jln jln', '2022-06-10 13:10:35'),
(2, 'cboo', '21232f297a57a5a743894a0e4a801fc3', 'cynthia', 'customer', 'xx@gmail.com', '', '', '2022-06-12 01:46:05'),
(3, 'dummy', '202cb962ac59075b964b07152d234b70', 'dummy', 'customer', 'dummy@gmail.com', '0812121212', 'jln dummy 11, JAKSEL', '2022-06-14 02:38:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
