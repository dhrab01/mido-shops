-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 05:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dason_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `vendor_id`, `mobile`, `email`, `password`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mohammed Abdo', 'admin', 0, '733858599', 'mohammedaldhrab1@gmail.com', '$2y$10$4PJLX77eAFiiX3Dy2NR6XeYdnb9Osw5cZcYRs5QurzsOOGCqT/OU2', '8790.jpeg', 1, NULL, '2023-03-04 03:38:00'),
(2, 'saeed alshari', 'vendor', 1, '777221955', 'saeedga@gmail.com', '$2a$12$mNirZUS8u3SSXpA4cR3RUet3TYfqoz32kuvVoMKrVS.qcxlCJNUre', '3544.jpeg', 1, NULL, '2023-03-04 22:19:47'),
(3, 'abdulbased', 'vendor', 2, '777221955', 'abdulbased@gmail.com', '$2a$12$mNirZUS8u3SSXpA4cR3RUet3TYfqoz32kuvVoMKrVS.qcxlCJNUre', '', 1, NULL, '2023-03-04 06:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_image` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Arrow', '', 1, NULL, '2023-02-18 03:12:29'),
(2, 'Gap', '', 1, NULL, NULL),
(4, 'Samsung', '', 1, NULL, NULL),
(5, 'LG', '', 1, NULL, NULL),
(6, 'Lenovo', '6824.png', 1, NULL, '2023-02-18 03:39:53'),
(7, 'Cobal', '6019.webp', 1, NULL, '2023-02-18 03:37:08'),
(8, 'Asus', '9344.jpg', 1, '2023-02-17 19:14:40', '2023-02-18 03:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catigory_1st_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_discount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `catigory_1st_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 2, 'رجالي', '', 0.00, 'يوجد فيه كل المنتجات الرجالية', 'men', NULL, NULL, NULL, 1, NULL, '2023-02-17 08:14:33'),
(2, 0, 2, 'نسائي', '', 0.00, '', 'men', '', '', '', 1, NULL, '2023-02-12 09:42:09'),
(3, 0, 2, 'اطفال', '', 0.00, '', 'men', '', '', '', 1, NULL, NULL),
(4, 0, 3, 'تلفونات', '', 0.00, 'this is smart phones category', 'electronics', 'mobiles', 'mobiles', 'mobiles', 1, '2023-02-15 02:26:50', '2023-02-17 07:57:57'),
(5, 4, 3, 'هواتف ذكية', '', 10.00, 'it is afucken subcategory', 'electronics', 'mobiles', 'mobiles', 'mobiles', 1, '2023-02-15 07:14:26', '2023-02-15 07:14:26'),
(7, 1, 2, 'فنايل', '', 0.00, NULL, 'men', NULL, NULL, NULL, 1, '2023-02-17 05:30:28', '2023-02-17 07:41:40'),
(9, 1, 2, 'شمزان', '8930.png', 0.00, 'ابلليبؤشسشء', 'men', 'شمزان', NULL, 'tshirrt# #shirt #red', 1, '2023-03-04 22:35:04', '2023-03-04 22:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(2, 'AL', 'Albania', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(3, 'DZ', 'Algeria', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(4, 'DS', 'American Samoa', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(5, 'AD', 'Andorra', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(6, 'AO', 'Angola', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(7, 'AI', 'Anguilla', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(8, 'AQ', 'Antarctica', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(9, 'AG', 'Antigua and Barbuda', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(10, 'AR', 'Argentina', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(11, 'AM', 'Armenia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(12, 'AW', 'Aruba', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(13, 'AU', 'Australia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(14, 'AT', 'Austria', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(15, 'AZ', 'Azerbaijan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(16, 'BS', 'Bahamas', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(17, 'BH', 'Bahrain', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(18, 'BD', 'Bangladesh', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(19, 'BB', 'Barbados', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(20, 'BY', 'Belarus', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(21, 'BE', 'Belgium', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(22, 'BZ', 'Belize', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(23, 'BJ', 'Benin', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(24, 'BM', 'Bermuda', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(25, 'BT', 'Bhutan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(26, 'BO', 'Bolivia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(27, 'BA', 'Bosnia and Herzegovina', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(28, 'BW', 'Botswana', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(29, 'BV', 'Bouvet Island', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(30, 'BR', 'Brazil', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(31, 'IO', 'British Indian Ocean Territory', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(32, 'BN', 'Brunei Darussalam', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(33, 'BG', 'Bulgaria', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(34, 'BF', 'Burkina Faso', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(35, 'BI', 'Burundi', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(36, 'KH', 'Cambodia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(37, 'CM', 'Cameroon', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(38, 'CA', 'Canada', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(39, 'CV', 'Cape Verde', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(40, 'KY', 'Cayman Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(41, 'CF', 'Central African Republic', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(42, 'TD', 'Chad', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(43, 'CL', 'Chile', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(44, 'CN', 'China', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(45, 'CX', 'Christmas Island', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(46, 'CC', 'Cocos (Keeling) Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(47, 'CO', 'Colombia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(48, 'KM', 'Comoros', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(49, 'CD', 'Democratic Republic of the Congo', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(50, 'CG', 'Republic of Congo', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(51, 'CK', 'Cook Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(52, 'CR', 'Costa Rica', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(53, 'HR', 'Croatia (Hrvatska)', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(54, 'CU', 'Cuba', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(55, 'CY', 'Cyprus', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(56, 'CZ', 'Czech Republic', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(57, 'DK', 'Denmark', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(58, 'DJ', 'Djibouti', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(59, 'DM', 'Dominica', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(60, 'DO', 'Dominican Republic', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(61, 'TP', 'East Timor', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(62, 'EC', 'Ecuador', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(63, 'EG', 'Egypt', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(64, 'SV', 'El Salvador', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(65, 'GQ', 'Equatorial Guinea', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(66, 'ER', 'Eritrea', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(67, 'EE', 'Estonia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(68, 'ET', 'Ethiopia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(69, 'FK', 'Falkland Islands (Malvinas)', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(70, 'FO', 'Faroe Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(71, 'FJ', 'Fiji', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(72, 'FI', 'Finland', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(73, 'FR', 'France', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(74, 'FX', 'France, Metropolitan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(75, 'GF', 'French Guiana', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(76, 'PF', 'French Polynesia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(77, 'TF', 'French Southern Territories', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(78, 'GA', 'Gabon', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(79, 'GM', 'Gambia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(80, 'GE', 'Georgia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(81, 'DE', 'Germany', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(82, 'GH', 'Ghana', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(83, 'GI', 'Gibraltar', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(84, 'GK', 'Guernsey', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(85, 'GR', 'Greece', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(86, 'GL', 'Greenland', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(87, 'GD', 'Grenada', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(88, 'GP', 'Guadeloupe', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(89, 'GU', 'Guam', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(90, 'GT', 'Guatemala', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(91, 'GN', 'Guinea', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(92, 'GW', 'Guinea-Bissau', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(93, 'GY', 'Guyana', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(94, 'HT', 'Haiti', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(95, 'HM', 'Heard and Mc Donald Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(96, 'HN', 'Honduras', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(97, 'HK', 'Hong Kong', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(98, 'HU', 'Hungary', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(99, 'IS', 'Iceland', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(100, 'IN', 'India', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(101, 'IM', 'Isle of Man', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(102, 'ID', 'Indonesia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(103, 'IR', 'Iran (Islamic Republic of)', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(104, 'IQ', 'Iraq', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(105, 'IE', 'Ireland', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(106, 'IL', 'Israel', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(107, 'IT', 'Italy', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(108, 'CI', 'Ivory Coast', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(109, 'JE', 'Jersey', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(110, 'JM', 'Jamaica', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(111, 'JP', 'Japan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(112, 'JO', 'Jordan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(113, 'KZ', 'Kazakhstan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(114, 'KE', 'Kenya', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(115, 'KI', 'Kiribati', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(117, 'KR', 'Korea, Republic of', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(118, 'XK', 'Kosovo', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(119, 'KW', 'Kuwait', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(120, 'KG', 'Kyrgyzstan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(121, 'LA', 'Lao People\'s Democratic Republic', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(122, 'LV', 'Latvia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(123, 'LB', 'Lebanon', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(124, 'LS', 'Lesotho', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(125, 'LR', 'Liberia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(126, 'LY', 'Libyan Arab Jamahiriya', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(127, 'LI', 'Liechtenstein', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(128, 'LT', 'Lithuania', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(129, 'LU', 'Luxembourg', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(130, 'MO', 'Macau', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(131, 'MK', 'North Macedonia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(132, 'MG', 'Madagascar', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(133, 'MW', 'Malawi', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(134, 'MY', 'Malaysia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(135, 'MV', 'Maldives', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(136, 'ML', 'Mali', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(137, 'MT', 'Malta', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(138, 'MH', 'Marshall Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(139, 'MQ', 'Martinique', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(140, 'MR', 'Mauritania', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(141, 'MU', 'Mauritius', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(142, 'TY', 'Mayotte', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(143, 'MX', 'Mexico', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(144, 'FM', 'Micronesia, Federated States of', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(145, 'MD', 'Moldova, Republic of', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(146, 'MC', 'Monaco', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(147, 'MN', 'Mongolia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(148, 'ME', 'Montenegro', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(149, 'MS', 'Montserrat', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(150, 'MA', 'Morocco', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(151, 'MZ', 'Mozambique', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(152, 'MM', 'Myanmar', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(153, 'NA', 'Namibia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(154, 'NR', 'Nauru', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(155, 'NP', 'Nepal', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(156, 'NL', 'Netherlands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(157, 'AN', 'Netherlands Antilles', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(158, 'NC', 'New Caledonia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(159, 'NZ', 'New Zealand', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(160, 'NI', 'Nicaragua', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(161, 'NE', 'Niger', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(162, 'NG', 'Nigeria', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(163, 'NU', 'Niue', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(164, 'NF', 'Norfolk Island', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(165, 'MP', 'Northern Mariana Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(166, 'NO', 'Norway', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(167, 'OM', 'Oman', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(168, 'PK', 'Pakistan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(169, 'PW', 'Palau', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(170, 'PS', 'Palestine', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(171, 'PA', 'Panama', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(172, 'PG', 'Papua New Guinea', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(173, 'PY', 'Paraguay', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(174, 'PE', 'Peru', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(175, 'PH', 'Philippines', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(176, 'PN', 'Pitcairn', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(177, 'PL', 'Poland', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(178, 'PT', 'Portugal', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(179, 'PR', 'Puerto Rico', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(180, 'QA', 'Qatar', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(181, 'RE', 'Reunion', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(182, 'RO', 'Romania', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(183, 'RU', 'Russian Federation', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(184, 'RW', 'Rwanda', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(185, 'KN', 'Saint Kitts and Nevis', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(186, 'LC', 'Saint Lucia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(187, 'VC', 'Saint Vincent and the Grenadines', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(188, 'WS', 'Samoa', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(189, 'SM', 'San Marino', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(190, 'ST', 'Sao Tome and Principe', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(191, 'SA', 'Saudi Arabia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(192, 'SN', 'Senegal', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(193, 'RS', 'Serbia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(194, 'SC', 'Seychelles', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(195, 'SL', 'Sierra Leone', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(196, 'SG', 'Singapore', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(197, 'SK', 'Slovakia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(198, 'SI', 'Slovenia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(199, 'SB', 'Solomon Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(200, 'SO', 'Somalia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(201, 'ZA', 'South Africa', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(202, 'GS', 'South Georgia South Sandwich Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(203, 'SS', 'South Sudan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(204, 'ES', 'Spain', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(205, 'LK', 'Sri Lanka', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(206, 'SH', 'St. Helena', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(207, 'PM', 'St. Pierre and Miquelon', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(208, 'SD', 'Sudan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(209, 'SR', 'Suriname', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(211, 'SZ', 'Eswatini', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(212, 'SE', 'Sweden', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(213, 'CH', 'Switzerland', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(214, 'SY', 'Syrian Arab Republic', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(215, 'TW', 'Taiwan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(216, 'TJ', 'Tajikistan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(217, 'TZ', 'Tanzania, United Republic of', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(218, 'TH', 'Thailand', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(219, 'TG', 'Togo', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(220, 'TK', 'Tokelau', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(221, 'TO', 'Tonga', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(222, 'TT', 'Trinidad and Tobago', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(223, 'TN', 'Tunisia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(224, 'TR', 'Turkey', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(225, 'TM', 'Turkmenistan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(226, 'TC', 'Turks and Caicos Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(227, 'TV', 'Tuvalu', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(228, 'UG', 'Uganda', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(229, 'UA', 'Ukraine', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(230, 'AE', 'United Arab Emirates', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(231, 'GB', 'United Kingdom', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(232, 'US', 'United States', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(233, 'UM', 'United States minor outlying islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(234, 'UY', 'Uruguay', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(235, 'UZ', 'Uzbekistan', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(236, 'VU', 'Vanuatu', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(237, 'VA', 'Vatican City State', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(238, 'VE', 'Venezuela', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(239, 'VN', 'Vietnam', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(240, 'VG', 'Virgin Islands (British)', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(241, 'VI', 'Virgin Islands (U.S.)', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(242, 'WF', 'Wallis and Futuna Islands', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(243, 'EH', 'Western Sahara', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(244, 'YE', 'Yemen', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(245, 'ZM', 'Zambia', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05'),
(246, 'ZW', 'Zimbabwe', 1, '2023-02-07 13:07:17', '2023-02-07 21:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_13_215756_create_vendors_table', 1),
(6, '2023_01_13_220736_create_admins_table', 1),
(7, '2023_01_31_002001_create_vendors_business_details_table', 1),
(8, '2023_01_31_003901_create_vendors_bank_details', 1),
(9, '2023_02_03_161800_create_vendor_business_detail', 1),
(10, '2023_02_07_222056_create_sections_table', 2),
(11, '2023_02_11_231052_create_categories_table', 3),
(12, '2023_02_17_163747_create_brands_table', 4),
(13, '2023_02_17_212142_create_products_table', 5),
(14, '2023_02_26_144514_create_prosucts_attributes_table', 6),
(15, '2023_03_01_164350_create_products_images_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@themesdesign.com', '$2y$10$YDDG/UEtk.CG/kYeptuvXuDhRAMJIU7NSI/Yralbdd8bbSyikMkWu', '2023-02-10 04:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_discount` double(8,2) DEFAULT NULL,
  `product_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_discription` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `section_id`, `category_id`, `brand_id`, `vendor_id`, `admin_id`, `admin_type`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_unit`, `product_weight`, `product_image`, `product_video`, `discription`, `meta_title`, `meta_discription`, `meta_keywords`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 7, 0, 1, 'admin', 'samsung-g-townty', 'Rn1112', 'white', 500.00, 0.00, '100', NULL, '4920.jpg', NULL, NULL, NULL, NULL, NULL, 'Yes', 1, NULL, '2023-03-03 04:25:13'),
(2, 2, 1, 2, 1, 2, 'vendor', 'Red Casual T-shirt', 'Rc011', 'red', 80.00, 0.00, '50', '', '', '', '', '', '', '', 'Yes', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '5560.jpg', 1, '2023-03-03 04:26:28', '2023-03-04 04:57:12'),
(5, 1, '5025.jpg', 1, '2023-03-04 22:42:22', '2023-03-04 22:42:22'),
(6, 1, '7065.jpg', 1, '2023-03-04 22:42:30', '2023-03-04 22:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'small', 100.00, 10, 'Rc011-s', 1, NULL, NULL),
(2, 2, 'mediom', 150.00, 10, 'Rc011-md', 1, NULL, NULL),
(3, 2, 'large', 200.00, 10, 'Rc011-lg', 1, NULL, NULL),
(5, 1, 'Mediom', 350.00, 10, 'Rn1112-md', 1, '2023-03-04 02:49:04', '2023-03-04 04:43:53'),
(6, 1, 'Small', 300.00, 10, 'Rn1112-sm', 1, '2023-03-04 02:49:04', '2023-03-04 04:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'احذية', 1, '2023-02-11 00:11:21', '2023-02-12 08:47:17'),
(2, 'ملابس', 1, '2023-02-11 08:19:45', '2023-02-12 08:46:51'),
(3, 'الكترونيات', 1, '2023-02-11 08:39:56', '2023-02-12 05:30:32'),
(4, 'مواد بناء', 1, '2023-02-12 05:29:14', '2023-03-04 02:10:27'),
(5, 'العاب', 1, '2023-03-04 02:09:56', '2023-03-04 02:10:03'),
(6, 'اثاث', 1, '2023-03-04 22:25:47', '2023-03-04 22:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@themesdesign.com', NULL, '$2y$10$lJ4shjtuDLLeNOOLBBqqqegdQ1FVUHDkgDUH28c5zTTGBnH9/E4.q', 'avatar-1.jpg', NULL, '2023-02-04 00:28:00', '2023-02-04 00:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `address`, `city`, `state`, `country`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hadah_st', 'Sanaa', 'ALamanah', 'Yemen', '110001', 0, NULL, '2023-02-04 00:53:21'),
(2, 'hadah_st', 'sanaa', 'alamanah', 'Yemen', '110001', 0, NULL, '2023-03-04 01:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_bank_detials`
--

CREATE TABLE `vendors_bank_detials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `account_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_ifsc_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_bank_detials`
--

INSERT INTO `vendors_bank_detials` (`id`, `vendor_id`, `account_holder_name`, `bank_name`, `account_number`, `bank_ifsc_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saeed Jalal AL-shari', 'AL-kurime Bank', '10022670089', '55670092921', '2023-02-03 19:11:29', NULL),
(2, 2, 'Abdu Al Basset Aldarwani', 'Cak Bank', '2020314698', '0002546', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_business_details`
--

CREATE TABLE `vendor_business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_proof` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_proof_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_license_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_business_details`
--

INSERT INTO `vendor_business_details` (`id`, `vendor_id`, `shop_name`, `shop_address`, `shop_city`, `shop_state`, `shop_country`, `shop_pincode`, `shop_mobile`, `shop_website`, `shop_email`, `address_proof`, `address_proof_image`, `business_license_number`, `gst_number`, `pan_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Madredo Shop', '50_street', 'Sanaa', 'AL-amanah', 'United States', '00967', '777755683', 'madredo.com', 'shop@madredo.com', 'id-card', '6747.jpg', '006678952221', '02254103160', '7785241002336', NULL, NULL),
(2, 2, 'abdoshop', '50_street', 'sanaa', 'alamanah', 'Yemen', '00967', '777755683', 'madredo.com', 'shop@abdo.com', 'passport', '5945.jpg', '006678952221', '02254103160', '7785241002336', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_bank_detials`
--
ALTER TABLE `vendors_bank_detials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_business_details`
--
ALTER TABLE `vendor_business_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors_bank_detials`
--
ALTER TABLE `vendors_bank_detials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_business_details`
--
ALTER TABLE `vendor_business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
