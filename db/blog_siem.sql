-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2022 年 07 月 28 日 16:30
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
-- 資料庫： `blog_siem`
--

-- --------------------------------------------------------

--
-- 資料表結構 `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(37, 'Travel'),
(38, 'Knowledge'),
(40, 'Landscape');

-- --------------------------------------------------------

--
-- 資料表結構 `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(9, 24, 'Peter', 'peterchan@gmail.com', 'Pretty nice place !!', 'approve', '2022-07-24'),
(12, 24, 'Gary', 'abc@gmail.com', 'HAHA', 'unapproved', '2022-07-27');

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(24, 37, 'Sweden', 'Gary Fung', '2022-07-24', 'demo1.jpg', 'The occurrence of sweden, how exactly needs to be done, and how will it happen without the occurrence of sweden. What is the crux of the problem? Locke tells us that the trick to learning a lot is not to learn a lot at once. This is indeed a wise saying. <br>', 'Sweden,Travel', 3, 'published'),
(25, 37, 'Hong Kong', 'Gary Fung', '2022-07-24', 'demo2.jpg', '<p>Why is Hong Kong so important to us? Why is this so? What happens in Hong Kong needs to be done, and how will it happen if it does not happen in Hong Kong? Einstein once said that the difference between people is in their spare time. I hope you can also appreciate this well. <br></p>', 'Hong Kong , HK ,Travel', 0, 'published'),
(26, 40, 'Japanese Lantern', 'Gary Fung', '2022-07-27', 'demo3.jpg', '<p>Japanese Lantern , Which contain represents the teachings of the Buddha it\'s some of the old traditional Japanese people use that help overcome the darkness of ignorance.<br></p>', 'Japanese ,Lantern,Japan,Travel', 0, 'published'),
(27, 37, 'Paris', 'Gary Fung', '2022-07-26', 'paris.jpg', '<p>History city paris !!!<br></p>', 'Travel', 0, 'published');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`) VALUES
(1, 'gary221', '1234', 'gary', 'fung', 'gary221@gmail.com', 'admin'),
(3, 'angle887', '999', 'angle', 'Chan', 'angle887@gmail.com', 'subscriber'),
(6, 'waston221', '12345555', 'waston', 'Kingles', 'waston221@gmail.com', 'subscriber'),
(7, 'amy221', '4141414', 'amy', 'lee', 'amy332@gmail.com', 'subscriber'),
(9, 'peter888', 'ppppp', 'peter', 'fung', 'peter888@gmail.com', 'subscriber'),
(12, 'melody221', '4422', 'melody', 'Wong', 'melody221@gmail.com', 'subscriber'),
(16, 'apple221', '$2y$10$dlZRSQkJzO7rwyxXIwnoN.Xab.vmHifK75vnJZnZL17/63avE2ReO', 'apple', 'wong', 'apple221@gmail.com', 'admin');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- 資料表索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
