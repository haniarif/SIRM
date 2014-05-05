-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 05 Mei 2014 pada 07.19
-- Versi Server: 5.5.25a
-- Versi PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `si_rm`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `data_rm`
--

INSERT INTO `data_rm` (`id_rekam_medik`, `nama_rm`, `id_kategori`) VALUES
(10, 'Dirawat', 8),
(11, 'Datang Sendiri', 7),
(12, 'Pulang Paksa', 6);

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
  `id_kat_jk` int(2) NOT NULL,
  PRIMARY KEY (`id_jenis_kasus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `jenis_kasus`
--

INSERT INTO `jenis_kasus` (`id_jenis_kasus`, `nama_jk`, `id_kat_jk`) VALUES
(2, 'non-bedah', 0),
(3, 'bedah', 0);

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
  `tgl_ini` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `id_dokter` int(3) NOT NULL,
  `id_kamar` int(3) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `id_layanan` int(3) NOT NULL,
  `frekuensi` int(2) NOT NULL,
  `tgl_keluar` date NOT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `umur` int(2) NOT NULL,
  `gol_darah` varchar(3) NOT NULL,
  `no_kk` int(3) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `penddkn` varchar(10) NOT NULL,
  `agama_pasien` varchar(10) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `perkawinan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_rm`, `no_id_pasien`, `nama_pasien`, `alamat_pasien`, `id_kelurahan`, `jk_pasien`, `tgl_lhr`, `umur`, `gol_darah`, `no_kk`, `posisi`, `no_telp`, `penddkn`, `agama_pasien`, `pekerjaan`, `perkawinan`) VALUES
(2, '', '2', '10651065', '08998970098800', 0, 'Batang', '0000-00-00', 0, '', 0, 'posisi', '120900800', 'smp', '', 'wiraswasta', 'islam'),
(3, '', '00000003', '748347377', '21938293828', 0, 'jln demang', '0000-00-00', 0, '03/', 0, 'ayah', '93829382', 'smp', '', 'wiraswasta', 'islam'),
(4, '00000004', '930239489', 'sri', 'jl. sukun', 0, 'perempuan', '0000-00-00', 0, 'ab', 3239203, 'ibu', '2147483647', 's1', 'islam', 'wiraswasta', 'islam'),
(5, '00000005', '09876523', 'nuna', 'jl. sukun', 0, 'perempuan', '1990-05-10', 0, 'o', 1234567, 'ayah', '89765478', 'smp', 'islam', 'wiraswasta', 'kristen'),
(6, '00000006', '898463627', 'hahaha', 'jln demangan', 0, 'perempuan', '1990-12-30', 0, 'o', 897846382, 'ayah', '021873462', 'sd', 'islam', 'wiraswasta', 'kristen'),
(7, '', '', '', '', 0, '', '0000-00-00', 0, '', 0, '', '', 'agama', 'agama', 'pekerjaan', 'perkawinan'),
(8, '00000008', '648394839', 'Galih', 'Jl. Kenanga', 0, 'laki-laki', '1990-12-21', 0, 'a', 67893, 'ayah', '0876543289', 's1', 'islam', 'pns', 'islam'),
(9, '00000009', '74832493', 'jaja', 'Jl. Sapen', 2, 'laki-laki', '1990-12-21', 0, 'ab', 4394834, 'ayah', '098762121', 'smp', 'kristen', 'wiraswasta', 'kristen'),
(10, '098888', '', '', '', 2, '', '0000-00-00', 0, '', 0, '', '', '', '', '', ''),
(11, '098888', '', '', '', 2, '', '0000-00-00', 0, '', 0, '', '', '', '', '', ''),
(12, '0000', '', 'ydsjdkesw', 'jksejw', 5, '', '0000-00-00', 0, 'ab', 0, '', '', 'sd', 'katolik', 'pns', 'kristen'),
(13, '0000', '', 'ydsjdkesw', 'jksejw', 5, '', '0000-00-00', 0, 'ab', 0, '', '', 'sd', 'katolik', 'pns', 'kristen'),
(14, '0987673', '', 'kjfldsf', 'hfjsjdfs', 7, 'perempuan', '2014-05-02', 0, 'a', 0, '', '', 'sd', 'katolik', 'tidakbekerja', 'kristen'),
(15, '0987673', '', 'kjfldsf', 'hfjsjdfs', 7, 'perempuan', '2014-05-02', 0, 'a', 0, '', '', 'sd', 'katolik', 'tidakbekerja', 'kristen'),
(16, '00000010', '', 'Sri', 'Jl. Kenduri', 4, 'perempuan', '1981-03-04', 0, 'ab', 0, '', '', 'smp', 'katolik', 'pns', 'kristen');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pembatalan`
--

INSERT INTO `pembatalan` (`id_batal`, `id_pendftrn`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendf_rj`
--

CREATE TABLE IF NOT EXISTS `pendf_rj` (
  `id_pendftrn` int(3) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(3) NOT NULL,
  `id_layanan` int(3) NOT NULL,
  `rujukan` varchar(15) NOT NULL,
  `id_klinik` int(3) NOT NULL,
  `id_dokter` int(3) NOT NULL,
  `nama_pj` varchar(30) NOT NULL,
  `posisi_pj` varchar(10) NOT NULL,
  `tgl_lhr_pj` date NOT NULL,
  `umur_pj` int(2) NOT NULL,
  `pkrjaan_pj` varchar(15) NOT NULL,
  `no_telp_pj` int(15) NOT NULL,
  `id_kelurahan` int(3) NOT NULL,
  PRIMARY KEY (`id_pendftrn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `pendf_rj`
--

INSERT INTO `pendf_rj` (`id_pendftrn`, `id_pasien`, `id_layanan`, `rujukan`, `id_klinik`, `id_dokter`, `nama_pj`, `posisi_pj`, `tgl_lhr_pj`, `umur_pj`, `pkrjaan_pj`, `no_telp_pj`, `id_kelurahan`) VALUES
(1, 0, 0, '$_POST[rujukan]', 0, 0, '$_POST[nama_pj]', '$_POST[pos', '0000-00-00', 0, '$_POST[pkrjaan_', 0, 0),
(2, 0, 0, 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(3, 0, 0, 'rumahsakit', 4, 1, 'Agus 2', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(4, 0, 0, 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(5, 0, 0, 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(6, 0, 0, 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(7, 0, 0, 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(8, 0, 0, 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(9, 0, 0, 'pilihrujukan', 0, 0, '', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(10, 15, 0, 'pilihrujukan', 5, 6, '', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(11, 0, 0, 'spkandungan', 9, 1, 'Arif', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(12, 9, 0, 'rumahsakit', 0, 0, '', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(13, 9, 0, 'rumahsakit', 9, 1, 'Miharja', 'pilihposis', '0000-00-00', 0, '', 0, 0),
(14, 9, 0, 'rumahsakit', 5, 1, 'miranda', 'ibu', '2011-03-15', 0, '', 9876555, 0),
(15, 16, 0, 'pilihrujukan', 12, 6, 'Asih', 'ibu', '1979-02-07', 0, '', 2147483647, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(3) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_role` int(3) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Struktur dari tabel `rmrj`
--

CREATE TABLE IF NOT EXISTS `rmrj` (
  `id_rmrj` int(3) NOT NULL AUTO_INCREMENT,
  `id_pendftrn` int(3) NOT NULL,
  `id_icd9` int(3) NOT NULL,
  `id_icd10` int(3) NOT NULL,
  `waktu` int(3) NOT NULL,
  `anamnesa` varchar(30) NOT NULL,
  `tensi` varchar(10) NOT NULL,
  `suhu` varchar(10) NOT NULL,
  `nafas` varchar(10) NOT NULL,
  `tinggi` varchar(10) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `lila` varchar(15) NOT NULL,
  `catatan` varchar(30) NOT NULL,
  `id_jenis_kasus` int(3) NOT NULL,
  `id_data_rm` int(3) NOT NULL,
  PRIMARY KEY (`id_rmrj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `nama_role` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_akses`
--

CREATE TABLE IF NOT EXISTS `role_akses` (
  `id_role_akses` int(3) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(30) NOT NULL,
  PRIMARY KEY (`id_role_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
