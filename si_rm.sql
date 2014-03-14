-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 09. Maret 2014 jam 02:15
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `si_rm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rm`
--

CREATE TABLE IF NOT EXISTS `data_rm` (
  `id_rekam_medik` int(3) NOT NULL AUTO_INCREMENT,
  `nama_rm` varchar(20) NOT NULL,
  `kategori_rm` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rekam_medik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `icd9`
--

CREATE TABLE IF NOT EXISTS `icd9` (
  `id_icd9` int(3) NOT NULL AUTO_INCREMENT,
  `nama_icd9` int(30) NOT NULL,
  `kode_icd9` int(11) NOT NULL,
  PRIMARY KEY (`id_icd9`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `icd10`
--

CREATE TABLE IF NOT EXISTS `icd10` (
  `id_icd10` int(3) NOT NULL AUTO_INCREMENT,
  `nama_icd10` varchar(30) NOT NULL,
  `kode_icd10` varchar(5) NOT NULL,
  PRIMARY KEY (`id_icd10`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kasus`
--

CREATE TABLE IF NOT EXISTS `jenis_kasus` (
  `id_jenis_kasus` int(3) NOT NULL AUTO_INCREMENT,
  `nama_jk` varchar(20) NOT NULL,
  `kategori_jk` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_kasus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kamar` varchar(20) NOT NULL,
  `id_klinik` int(3) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `klinik`
--

CREATE TABLE IF NOT EXISTS `klinik` (
  `id_klinik` int(3) NOT NULL AUTO_INCREMENT,
  `nama_klinik` varchar(20) NOT NULL,
  PRIMARY KEY (`id_klinik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(20) NOT NULL,
  `id_spesialisasi` int(3) NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `id_layanan` int(3) NOT NULL,
  `tgl_keluar` date NOT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(3) NOT NULL AUTO_INCREMENT,
  `no_rm` int(3) NOT NULL,
  `no_id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(20) NOT NULL,
  `alamat_pasien` varchar(30) NOT NULL,
  `jk_pasien` varchar(10) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `gol_darah` varchar(3) NOT NULL,
  `no_kk` int(3) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `no_telp` int(2) NOT NULL,
  `penddkn` varchar(10) NOT NULL,
  `agama_pasien` varchar(10) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `perkawinan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(3) NOT NULL AUTO_INCREMENT,
  `nip` int(3) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `level` int(2) NOT NULL,
  `no_id_pegawai` int(2) NOT NULL,
  `alamat_pgwai` text NOT NULL,
  `jk_pegawai` varchar(10) NOT NULL,
  `tgl_lhr_pgwai` date NOT NULL,
  `kk_pegawai` int(3) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendf_rj`
--

CREATE TABLE IF NOT EXISTS `pendf_rj` (
  `id_pendftrn` int(3) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(3) NOT NULL,
  `id_layanan` int(3) NOT NULL,
  `id_klinik` int(3) NOT NULL,
  `id_dokter` int(3) NOT NULL,
  `nama_pj` varchar(30) NOT NULL,
  `alamat_pj` varchar(30) NOT NULL,
  `no_telp_pj` int(15) NOT NULL,
  PRIMARY KEY (`id_pendftrn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Struktur dari tabel `resume_rmri`
--

CREATE TABLE IF NOT EXISTS `resume_rmri` (
  `id_resume` int(3) NOT NULL AUTO_INCREMENT,
  `id_rmri` int(3) NOT NULL,
  `id_mutasi` int(3) NOT NULL,
  `id_icd9` int(3) NOT NULL,
  `id_icd10` int(3) NOT NULL,
  `jenis_kasus` varchar(20) NOT NULL,
  `catatan` varchar(20) NOT NULL,
  `laboratorium` varchar(20) NOT NULL,
  `tgl_keluar` varchar(15) NOT NULL,
  `keadaan_keluar` varchar(15) NOT NULL,
  `cara_keluar` varchar(15) NOT NULL,
  `pemeriksaan_lanjut` varchar(15) NOT NULL,
  PRIMARY KEY (`id_resume`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `catatan` varchar(30) NOT NULL,
  `id_jenis_kasus` int(3) NOT NULL,
  `tindak_lanjut` varchar(15) NOT NULL,
  `alasan_datang` varchar(15) NOT NULL,
  `keadaan_keluar` varchar(15) NOT NULL,
  `cara_keluar` varchar(15) NOT NULL,
  `pemeriksaan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_rmrj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rm_igd`
--

CREATE TABLE IF NOT EXISTS `rm_igd` (
  `id_rm_igd` int(3) NOT NULL AUTO_INCREMENT,
  `id_pendftrn` int(3) NOT NULL,
  `id_icd9` int(3) NOT NULL,
  `id_icd10` int(3) NOT NULL,
  `alasan_datang_igd` varchar(15) NOT NULL,
  `id_dokter` int(3) NOT NULL,
  `kejadian_igd` varchar(15) NOT NULL,
  `tiba_igd` varchar(15) NOT NULL,
  `mulai_igd` varchar(15) NOT NULL,
  `selesai_igd` varchar(15) NOT NULL,
  `kategori_igd` varchar(15) NOT NULL,
  `anamnesa` varchar(30) NOT NULL,
  `tempat` varchar(15) NOT NULL,
  `transportasi` varchar(15) NOT NULL,
  `diperiksa` varchar(15) NOT NULL,
  `jenis_kasus` varchar(15) NOT NULL,
  `keadaan_umum` varchar(20) NOT NULL,
  `keadaan_khusus` varchar(20) NOT NULL,
  `keadaan_keluar` varchar(15) NOT NULL,
  `cara_keluar` varchar(15) NOT NULL,
  `pemeriksaan_lanjut` varchar(15) NOT NULL,
  `o2` varchar(10) NOT NULL,
  `infus` varchar(10) NOT NULL,
  `oral` varchar(10) NOT NULL,
  `injeksi` varchar(10) NOT NULL,
  `tindak_lanjut` varchar(10) NOT NULL,
  `catatan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rm_igd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rm_ri`
--

CREATE TABLE IF NOT EXISTS `rm_ri` (
  `id_rmri` int(3) NOT NULL AUTO_INCREMENT,
  `id_mutasi` int(3) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `jenis_kasus` varchar(10) NOT NULL,
  `alasan_datang` varchar(15) NOT NULL,
  `penerimaan` varchar(15) NOT NULL,
  `cara_masuk` varchar(15) NOT NULL,
  `nama_pj_ri` varchar(20) NOT NULL,
  `alamat_pj_ri` varchar(20) NOT NULL,
  `no_identitas_pj` int(3) NOT NULL,
  `no_telp` int(3) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
