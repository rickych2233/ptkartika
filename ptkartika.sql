-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 09:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptkartika`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kodebarang` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namabarang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodekategoribarang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodebarang`, `namabarang`, `kodekategoribarang`, `satuan`, `stok`, `harga`, `status`) VALUES
('B001', 'SIRUP LECI', 'KB001', 'BOTOL', 20, 25000, 'AKTIF'),
('B002', 'SIRUP JERUK', 'KB001', 'BOTOL', 23, 26000, 'AKTIF'),
('B003', 'SIRUP KOPI', 'KB001', 'BOTOL', 30, 21000, 'AKTIF'),
('B004', 'SIRUP KAWISTO', 'KB001', 'BOTOL', 15, 21500, 'AKTIF'),
('B005', 'SIRUP MELON', 'KB001', 'BOTOL', 10, 16500, 'AKTIF'),
('B006', 'SIRUP VANILI', 'KB001', 'BOTOL', 17, 30000, 'AKTIF'),
('B007', 'SIRUP MAWAR', 'KB001', 'BOTOL', 8, 1400, 'AKTIF'),
('B008', 'SIRUP COCOPANDAN', 'KB001', 'BOTOL', 5, 19000, 'AKTIF'),
('B009', 'SIRUP PISANG SUSU', 'KB001', 'BOTOL', 8, 18000, 'AKTIF'),
('B010', 'SIRUP ROS', 'KB001', 'BOTOL', 18, 16000, 'AKTIF'),
('B011', 'SIRUP MOKA', 'KB001', 'BOTOL', 12, 18500, 'AKTIF'),
('B012', 'SIRUP FRAMBOZEN', 'KB001', 'BOTOL', 15, 16000, 'AKTIF'),
('B013', 'SIRUP STROBERI', 'KB001', 'BOTOL', 20, 20000, 'AKTIF'),
('B014', 'KARAMEL IV', 'KB003', 'BOTOL', 10, 18000, 'AKTIF'),
('B015', 'Karmoisin cl 14720', 'KB003', 'BOTOL', 10, 17000, 'AKTIF'),
('B016', 'Tartrazin cl 19140', 'KB003', 'BOTOL', 10, 16000, 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kodecustomer` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namatoko` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactperson` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipepembayaran` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kodecustomer`, `namatoko`, `contactperson`, `alamat`, `kota`, `ktp`, `hp`, `status`, `tipepembayaran`) VALUES
('C001', 'Toko jasJus', '081122041077', 'jln. Srinindito 90 no. 1', 'Semarang', '337501010995002', '081122041077', 'AKTIF', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `detailpenerimaanbb`
--

CREATE TABLE `detailpenerimaanbb` (
  `nonotaDPBB` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namabarangDPBB` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuaanDPBB` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaDPBB` int(11) NOT NULL,
  `qtypenerimaanBB` int(11) NOT NULL,
  `qtypemesananBB` int(11) NOT NULL,
  `nonotapenerimaanBB` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualanbj`
--

CREATE TABLE `detailpenjualanbj` (
  `nonotaDBJ` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namabarangDBJ` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuaanDBJ` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaDBJ` int(11) NOT NULL,
  `qtyDBJ` int(11) NOT NULL,
  `grandtotalDBJ` int(11) NOT NULL,
  `statusDBJ` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonotaBJFK` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailpenjualanbj`
--

INSERT INTO `detailpenjualanbj` (`nonotaDBJ`, `namabarangDBJ`, `satuaanDBJ`, `hargaDBJ`, `qtyDBJ`, `grandtotalDBJ`, `statusDBJ`, `nonotaBJFK`) VALUES
('1', 'B001', 'BOTOL', 25000, 4, 100000, 'PESANAN', 'BJ202010001'),
('2', 'B001', 'BOTOL', 25000, 3, 75000, 'PESANAN', 'BJ202010002'),
('3', 'B002', 'BOTOL', 26000, 4, 104000, 'PESANAN', 'BJ202010002');

-- --------------------------------------------------------

--
-- Table structure for table `detailprosesproduksi`
--

CREATE TABLE `detailprosesproduksi` (
  `nonotaDPP` int(11) NOT NULL,
  `kodebarang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtyDPP` int(11) NOT NULL,
  `hargaDPP` int(11) NOT NULL,
  `nonotaPP` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailprosesproduksi`
--

INSERT INTO `detailprosesproduksi` (`nonotaDPP`, `kodebarang`, `qtyDPP`, `hargaDPP`, `nonotaPP`) VALUES
(1, 'B014', 1, 18000, 'PP202010001'),
(2, 'B015', 2, 17000, 'PP202010001'),
(3, 'B015', 5, 17000, 'PP202010002'),
(4, 'B016', 6, 16000, 'PP202010002');

-- --------------------------------------------------------

--
-- Table structure for table `detailtfpembelian`
--

CREATE TABLE `detailtfpembelian` (
  `nonotaDTFPembelian` int(11) NOT NULL,
  `barangbakuDTFPembelian` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtyDTFPembelian` int(11) NOT NULL,
  `hargaDTFPembelian` int(11) NOT NULL,
  `grandtotalDTF` int(11) NOT NULL,
  `nonotaTFPembelian` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailtfpembelian`
--

INSERT INTO `detailtfpembelian` (`nonotaDTFPembelian`, `barangbakuDTFPembelian`, `qtyDTFPembelian`, `hargaDTFPembelian`, `grandtotalDTF`, `nonotaTFPembelian`) VALUES
(1, 'B015', 3, 17000, 51000, 'PS202010001'),
(2, 'B014', 3, 18000, 54000, 'PS202010002'),
(3, 'B015', 4, 17000, 68000, 'PS202010002');

-- --------------------------------------------------------

--
-- Table structure for table `historyharga`
--

CREATE TABLE `historyharga` (
  `idhistory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodebarang` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalhistory` date NOT NULL,
  `tanggalberlaku` date NOT NULL,
  `hargajual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historyharga`
--

INSERT INTO `historyharga` (`idhistory`, `kodebarang`, `tanggalhistory`, `tanggalberlaku`, `hargajual`) VALUES
('H001', 'B001', '2020-06-03', '2020-06-29', 29000),
('H002', 'B002', '2020-06-03', '2020-06-25', 24500),
('H003', 'B003', '2020-06-05', '2020-06-20', 26000),
('H004', 'B004', '2020-06-05', '2020-06-19', 28000),
('H005', 'B005', '2020-06-05', '2020-06-20', 20000),
('H006', 'B006', '2020-06-04', '2020-06-18', 19000),
('H007', 'B007', '2020-06-04', '2020-06-17', 27000),
('H008', 'B008', '2020-06-04', '2020-06-30', 16500),
('H009', 'B009', '2020-06-06', '2020-06-24', 18000),
('H010', 'B010', '2020-06-06', '2020-06-22', 24000),
('H011', 'B011', '2020-06-06', '2020-06-21', 23000),
('H012', 'B012', '2020-06-08', '2020-06-19', 21000),
('H013', 'B013', '2020-06-10', '2020-06-15', 22000),
('H014', 'B010', '2020-10-16', '2020-10-16', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `kategoribarang`
--

CREATE TABLE `kategoribarang` (
  `kodekategoribarang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namakategoribarang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statuskategoribarang` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoribarang`
--

INSERT INTO `kategoribarang` (`kodekategoribarang`, `namakategoribarang`, `statuskategoribarang`) VALUES
('KB001', 'SIRUP', 'AKTIF'),
('KB002', 'PERASA', 'AKTIF'),
('KB003', 'PEWARNA', 'AKTIF'),
('KB004', 'PEMANIS BUATAN', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_04_01_120912_create_users_table', 1),
(2, '2020_04_01_121415_create_customers_table', 1),
(3, '2020_04_01_123220_create_barangs_table', 1),
(4, '2020_04_01_123448_create_kategoribarangs_table', 1),
(5, '2020_05_23_032118_create_historyhargas_table', 1),
(6, '2020_06_03_035900_create_prosesproduksis_table', 1),
(7, '2020_06_16_053623_create_penyesuaianstoks_table', 1),
(8, '2020_07_02_030229_create_detailprosesproduksis_table', 1),
(9, '2020_07_09_010011_create_tfpembelians_table', 1),
(10, '2020_07_09_010036_create_detailtfpembelians_table', 1),
(11, '2020_07_10_034217_create_suppliers_table', 1),
(12, '2020_08_15_035202_create_penerimaanbbs_table', 1),
(13, '2020_08_28_225743_create_detailpenerimaanbbs_table', 1),
(14, '2020_09_01_075030_create_penjualanbjs_table', 1),
(15, '2020_09_01_085641_create_detailpenjualanbjs_table', 1),
(16, '2020_09_23_083025_create_pengambilanbarangs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaanbb`
--

CREATE TABLE `penerimaanbb` (
  `nonotapenerimaanBB` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodesupplier` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglpenerimaanBB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statuspenerimaanBB` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenispembayaranBB` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengambilanbarang`
--

CREATE TABLE `pengambilanbarang` (
  `nonotaPB` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglPB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualanbj`
--

CREATE TABLE `penjualanbj` (
  `nonotapenjualanBJ` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodecustomer` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglpembelianBJ` date NOT NULL,
  `statusBJ` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenispembayaranBJ` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statuspesanBJ` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualanbj`
--

INSERT INTO `penjualanbj` (`nonotapenjualanBJ`, `kodecustomer`, `tglpembelianBJ`, `statusBJ`, `jenispembayaranBJ`, `statuspesanBJ`) VALUES
('BJ202010001', 'C001', '2020-10-16', 'LUNAS', 'TUNAI', 'PESANAN'),
('BJ202010002', 'C001', '2020-10-16', 'LUNAS', 'TUNAI', 'PESANAN');

-- --------------------------------------------------------

--
-- Table structure for table `penyesuaianstok`
--

CREATE TABLE `penyesuaianstok` (
  `nonotaPS` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodebarang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokNow` int(11) NOT NULL,
  `stokRevisi` int(11) NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyesuaianstok`
--

INSERT INTO `penyesuaianstok` (`nonotaPS`, `kodebarang`, `stokNow`, `stokRevisi`, `keterangan`) VALUES
('PS202010001', 'B005', 10, 4, 'KARENA SIRUP DIDAPATI ADANYA SEMUT DI DALAM BOTOL');

-- --------------------------------------------------------

--
-- Table structure for table `prosesproduksi`
--

CREATE TABLE `prosesproduksi` (
  `nonotaPP` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglPP` date NOT NULL,
  `kodebarang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtyhasilPP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prosesproduksi`
--

INSERT INTO `prosesproduksi` (`nonotaPP`, `tglPP`, `kodebarang`, `qtyhasilPP`) VALUES
('PP202010001', '2020-10-17', 'B001', 2),
('PP202010002', '2020-10-31', 'B001', 23);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kodesupplier` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namasupplier` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorhpsupplier` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamatsupplier` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statussupplier` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kodesupplier`, `namasupplier`, `nomorhpsupplier`, `alamatsupplier`, `statussupplier`) VALUES
('S001', 'ONDE SUMBING', '081321076651', 'JLN. SRINANGKA 6 NO. 19', 'LUNAS'),
('S002', 'RUDI SUPRIANTO', '081392055072', 'JLN. SRINANGKA 44 NO. 12', 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `tfpembelian`
--

CREATE TABLE `tfpembelian` (
  `nonotaTFPembelian` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodesupplier` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglpembelianTF` date NOT NULL,
  `statusTF` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenispembayaranTF` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tfpembelian`
--

INSERT INTO `tfpembelian` (`nonotaTFPembelian`, `kodesupplier`, `tglpembelianTF`, `statusTF`, `jenispembayaranTF`) VALUES
('PS202010001', 'S002', '2020-10-16', 'AKTIF', 'LUNAS'),
('PS202010002', 'S002', '2020-10-16', 'AKTIF', 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` int(11) NOT NULL,
  `handphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `nama`, `alamat`, `telepon`, `handphone`, `noktp`, `role`, `status`) VALUES
('alexandra09', 'alexandra09@gmail.com', 'alexandra09', 'ALEXANDRA', 'JLN. KEBANGSAAN 011 NO. 003', 3513914, '081394054381', '54453556444567898', 'ADMIN', 'AKTIF'),
('ediprasetyo09', 'ediprasetyo09@gmail.com', 'ediprasetyo09', 'EDI PRASETYO', 'JLN. JENDRAL SUDIRMAN 001 NO. 05', 3513914, '081463746273', '67653345634567898', 'SALES PENJUALAN', 'AKTIF'),
('edisupito11', 'edisupito11@gmail.com', 'edisupito11', 'EDI SUPITO', 'JLN. TELAGA WARNA 012', 3456543, '082746572837', '11253335434567898', 'PEGAWAI', 'AKTIF'),
('endah75', 'endah75@gmail.com', 'endah75', 'ENDAH', 'JLN. INDAH PERMAI 100 NO. 05', 3453325, '0813944636981', '354535645634567898', 'ADMIN', 'AKTIF'),
('kuncono0893', 'kuncono0893@gmail.com', 'kuncono0893', 'KUNCONO', 'JLN. PURWOKERTO 211 NO. 66', 2553212, '081394057651', '13453345634567898', 'SALES PENJUALAN', 'AKTIF'),
('kurniawan002', 'kurniawan002@gmail.com', 'kurniawan002', 'KURNIAWAN', 'JLN. MINTOJIWO 001 NO. 09', 3513914, '081463746273', '43253345634567898', 'SALES PENJUALAN', 'AKTIF'),
('nurhadi07', 'nurhadi07@gmail.com', 'nurhadi07', 'NURHADI', 'JLN. SIMPANG LIMA 001 NO. 98', 5432456, '081376556981', '23453345634567564', 'SALES PENJUALAN', 'AKTIF'),
('rudi123', 'rudi123@gmail.com', 'rudi123', 'RUDI', 'JLN. SUPARMAWAN 023 NO. 123', 3324534, '081463446273', '15553345634567898', 'SALES PENJUALAN', 'AKTIF'),
('salestiwasti22', 'salestiwasti22@gmail.com', 'salestiwasti22', 'SALESTIWASTI', 'JLN. PERWIRA ADAM 11 NO. 313', 3513914, '081463746273', '32453333334567898', 'SALES PENJUALAN', 'AKTIF'),
('suparmin001', 'suparmin001@gmail.com', 'suparmin123', 'SUPARMIN', 'JLN. PANCAWARNA 001 NO. 05', 3513914, '081394056981', '13453345634567898', 'PEGAWAI', 'AKTIF'),
('supriatmo12', 'supriatmo12@gmail.com', 'supriatmo12', 'SUPRIATMO', 'JLN. SRIANDRI 44 NO. 121', 3645373, '081463746273', '23453345334567898', 'SALES PENJUALAN', 'AKTIF'),
('sutarto444', 'sutarto444@gmail.com', 'sutarto444', 'SUTARTO', 'JLN. TELOR UNGU 02 NO. 443', 85746174, '081463746273', '15543345634567898', 'PEGAWAI', 'AKTIF'),
('udirestiwo01', 'udirestiwo01@gmail.com', 'udirestiwo01', 'EDIRESTIWO', 'JLN. SRININDITO 001 NO. 55', 3857467, '081463746273', '11445345634567898', 'SALES PENJUALAN', 'AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kodecustomer`);

--
-- Indexes for table `detailpenerimaanbb`
--
ALTER TABLE `detailpenerimaanbb`
  ADD PRIMARY KEY (`nonotaDPBB`);

--
-- Indexes for table `detailpenjualanbj`
--
ALTER TABLE `detailpenjualanbj`
  ADD PRIMARY KEY (`nonotaDBJ`);

--
-- Indexes for table `detailprosesproduksi`
--
ALTER TABLE `detailprosesproduksi`
  ADD PRIMARY KEY (`nonotaDPP`);

--
-- Indexes for table `detailtfpembelian`
--
ALTER TABLE `detailtfpembelian`
  ADD PRIMARY KEY (`nonotaDTFPembelian`);

--
-- Indexes for table `historyharga`
--
ALTER TABLE `historyharga`
  ADD PRIMARY KEY (`idhistory`);

--
-- Indexes for table `kategoribarang`
--
ALTER TABLE `kategoribarang`
  ADD PRIMARY KEY (`kodekategoribarang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaanbb`
--
ALTER TABLE `penerimaanbb`
  ADD PRIMARY KEY (`nonotapenerimaanBB`);

--
-- Indexes for table `pengambilanbarang`
--
ALTER TABLE `pengambilanbarang`
  ADD PRIMARY KEY (`nonotaPB`);

--
-- Indexes for table `penjualanbj`
--
ALTER TABLE `penjualanbj`
  ADD PRIMARY KEY (`nonotapenjualanBJ`);

--
-- Indexes for table `penyesuaianstok`
--
ALTER TABLE `penyesuaianstok`
  ADD PRIMARY KEY (`nonotaPS`);

--
-- Indexes for table `prosesproduksi`
--
ALTER TABLE `prosesproduksi`
  ADD PRIMARY KEY (`nonotaPP`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kodesupplier`);

--
-- Indexes for table `tfpembelian`
--
ALTER TABLE `tfpembelian`
  ADD PRIMARY KEY (`nonotaTFPembelian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
