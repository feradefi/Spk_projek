-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 06:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `namalengkap` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `level`, `namalengkap`) VALUES
(1, 'admin', 'ADMIN', 'ADMIN', 'ADMIN'),
(2, 'shifa', 'shifa', 'USER', 'shifa adzkia');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(5) NOT NULL,
  `nm_alternatif` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nm_alternatif`) VALUES
('al002', 'Helmi Supandi '),
('al001', 'Anggo Eko Prasetyo'),
('al003', 'Siti Nur Alisa'),
('al004', 'Faridah Evi Yuliyanti'),
('al005', 'Crisma Wati Wulandari'),
('al006', 'Aprilina Eka Reskia Nanda'),
('al007', 'Arianti Indah Pratama'),
('al008', 'Vita Rusdiana'),
('al009', 'Windi Meisiska Devi'),
('al010', 'Tiwi Afifah Sari'),
('al011', 'Eka Mey Pradita Ningsih'),
('al012', 'Faridatul Amaliyah'),
('al013', 'Dadang Priyanto'),
('al014', 'Eko Agus Riyanto'),
('al015', 'Ahmad Luken Nursyahran'),
('al016', 'Muhammad Asrori Muzaq'),
('al017', 'Fajar Cahya Mukti'),
('al018', 'Eko Dwi Susanto'),
('al019', 'Muhamad Irwan Hakim'),
('al020', 'Moch Fachrizal Arif'),
('al021', 'Sandi Fauzi'),
('al022', 'Reska Yudha Yudistira'),
('al023', 'Fajar Abqo'),
('al024', 'Syahrul Imanudin'),
('al025', 'Rizky Eka Saputra'),
('al026', 'Kholik Dikyanto Nur Wahyudi'),
('al027', 'Agung Wahyudi'),
('al028', 'Purwanto'),
('al029', 'Robi Herfian Mandala'),
('al030', 'Mochammad Azwan Sholeh'),
('al031', 'Kartika Candra Fadlilah'),
('al032', 'Mita Nurhalizah'),
('al033', 'Ervina Setyawati '),
('al034', 'Ismi Widayati'),
('al035', 'Mukhayyatul Fauziah'),
('al036', 'Erina Mahmudah'),
('al037', 'Vita Risti Ika Suci'),
('al038', 'Pritna Shobar'),
('al039', 'Diana Ambarwati'),
('al040', 'Fahira Fitri Dwi Mustika'),
('al041', 'Muhammad Fahdelul Ilmi'),
('al042', 'Abdul Rokhim'),
('al043', 'Muhammad Bagus Haqiqi'),
('al044', 'Dwi Yoga Aditya'),
('al045', 'Muhammad Miftakul Rizqi'),
('al046', 'Andrian Fadhilah'),
('al047', 'Raka Novianto '),
('al048', 'Achmad Nasrullah'),
('al049', 'Bondan Prastyo'),
('al050', 'Muhammad Ilham Maulana');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(45) NOT NULL,
  `bobot` double NOT NULL,
  `nilai1` double NOT NULL,
  `nilai2` double NOT NULL,
  `nilai3` double NOT NULL,
  `nilai4` double NOT NULL,
  `nilai5` double NOT NULL,
  `sifat` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `sifat`) VALUES
('kr004', 'Loyalitas', 5, 1, 2, 3, 4, 5, 'benefit'),
('kr005', 'Pelanggaran', 4, 1, 2, 3, 4, 5, 'cost'),
('kr006', 'Masa Kerja', 3, 1, 2, 3, 4, 5, 'benefit'),
('kr003', 'Kedisiplinan', 4, 1, 2, 3, 4, 5, 'benefit'),
('kr002', 'Kinerja', 5, 1, 2, 3, 4, 5, 'benefit'),
('kr001', 'Absensi', 4, 1, 2, 3, 4, 5, 'cost'),
('kr007', 'Pendidikan', 2, 1, 2, 3, 4, 5, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_matrik`
--

CREATE TABLE `nilai_matrik` (
  `id_matrik` int(7) NOT NULL,
  `id_alternatif` varchar(7) NOT NULL,
  `id_kriteria` varchar(7) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id_matrik`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(224, 'al004', 'kr007', 3),
(223, 'al004', 'kr006', 3),
(210, 'al002', 'kr007', 3),
(209, 'al002', 'kr006', 3),
(229, 'al005', 'kr005', -3),
(217, 'al003', 'kr007', 3),
(216, 'al003', 'kr006', 3),
(215, 'al003', 'kr005', -1),
(214, 'al003', 'kr004', 1),
(222, 'al004', 'kr005', -2),
(221, 'al004', 'kr004', 1),
(220, 'al004', 'kr003', 2),
(208, 'al002', 'kr005', -5),
(207, 'al002', 'kr004', 4),
(206, 'al002', 'kr003', 5),
(203, 'al001', 'kr007', 3),
(202, 'al001', 'kr006', 3),
(201, 'al001', 'kr005', -5),
(200, 'al001', 'kr004', 4),
(199, 'al001', 'kr003', 5),
(213, 'al003', 'kr003', 5),
(228, 'al005', 'kr004', 4),
(227, 'al005', 'kr003', 4),
(226, 'al005', 'kr002', 5),
(225, 'al005', 'kr001', -5),
(198, 'al001', 'kr002', 4),
(197, 'al001', 'kr001', -5),
(205, 'al002', 'kr002', 3),
(204, 'al002', 'kr001', -1),
(212, 'al003', 'kr002', 2),
(211, 'al003', 'kr001', -4),
(219, 'al004', 'kr002', 5),
(218, 'al004', 'kr001', -4),
(230, 'al005', 'kr006', 1),
(231, 'al005', 'kr007', 3),
(232, 'al006', 'kr001', -4),
(233, 'al006', 'kr002', 4),
(234, 'al006', 'kr003', 5),
(235, 'al006', 'kr004', 2),
(236, 'al006', 'kr005', -1),
(237, 'al006', 'kr006', 3),
(238, 'al006', 'kr007', 3),
(239, 'al007', 'kr001', -1),
(240, 'al007', 'kr002', 5),
(241, 'al007', 'kr003', 2),
(242, 'al007', 'kr004', 3),
(243, 'al007', 'kr005', -4),
(244, 'al007', 'kr006', 3),
(245, 'al007', 'kr007', 3),
(246, 'al008', 'kr001', -2),
(247, 'al008', 'kr002', 4),
(248, 'al008', 'kr003', 3),
(249, 'al008', 'kr004', 3),
(250, 'al008', 'kr005', -3),
(251, 'al008', 'kr006', 2),
(252, 'al008', 'kr007', 3),
(253, 'al009', 'kr001', -4),
(254, 'al009', 'kr002', 4),
(255, 'al009', 'kr003', 5),
(256, 'al009', 'kr004', 5),
(257, 'al009', 'kr005', -3),
(258, 'al009', 'kr006', 2),
(259, 'al009', 'kr007', 3),
(260, 'al010', 'kr001', -5),
(261, 'al010', 'kr002', 3),
(262, 'al010', 'kr003', 3),
(263, 'al010', 'kr004', 1),
(264, 'al010', 'kr005', -5),
(265, 'al010', 'kr006', 3),
(266, 'al010', 'kr007', 5),
(267, 'al011', 'kr001', -3),
(268, 'al011', 'kr002', 3),
(269, 'al011', 'kr003', 3),
(270, 'al011', 'kr004', 4),
(271, 'al011', 'kr005', -2),
(272, 'al011', 'kr006', 2),
(273, 'al011', 'kr007', 3),
(274, 'al012', 'kr001', -3),
(275, 'al012', 'kr002', 5),
(276, 'al012', 'kr003', 2),
(277, 'al012', 'kr004', 1),
(278, 'al012', 'kr005', -3),
(279, 'al012', 'kr006', 2),
(280, 'al012', 'kr007', 3),
(281, 'al013', 'kr001', -2),
(282, 'al013', 'kr002', 4),
(283, 'al013', 'kr003', 1),
(284, 'al013', 'kr004', 4),
(285, 'al013', 'kr005', -4),
(286, 'al013', 'kr006', 2),
(287, 'al013', 'kr007', 2),
(288, 'al014', 'kr001', -4),
(289, 'al014', 'kr002', 3),
(290, 'al014', 'kr003', 3),
(291, 'al014', 'kr004', 3),
(292, 'al014', 'kr005', -1),
(293, 'al014', 'kr006', 3),
(294, 'al014', 'kr007', 3),
(295, 'al015', 'kr001', -3),
(296, 'al015', 'kr002', 3),
(297, 'al015', 'kr003', 4),
(298, 'al015', 'kr004', 4),
(299, 'al015', 'kr005', -3),
(300, 'al015', 'kr006', 2),
(301, 'al015', 'kr007', 3),
(302, 'al016', 'kr001', -1),
(303, 'al016', 'kr002', 4),
(304, 'al016', 'kr003', 5),
(305, 'al016', 'kr004', 5),
(306, 'al016', 'kr005', -4),
(307, 'al016', 'kr006', 3),
(308, 'al016', 'kr007', 3),
(309, 'al017', 'kr001', -2),
(310, 'al017', 'kr002', 3),
(311, 'al017', 'kr003', 4),
(312, 'al017', 'kr004', 3),
(313, 'al017', 'kr005', -1),
(314, 'al017', 'kr006', 1),
(315, 'al017', 'kr007', 3),
(316, 'al018', 'kr001', -5),
(317, 'al018', 'kr002', 1),
(318, 'al018', 'kr003', 2),
(319, 'al018', 'kr004', 2),
(320, 'al018', 'kr005', -4),
(321, 'al018', 'kr006', 1),
(322, 'al018', 'kr007', 5),
(323, 'al019', 'kr001', -4),
(324, 'al019', 'kr002', 1),
(325, 'al019', 'kr003', 3),
(326, 'al019', 'kr004', 2),
(327, 'al019', 'kr005', -3),
(328, 'al019', 'kr006', 1),
(329, 'al019', 'kr007', 3),
(330, 'al020', 'kr001', -4),
(331, 'al020', 'kr002', 5),
(332, 'al020', 'kr003', 1),
(333, 'al020', 'kr004', 5),
(334, 'al020', 'kr005', -5),
(335, 'al020', 'kr006', 1),
(336, 'al020', 'kr007', 3),
(337, 'al021', 'kr001', -2),
(338, 'al021', 'kr002', 5),
(339, 'al021', 'kr003', 5),
(340, 'al021', 'kr004', 5),
(341, 'al021', 'kr005', -4),
(342, 'al021', 'kr006', 1),
(343, 'al021', 'kr007', 3),
(344, 'al022', 'kr001', -3),
(345, 'al022', 'kr002', 1),
(346, 'al022', 'kr003', 5),
(347, 'al022', 'kr004', 3),
(348, 'al022', 'kr005', -4),
(349, 'al022', 'kr006', 1),
(350, 'al022', 'kr007', 3),
(351, 'al023', 'kr001', -2),
(352, 'al023', 'kr002', 5),
(353, 'al023', 'kr003', 1),
(354, 'al023', 'kr004', 1),
(355, 'al023', 'kr005', -2),
(356, 'al023', 'kr006', 1),
(357, 'al023', 'kr007', 5),
(358, 'al024', 'kr001', -5),
(359, 'al024', 'kr002', 1),
(360, 'al024', 'kr003', 1),
(361, 'al024', 'kr004', 2),
(362, 'al024', 'kr005', -5),
(363, 'al024', 'kr006', 1),
(364, 'al024', 'kr007', 5),
(365, 'al026', 'kr001', -4),
(366, 'al026', 'kr002', 4),
(367, 'al026', 'kr003', 2),
(368, 'al026', 'kr004', 2),
(369, 'al026', 'kr005', -4),
(370, 'al026', 'kr006', 1),
(371, 'al026', 'kr007', 3),
(372, 'al027', 'kr001', -1),
(373, 'al027', 'kr002', 4),
(374, 'al027', 'kr003', 2),
(375, 'al027', 'kr004', 4),
(376, 'al027', 'kr005', -2),
(377, 'al027', 'kr006', 1),
(378, 'al027', 'kr007', 3),
(379, 'al025', 'kr001', -2),
(380, 'al025', 'kr002', 2),
(381, 'al025', 'kr003', 2),
(382, 'al025', 'kr004', 1),
(383, 'al025', 'kr005', -5),
(384, 'al025', 'kr006', 1),
(385, 'al025', 'kr007', 4),
(386, 'al028', 'kr001', -2),
(387, 'al028', 'kr002', 1),
(388, 'al028', 'kr003', 4),
(389, 'al028', 'kr004', 2),
(390, 'al028', 'kr005', -2),
(391, 'al028', 'kr006', 3),
(392, 'al028', 'kr007', 2),
(393, 'al029', 'kr001', -2),
(394, 'al029', 'kr002', 5),
(395, 'al029', 'kr003', 3),
(396, 'al029', 'kr004', 3),
(397, 'al029', 'kr005', -1),
(398, 'al029', 'kr006', 3),
(399, 'al029', 'kr007', 3),
(400, 'al030', 'kr001', -5),
(401, 'al030', 'kr002', 2),
(402, 'al030', 'kr003', 2),
(403, 'al030', 'kr004', 3),
(404, 'al030', 'kr005', -3),
(405, 'al030', 'kr006', 2),
(406, 'al030', 'kr007', 3),
(407, 'al031', 'kr001', -4),
(408, 'al031', 'kr002', 4),
(409, 'al031', 'kr003', 3),
(410, 'al031', 'kr004', 4),
(411, 'al031', 'kr005', -1),
(412, 'al031', 'kr006', 3),
(413, 'al031', 'kr007', 3),
(434, 'al032', 'kr007', 3),
(433, 'al032', 'kr006', 3),
(432, 'al032', 'kr005', -5),
(431, 'al032', 'kr004', 2),
(430, 'al032', 'kr003', 5),
(429, 'al032', 'kr002', 2),
(428, 'al032', 'kr001', -4),
(421, 'al033', 'kr001', -3),
(422, 'al033', 'kr002', 1),
(423, 'al033', 'kr003', 3),
(424, 'al033', 'kr004', 5),
(425, 'al033', 'kr005', -1),
(426, 'al033', 'kr006', 2),
(427, 'al033', 'kr007', 3),
(435, 'al034', 'kr001', -2),
(436, 'al034', 'kr002', 1),
(437, 'al034', 'kr003', 1),
(438, 'al034', 'kr004', 4),
(439, 'al034', 'kr005', -1),
(440, 'al034', 'kr006', 3),
(441, 'al034', 'kr007', 3),
(442, 'al035', 'kr001', -3),
(443, 'al035', 'kr002', 3),
(444, 'al035', 'kr003', 1),
(445, 'al035', 'kr004', 3),
(446, 'al035', 'kr005', -5),
(447, 'al035', 'kr006', 3),
(448, 'al035', 'kr007', 3),
(449, 'al036', 'kr001', -1),
(450, 'al036', 'kr002', 4),
(451, 'al036', 'kr003', 5),
(452, 'al036', 'kr004', 5),
(453, 'al036', 'kr005', -4),
(454, 'al036', 'kr006', 2),
(455, 'al036', 'kr007', 5),
(456, 'al037', 'kr001', -3),
(457, 'al037', 'kr002', 5),
(458, 'al037', 'kr003', 5),
(459, 'al037', 'kr004', 1),
(460, 'al037', 'kr005', -1),
(461, 'al037', 'kr006', 2),
(462, 'al037', 'kr007', 2),
(463, 'al038', 'kr001', -1),
(464, 'al038', 'kr002', 1),
(465, 'al038', 'kr003', 1),
(466, 'al038', 'kr004', 5),
(467, 'al038', 'kr005', -5),
(468, 'al038', 'kr006', 2),
(469, 'al038', 'kr007', 3),
(470, 'al039', 'kr001', -1),
(471, 'al039', 'kr002', 5),
(472, 'al039', 'kr003', 5),
(473, 'al039', 'kr004', 3),
(474, 'al039', 'kr005', -4),
(475, 'al039', 'kr006', 2),
(476, 'al039', 'kr007', 3),
(477, 'al040', 'kr001', -4),
(478, 'al040', 'kr002', 5),
(479, 'al040', 'kr003', 4),
(480, 'al040', 'kr004', 5),
(481, 'al040', 'kr005', -2),
(482, 'al040', 'kr006', 2),
(483, 'al040', 'kr007', 3),
(484, 'al041', 'kr001', -4),
(485, 'al041', 'kr002', 3),
(486, 'al041', 'kr003', 2),
(487, 'al041', 'kr004', 4),
(488, 'al041', 'kr005', -3),
(489, 'al041', 'kr006', 2),
(490, 'al041', 'kr007', 3),
(491, 'al042', 'kr001', -5),
(492, 'al042', 'kr002', 3),
(493, 'al042', 'kr003', 5),
(494, 'al042', 'kr004', 4),
(495, 'al042', 'kr005', -5),
(496, 'al042', 'kr006', 2),
(497, 'al042', 'kr007', 3),
(498, 'al043', 'kr001', -3),
(499, 'al043', 'kr002', 4),
(500, 'al043', 'kr003', 2),
(501, 'al043', 'kr004', 5),
(502, 'al043', 'kr005', -4),
(503, 'al043', 'kr006', 1),
(504, 'al043', 'kr007', 3),
(505, 'al044', 'kr001', -2),
(506, 'al044', 'kr002', 4),
(507, 'al044', 'kr003', 4),
(508, 'al044', 'kr004', 3),
(509, 'al044', 'kr005', -2),
(510, 'al044', 'kr006', 1),
(511, 'al044', 'kr007', 3),
(512, 'al045', 'kr001', -2),
(513, 'al045', 'kr002', 4),
(514, 'al045', 'kr003', 4),
(515, 'al045', 'kr004', 2),
(516, 'al045', 'kr005', -2),
(517, 'al045', 'kr006', 1),
(518, 'al045', 'kr007', 3),
(519, 'al046', 'kr001', -4),
(520, 'al046', 'kr002', 3),
(521, 'al046', 'kr003', 5),
(522, 'al046', 'kr004', 4),
(523, 'al046', 'kr005', -3),
(524, 'al046', 'kr006', 1),
(525, 'al046', 'kr007', 3),
(526, 'al047', 'kr001', -2),
(527, 'al047', 'kr002', 2),
(528, 'al047', 'kr003', 2),
(529, 'al047', 'kr004', 5),
(530, 'al047', 'kr005', -2),
(531, 'al047', 'kr006', 1),
(532, 'al047', 'kr007', 4),
(533, 'al048', 'kr001', -3),
(534, 'al048', 'kr002', 4),
(535, 'al048', 'kr003', 3),
(536, 'al048', 'kr004', 4),
(537, 'al048', 'kr005', -3),
(538, 'al048', 'kr006', 1),
(539, 'al048', 'kr007', 4),
(540, 'al049', 'kr001', -4),
(541, 'al049', 'kr002', 4),
(542, 'al049', 'kr003', 2),
(543, 'al049', 'kr004', 3),
(544, 'al049', 'kr005', -4),
(545, 'al049', 'kr006', 1),
(546, 'al049', 'kr007', 3),
(547, 'al050', 'kr001', -1),
(548, 'al050', 'kr002', 3),
(549, 'al050', 'kr003', 2),
(550, 'al050', 'kr004', 3),
(551, 'al050', 'kr005', -3),
(552, 'al050', 'kr006', 3),
(553, 'al050', 'kr007', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `nm_alternatif` varchar(35) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  ADD PRIMARY KEY (`id_matrik`);

--
-- Indexes for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  ADD PRIMARY KEY (`nm_alternatif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id_matrik` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=554;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
