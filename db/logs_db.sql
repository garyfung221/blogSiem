-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2022 年 07 月 28 日 16:29
-- 伺服器版本： 5.7.38-cll-lve
-- PHP 版本： 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `logs_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `check_spam`
--

CREATE TABLE `check_spam` (
  `id` int(11) NOT NULL,
  `client_ip` varchar(255) NOT NULL,
  `try_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `event_logs`
--

CREATE TABLE `event_logs` (
  `event_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `event_ip` varchar(255) NOT NULL,
  `feature_path` varchar(255) NOT NULL,
  `event_action` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `record_ip`
--

CREATE TABLE `record_ip` (
  `ip_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ip_adress` varchar(255) NOT NULL,
  `continent` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `isp` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `as_number` varchar(255) NOT NULL,
  `mobile_cellular` varchar(255) NOT NULL,
  `proxy` varchar(255) NOT NULL,
  `hosting` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `record_ip`
--

INSERT INTO `record_ip` (`ip_id`, `description`, `ip_adress`, `continent`, `country_code`, `region`, `region_name`, `city`, `zip`, `location`, `timezone`, `isp`, `org`, `as_number`, `mobile_cellular`, `proxy`, `hosting`, `created`) VALUES
(9, 'xss', '184.107.126.165', 'North America', 'CA', 'QC', 'Quebec', 'Montreal', 'H3A', '45.5063,-73.5794', 'America/Toronto', 'iWeb Technologies Inc.', 'iWeb Technologies Inc', 'AS32613 iWeb Technologies Inc.', 'false', 'false', 'true', '2022-07-23 01:30:48'),
(10, 'TEST', '184.107.126.165', 'North America', 'CA', 'QC', 'Quebec', 'Montreal', 'H3A', '45.5063,-73.5794', 'America/Toronto', 'iWeb Technologies Inc.', 'iWeb Technologies Inc', 'AS32613 iWeb Technologies Inc.', 'false', 'false', 'true', '2022-07-23 01:32:13'),
(11, 'injection', '210.138.184.59', 'Asia', 'JP', '13', 'Tokyo', 'Chiyoda', '100-8111', '35.6906,139.77', 'Asia/Tokyo', 'Internet Initiative Japan Inc.', 'IIJ Internet', 'AS2497 Internet Initiative Japan Inc.', 'true', 'false', 'false', '2022-07-24 01:10:53'),
(13, 'xss', '184.107.126.165', 'North America', 'CA', 'QC', 'Quebec', 'Montreal', 'H3A', '45.5063,-73.5794', 'America/Toronto', 'iWeb Technologies Inc.', 'iWeb Technologies Inc', 'AS32613 iWeb Technologies Inc.', 'false', 'false', 'true', '2022-07-24 20:21:10'),
(14, 'xss', '210.138.184.59', 'Asia', 'JP', '13', 'Tokyo', 'Chiyoda', '100-8111', '35.6906,139.77', 'Asia/Tokyo', 'Internet Initiative Japan Inc.', 'IIJ Internet', 'AS2497 Internet Initiative Japan Inc.', 'true', 'false', 'false', '2022-07-24 20:26:01'),
(15, 'xss', '95.31.18.119', 'Europe', 'RU', 'MOW', 'Moscow', 'Moscow', '109469', '55.7483,37.6171', 'Europe/Moscow', 'CORBINA-BROADBAND', '', 'AS8402 PJSC Vimpelcom', 'false', 'false', 'false', '2022-07-26 02:06:19'),
(16, 'xss', '86.106.177.82', 'North America', 'US', 'NY', 'New York', 'New York', '10004', '40.7123,-74.0068', 'America/New_York', 'HostRoyale Technologies Pvt Ltd', 'HostRoyale Technologies', 'AS203020 HostRoyale Technologies Pvt Ltd', 'false', 'false', 'false', '2022-07-27 02:18:17');

-- --------------------------------------------------------

--
-- 資料表結構 `visitor_logs`
--

CREATE TABLE `visitor_logs` (
  `log_id` int(11) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `referrer_url` varchar(255) DEFAULT NULL,
  `user_ip_address` varchar(50) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `check_spam`
--
ALTER TABLE `check_spam`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `event_logs`
--
ALTER TABLE `event_logs`
  ADD PRIMARY KEY (`event_id`);

--
-- 資料表索引 `record_ip`
--
ALTER TABLE `record_ip`
  ADD PRIMARY KEY (`ip_id`);

--
-- 資料表索引 `visitor_logs`
--
ALTER TABLE `visitor_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `check_spam`
--
ALTER TABLE `check_spam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `event_logs`
--
ALTER TABLE `event_logs`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `record_ip`
--
ALTER TABLE `record_ip`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `visitor_logs`
--
ALTER TABLE `visitor_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
