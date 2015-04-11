-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Nov 2014 pada 08.23
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kaiofw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaio_akses_level`
--

CREATE TABLE IF NOT EXISTS `kaio_akses_level` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=650 ;

--
-- Dumping data untuk tabel `kaio_akses_level`
--

INSERT INTO `kaio_akses_level` (`id`, `user_id`, `group_id`, `rule_id`) VALUES
(645, 1819, 11890083, 9),
(644, 1819, 11890083, 8),
(643, 1819, 11890083, 7),
(642, 1819, 11890083, 3),
(641, 1819, 11890083, 18),
(640, 1819, 11890083, 17),
(639, 1819, 11890083, 16),
(638, 1819, 11890083, 2),
(637, 1819, 11890083, 34),
(636, 1819, 11890083, 33),
(635, 1819, 11890083, 32),
(634, 1819, 11890083, 31),
(633, 1819, 11890083, 38),
(632, 1819, 11890083, 37),
(631, 1819, 11890083, 36),
(597, 1892, 11890091, 6),
(596, 1892, 11890091, 15),
(595, 1892, 11890091, 14),
(594, 1892, 11890091, 13),
(630, 1819, 11890083, 35),
(516, 1866, 11890091, 18),
(515, 1866, 11890091, 17),
(514, 1866, 11890091, 16),
(513, 1866, 11890091, 2),
(512, 1866, 11890091, 1),
(629, 1819, 11890083, 43),
(628, 1819, 11890083, 42),
(627, 1819, 11890083, 41),
(626, 1819, 11890083, 40),
(625, 1819, 11890083, 39),
(624, 1819, 11890083, 12),
(623, 1819, 11890083, 11),
(622, 1819, 11890083, 10),
(621, 1819, 11890083, 4),
(620, 1819, 11890083, 22),
(619, 1819, 11890083, 6),
(618, 1819, 11890083, 30),
(617, 1819, 11890083, 29),
(616, 1819, 11890083, 28),
(615, 1819, 11890083, 27),
(614, 1819, 11890083, 1),
(613, 1819, 11890083, 26),
(612, 1819, 11890083, 25),
(611, 1819, 11890083, 24),
(610, 1819, 11890083, 23),
(593, 1892, 11890091, 5),
(592, 1892, 11890091, 12),
(591, 1892, 11890091, 11),
(590, 1892, 11890091, 10),
(589, 1892, 11890091, 4),
(588, 1892, 11890091, 9),
(587, 1892, 11890091, 8),
(586, 1892, 11890091, 7),
(585, 1892, 11890091, 3),
(584, 1892, 11890091, 2),
(583, 1892, 11890091, 1),
(598, 1892, 11890091, 39),
(608, 1893, 11890085, 18),
(607, 1893, 11890085, 17),
(606, 1893, 11890085, 16),
(605, 1893, 11890085, 2),
(604, 1893, 11890085, 1),
(609, 1893, 11890085, 14),
(646, 1819, 11890083, 5),
(647, 1819, 11890083, 13),
(648, 1819, 11890083, 14),
(649, 1819, 11890083, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaio_config`
--

CREATE TABLE IF NOT EXISTS `kaio_config` (
`id` int(11) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `version` varchar(10) NOT NULL,
  `jmlh_item` int(3) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `pnjg` int(3) NOT NULL,
  `lbr` int(3) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `kaio_config`
--

INSERT INTO `kaio_config` (`id`, `app_name`, `version`, `jmlh_item`, `logo`, `pnjg`, `lbr`) VALUES
(1, 'Blessing Residence', '2.13.1', 10, 'zahir.jpg', 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaio_groups`
--

CREATE TABLE IF NOT EXISTS `kaio_groups` (
`group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `desc` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11890093 ;

--
-- Dumping data untuk tabel `kaio_groups`
--

INSERT INTO `kaio_groups` (`group_id`, `group_name`, `desc`) VALUES
(11890083, 'superadmin', 'Super Admin'),
(11890084, 'manager', 'Manager'),
(11890085, 'staff', 'Staff'),
(11890091, 'admin', 'Administrator'),
(11890092, 'direksi', 'Direksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaio_role_rules`
--

CREATE TABLE IF NOT EXISTS `kaio_role_rules` (
`id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data untuk tabel `kaio_role_rules`
--

INSERT INTO `kaio_role_rules` (`id`, `group_id`, `rule_id`) VALUES
(14, 11890091, 9),
(13, 11890091, 8),
(12, 11890091, 7),
(11, 11890091, 3),
(10, 11890091, 2),
(9, 11890091, 1),
(15, 11890091, 4),
(16, 11890091, 10),
(17, 11890091, 11),
(18, 11890091, 12),
(19, 11890091, 5),
(20, 11890091, 13),
(21, 11890091, 14),
(22, 11890091, 15),
(23, 11890091, 6),
(24, 11890092, 1),
(25, 11890092, 2),
(48, 11890084, 2),
(47, 11890084, 1),
(45, 11890085, 18),
(44, 11890085, 17),
(30, 11890083, 1),
(31, 11890083, 2),
(32, 11890083, 3),
(33, 11890083, 4),
(34, 11890083, 5),
(35, 11890083, 6),
(43, 11890085, 16),
(42, 11890085, 2),
(41, 11890085, 1),
(46, 11890085, 14),
(49, 11890084, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaio_rules`
--

CREATE TABLE IF NOT EXISTS `kaio_rules` (
`rule_id` int(3) NOT NULL,
  `rule_class` varchar(40) NOT NULL,
  `rule_method` varchar(40) NOT NULL,
  `menu` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data untuk tabel `kaio_rules`
--

INSERT INTO `kaio_rules` (`rule_id`, `rule_class`, `rule_method`, `menu`) VALUES
(1, 'dashboard', 'index', 'Dashboard'),
(2, 'produk', 'index', 'Produk'),
(3, 'rule', 'index', 'Rule'),
(4, 'hakakses', 'index', 'Hak Akses'),
(5, 'user', 'index', 'User'),
(6, 'grouprule', 'index', 'Group Rule'),
(7, 'rule', 'add', 'Rule'),
(8, 'rule', 'edit', 'Rule'),
(9, 'rule', 'hapus', 'Rule'),
(10, 'hakakses', 'add', 'Hak Akses'),
(11, 'hakakses', 'edit', 'Hak Akses'),
(12, 'hakakses', 'hapus', 'Hak Akses'),
(13, 'user', 'add', 'User'),
(14, 'user', 'edit', 'User'),
(15, 'user', 'hapus', 'User'),
(16, 'produk', 'add', 'Produk'),
(17, 'produk', 'edit', 'Produk'),
(18, 'produk', 'hapus', 'Produk'),
(22, 'grouprule', 'edit', 'Group Rule'),
(23, 'customer', 'index', 'Customer'),
(24, 'customer', 'add', 'Customer'),
(25, 'customer', 'edit', 'Customer'),
(26, 'customer', 'hapus', 'Customer'),
(27, 'developer', 'index', 'Developer'),
(28, 'developer', 'add', 'Developer'),
(29, 'developer', 'edit', 'Developer'),
(30, 'developer', 'hapus', 'Developer'),
(31, 'po_customer', 'index', 'PO Customer'),
(32, 'po_customer', 'add', 'PO Customer'),
(33, 'po_customer', 'edit', 'PO Customer'),
(34, 'po_customer', 'hapus', 'PO Customer'),
(35, 'order', 'index', 'Order'),
(36, 'order', 'add', 'Order'),
(37, 'order', 'edit', 'Order'),
(38, 'order', 'hapus', 'Order'),
(39, 'info', 'index', 'Information'),
(40, 'karyawan', 'index', 'Karyawan'),
(41, 'karyawan', 'add', 'Karyawan'),
(42, 'karyawan', 'edit', 'Karyawan'),
(43, 'karyawan', 'hapus', 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaio_templates`
--

CREATE TABLE IF NOT EXISTS `kaio_templates` (
`id` int(3) NOT NULL,
  `template_name` varchar(30) NOT NULL,
  `author` varchar(100) NOT NULL,
  `default` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `kaio_templates`
--

INSERT INTO `kaio_templates` (`id`, `template_name`, `author`, `default`) VALUES
(1, 'default', 'Fatah', 1),
(2, 'sirs1', 'Deadflow', 0),
(3, 'sirs2', 'Ako', 0),
(4, 'sirs3', 'Ako2', 0),
(5, 'sirs4', 'koko', 0),
(6, 'sirs5', 'Aws', 0),
(7, 'sirs6', 'Dede', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaio_users`
--

CREATE TABLE IF NOT EXISTS `kaio_users` (
`user_id` int(11) NOT NULL,
  `k_username` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `k_password` varchar(100) NOT NULL,
  `tgl_register` date NOT NULL,
  `last_login` datetime NOT NULL,
  `block` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=Yes,N=Np',
  `group_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1894 ;

--
-- Dumping data untuk tabel `kaio_users`
--

INSERT INTO `kaio_users` (`user_id`, `k_username`, `name`, `email`, `k_password`, `tgl_register`, `last_login`, `block`, `group_id`) VALUES
(1819, 'superadmin', 'Super Admin', 'superadmin@nyahoo.com', '17c4520f6cfd1ab53d8745e84681eb49', '0000-00-00', '2014-09-07 08:09:39', 'N', 11890083),
(1893, 'ucok', 'Ucok Baba', 'ucok@yahoo.com', 'd41d8cd98f00b204e9800998ecf8427e', '2014-04-29', '2014-04-30 09:04:07', 'N', 11890085),
(1866, 'admincyber', 'Admin', 'admin@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '2013-04-09', '2014-04-29 18:04:34', 'N', 11890091),
(1892, 'fatah', 'Fatah Iskandar Akbar', 'webcreatif@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '2014-04-29', '2014-04-29 18:04:21', 'N', 11890091);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kaio_akses_level`
--
ALTER TABLE `kaio_akses_level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaio_config`
--
ALTER TABLE `kaio_config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaio_groups`
--
ALTER TABLE `kaio_groups`
 ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `kaio_role_rules`
--
ALTER TABLE `kaio_role_rules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaio_rules`
--
ALTER TABLE `kaio_rules`
 ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `kaio_templates`
--
ALTER TABLE `kaio_templates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaio_users`
--
ALTER TABLE `kaio_users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kaio_akses_level`
--
ALTER TABLE `kaio_akses_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=650;
--
-- AUTO_INCREMENT for table `kaio_config`
--
ALTER TABLE `kaio_config`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--

--
-- AUTO_INCREMENT for table `kaio_groups`
--
ALTER TABLE `kaio_groups`
MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11890093;
--
--
-- AUTO_INCREMENT for table `kaio_role_rules`
--
ALTER TABLE `kaio_role_rules`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `kaio_rules`
--
ALTER TABLE `kaio_rules`
MODIFY `rule_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `kaio_templates`
--
ALTER TABLE `kaio_templates`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kaio_users`
--
ALTER TABLE `kaio_users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1894;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
