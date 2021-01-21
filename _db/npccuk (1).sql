-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 05:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `npccuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1=superadmin , 2=admin ,3=editor',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Inactive, 1=Active ',
  `token` varchar(255) DEFAULT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_login_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `address`, `role`, `status`, `token`, `password_reset_code`, `last_login_date`, `last_ip`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'Sanjib', 'Jha', 'journeyfortech@gmail.com', '', '$2y$10$SFeaE7mP0ifzd9.JtvyRyOarNTri8KXa0VZ0RyrZsV7.XF5KwiXDS', '', 1, 1, NULL, '', '2020-04-13 19:20:12', '::1', '2020-03-29 00:00:00', '2020-03-29 00:00:00'),
(2, 'chandan', 'Chandan', 'Karn', 'ritesh@gmail.com', '', '$2y$10$bt9SrbcqKGVgZknx4FdXauV0RYou/mN.iLIr3DLXXHwYgyK/9QspK', '', 2, 1, NULL, '', '2021-01-20 18:57:37', '::1', '2020-03-29 00:00:00', '2020-06-10 00:00:00'),
(3, 'deepak', 'Deepak', 'Dipu', 'mandipp@gmail.com', '', '', '', 3, 1, NULL, '', '2021-01-20 18:57:42', '::1', '0000-00-00 00:00:00', '2020-03-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_negotiable` int(11) NOT NULL DEFAULT 0,
  `is_feature` int(11) NOT NULL DEFAULT 0,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `user_id`, `category_id`, `title`, `image`, `slug`, `price`, `is_negotiable`, `is_feature`, `location`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `delete_status`, `status`) VALUES
(1, 1, 2, 'Hero Honda', '011.jpg', 'hero-honda', '22000', 0, 1, 'kathmndu', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>\r\n', 'Hero Honda', 'Hero Honda', 'hero HOnda', '2020-08-15 14:07:46', '0', 1),
(2, 1, 3, 'Swift', NULL, '', '40000', 0, 0, 'kathmandu', 'This is for testing purpose', 'Swift-kathmandu', 'Swift', 'Swift', '2020-08-15 19:43:08', '0', 1),
(3, 1, 3, 'web design', NULL, '', '4343', 0, 0, 'kathmandu', 'sdfsdf', 'web design-kathmandu', 'web design', 'web design', '2020-08-15 19:51:43', '0', 1),
(4, 1, 2, 'cashair', NULL, '', '5565', 0, 0, 'jankakpur', 'test', 'cashair-jankakpur', 'cashair', 'cashair', '2020-08-15 19:57:21', '0', 1),
(5, 1, 2, 'Swift', NULL, '', '5645', 0, 0, 'jankakpur', 'sdasd', 'Swift-jankakpur', 'Swift', 'Swift', '2020-08-15 20:01:02', '0', 1),
(6, 1, 1, 'web design', NULL, '', '343', 0, 0, 'jankakpur', 'fsdf', 'web design-jankakpur', 'web design', 'web design', '2020-08-15 20:03:21', '0', 1),
(7, 1, 1, 'Nepalpana News Website', 'kid11.jpg', 'nepalpana-news-website', '3435', 0, 1, 'wrwer', '<p>sds</p>\r\n', 'Nepalpana News Website', 'Nepalpana News Website', 'Nepalpana News Website', '2021-01-11 04:22:22', '0', 1),
(8, 1, 2, 'Nepalpana News Website', NULL, '', '345', 0, 0, '', '', 'Nepalpana News Website-', 'Nepalpana News Website', 'Nepalpana News Website', '2020-08-15 20:06:22', '0', 1),
(9, 1, 1, 'Nepalpana News Website', 'kid.jpg', '', '4343', 0, 1, 'kathmandu', 'sdfsf', 'Nepalpana News Website-kathmandu', 'Nepalpana News Website', 'Nepalpana News Website', '2020-08-16 00:03:04', '0', 1),
(10, 1, 2, 'web design', 'kid1.jpg', '10', '765', 0, 1, 'kathmandu', 'sdasd', 'web design-kathmandu', 'web design', 'web design', '2020-08-16 00:03:06', '0', 1),
(11, 1, 2, 'Final test', 'kid2.jpg', '-11', '', 0, 1, '', '', 'Final test-', 'Final test', 'Final test', '2020-08-16 00:03:08', '0', 1),
(12, 1, 1, 'final & done', 'dark-nepali-keyboard-lr.jpg', 'final-done-12', '500', 0, 1, 'jankakpur', 'test', 'final & done-jankakpur', 'final & done', 'final & done', '2020-08-16 00:03:10', '0', 1),
(13, 1, 3, 'Honda', 'Screen Shot 2020-08-16 at 10_21_25 pm.png', 'honda-13', '15000', 0, 0, 'Ingleburn', 'Brand New car with 2 months of use.', 'Honda-Ingleburn', 'Honda', 'Honda', '2020-08-16 16:52:40', '0', 1),
(14, 5, 2, 'test', 'bwaj.jpg', 'test-14', '200', 0, 0, 'kathmandu', 'detail about products', 'test-kathmandu', 'test', 'test', '2020-12-27 10:22:34', '0', 1),
(15, 6, 2, 'Testing cashair', 'raz.jpg', 'testing-cashair-15', '20000', 0, 0, 'kathmandu', 'THis is final test for the . classified website .', 'Testing cashair-kathmandu', 'Testing cashair', 'Testing cashair', '2021-01-12 10:43:47', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `second_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `show_home` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `second_title`, `image`, `slug`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `delete_status`, `show_home`, `status`) VALUES
(1, 'Blog title', 'second', NULL, 'blog-title', '<p>sanjib jha</p>\r\n', 'blog title', 'blog title', 'desc', '2020-03-25 12:23:09', '0', 1, 1),
(2, 'Sdadsa', '', 'user_upload/blogs/7b2e4e3de83a5eb0ae5214ec452aaa73.png', 'sdadsa', '<p>dasd</p>\r\n', 'sdadsa', 'sdadsa', 'asdasd', '2020-03-25 12:26:40', '0', 1, 1),
(3, 'Sdadasd', 'adsasd', 'user_upload/blog/2020-03-25/5bd9f5fb4ae54a906ea4f245e342f526.jpg', 'sdadasd', '<p>asdasdas</p>\r\n', 'sdadasd', 'sdadasd', 'dasda', '2020-03-25 12:27:21', '0', 1, 1),
(4, 'Sanjib', 'adsasd', 'user_upload/blog/2020-03-25/5728679dd977c0315171447698cde114.png', 'sanjib', '<p>asdasdaszcxzc</p>\r\n', 'sanjib', 'sanjib', 'dasda', '2020-03-25 12:27:53', '0', 1, 1),
(5, 'Ttt', '', 'user_upload/blogs/15e17306e7f3dfc48b41f7f06ed79888.png', 'ttt', '<p>dsfsf</p>', 'ttt', 'ttt', 'dasda', '2020-03-25 18:01:19', '0', 1, 1),
(6, 'Asdasdsd', '', 'user_upload/blog/2020-03/391149875f29847a37c6e94c25b6c76c.png', 'asdasdsd', '<p>adadsad</p>\r\n', 'asdasdsd', 'asdasdsd', 'dsasd', '2020-03-25 12:32:47', '0', 1, 1),
(7, 'Asdasdasdsa', 'adsasd', '96de9d9649cd7227219e48700072ce32.png', 'asdasdasdsa', '<p>asdasdaszcxzc</p>\r\n', 'asdasdasdsa', 'asdasdasdsa', 'dasda', '2020-03-25 12:37:47', '0', 1, 1),
(8, 'Dfsfdsf', '', 'user_upload/blogs/92d79e898ef1f1009652ba4f2491e7de.png', 'dfsfdsf', '<p>dfsdfsdfs</p>', 'dfsfdsf', 'dfsfdsf', '', '2020-03-25 18:07:43', '0', 1, 1),
(9, 'Teszt', 'fsdfsd', NULL, 'teszt', '<p>sfdsfs</p>', 'teszt', 'teszt', '', '2020-03-25 14:10:36', '0', 1, 1),
(10, 'Czxczxc', '', NULL, 'czxczxc', '<p>xzczxc</p>\r\n', 'czxczxc', 'czxczxc', '', '2020-03-29 11:24:47', '0', 1, 1),
(11, 'Czxczxc', '', NULL, 'czxczxc', '<p>zcxzxc</p>', 'czxczxc', 'czxczxc', '', '2020-03-25 14:11:05', '0', 1, 1),
(12, 'Zxczxczx', '', NULL, 'zxczxczx', '<p>zczcxcz</p>\r\n', 'zxczxczx', 'zxczxczx', 'xczxc', '2020-03-25 20:22:51', '0', 1, 1),
(13, 'Jggkgjh', '', '', 'jggkgjh', '<p>jhgjhg</p>', 'jggkgjh', 'jggkgjh', '', '2020-03-25 17:23:30', '0', 1, 1),
(14, 'Nkkjhjkh', '', '', 'nkkjhjkh', '<p>gjh</p>', 'nkkjhjkh', 'nkkjhjkh', '', '2020-03-25 17:25:17', '0', 1, 1),
(15, 'Test', '', NULL, 'test', '<p>content</p>', 'Test', 'Test', '', '2020-03-29 07:39:19', '0', 1, 1),
(16, 'yrdy', '', '1.jpg', 'yrdy', '<p>jhgjhg</p>\r\n', 'yrdy', 'yrdy', '', '2020-07-07 17:35:05', '0', 1, 1),
(17, 'Final', '', '4970413a13b27a6f9498547b1356ae0a.jpg', 'final', '<p>test</p>', 'final', 'final', '', '2020-07-07 17:37:10', '0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `show_home` int(11) NOT NULL DEFAULT 0,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `delete_status` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `modified_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `second_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `delete_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `second_title`, `image`, `slug`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `delete_status`, `status`) VALUES
(1, 'Home title', '', 'classi2.jpg', 'home-title', '<p>Welcome to our website . classified website is free .</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Home title', 'Home title', 'Classified website', '0', 1),
(2, 'About Us', 'About classified website', NULL, 'about-us', '<p>Test</p>\r\n', 'About Us', 'About Us', 'About us', '0', 1),
(3, 'Privicy Policy', 'Privicy', NULL, 'privicy-policy', '<p>privicy</p>\r\n', 'Privicy Policy', 'Privicy Policy', '', '0', 1),
(4, 'term', '', NULL, 'term', '', 'term', 'term', '', '0', 1),
(5, 'campagin', 'campagin', NULL, 'campagin', '<p>campagin page</p>\r\n', 'campagin', 'campagin', 'desc', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `site_id` int(11) NOT NULL,
  `application_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ads_link_structure` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'slug-id',
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offline` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `email_verification` int(11) NOT NULL DEFAULT 0,
  `map` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_detail` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `copy` int(11) NOT NULL DEFAULT 0,
  `facebook_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vk_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_app_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_app_secret` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_client_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_client_secret` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `header_script` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_from` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_library` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'swift',
  `mail_protocol` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_host` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `head_code` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_code` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`site_id`, `application_name`, `site_title`, `ads_link_structure`, `meta_keyword`, `meta_description`, `offline`, `phone`, `fax`, `email`, `address`, `logo`, `favicon`, `currency`, `status`, `email_verification`, `map`, `footer_detail`, `copy`, `facebook_url`, `twitter_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `facebook_app_id`, `facebook_app_secret`, `google_client_id`, `google_client_secret`, `header_script`, `email_from`, `mail_library`, `mail_protocol`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_title`, `head_code`, `footer_code`) VALUES
(1, 'Npccuk', 'Npccuk', 'slug-id', '', '', '', '98010359', '+977 -9801035905', 'journey4tech@gmail.com', 'Janakpur', 'nclogo.jpg', 'favicon.png', NULL, '1', 1, '', NULL, 0, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', 'https://www.pinterest.com', 'https://www.linkedin.com', 'https://www.facebook.com', 'https://www.youtube.com', '347336248630932', '3b4d902a47a7fbe7000ed5c9d5eeda71', '', '', NULL, 'no-reply@classified.com', 'swift', 'smtp', 'mail.journeyfortech.com', '587', 'info@journeyfortech.com', 'journeyfortech@123', 'wishwag', 'Header Js / Html', 'footer js');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT 'name@domain.com',
  `email_status` tinyint(1) DEFAULT 0,
  `token` varchar(500) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'member',
  `balance` bigint(20) DEFAULT 0,
  `number_of_sales` int(11) DEFAULT 0,
  `user_type` varchar(20) DEFAULT 'registered',
  `facebook_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT 0,
  `shop_name` varchar(255) DEFAULT NULL,
  `about_me` varchar(5000) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `show_email` tinyint(1) DEFAULT 0,
  `show_phone` tinyint(1) DEFAULT 0,
  `show_location` tinyint(1) DEFAULT 0,
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `pinterest_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `vk_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `show_rss_feeds` tinyint(1) DEFAULT 0,
  `send_email_new_message` tinyint(1) DEFAULT 0,
  `is_active_shop_request` tinyint(1) DEFAULT 0,
  `send_email_when_item_sold` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `slug`, `email`, `email_status`, `token`, `password`, `role`, `balance`, `number_of_sales`, `user_type`, `facebook_id`, `google_id`, `avatar`, `banned`, `shop_name`, `about_me`, `phone_number`, `country_id`, `state_id`, `city_id`, `address`, `zip_code`, `show_email`, `show_phone`, `show_location`, `facebook_url`, `twitter_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `last_seen`, `show_rss_feeds`, `send_email_new_message`, `is_active_shop_request`, `send_email_when_item_sold`, `created_at`) VALUES
(1, 'seller', 'Sanjib Jha', 'seller', 'journey4tech@gmail.com', 1, '5f3bbc07398837-53949029-33709502', '$2a$08$oR0vK//VbAcovCUL.L0ko..9KaPDWsxT4tU5Rmzs5D6ccre2E9eFa', 'member', 0, 0, 'registered', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2020-08-16 18:27:11'),
(2, 'itskarn', '', 'itskarn', 'itskarn@gmail.com', 1, '5f3a6946ea0b54-88657929-35368191', '$2a$08$CmqRpw/TpgjS5dSu1obUw.PjK2UWEX10vbfSnTUUV5Sou/2RKIFV2', 'member', 0, 0, 'registered', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2020-08-17 11:16:29'),
(4, 'priyanka', '', 'priyanka', 'zha.priyanka@gmail.com', 1, '5f3b78d777c9c7-21623675-23214633', '$2a$08$rzzmz4/snNDmprAIQn82S.HW4EhQhZ6vPvLMl9glSck9MbNszxBaq', 'member', 0, 0, 'registered', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2020-08-18 06:43:38'),
(5, 'sanjibjha', 'sanjibjha', 'sanjibjha', 'sanjib@gmail.com', 1, '5fe8602145e161-22046636-24996939', '$2a$08$8p5IQoj0q1vedOycrFJgq.E.Qy1rlNIWpkBU7qaPoSrxzgikFODam', 'member', 0, 0, 'registered', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 1, '2020-12-27 05:36:21'),
(6, 'rajusanjib', '', 'rajusanjibjha', 'rajusanjib@gmail.com', 1, '5ffc14acb30a47-17781615-96193806', '$2a$08$8ZTUDPTC/ziNbZzf4tw1v.4QnjTI81hkUgHPVL3cJ4MbzFcFnkVyS', 'member', 0, 0, 'registered', NULL, NULL, NULL, 0, NULL, NULL, '9801035905', NULL, NULL, NULL, 'kathmandu', '007', 1, 1, 1, 'facebook.com', 'facebook.com', 'facebook.com', 'facebook.com', 'facebook.com', 'facebook.com', 'facebook.com', NULL, 0, 1, 0, 1, '2021-01-11 04:19:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
