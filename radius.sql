-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2019 at 02:49 AM
-- Server version: 5.5.64-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `radius`
--

-- --------------------------------------------------------

--
-- Table structure for table `nas`
--

CREATE TABLE IF NOT EXISTS `nas` (
  `id` int(10) NOT NULL,
  `nasname` varchar(128) NOT NULL,
  `shortname` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT 'other',
  `ports` int(5) DEFAULT NULL,
  `secret` varchar(60) NOT NULL DEFAULT 'secret',
  `server` varchar(64) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT 'RADIUS Client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `radacct`
--

CREATE TABLE IF NOT EXISTS `radacct` (
  `radacctid` bigint(21) NOT NULL,
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctupdatetime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctinterval` int(12) DEFAULT NULL,
  `acctsessiontime` int(12) unsigned DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) NOT NULL DEFAULT '',
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radacct`
--

INSERT INTO `radacct` (`radacctid`, `acctsessionid`, `acctuniqueid`, `username`, `groupname`, `realm`, `nasipaddress`, `nasportid`, `nasporttype`, `acctstarttime`, `acctupdatetime`, `acctstoptime`, `acctinterval`, `acctsessiontime`, `acctauthentic`, `connectinfo_start`, `connectinfo_stop`, `acctinputoctets`, `acctoutputoctets`, `calledstationid`, `callingstationid`, `acctterminatecause`, `servicetype`, `framedprotocol`, `framedipaddress`) VALUES
(1, '5dc8cab900000001', 'bc0a64ff49ede293b9adc0c3f70fcb34', 'user1', '', '', '192.168.10.1', '00000001', 'Wireless-802.11', '2019-11-11 09:43:09', '2019-11-11 09:43:09', NULL, NULL, 20, '', '', '', 182556, 74723, 'EC-A8-6B-DD-B8-FF', '80-E8-2C-BF-57-24', 'User-Request', '', '', '192.168.10.50'),
(2, '5dc8cad000000001', 'cd15e4eb5bfd08acec32e0735ae6bda1', 'user1', '', '', '192.168.10.1', '00000001', 'Wireless-802.11', '2019-11-11 09:43:38', '2019-11-11 09:43:38', '2019-11-11 09:46:11', NULL, 153, '', '', '', 4730700, 476529, 'EC-A8-6B-DD-B8-FF', '80-E8-2C-BF-57-24', 'User-Request', '', '', '192.168.10.50'),
(3, '5dc8cb0900000002', '66a3fb51bd6fbd1f6b990628809b89a7', 'user1', '', '', '192.168.10.1', '00000002', 'Wireless-802.11', '2019-11-11 09:44:31', '2019-11-11 09:44:31', '2019-11-11 09:44:39', NULL, 8, '', '', '', 7735707, 216958, 'EC-A8-6B-DD-B8-FF', '30-9C-23-84-DA-73', 'User-Request', '', '', '192.168.10.51'),
(4, '5dc8cb1700000002', '12264cc984bb7993a02e7ec94f85cc7b', 'user1', '', '', '192.168.10.1', '00000002', 'Wireless-802.11', '2019-11-11 09:44:51', '2019-11-11 09:44:51', '2019-11-11 09:45:15', NULL, 24, '', '', '', 16734479, 379955, 'EC-A8-6B-DD-B8-FF', '30-9C-23-84-DA-73', 'User-Request', '', '', '192.168.10.51'),
(5, '5dc8cb3b00000002', 'c709781d5755d42e13d5ac0cabb63e16', 'user1', '', '', '192.168.10.1', '00000002', 'Wireless-802.11', '2019-11-11 09:45:28', '2019-11-11 09:45:28', '2019-11-11 09:46:20', NULL, 52, '', '', '', 18900666, 349600, 'EC-A8-6B-DD-B8-FF', '30-9C-23-84-DA-73', 'User-Request', '', '', '192.168.10.51'),
(6, '5dc8cb7200000001', '4c616438083d4c3bef585aa7f75c0d80', 'user1', '', '', '192.168.10.1', '00000001', 'Wireless-802.11', '2019-11-11 09:46:23', '2019-11-11 09:46:23', NULL, NULL, 70, '', '', '', 801394, 239443, 'EC-A8-6B-DD-B8-FF', '80-E8-2C-BF-57-24', 'User-Request', '', '', '192.168.10.50'),
(7, '5dc8cb8e00000002', '003182843babce59e927f13687471e90', 'user2', '', '', '192.168.10.1', '00000002', 'Wireless-802.11', '2019-11-11 09:46:50', '2019-11-11 09:46:50', '2019-11-11 09:46:58', NULL, 8, '', '', '', 6020023, 131524, 'EC-A8-6B-DD-B8-FF', '30-9C-23-84-DA-73', 'User-Request', '', '', '192.168.10.51'),
(8, '5dc8cba200000002', '7f61610ab938067e207624c77b8d4d58', 'user2', '', '', '192.168.10.1', '00000002', 'Wireless-802.11', '2019-11-11 09:47:36', '2019-11-11 09:47:36', '2019-11-11 09:47:41', NULL, 5, '', '', '', 161542, 54332, 'EC-A8-6B-DD-B8-FF', '30-9C-23-84-DA-73', 'User-Request', '', '', '192.168.10.51'),
(9, '5dc8cbc500000001', '4d0722dae8ab588f8bdab9f871b6dfb7', 'user1', '', '', '192.168.10.1', '00000001', 'Wireless-802.11', '2019-11-11 09:47:42', '2019-11-11 09:47:42', '2019-11-11 09:47:47', NULL, 5, '', '', '', 13313, 22990, 'EC-A8-6B-DD-B8-FF', '80-E8-2C-BF-57-24', 'User-Request', '', '', '192.168.10.50'),
(10, '5dc8cbcd00000002', '251f279e085abcc64c79deeb5f52074a', 'user1', '', '', '192.168.10.1', '00000002', 'Wireless-802.11', '2019-11-11 09:48:19', '2019-11-11 09:48:19', '2019-11-11 09:48:27', NULL, 8, '', '', '', 436746, 89614, 'EC-A8-6B-DD-B8-FF', '30-9C-23-84-DA-73', 'User-Request', '', '', '192.168.10.51'),
(11, '5dc8cbd300000001', 'a82a75ed182508f2f4c31bfb068268de', 'user1', '', '', '192.168.10.1', '00000001', 'Wireless-802.11', '2019-11-11 09:48:49', '2019-11-11 09:48:49', NULL, NULL, 0, '', '', '', 0, 0, 'EC-A8-6B-DD-B8-FF', '80-E8-2C-BF-57-24', '', '', '', '192.168.10.50'),
(12, '5dc8cbfb00000002', '34cb3afad137582f1561f312c38334e8', 'user2', '', '', '192.168.10.1', '00000002', 'Wireless-802.11', '2019-11-11 09:48:51', '2019-11-11 09:48:51', '2019-11-11 09:48:56', NULL, 5, '', '', '', 49130, 20696, 'EC-A8-6B-DD-B8-FF', '30-9C-23-84-DA-73', 'User-Request', '', '', '192.168.10.51'),
(13, '5dc8cc1800000002', '2a9a382d4ca20ea578ba863d8a8f6b1d', 'user2', '', '', '192.168.10.1', '00000002', 'Wireless-802.11', '2019-11-11 09:49:09', '2019-11-11 09:49:09', NULL, NULL, 0, '', '', '', 0, 0, 'EC-A8-6B-DD-B8-FF', '30-9C-23-84-DA-73', '', '', '', '192.168.10.51');

-- --------------------------------------------------------

--
-- Table structure for table `radcheck`
--

CREATE TABLE IF NOT EXISTS `radcheck` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radcheck`
--

INSERT INTO `radcheck` (`id`, `username`, `attribute`, `op`, `value`) VALUES
(1, 'user1', 'Cleartext-Password', ':=', '1234'),
(2, 'user2', 'Cleartext-Password', ':=', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `radgroupcheck`
--

CREATE TABLE IF NOT EXISTS `radgroupcheck` (
  `id` int(11) unsigned NOT NULL,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radgroupcheck`
--

INSERT INTO `radgroupcheck` (`id`, `groupname`, `attribute`, `op`, `value`) VALUES
(1, 'student', 'Service-Type', ':=', 'Login-User'),
(4, 'student', 'Simultaneous-Use', ':=', '2');

-- --------------------------------------------------------

--
-- Table structure for table `radgroupreply`
--

CREATE TABLE IF NOT EXISTS `radgroupreply` (
  `id` int(11) unsigned NOT NULL,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radgroupreply`
--

INSERT INTO `radgroupreply` (`id`, `groupname`, `attribute`, `op`, `value`) VALUES
(4, 'student', 'WISPr-Redirection-URL', ':=', 'http://www.facebook.com');

-- --------------------------------------------------------

--
-- Table structure for table `radpostauth`
--

CREATE TABLE IF NOT EXISTS `radpostauth` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `reply` varchar(32) NOT NULL DEFAULT '',
  `authdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radpostauth`
--

INSERT INTO `radpostauth` (`id`, `username`, `pass`, `reply`, `authdate`) VALUES
(12, 'user1', '123h4', 'Access-Reject', '2019-11-11 02:32:27'),
(13, 'user1', '1234', 'Access-Accept', '2019-11-11 02:32:32'),
(14, 'user1', '1234', 'Access-Reject', '2019-11-11 02:32:59'),
(15, 'user1', '1234', 'Access-Reject', '2019-11-11 02:33:56'),
(16, 'user1', '1234', 'Access-Accept', '2019-11-11 02:34:04'),
(17, 'user1', '1231234', 'Access-Reject', '2019-11-11 02:34:08'),
(18, 'user1', '1231234', 'Access-Reject', '2019-11-11 02:36:55'),
(19, 'user1', '1234', 'Access-Accept', '2019-11-11 02:37:03'),
(20, 'user1', '1234', 'Access-Accept', '2019-11-11 02:37:54'),
(21, 'user1', '1234', 'Access-Accept', '2019-11-11 02:38:07'),
(22, 'user1', '1234', 'Access-Accept', '2019-11-11 02:38:18'),
(23, 'user1', '1234', 'Access-Accept', '2019-11-11 02:40:16'),
(24, 'user1', '0x00085a22485135c47fc64fcd5df8f9a311', 'Access-Reject', '2019-11-11 02:43:04'),
(25, 'user1', '0x0001c4d0e7f5e93f933ec5b0ae3c856ab4', 'Access-Accept', '2019-11-11 02:43:09'),
(26, 'user1', '0x0001c4d0e7f5e93f933ec5b0ae3c856ab4', 'Access-Accept', '2019-11-11 02:43:38'),
(27, 'user1', '0x0036288712c94515212efa535cc4d57b3f', 'Access-Reject', '2019-11-11 02:44:24'),
(28, 'user1', '0x00ed828b64013c11987a9f64e81af74268', 'Access-Accept', '2019-11-11 02:44:30'),
(29, 'user1', '0x00ed828b64013c11987a9f64e81af74268', 'Access-Accept', '2019-11-11 02:44:51'),
(30, 'user1', '0x00ed828b64013c11987a9f64e81af74268', 'Access-Accept', '2019-11-11 02:45:27'),
(31, 'user1', '0x0001c4d0e7f5e93f933ec5b0ae3c856ab4', 'Access-Accept', '2019-11-11 02:46:23'),
(32, 'user1', '0x00ed828b64013c11987a9f64e81af74268', 'Access-Reject', '2019-11-11 02:46:32'),
(33, 'user1', '0x0048dbac44e778255d4d8fdbe37025fe15', 'Access-Reject', '2019-11-11 02:46:37'),
(34, 'user2', '0x0073730b8eff30a7a5819eefe4a61b26c8', 'Access-Accept', '2019-11-11 02:46:50'),
(35, 'user2', '0x0073730b8eff30a7a5819eefe4a61b26c8', 'Access-Accept', '2019-11-11 02:47:36'),
(36, 'user1', '0x0001c4d0e7f5e93f933ec5b0ae3c856ab4', 'Access-Accept', '2019-11-11 02:47:42'),
(37, 'user1', '0x0073730b8eff30a7a5819eefe4a61b26c8', 'Access-Accept', '2019-11-11 02:48:18'),
(38, 'user1', '0x0001c4d0e7f5e93f933ec5b0ae3c856ab4', 'Access-Accept', '2019-11-11 02:48:49'),
(39, 'user2', '0x0073730b8eff30a7a5819eefe4a61b26c8', 'Access-Accept', '2019-11-11 02:48:51'),
(40, 'user2', '0x0073730b8eff30a7a5819eefe4a61b26c8', 'Access-Accept', '2019-11-11 02:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `radreply`
--

CREATE TABLE IF NOT EXISTS `radreply` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `radusergroup`
--

CREATE TABLE IF NOT EXISTS `radusergroup` (
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radusergroup`
--

INSERT INTO `radusergroup` (`username`, `groupname`, `priority`) VALUES
('user1', 'student', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nas`
--
ALTER TABLE `nas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nasname` (`nasname`);

--
-- Indexes for table `radacct`
--
ALTER TABLE `radacct`
  ADD PRIMARY KEY (`radacctid`),
  ADD UNIQUE KEY `acctuniqueid` (`acctuniqueid`),
  ADD KEY `username` (`username`),
  ADD KEY `framedipaddress` (`framedipaddress`),
  ADD KEY `acctsessionid` (`acctsessionid`),
  ADD KEY `acctsessiontime` (`acctsessiontime`),
  ADD KEY `acctstarttime` (`acctstarttime`),
  ADD KEY `acctinterval` (`acctinterval`),
  ADD KEY `acctstoptime` (`acctstoptime`),
  ADD KEY `nasipaddress` (`nasipaddress`);

--
-- Indexes for table `radcheck`
--
ALTER TABLE `radcheck`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`(32));

--
-- Indexes for table `radgroupcheck`
--
ALTER TABLE `radgroupcheck`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupname` (`groupname`(32));

--
-- Indexes for table `radgroupreply`
--
ALTER TABLE `radgroupreply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupname` (`groupname`(32));

--
-- Indexes for table `radpostauth`
--
ALTER TABLE `radpostauth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radreply`
--
ALTER TABLE `radreply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`(32));

--
-- Indexes for table `radusergroup`
--
ALTER TABLE `radusergroup`
  ADD KEY `username` (`username`(32));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nas`
--
ALTER TABLE `nas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `radacct`
--
ALTER TABLE `radacct`
  MODIFY `radacctid` bigint(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `radcheck`
--
ALTER TABLE `radcheck`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `radgroupcheck`
--
ALTER TABLE `radgroupcheck`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `radgroupreply`
--
ALTER TABLE `radgroupreply`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `radpostauth`
--
ALTER TABLE `radpostauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `radreply`
--
ALTER TABLE `radreply`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
