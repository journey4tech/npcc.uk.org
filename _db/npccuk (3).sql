-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 06:16 PM
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
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1=superadmin , 2=admin ,3=editor',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Inactive, 1=Active ',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `address`, `role`, `status`, `token`, `password_reset_code`, `last_login_date`, `last_ip`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'Sanjib', 'Jha', 'journeyfortech@gmail.com', '', '$2y$10$SFeaE7mP0ifzd9.JtvyRyOarNTri8KXa0VZ0RyrZsV7.XF5KwiXDS', '', 1, 1, NULL, '', '2020-04-13 19:20:12', '::1', '2020-03-29 00:00:00', '2020-03-29 00:00:00'),
(2, 'chandan', 'Chandan', 'Karn', 'ritesh@gmail.com', '', '$2y$10$bt9SrbcqKGVgZknx4FdXauV0RYou/mN.iLIr3DLXXHwYgyK/9QspK', '', 2, 1, NULL, '', '2021-01-20 18:57:37', '::1', '2020-03-29 00:00:00', '2020-06-10 00:00:00'),
(3, 'deepak', 'Deepak', 'Dipu', 'mandipp@gmail.com', '', '', '', 3, 1, NULL, '', '2021-01-20 18:57:42', '::1', '0000-00-00 00:00:00', '2020-03-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ban_url` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `title`, `ban_url`, `position`, `tag`) VALUES
(1, 'ban1.jpg', 1, 'Welcome to Uk Congress Organization', 'http://localhost/npcc.uk.org/about-us', '1', 'second title'),
(2, 'ban2.jpg', 1, 'Nepali Congress President Shri Sher Bahadur Deuba ', '', '2', 'Ralley in kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
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

INSERT INTO `blogs` (`id`, `category_id`, `title`, `second_title`, `image`, `slug`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `delete_status`, `show_home`, `status`) VALUES
(1, 2, 'Blog title', '', 'blog3.jpg', 'blog-title', 'Almighty, O my friend — but it is too much for my strength — I sink under the weight of the splendour of these visions!Almighty, O my friend — but it is too much for my strength — I sink under the weight of the splendour of these visions!Almighty, O my friend — but it is too much for my strength — I sink under the weight of the splendour of these visions!Almighty, O my friend — but it is too much for my strength — I sink under the weight of the splendour of these visions!Almighty, O my friend — but it is too much for my strength — I sink under the weight of the splendour of these visions!', 'Blog title', 'Blog title', 'Blog meta desc', '2021-01-22 11:59:07', '0', 1, 1),
(2, 1, 'Blog second Title', '', 'blog2.jpg', 'blog-second-title', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'Blog second Title', 'Blog second Title', 'Meta desc', '2021-01-22 12:08:17', '0', 1, 1),
(3, 1, 'Blog third post', '', 'eba98e01a16d68c16251727d808f3198.jpg', 'blog-third-post', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 'Blog third post', 'Blog third post', '', '2021-01-22 12:08:40', '0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `show_home` int(11) NOT NULL DEFAULT 0,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `delete_status` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `modified_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `slug`, `rank`, `show_home`, `content`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `delete_status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'News', 'epn.png', 'news', 1, 0, '', 'News', 'News', 'sdfsdf', 1, 0, 0, 0, '2021-01-22 02:47:45', '2021-01-22 02:49:02'),
(2, 'Press release', NULL, 'press-release', 2, 0, '', 'Press release', 'Press release', '', 1, 0, 0, 0, '2021-01-22 02:49:13', '0000-00-00 00:00:00'),
(3, 'Event', NULL, 'event', 3, 0, '', 'Event', 'Event', '', 1, 0, 0, 0, '2021-01-22 02:49:46', '0000-00-00 00:00:00'),
(4, 'Notics', NULL, 'notics', 4, 0, '', 'Notics', 'Notics', '', 1, 0, 0, 0, '2021-01-22 02:50:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `category_id`, `title`, `page_title`, `image`, `feature_image`, `content`, `meta_title`, `meta_keyword`, `meta_description`, `rank`, `status`) VALUES
(1, 1, 'WELCOME TO SWAPNIL GHAR', 'Welcome Home', NULL, 'intro.JPG', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\\\&#39;Content here, content here\\\\&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\\\&#39;lorem ipsum\\\\&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'swapnilghar', 'swapnilghar', ' swapnilghar', 2, '1'),
(4, 1, 'Project ', 'Project', '76786451_103878944439662_1640527264821018624_o.jpg', '78484792_102218867934200_196593731313336320_o.jpg', '', 'Mourya Hotel', 'Mourya Hotel', 'Mourya Hotel:\r\nAcross the border discover enchanting eternal historic city Siddhartha Highway (the named after Lord Shakyamuni Buddha), is situated at fertile of Terai Region, Devkota Chowk-13, Siddharthanagar, Bhairahawa. The hotel is a grand neo-classical, earthquake resistance & meticulously designed. It is a place of hospitality courtesy profefessionalism. The quality of services are essential elements to give our guests a pleasant stay. It is an ideal place for both corporate and leisure travelers. The spontaneous hospitality, generous common space such as the ample park enhanced by attentive staff to your every need, will make you feel\\\"at home\\\".', 1, '1'),
(3, 2, 'Contact us', 'Contact us', 'final-c.png', 's111.jpg', '<p>contact us</p>\r\n', 'Contact us', 'Contact us', '                     Contact us ', 3, '1'),
(2, 1, 'Service Meta ', 'Service Meta ', NULL, '', '', 'Service of Global', 'Service of Global', 'Service of Global  ', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms_categories`
--

CREATE TABLE `cms_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_categories`
--

INSERT INTO `cms_categories` (`id`, `name`, `rank`, `status`) VALUES
(1, 'Home', 1, 1),
(2, 'Contact us', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallerys`
--

CREATE TABLE `gallerys` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'Home title', '', 'about-2.jpg', 'home-title', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'Home title', 'Home title', 'Nppcuk', '0', 1),
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
  `phone_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `email_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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

INSERT INTO `sitesettings` (`site_id`, `application_name`, `site_title`, `ads_link_structure`, `meta_keyword`, `meta_description`, `offline`, `phone`, `phone_2`, `fax`, `email`, `address`, `address_2`, `logo`, `favicon`, `currency`, `status`, `email_verification`, `map`, `footer_detail`, `copy`, `facebook_url`, `twitter_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `facebook_app_id`, `facebook_app_secret`, `google_client_id`, `google_client_secret`, `header_script`, `email_from`, `email_2`, `mail_library`, `mail_protocol`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_title`, `head_code`, `footer_code`) VALUES
(1, 'Npccuk', 'Npccuk', 'slug-id', '', '', '', '+977-9801035905', NULL, '+977 -9801035905', 'journey4tech@gmail.com', 'Uk London', NULL, 'nclogo.jpg', 'favicon.png', NULL, '1', 1, '', NULL, 0, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', 'https://www.pinterest.com', 'https://www.linkedin.com', 'https://www.facebook.com', 'https://www.youtube.com', '347336248630932', '3b4d902a47a7fbe7000ed5c9d5eeda71', '', '', NULL, 'no-reply@npcc.uk.org', NULL, 'swift', 'smtp', 'mail.npcc.uk.org', '587', 'info@journeyfortech.com', 'journeyfortech@123', 'wishwag', 'Header Js / Html', '');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_year_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `show_home` int(11) NOT NULL DEFAULT 0,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_year_id`, `name`, `designation`, `image`, `status`, `show_home`, `rank`) VALUES
(1, 3, 'Test', 'Test', 'team-11.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_year`
--

CREATE TABLE `team_year` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team_year`
--

INSERT INTO `team_year` (`id`, `name`, `label`, `slug`, `status`) VALUES
(1, '2014', '2014', '2014', 1),
(2, '2015', '2015', '2015', 1),
(3, '2016', '2016', '2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'name@domain.com',
  `email_status` tinyint(1) DEFAULT 0,
  `token` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'member',
  `balance` bigint(20) DEFAULT 0,
  `number_of_sales` int(11) DEFAULT 0,
  `user_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'registered',
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banned` tinyint(1) DEFAULT 0,
  `shop_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_me` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_email` tinyint(1) DEFAULT 0,
  `show_phone` tinyint(1) DEFAULT 0,
  `show_location` tinyint(1) DEFAULT 0,
  `facebook_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vk_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `show_rss_feeds` tinyint(1) DEFAULT 0,
  `send_email_new_message` tinyint(1) DEFAULT 0,
  `is_active_shop_request` tinyint(1) DEFAULT 0,
  `send_email_when_item_sold` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `banners`
--
ALTER TABLE `banners`
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
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_categories`
--
ALTER TABLE `cms_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallerys`
--
ALTER TABLE `gallerys`
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
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_year`
--
ALTER TABLE `team_year`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_categories`
--
ALTER TABLE `cms_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallerys`
--
ALTER TABLE `gallerys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_year`
--
ALTER TABLE `team_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
