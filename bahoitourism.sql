-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 08:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bahoitourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `cekpesan`
--

CREATE TABLE `cekpesan` (
  `Id` int(11) NOT NULL,
  `tipepesanan` enum('hs','diving','wisata') NOT NULL,
  `Idpesanan` int(11) NOT NULL,
  `Iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diving`
--

CREATE TABLE `diving` (
  `Id` int(11) NOT NULL,
  `Alat` varchar(255) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Keterangan` text NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diving`
--

INSERT INTO `diving` (`Id`, `Alat`, `Harga`, `Jumlah`, `Keterangan`, `Status`, `Image`) VALUES
(1, 'Fullset Diving', 250000, 6, 'Jika barang yang anda pesan tidak sesuai, silahkan hubungi admin', '', 'fullsetdiving.png'),
(2, 'Fullset Snorkeling', 150000, 7, 'Jika barang yang anda pesan tidak sesuai, silahkan hubungi admin', '', 'fullsetsnorkeling.png'),
(3, 'BCD (Jacket)', 60000, 7, 'Jika barang yang anda pesan tidak sesuai, silahkan hubungi admin', '', 'Hotpot.png'),
(4, 'Pelampung', 50000, 7, 'Jika barang yang anda pesan tidak sesuai, silahkan hubungi admin', '', 'Pelampung.png'),
(5, 'Regulator', 60000, 7, 'Jika barang yang anda pesan tidak sesuai, silahkan hubungi admin', '', 'Regulator.png'),
(6, 'Boots', 50000, 7, 'Jika barang yang anda pesan tidak sesuai, silahkan hubungi admin', '', 'Boots.png'),
(7, 'Wetsuit', 50000, 7, 'Jika barang yang anda pesan tidak sesuai, silahkan hubungi admin', '', 'Wetsuit.png'),
(8, 'Snorkel & Mask', 100000, 7, 'Jika barang yang anda pesan tidak sesuai, silahkan hubungi admin', '', 'Hotpot2.png'),
(9, 'Fins', 50000, 7, 'Jika barang yang anda pesan tidak sesuai, silahkan hubungi admin', '', 'Fins.png');

-- --------------------------------------------------------

--
-- Table structure for table `homestay`
--

CREATE TABLE `homestay` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Foto1` text NOT NULL,
  `Foto2` text DEFAULT NULL,
  `Foto3` text DEFAULT NULL,
  `Pentik` text NOT NULL,
  `SnK` text NOT NULL,
  `Infotambahan` text NOT NULL,
  `Fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--bahoitourismv2
-- Dumping data for table `homestay`
--

INSERT INTO `homestay` (`Id`, `Nama`, `Harga`, `Foto1`, `Foto2`, `Foto3`, `Pentik`, `SnK`, `Infotambahan`, `Fasilitas`) VALUES
(1, 'Homestay Aget', 150000, 'Aget3.png', NULL, NULL, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(2, 'Homestay Jein', 150000, 'Jein2.png', 'Jein3.png', 'Jein4.png', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(3, 'Homestay Karisa', 150000, 'Karisa3.png', 'Karisa5.png', 'Karisa6.png', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(4, 'Homestay Marina', 150000, 'Marina2.png', 'Marina3.png', 'Marina4.png', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(5, 'Homestay Revi', 150000, 'Revi2.png', NULL, NULL, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(6, 'Homestay Sally', 150000, 'Sally3.png', 'Sally5.png', 'Sally4.png', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(7, 'Homestay Renata', 150000, 'Renata2.png', NULL, NULL, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(8, 'Homestay Defandro', 150000, 'Defandro2.png', 'Defandro3.png', NULL, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(9, 'Homestay Josua All', 150000, 'Josua2.png', NULL, NULL, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(10, 'Homestay Enjelo', 150000, 'Enjelo2.png', NULL, NULL, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>'),
(11, 'Homestay Amelia', 150000, 'Amelia2.png', NULL, NULL, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Lokasi: Rumah dari Jeceline Dalero, Bahoi Jaga III</li></ul>', '<h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">Umum</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Harga termasuk pajak.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Tiket yang sudah dibeli bisa dicancel apabila memenuhi persyaratan.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Pelanggan harus mengisi data pribadi dengan benar saat membuat booking. Jika data pribadi yang diberikan salah, maka e-tiket tidak akan dapat diterima.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Penjualan tiket dapat dimulai atau dihentikan kapan pun oleh bahoitourism dengan mengikuti kebijakan dari pengelola wisata.</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px 0px 0px 35px; font-size: medium; font-weight: bold; color: rgb(0, 0, 0); font-family: Arial, sans-serif;\">E-Tiket</h4><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">E-tiket tidak dapat ditukar dengan uang, baik sebagian maupun seluruhnya.</li></ul>', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 50px; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: medium;\"><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Akan dikenakan denda apabila merusak/membawa pulang barang dari homestay.</li><li style=\"margin: 0px 0px 5px; padding: 0px; font-size: 14px;\">Anak umur 3 tahun ke atas dihitung dewasa dalam pembayaran.</li></ul>', '<ul><li>Parkir</li><li>Sarapan</li><li>Toilet/Wc/Kamar Mandi</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `pesandiving`
--

CREATE TABLE `pesandiving` (
  `Id` int(11) NOT NULL,
  `Alat` varchar(255) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanhomestay`
--

CREATE TABLE `pesanhomestay` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Tanggal` date NOT NULL,
  `Total` int(11) NOT NULL,
  `Checkin` date NOT NULL,
  `Ischeckin` tinyint(1) NOT NULL,
  `Checkout` date NOT NULL,
  `Ischeckout` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanwisata`
--

CREATE TABLE `pesanwisata` (
  `Id` int(11) NOT NULL,
  `Tempat` varchar(255) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratinghomestay`
--

CREATE TABLE `ratinghomestay` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Rating` float NOT NULL,
  `Tanggal` date NOT NULL DEFAULT current_timestamp(),
  `Review` text DEFAULT NULL,
  `Idhomestay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratinghomestay`
--

INSERT INTO `ratinghomestay` (`Id`, `Username`, `Rating`, `Tanggal`, `Review`, `Idhomestay`) VALUES
(1, 'Jean', 2, '2024-08-11', 'Sudah cukup nyaman', 1),
(2, 'Julian', 3, '2024-08-11', 'bagus banget!!!', 1),
(3, 'Kafka', 3, '2024-08-11', 'sangat jelekk!', 1),
(4, 'Rara', 4.5, '2024-08-25', 'Wah bagus banget WC nya wc jongkok', 9),
(5, 'Jihan', 2.5, '2024-08-25', 'Cukup memuaskan', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ratingwisata`
--

CREATE TABLE `ratingwisata` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Nohp` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Tokenkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Email`, `Nohp`, `Password`, `Tokenkey`) VALUES
(11, 'Julia', 'allenvallen00@gmail.com', NULL, '$2y$10$DVQS4bOGxfuJKuxgHthemum6YR4e9xnDm3dkU8fQqMpZotU66Ki0G', 'a19567860188dceb7d392bfbd324ec8e'),
(12, 'Yelan', 'aryoodjanun11@gmail.com', NULL, '$2y$10$Omhu9bB8o.obrKPcUMRBI.yW.W.Cz7XWWCMRUleIV24rphXCvGrja', 'a64ed7dd153d53d9485b5d28be29dd9e'),
(13, 'Kenny', 'aryookumura@gmail.com', NULL, '$2y$10$KvLwAr7/K27JKdzb.o4Pv.Vbql250y.CCeb9Arvoe.Kald5UMR5k6', 'af57922c4762fd6e5d1ff1cc0c619eb3');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `Id` int(11) NOT NULL,
  `Tempat` varchar(255) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Foto1` text DEFAULT NULL,
  `Foto2` text DEFAULT NULL,
  `Foto3` text DEFAULT NULL,
  `Foto4` text DEFAULT NULL,
  `Foto5` text DEFAULT NULL,
  `Foto6` text DEFAULT NULL,
  `Foto7` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cekpesan`
--
ALTER TABLE `cekpesan`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `diving`
--
ALTER TABLE `diving`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `homestay`
--
ALTER TABLE `homestay`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pesandiving`
--
ALTER TABLE `pesandiving`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pesanhomestay`
--
ALTER TABLE `pesanhomestay`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pesanwisata`
--
ALTER TABLE `pesanwisata`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ratinghomestay`
--
ALTER TABLE `ratinghomestay`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ratingwisata`
--
ALTER TABLE `ratingwisata`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cekpesan`
--
ALTER TABLE `cekpesan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;
bahoitourismv2bahoitourismv2
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
bahoitourismv2