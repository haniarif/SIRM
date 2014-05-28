-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 28 Mei 2014 pada 07.57
-- Versi Server: 5.5.25a
-- Versi PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `si_rm4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rm`
--

CREATE TABLE IF NOT EXISTS `data_rm` (
  `id_rekam_medik` int(3) NOT NULL AUTO_INCREMENT,
  `nama_rm` varchar(20) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  PRIMARY KEY (`id_rekam_medik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `data_rm`
--

INSERT INTO `data_rm` (`id_rekam_medik`, `nama_rm`, `id_kategori`) VALUES
(10, 'Dirawat', 8),
(11, 'Datang Sendiri', 7),
(12, 'Pulang Paksa', 6),
(13, 'dibawa pulang', 1),
(14, 'Meninggal', 5),
(15, 'Hidup', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_mutasi`
--

CREATE TABLE IF NOT EXISTS `detail_mutasi` (
  `id_dm` int(3) NOT NULL AUTO_INCREMENT,
  `id_mutasi` int(3) NOT NULL,
  `id_layanan` int(3) NOT NULL,
  `frekuensi` int(3) NOT NULL,
  PRIMARY KEY (`id_dm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `detail_mutasi`
--

INSERT INTO `detail_mutasi` (`id_dm`, `id_mutasi`, `id_layanan`, `frekuensi`) VALUES
(1, 15, 0, 0),
(2, 17, 0, 0),
(3, 19, 0, 0),
(4, 20, 10, 1),
(5, 21, 10, 1),
(6, 22, 10, 1),
(7, 0, 8, 1),
(8, 0, 10, 2),
(9, 0, 10, 2),
(10, 28, 10, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` int(3) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(3) NOT NULL,
  `no_sip` varchar(15) NOT NULL,
  `id_spesialisasi` int(3) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_pegawai`, `no_sip`, `id_spesialisasi`) VALUES
(1, 6, '1212121212', 0),
(6, 3, '6789', 8),
(7, 5, '34567', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `icd9`
--

CREATE TABLE IF NOT EXISTS `icd9` (
  `id_icd9` int(3) NOT NULL AUTO_INCREMENT,
  `nama_icd9` varchar(30) NOT NULL,
  `kode_icd9` varchar(11) NOT NULL,
  PRIMARY KEY (`id_icd9`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data untuk tabel `icd9`
--

INSERT INTO `icd9` (`id_icd9`, `nama_icd9`, `kode_icd9`) VALUES
(21, 'radical glossectomy', '25.4'),
(22, 'Repair of tongue and glossopla', '25.5'),
(23, 'suture of laceration of tongue', '25.51'),
(24, 'other repair and plastic opera', '25.59'),
(25, 'Other operations on tongue', '25.94'),
(26, 'other glossotomy', '25.94'),
(27, 'other operations on tongue', '25.99'),
(28, 'Incision of salivary gland or ', '25'),
(29, 'Diagnostic procedures on saliv', '26.1'),
(30, 'Closed [needle] biopsy of sali', '26.11'),
(31, 'open biopsy of salivary gland ', '26.12'),
(32, 'Excision of lesion of salivary', '26.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `icd10`
--

CREATE TABLE IF NOT EXISTS `icd10` (
  `id_icd10` int(3) NOT NULL AUTO_INCREMENT,
  `nama_icd10` varchar(70) NOT NULL,
  `kode_icd10` varchar(5) NOT NULL,
  PRIMARY KEY (`id_icd10`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `icd10`
--

INSERT INTO `icd10` (`id_icd10`, `nama_icd10`, `kode_icd10`) VALUES
(7, 'Other inflammatory liver disea', 'K75'),
(8, 'Abscess of liver', 'k75.0'),
(9, 'Phlebitis of portal vein', 'K75.1'),
(10, 'Nonspecific reactive hepatitis', 'K75.2'),
(11, 'Granulomatous hepatitis, not e', 'K75.3'),
(12, 'Other specified inflammatory l', 'K75.4'),
(13, 'Inflammatory liver disease, un', 'K75.5'),
(14, 'Other arthritis - Polyarthriti', 'M13.0'),
(15, 'Other diseases of liver', 'k76'),
(16, 'Fatty (change of) liver, not e', 'K76.0'),
(17, 'Chronic passive congestion of ', 'K76.1'),
(18, 'Central haemorrhagic necrosis ', 'K76.2'),
(20, 'Liver disorders in infectious and parasitic diseases classifiedelsewhe', 'K77.0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kasus`
--

CREATE TABLE IF NOT EXISTS `jenis_kasus` (
  `id_jenis_kasus` int(3) NOT NULL AUTO_INCREMENT,
  `nama_jk` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_kasus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `jenis_kasus`
--

INSERT INTO `jenis_kasus` (`id_jenis_kasus`, `nama_jk`) VALUES
(2, 'non-bedah'),
(3, 'bedah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE IF NOT EXISTS `kabupaten` (
  `id_kabupaten` int(3) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(3) NOT NULL,
  `nama_kabupaten` varchar(20) NOT NULL,
  `kode_kab` varchar(5) NOT NULL,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `id_provinsi`, `nama_kabupaten`, `kode_kab`) VALUES
(4, 11, 'Aceh Selatan', '11.01'),
(5, 11, 'Aceh Tenggara', '11.02'),
(6, 11, 'Aceh Timur', '11.03'),
(7, 11, 'Aceh Tengah', '11.04'),
(8, 15, 'Kulon Progo', '34.01'),
(9, 15, 'Bantul', '34.02'),
(10, 15, 'Gunung Kidul', '34.03'),
(11, 15, 'Sleman', '34.04'),
(12, 15, 'Kota Yogyakrta', '34.71');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kamar` varchar(20) NOT NULL,
  `id_klinik` int(3) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `id_kat_jk` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `id_klinik`, `kelas`, `id_kat_jk`, `status`) VALUES
(10, 'Aisyah', 4, 'II', 0, 0),
(11, 'Hasan', 6, 'III', 0, 0),
(12, 'Fatimah', 12, 'I', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_jk`
--

CREATE TABLE IF NOT EXISTS `kategori_jk` (
  `id_kat_jk` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kategori_jk` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kat_jk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kategori_jk`
--

INSERT INTO `kategori_jk` (`id_kat_jk`, `nama_kategori_jk`) VALUES
(1, 'Rawat Inap'),
(2, 'Rawat Jalan'),
(3, 'Semua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_rm`
--

CREATE TABLE IF NOT EXISTS `kategori_rm` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `kategori_rm`
--

INSERT INTO `kategori_rm` (`id_kategori`, `nama_kategori`) VALUES
(1, 'tindak lanjut'),
(2, 'asal rujukan'),
(3, 'Cara Penerimaan'),
(4, 'Cara Masuk'),
(5, 'Keadaan Keluar'),
(6, 'Cara Keluar'),
(7, 'Alasan Datang'),
(8, 'Pemeriksaan Lanjutan'),
(9, 'Asal Non-Rujukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` int(3) NOT NULL AUTO_INCREMENT,
  `id_kabupaten` int(3) NOT NULL,
  `nama_kecamatan` varchar(20) NOT NULL,
  `kode_kecamatan` varchar(8) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kecamatan`, `kode_kecamatan`) VALUES
(4, 4, 'Bakongan', '11.01.01'),
(5, 4, 'Kluet Utara', '11.01.02'),
(6, 4, 'Kluet Selatan', '10.01.03'),
(7, 5, 'Lawe Alas', '11.02.01'),
(8, 6, 'Darul Aman', '11.03.01'),
(9, 8, 'Temon', '34.01.01'),
(10, 8, 'Wates', '34.01.02'),
(11, 8, 'Kalibawang', '34.01.12'),
(12, 9, 'Srandakan', '34.02.01'),
(13, 9, 'Jetis', '32.02.09'),
(14, 9, 'Imogiri', '34.02.10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
  `id_kelurahan` int(3) NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int(3) NOT NULL,
  `nama_kelurahan` varchar(20) NOT NULL,
  `kode_kel` varchar(13) NOT NULL,
  PRIMARY KEY (`id_kelurahan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`, `kode_kel`) VALUES
(2, 12, 'Poncosari', '34.02.01.2001'),
(3, 12, 'Trimurti', '34.02.01.2002'),
(4, 13, 'Patalan', '34.02.09.2001'),
(5, 13, 'Canden', '34.02.09.2002'),
(6, 13, 'Trimulyo', '34.02.09.2004'),
(7, 14, 'Sriharjo', '34.02.10.2002'),
(8, 13, 'Wukisari', '34.02.10.2003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klinik`
--

CREATE TABLE IF NOT EXISTS `klinik` (
  `id_klinik` int(3) NOT NULL AUTO_INCREMENT,
  `nama_klinik` varchar(20) NOT NULL,
  PRIMARY KEY (`id_klinik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `klinik`
--

INSERT INTO `klinik` (`id_klinik`, `nama_klinik`) VALUES
(4, 'Poliklinik Umum'),
(5, 'Poliklinik Fisiotera'),
(6, 'Poliklinik obsgyn'),
(7, 'VK'),
(8, 'ICU'),
(9, 'Tanpa Instalasi'),
(10, 'Semua'),
(11, 'IGD'),
(12, 'Rawat Inap Bedah'),
(13, 'Rawat Inap Anak'),
(14, 'Rawat Inap Kebidanan'),
(15, 'Rawat Inap Umum'),
(16, 'Poliklinik Kebidanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(50) NOT NULL,
  `id_spesialisasi` int(3) NOT NULL,
  `jenis` varchar(7) NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `id_spesialisasi`, `jenis`) VALUES
(6, 'layanan', 3, ''),
(7, 'Dukun Bayi', 7, ''),
(8, 'Exterpasi Kista Vagi', 12, ''),
(9, 'Ket (Kehamilan Ektop', 12, ''),
(10, 'Cystektomi II (K)', 13, ''),
(11, 'Sectio Caesarea III (NK)', 12, ''),
(12, 'Madang', 7, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi`
--

CREATE TABLE IF NOT EXISTS `mutasi` (
  `id_mutasi` int(3) NOT NULL AUTO_INCREMENT,
  `id_pendftrn` int(3) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `id_dokter` int(3) NOT NULL,
  `id_kamar` int(3) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_keluar` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_mutasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data untuk tabel `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_pendftrn`, `id_pengguna`, `id_dokter`, `id_kamar`, `tgl_masuk`, `tgl_keluar`, `status`) VALUES
(1, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 0, 0, 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 0, 0, 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 0, 0, 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 0, 0, 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 24, 0, 7, 0, '2014-05-23 17:00:00', '0000-00-00 00:00:00', 1),
(8, 24, 0, 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 24, 0, 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 24, 0, 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 24, 0, 7, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 24, 0, 7, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, 24, 16536, 7, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(14, 24, 16536, 7, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(15, 24, 16536, 7, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(16, 24, 16536, 7, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(17, 24, 16536, 7, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(18, 24, 16536, 7, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, 24, 16536, 7, 11, '2014-05-23 17:00:00', '0000-00-00 00:00:00', 0),
(20, 24, 16536, 7, 11, '2014-05-23 17:00:00', '0000-00-00 00:00:00', 1),
(21, 24, 16536, 7, 11, '2014-05-22 17:00:00', '0000-00-00 00:00:00', 1),
(22, 24, 16536, 7, 11, '2014-05-22 17:00:00', '0000-00-00 00:00:00', 1),
(23, 24, 16536, 7, 10, '2014-05-23 20:05:27', '0000-00-00 00:00:00', 0),
(24, 24, 16536, 1, 11, '2014-05-23 20:05:38', '0000-00-00 00:00:00', 1),
(25, 24, 16536, 1, 11, '2014-05-23 20:05:38', '0000-00-00 00:00:00', 0),
(26, 24, 16536, 1, 11, '2014-05-23 20:05:38', '0000-00-00 00:00:00', 0),
(27, 24, 16536, 1, 11, '2014-05-23 20:05:38', '0000-00-00 00:00:00', 0),
(28, 24, 16536, 1, 11, '2014-05-23 20:05:38', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(3) NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(8) NOT NULL,
  `no_id_pasien` varchar(20) NOT NULL,
  `nama_pasien` varchar(20) NOT NULL,
  `alamat_pasien` varchar(30) NOT NULL,
  `id_kelurahan` int(3) NOT NULL,
  `jk_pasien` varchar(10) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `gol_darah` varchar(3) NOT NULL,
  `no_kk` int(3) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `penddkn` varchar(10) NOT NULL,
  `agama_pasien` varchar(10) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `perkawinan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_rm`, `no_id_pasien`, `nama_pasien`, `alamat_pasien`, `id_kelurahan`, `jk_pasien`, `tgl_lhr`, `gol_darah`, `no_kk`, `posisi`, `no_telp`, `penddkn`, `agama_pasien`, `pekerjaan`, `perkawinan`) VALUES
(2, '', '2', '10651065', '08998970098800', 0, 'Batang', '0000-00-00', '', 0, 'posisi', '120900800', 'smp', '', 'wiraswasta', 'islam'),
(3, '', '00000003', '748347377', '21938293828', 0, 'jln demang', '0000-00-00', '03/', 0, 'ayah', '93829382', 'smp', '', 'wiraswasta', 'islam'),
(4, '00000004', '930239489', 'sri', 'jl. sukun', 0, 'perempuan', '0000-00-00', 'ab', 3239203, 'ibu', '2147483647', 's1', 'islam', 'wiraswasta', 'islam'),
(5, '00000005', '09876523', 'nuna', 'jl. sukun', 0, 'perempuan', '1990-05-10', 'o', 1234567, 'ayah', '89765478', 'smp', 'islam', 'wiraswasta', 'kristen'),
(6, '00000006', '898463627', 'hahaha', 'jln demangan', 0, 'perempuan', '1990-12-30', 'o', 897846382, 'ayah', '021873462', 'sd', 'islam', 'wiraswasta', 'kristen'),
(7, '', '', '', '', 0, '', '0000-00-00', '', 0, '', '', 'agama', 'agama', 'pekerjaan', 'perkawinan'),
(8, '00000008', '648394839', 'Galih', 'Jl. Kenanga', 0, 'laki-laki', '1990-12-21', 'a', 67893, 'ayah', '0876543289', 's1', 'islam', 'pns', 'islam'),
(9, '00000009', '74832493', 'jaja', 'Jl. Sapen', 2, 'laki-laki', '1990-12-21', 'ab', 4394834, 'ayah', '098762121', 'smp', 'kristen', 'wiraswasta', 'kristen'),
(10, '098888', '', '', '', 2, '', '0000-00-00', '', 0, '', '', '', '', '', ''),
(11, '098888', '', '', '', 2, '', '0000-00-00', '', 0, '', '', '', '', '', ''),
(12, '0000', '', 'ydsjdkesw', 'jksejw', 5, '', '0000-00-00', 'ab', 0, '', '', 'sd', 'katolik', 'pns', 'kristen'),
(13, '0000', '', 'ydsjdkesw', 'jksejw', 5, '', '0000-00-00', 'ab', 0, '', '', 'sd', 'katolik', 'pns', 'kristen'),
(14, '0987673', '', 'kjfldsf', 'hfjsjdfs', 7, 'perempuan', '2014-05-02', 'a', 0, '', '', 'sd', 'katolik', 'tidakbekerja', 'kristen'),
(15, '0987673', '', 'kjfldsf', 'hfjsjdfs', 7, 'perempuan', '2014-05-02', 'a', 0, '', '', 'sd', 'katolik', 'tidakbekerja', 'kristen'),
(16, '00000010', '', 'Sri', 'Jl. Kenduri', 4, 'perempuan', '1981-03-04', 'ab', 0, '', '', 'smp', 'katolik', 'pns', 'kristen'),
(17, '000089', '', 'Hafiz', 'Jl. Kenanga', 7, 'laki-laki', '1977-03-10', 'ab', 0, '', '', 'smp', 'islam', 'pns', 'islam'),
(18, '00000018', '', 'Adelia', 'Jl. Kusumanegara RT.03 RW.05', 8, 'perempuan', '1990-07-18', 'ab', 0, '', '', 'smp', 'katolik', 'wiraswasta', 'islam'),
(19, '00000019', '', 'Hanifah', 'Jalan Megangsari ', 8, 'perempuan', '2014-05-14', 'ab', 0, '', '', 'pilihpendi', 'katolik', 'tidakbekerja', 'kristen'),
(20, '0000018', '', 'Hanida', 'jl megangsar', 7, 'laki-laki', '0000-00-00', 'pil', 0, '', '', 'pilihpendi', 'pilihagama', 'pilihpekerjaan', 'pilihstatu'),
(21, '00000021', '', 'Delima', 'Jl. Melati', 8, 'perempuan', '2014-05-14', 'ab', 0, '', '', 'smp', 'kristen', 'tidakbekerja', 'kristen'),
(22, '00000022', '', 'Anjeli', 'Jl. Hayam Wuruk', 2, 'perempuan', '2014-05-14', 'ab', 0, '', '', 'sd', 'katolik', 'pns', 'islam'),
(23, '00000023', '', 'Marendra', 'Jl. Sapen', 7, 'laki-laki', '2014-05-14', 'ab', 0, '', '', 'sd', 'kristen', 'wiraswasta', 'islam'),
(24, '00000024', '', 'Galih Wirawan', 'Jl. Sapen', 2, 'laki-laki', '2014-05-23', 'o', 0, '', '', 'sd', 'katolik', 'pns', 'islam'),
(25, '000025', '', 'Marina', 'Jalan kyai Mojo', 5, 'laki-laki', '2014-05-25', 'ab', 0, '', '', 'sd', 'islam', 'pns', 'kristen'),
(26, '000026', '', 'adib', 'jalan sapen', 8, 'laki-laki', '2014-05-25', 'ab', 0, '', '', 'sd', 'kristen', 'pns', 'islam'),
(27, '000027', '', 'Ervan', 'Jl. Mangkubumi', 2, 'laki-laki', '2014-05-27', 'ab', 0, '', '', 'sd', 'katolik', 'wiraswasta', 'islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(3) NOT NULL AUTO_INCREMENT,
  `nip` int(3) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `level` varchar(5) NOT NULL,
  `no_id_pegawai` varchar(20) NOT NULL,
  `alamat_pgwai` text NOT NULL,
  `id_kelurahan` int(3) NOT NULL,
  `jk_pegawai` varchar(10) NOT NULL,
  `tgl_lhr_pgwai` date NOT NULL,
  `kk_pegawai` varchar(20) NOT NULL,
  `posisi_pgawai` varchar(10) NOT NULL,
  `no_telp_pegawai` varchar(15) NOT NULL,
  `golongan` varchar(5) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `pangkat` varchar(15) NOT NULL,
  `no_sk` int(2) NOT NULL,
  `tgl_sk` date NOT NULL,
  `tgl_masuk_unit` date NOT NULL,
  `pnddkn` varchar(10) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kawin` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `level`, `no_id_pegawai`, `alamat_pgwai`, `id_kelurahan`, `jk_pegawai`, `tgl_lhr_pgwai`, `kk_pegawai`, `posisi_pgawai`, `no_telp_pegawai`, `golongan`, `jabatan`, `pangkat`, `no_sk`, `tgl_sk`, `tgl_masuk_unit`, `pnddkn`, `pekerjaan`, `agama`, `kawin`) VALUES
(3, 12345, 'hamidah', 'II', '123456789', 'Denggung RT. 02 RT.03', 7, 'perempuan', '0000-00-00', '2147483647', 'ab', '087787268', 'Ib', 's1', 'wiraswasta', 4321, '2012-12-12', '2012-12-21', 's1', 'pns', 'islam', 'kristen'),
(4, 980, 'Azizi', 'II', '2147483647', 'Wisma New Shapira GK1/576', 7, 'perempuan', '1990-12-12', '2147483647', 'ab', '0844334343', 'Ia', 'smp', 'wiraswasta', 23, '2012-12-12', '2012-12-21', 's1', 'wiraswasta', 'islam', 'islam'),
(5, 678, 'Afifah', 'III', '98976543526123', 'jln. kusumanegara', 8, 'perempuan', '1990-12-12', '83782973873273', 'o', '0844334343', 'Ia', 'sd', 'wiraswasta', 4321, '2012-12-12', '2012-12-21', 'sd', 'wiraswasta', 'islam', 'islam'),
(6, 12345, 'Sabbana Azmi', 'IV', '6789012345690876', 'Pengok Gondokusuman', 8, 'laki-laki', '1990-12-12', '12908987879897979', 'o', '0844334343', 'Ia', 'sd', 'wiraswasta', 4321, '2012-12-12', '2012-12-21', 'sd', 'pns', 'islam', 'islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembatalan`
--

CREATE TABLE IF NOT EXISTS `pembatalan` (
  `id_batal` int(2) NOT NULL AUTO_INCREMENT,
  `id_pendftrn` int(3) NOT NULL,
  PRIMARY KEY (`id_batal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `pembatalan`
--

INSERT INTO `pembatalan` (`id_batal`, `id_pendftrn`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendf_rj`
--

CREATE TABLE IF NOT EXISTS `pendf_rj` (
  `id_pendftrn` int(3) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(3) NOT NULL,
  `id_layanan` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `rujukan` varchar(15) NOT NULL,
  `id_klinik` int(3) NOT NULL,
  `id_dokter` int(3) NOT NULL,
  `nama_pj` varchar(30) NOT NULL,
  `posisi_pj` varchar(10) NOT NULL,
  `tgl_lhr_pj` date NOT NULL,
  `pkrjaan_pj` varchar(15) NOT NULL,
  `no_telp_pj` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pendftrn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `pendf_rj`
--

INSERT INTO `pendf_rj` (`id_pendftrn`, `id_pasien`, `id_layanan`, `tanggal`, `rujukan`, `id_klinik`, `id_dokter`, `nama_pj`, `posisi_pj`, `tgl_lhr_pj`, `pkrjaan_pj`, `no_telp_pj`) VALUES
(1, 0, 0, '0000-00-00', '$_POST[rujukan]', 0, 0, '$_POST[nama_pj]', '$_POST[pos', '0000-00-00', '$_POST[pkrjaan_', '0'),
(2, 0, 0, '0000-00-00', 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(3, 0, 0, '0000-00-00', 'rumahsakit', 4, 1, 'Agus 2', 'pilihposis', '0000-00-00', '', '0'),
(4, 0, 0, '0000-00-00', 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(5, 0, 0, '0000-00-00', 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(6, 0, 0, '0000-00-00', 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(7, 0, 0, '0000-00-00', 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(8, 0, 0, '0000-00-00', 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(9, 0, 0, '0000-00-00', 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(10, 15, 0, '0000-00-00', 'pilihrujukan', 5, 6, '', 'pilihposis', '0000-00-00', '', '0'),
(11, 0, 0, '0000-00-00', 'spkandungan', 9, 1, 'Arif', 'pilihposis', '0000-00-00', '', '0'),
(12, 9, 0, '0000-00-00', 'rumahsakit', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(13, 9, 0, '0000-00-00', 'rumahsakit', 9, 1, 'Miharja', 'pilihposis', '0000-00-00', '', '0'),
(14, 9, 0, '0000-00-00', 'rumahsakit', 5, 1, 'miranda', 'ibu', '2011-03-15', '', '9876555'),
(15, 16, 0, '0000-00-00', 'pilihrujukan', 12, 6, 'Asih', 'ibu', '1979-02-07', '', '2147483647'),
(16, 0, 0, '0000-00-00', 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(17, 17, 8, '0000-00-00', 'pilihrujukan', 5, 6, 'Nanda', 'ayah', '1952-02-05', '', '897654'),
(18, 0, 0, '2014-05-06', 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', '', '0'),
(19, 5, 10, '2014-05-07', 'rumahsakit', 5, 6, 'Mario', 'ibu', '1955-02-08', '', '8796543'),
(20, 18, 10, '2014-05-07', 'pilihrujukan', 5, 6, 'Safari', 'ibu', '1983-03-02', 'pns', '087654321098'),
(21, 0, 0, '0000-00-00', '$_POST[rujukan]', 0, 0, '$_POST[nama_pj]', '$_POST[pos', '0000-00-00', '$_POST[pkrjaan_', '$_POST[no_telp_'),
(22, 5, 10, '2014-05-14', 'rumahsakit', 5, 6, '', 'pilihposis', '0000-00-00', 'pilihpekerjaan', ''),
(23, 23, 8, '2014-05-14', 'pilihrujukan', 5, 7, 'Afif', 'ayah', '2014-05-15', 'pns', '0987564754'),
(24, 17, 10, '2014-05-14', 'rumahsakit', 5, 6, 'Efendi', 'ibu', '1973-11-28', 'pns', '08765436728'),
(25, 24, 8, '2014-05-23', 'pilihrujukan', 0, 7, '', 'pilihposis', '0000-00-00', 'pilihpekerjaan', ''),
(26, 24, 11, '2014-05-23', 'pilihrujukan', 0, 6, '', 'pilihposis', '0000-00-00', 'pilihpekerjaan', ''),
(27, 25, 8, '2014-05-25', 'pilihrujukan', 0, 6, 'Afif', 'ayah', '2014-05-25', 'wiraswasta', '098766665'),
(28, 26, 10, '2014-05-25', 'pilihrujukan', 5, 7, 'Afif', 'ibu', '2014-05-25', 'wiraswasta', '08477374'),
(29, 27, 10, '2014-05-27', 'pilihrujukan', 5, 6, '', 'pilihposis', '0000-00-00', 'pilihpekerjaan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` varchar(16) NOT NULL,
  `id_pegawai` int(3) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_pegawai`, `user`, `password`, `status`) VALUES
('165368e9eb8ad6f', 6, 'sabbana', '67d17792d1f7d41d1b29a8f42b50db37', 1),
('165369cf8a85216', 5, 'afifah', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('16536a27fe99a24', 3, 'hani', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('16536a28686f733', 4, 'azizi', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('16536a28e8a61e5', 5, 'afif', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna_role`
--

CREATE TABLE IF NOT EXISTS `pengguna_role` (
  `id_pengguna` varchar(16) NOT NULL,
  `id_role` int(3) NOT NULL,
  KEY `id_pengguna` (`id_pengguna`,`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna_role`
--

INSERT INTO `pengguna_role` (`id_pengguna`, `id_role`) VALUES
('1', 1),
('165368e9eb8ad6f', 1),
('165368e9eb8ad6f', 2),
('165369cdab4671c', 3),
('165369cf8a85216', 3),
('16536a27fe99a24', 3),
('16536a28686f733', 4),
('16536a2893cac73', 2),
('16536a28e8a61e5', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` int(3) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(25) NOT NULL,
  `kode_prov` varchar(5) NOT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`, `kode_prov`) VALUES
(3, 'Jawa Tengah', '33.00'),
(4, 'Jawa Barat ', '32.00'),
(5, 'Jawa Timur', '35.00'),
(6, 'Jakarta', '31.00'),
(7, 'Bali', '51.00'),
(8, 'Banten', '36.00'),
(9, 'Bengkulu', '17.00'),
(10, 'Jambi', '15.00'),
(11, 'Nangroe Aceh Darussalam', '11'),
(12, 'SUmatera Utara', '12.00'),
(13, 'Sumatera Barat', '13.00'),
(14, 'Riau', '14.00'),
(15, 'DIY', '34.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rmri_diagnosa`
--

CREATE TABLE IF NOT EXISTS `rmri_diagnosa` (
  `id_di_diagnosa` int(3) NOT NULL AUTO_INCREMENT,
  `id_rmri` int(3) NOT NULL,
  `id_icd10` int(3) NOT NULL,
  PRIMARY KEY (`id_di_diagnosa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rmri_tindakan`
--

CREATE TABLE IF NOT EXISTS `rmri_tindakan` (
  `id_dtri` int(3) NOT NULL AUTO_INCREMENT,
  `id_rmri` int(3) NOT NULL,
  `id_icd9` int(3) NOT NULL,
  PRIMARY KEY (`id_dtri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rmrj`
--

CREATE TABLE IF NOT EXISTS `rmrj` (
  `id_rmrj` int(3) NOT NULL AUTO_INCREMENT,
  `id_pendftrn` int(3) DEFAULT NULL,
  `waktu` datetime NOT NULL,
  `anamnesa` text NOT NULL,
  `tensi` varchar(10) NOT NULL,
  `nadi` varchar(20) NOT NULL,
  `suhu` varchar(10) NOT NULL,
  `nafas` varchar(10) NOT NULL,
  `tinggi` varchar(10) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `lila` varchar(15) NOT NULL,
  `catatan` text NOT NULL,
  `id_jenis_kasus` int(3) NOT NULL,
  `datang` int(11) DEFAULT NULL,
  `tindak_lanjut` int(11) DEFAULT NULL,
  `keadaan_keluar` int(11) DEFAULT NULL,
  `cara_keluar` int(11) DEFAULT NULL,
  `pemeriksaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rmrj`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `rmrj`
--

INSERT INTO `rmrj` (`id_rmrj`, `id_pendftrn`, `waktu`, `anamnesa`, `tensi`, `nadi`, `suhu`, `nafas`, `tinggi`, `berat`, `lila`, `catatan`, `id_jenis_kasus`, `datang`, `tindak_lanjut`, `keadaan_keluar`, `cara_keluar`, `pemeriksaan`) VALUES
(19, 0, '0000-00-00 00:00:00', 'anamnesa', '170/70', 'nadi', '37', 'nafas', '156', '67', '12', 'catatan', 3, 0, 0, 0, 0, 0),
(20, 0, '0000-00-00 00:00:00', 'anamnesa', '170/70', 'nadi', '37', 'nafas', '156', '67', '12', 'catctan', 3, 0, 0, 0, 0, 0),
(27, 29, '0000-00-00 00:00:00', 'anamnesa', '170/70', 'nadi', '37', 'nafas', '156', '67', '12', 'catatan', 3, 11, 13, 14, 12, 10),
(28, 29, '0000-00-00 00:00:00', 'anamnesa', '170/70', 'nadi', '37', 'nafas', '156', '67', '12', 'catatan', 2, 11, 13, 14, 12, 10),
(29, 29, '0000-00-00 00:00:00', 'anamnesa', '170/70', 'nadi', '37', 'nafas', '156', '67', '12', 'catatan', 3, 11, 13, 14, 12, 10),
(30, 29, '0000-00-00 00:00:00', 'anamnesa', '170/70', 'nadi', '37', 'nafas', '156', '67', '12', 'catatan', 3, 11, 13, 14, 12, 10),
(31, 29, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0),
(32, 29, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 11, 13, 14, 0, 0),
(33, 29, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 11, 13, 14, 0, 0),
(34, 29, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 11, 13, 14, 0, 0),
(35, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0),
(36, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0),
(37, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0),
(38, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rmrj_diagnosa`
--

CREATE TABLE IF NOT EXISTS `rmrj_diagnosa` (
  `id_dg` int(3) NOT NULL AUTO_INCREMENT,
  `id_rmrj` int(3) DEFAULT NULL,
  `id_icd10` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_dg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data untuk tabel `rmrj_diagnosa`
--

INSERT INTO `rmrj_diagnosa` (`id_dg`, `id_rmrj`, `id_icd10`) VALUES
(34, 19, 0),
(35, 19, 0),
(36, 20, 0),
(37, 27, 0),
(38, 27, 0),
(39, 27, 0),
(40, 28, 0),
(41, 29, 0),
(42, 29, 0),
(43, 30, 0),
(44, 31, 0),
(45, 32, 0),
(46, 32, 0),
(47, 33, 0),
(48, 33, 0),
(49, 34, 0),
(50, 34, 0),
(51, 35, 0),
(52, 36, 0),
(53, 37, 0),
(54, 37, 0),
(55, 38, 0),
(56, 38, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rmrj_tindakan`
--

CREATE TABLE IF NOT EXISTS `rmrj_tindakan` (
  `id_dt` int(3) NOT NULL AUTO_INCREMENT,
  `id_rmrj` int(3) DEFAULT NULL,
  `id_icd9` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_dt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data untuk tabel `rmrj_tindakan`
--

INSERT INTO `rmrj_tindakan` (`id_dt`, `id_rmrj`, `id_icd9`) VALUES
(88, 19, 0),
(89, 19, 0),
(90, 20, 0),
(91, 27, 25),
(92, 27, 0),
(93, 27, 0),
(94, 30, 0),
(95, 31, 0),
(96, 32, 0),
(97, 32, 0),
(98, 33, 0),
(99, 33, 0),
(100, 34, 0),
(101, 34, 0),
(102, 35, 0),
(103, 36, 0),
(104, 37, 0),
(105, 37, 0),
(106, 38, 0),
(107, 38, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rm_ri`
--

CREATE TABLE IF NOT EXISTS `rm_ri` (
  `id_rmri` int(3) NOT NULL AUTO_INCREMENT,
  `id_mutasi` int(3) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `id_dokter` int(3) NOT NULL,
  `id_kamar` int(3) NOT NULL,
  `id_icd9` int(3) NOT NULL,
  `id_icd10` int(3) NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `id_jenis_kasus` int(3) NOT NULL,
  `id_data_rm` int(3) NOT NULL,
  `temu_penting` text NOT NULL,
  `laboratorium` text NOT NULL,
  `anamnesa` text NOT NULL,
  `terapi_pengobatan` text NOT NULL,
  `ringkasan_proses` text NOT NULL,
  PRIMARY KEY (`id_rmri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(3) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(30) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'super_admin'),
(2, 'administrasi_pendaft'),
(3, 'Unit Rekam Medis'),
(4, 'Dokter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spesialisasi`
--

CREATE TABLE IF NOT EXISTS `spesialisasi` (
  `id_spesialisasi` int(3) NOT NULL AUTO_INCREMENT,
  `nama_spesialisasi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_spesialisasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `spesialisasi`
--

INSERT INTO `spesialisasi` (`id_spesialisasi`, `nama_spesialisasi`) VALUES
(3, 'Sp. Bedah'),
(5, 'Kandungan'),
(6, 'Dokter Umum'),
(7, 'Tanpa Spesialisasi'),
(8, 'Sp. Anak'),
(9, 'VIsite Spesialis'),
(10, 'Fisioterapist'),
(11, 'Apoteker'),
(12, 'Sp. Kebidanan'),
(13, 'Sp. Anastesi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
