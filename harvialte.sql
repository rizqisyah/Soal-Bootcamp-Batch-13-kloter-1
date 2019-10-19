-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2019 pada 15.00
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harvialte`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(10) NOT NULL,
  `nomor` varchar(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nomor`, `nama`, `created`, `updated`) VALUES
(11, '2341237698', 'Nurlia Nori', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(12, '4910235867', 'Dillah', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(13, '123465987', 'Abdillah', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(14, '12349878', 'Lala', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(15, '34234234', 'dsfsdf', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(16, '53425345', 'sdfsdfsdf', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(17, '76756756', 'sdfsgrtge445', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(18, '56456456', 'dertert', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(19, '343213423', 'dfsdfsdf', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(20, '45353453', 'sadasdfe4', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(22, '123546879', 'asdasdjlk', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(23, '0123457', 'jktjgrtgjkt', '2017-01-11 00:00:00', '0000-00-00 00:00:00'),
(24, '7856437856', 'hjgfdjkfg fkggfdg', '2017-01-11 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(50) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `lembaga` varchar(100) NOT NULL,
  `alamat` varchar(140) NOT NULL,
  `judul_proposal` varchar(100) NOT NULL,
  `pelaksanaan` date NOT NULL,
  `pimpinan_lembaga` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `surat_permohonan` varchar(10) NOT NULL,
  `akta_pendirian` varchar(10) NOT NULL,
  `ad` varchar(10) NOT NULL,
  `surat_ijin_domisili` varchar(10) NOT NULL,
  `sk_pengurus` varchar(10) NOT NULL,
  `ktp_ketua` varchar(10) NOT NULL,
  `sk_panitia` varchar(10) NOT NULL,
  `ktp_panitia` varchar(10) NOT NULL,
  `npwp` varchar(10) NOT NULL,
  `rekening` varchar(10) NOT NULL,
  `struktur` varchar(10) NOT NULL,
  `papan_nama` varchar(10) NOT NULL,
  `dokumentasi` varchar(10) NOT NULL,
  `rab` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `no_agenda`, `lembaga`, `alamat`, `judul_proposal`, `pelaksanaan`, `pimpinan_lembaga`, `status`, `surat_permohonan`, `akta_pendirian`, `ad`, `surat_ijin_domisili`, `sk_pengurus`, `ktp_ketua`, `sk_panitia`, `ktp_panitia`, `npwp`, `rekening`, `struktur`, `papan_nama`, `dokumentasi`, `rab`) VALUES
(0, '1111', 'Yayasan Holistic Education Center Indonesia', 'Jl Tarumanegara No. 18, 21 Perum Gama Permai', 'Proposal Pelatihan Kepemudaan Secara Inklusi Pusat Pelatihan Pemuda Holistic', '2019-09-12', 'Agung Wibowo', 'DIPROSES', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `testid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `test`
--

INSERT INTO `test` (`testid`, `name`) VALUES
(1, 'asdweqweqw'),
(2, 'rgevbrve'),
(3, 'ergerverdsvtr'),
(4, 'dfsdfsdf'),
(5, 'asdasd'),
(6, 'asdasderwerw'),
(7, 'frfvbrbrbyr'),
(8, 'yrdbdfbytbrtyb'),
(9, 'dfgdfgunyuyn'),
(10, 'ygkimumui'),
(11, 'kuykyunhnyn'),
(12, 'sadfsgrtbbyb  fgbrtgbtg'),
(13, 'gkdfjgkldfgg'),
(14, 'coba'),
(16, 'dasdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testing`
--

CREATE TABLE `testing` (
  `id` int(10) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `ttl` varchar(10) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1568980431, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indeks untuk tabel `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testid`);

--
-- Indeks untuk tabel `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `test`
--
ALTER TABLE `test`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
