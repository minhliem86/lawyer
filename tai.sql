-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2015 at 10:48 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tai`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
`id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `slogan`, `content`, `created_at`, `updated_at`, `show`) VALUES
(1, 'About Us', 'Bigger is good. Smarter is better.', '<p>RN Legal and Migration Services (&ldquo;RN Legal&rdquo;), we offer legal advice in a variety of matters, including Family Law, Wills, Intervention Orders, Contracts, Leases, Litigation and Immigration.</p>\r\n\r\n<p>Immigration consultancies include filing court proceedings, appearances and also providerepresentation in Administrative Appeals Tribunal.</p>\r\n\r\n<p>As registered Australian lawyers, migration consultants and education counselors, we offer access to education in Australia and assists you with the legal requirements to your migration processes. Our job is to make it easy for the client by providing expert, experienced and cost effective advice.</p>\r\n\r\n<p>In Australia, migration consultants must be registered with the&nbsp;<a href="https://www.mara.gov.au/" target="_blank">Office of the Migration Agents Registration Authority</a>.&nbsp;RN Legal is bound by a&nbsp;<a href="https://www.mara.gov.au/becoming-an-agent/professional-standards-and-obligations/code-of-conduct/" target="_blank">Code of Conduct</a>&nbsp;and has an in-depth knowledge of Australian migration law and processes.</p>\r\n\r\n<p>RN Legal ensures that clients receive high quality legal and immigration assistance in meeting our high professional and ethical standards. We provide advice and assistance to people wishing to obtain visas to enter or remain in Australia. Australian visa processes can be complicated and stressful. That&rsquo;s the reason why we assemble all the appropriate documentation that makes up your visa application package, as well as lodging application on your behalf.</p>\r\n\r\n<p>We provide legal assistance that includes divorce applications, child custody, making wills, intervention orders, fines, police matters and other matters.</p>\r\n\r\n<p>Please call us for any other assistance you may require on&nbsp; <strong><span style="font-size:14px">+61 422 475 600</span></strong> or email us to <a href="mailto:info@rnlegalservices.com">info@rnlegalservices.com</a></p>\r\n', NULL, '2015-10-03 08:40:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `urlhinh` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `show` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `slug`, `urlhinh`, `sort`, `show`, `created_at`, `updated_at`) VALUES
(1, 'Banner', 'banner', '', 2, 1, '2015-08-07 07:46:41', '2015-08-07 00:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE IF NOT EXISTS `assigned_roles` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tw_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `phone`, `email`, `address`, `fb_link`, `youtube_link`, `tw_link`, `map`, `created_at`, `updated_at`) VALUES
(1, '+61 422 475 600', 'info@rnlegalservices.com.au', 'Suite 1, 186 Barkly Street Footscray Vic 3011 Australia', '', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.603283641243!2d144.898078!3d-37.799336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d918f26ec87%3A0xc10889db3a82b27f!2sVerduci+Lawyers!5e0!3m2!1svi!2s!4v1443887978358" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '2015-08-04 07:13:43', '2015-10-03 09:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) unsigned NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `show` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `phone`, `email`, `message`, `show`, `created_at`, `updated_at`) VALUES
(1, NULL, '0123456789', 'minh@gmail.com', 'asdasd', 1, '2015-08-07 00:20:00', '2015-08-07 00:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
`id` int(10) unsigned NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `urlHinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `slug`, `content`, `urlHinh`, `show`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', '<p>RN Legal and Migration Services (&ldquo;RN Legal&rdquo;), we offer legal advice in a variety of matters, including Family Law, Wills, Intervention Orders, Contracts, Leases, Litigation and Immigration.</p>\r\n\r\n<p>Immigration consultancies include filing court proceedings, appearances and also providerepresentation in Administrative Appeals Tribunal.</p>\r\n\r\n<p>As registered Australian lawyers, migration consultants and education counselors, we offer access to education in Australia and assists you with the legal requirements to your migration processes. Our job is to make it easy for the client by providing expert, experienced and cost effective advice.</p>\r\n\r\n<p>In Australia, migration consultants must be registered with the&nbsp;<a href="https://www.mara.gov.au/" target="_blank">Office of the Migration Agents Registration Authority</a>.&nbsp;RN Legal is bound by a&nbsp;<a href="https://www.mara.gov.au/becoming-an-agent/professional-standards-and-obligations/code-of-conduct/" target="_blank">Code of Conduct</a>&nbsp;and has an in-depth knowledge of Australian migration law and processes.</p>\r\n\r\n<p>RN Legal ensures that clients receive high quality legal and immigration assistance in meeting our high professional and ethical standards. We provide advice and assistance to people wishing to obtain visas to enter or remain in Australia. Australian visa processes can be complicated and stressful. That&rsquo;s the reason why we assemble all the appropriate documentation that makes up your visa application package, as well as lodging application on your behalf.</p>\r\n\r\n<p>We provide legal assistance that includes divorce applications, child custody, making wills, intervention orders, fines, police matters and other matters.</p>\r\n\r\n<p>Please call us for any other assistance you may require on&nbsp; <strong><span style="font-size:14px">+61 422 475 600</span></strong> or email us to <a href="mailto:info@rnlegalservices.com">info@rnlegalservices.com</a></p>\r\n', NULL, 1, NULL, '2015-10-03 06:40:58', '2015-10-03 08:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `summary` text,
  `content` text,
  `urlhinh` varchar(255) DEFAULT NULL,
  `urlthumb` varchar(255) DEFAULT NULL,
  `album_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `show` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `summary`, `content`, `urlhinh`, `urlthumb`, `album_id`, `sort`, `show`, `created_at`, `updated_at`) VALUES
(11, 'Banner 1', NULL, NULL, '/public/backend/upload/images/images/banner1.jpg', 'public/backend/upload/thumb_me/images/1438829303_thumb_banner1.jpg', 1, 1, 1, '2015-08-07 07:39:27', '0000-00-00 00:00:00'),
(12, 'Banner 2', NULL, NULL, '/public/backend/upload/images/images/banner2.jpg', 'public/backend/upload/thumb_me/images/1438829303_thumb_banner2.jpg', 1, 2, 1, '2015-08-07 07:46:57', '2015-08-07 00:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
`id` int(11) unsigned NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `email_nhanthongtin` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `meta_description`, `meta_keyword`, `email_nhanthongtin`, `created_at`, `updated_at`) VALUES
(1, 'TN Education and Immigration Lawyers offer access to education in Australia and assists you with migration.  We are registered Australian lawyers, registered migration agents&nbsp; and education counsellors.', 'Education Agent Australia, Migration Agent Australia, Immigration Lawyer, Sudent Visa, Family Visa, Legal Representation, Migration Appeal, Migration Review', 'minhliemphp@gmail.com', '0000-00-00 00:00:00', '2015-10-03 06:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_07_29_034114_entrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE IF NOT EXISTS `newsfeed` (
`id` int(10) unsigned NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `urlHinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id`, `title`, `slug`, `content`, `urlHinh`, `show`, `order`, `created_at`, `updated_at`) VALUES
(11, 'News feed 1', 'news-feed-1', '<p>Content news feed 1</p>\r\n', 'public/upload/img/20151013_125313.jpg', 1, 4, '2015-10-12 23:39:44', '2015-10-12 23:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
`id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`id` int(10) unsigned NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `urlHinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `content`, `urlHinh`, `show`, `order`, `created_at`, `updated_at`) VALUES
(6, 'Migration', 'migration', '<p><span style="font-size:16px"><strong>Student Visa</strong></span></p>\r\n\r\n<p>Student visa options:</p>\r\n\r\n<ul>\r\n	<li>School Student Visa</li>\r\n	<li>Higher Education Visa</li>\r\n	<li>English language Study Visa</li>\r\n	<li>Non-Award Student Visa</li>\r\n	<li>Vocational Training Visa</li>\r\n	<li>Postgraduate Research Visa</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:16px"><strong>Family Visa</strong></span></p>\r\n\r\n<p>RN Legal will advise you on visas including:</p>\r\n\r\n<ul>\r\n	<li>Partners</li>\r\n	<li>Fianc&eacute;s</li>\r\n	<li>Dependent children</li>\r\n	<li>Parents</li>\r\n	<li>Orphan relatives</li>\r\n	<li>Carers</li>\r\n	<li>Aged dependent relatives, and remaining relatives</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:16px"><strong>Working Visa</strong></span></p>\r\n\r\n<p>For people with recognized skills seeking to work in Australia, a visa option includes:</p>\r\n\r\n<ul>\r\n	<li>Skilled Independent Visa</li>\r\n	<li>Skilled Sponsored Visa</li>\r\n	<li>Skilled Regional Sponsored Visa</li>\r\n	<li>457 Temporary Business Visa</li>\r\n	<li>Employer Nomination Scheme</li>\r\n	<li>Working Holiday Visa Work and Holiday Visa</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px"><strong>Working Holiday/Holiday</strong></span></p>\r\n\r\n<p>Visa-Some of the options are:</p>\r\n\r\n<ul>\r\n	<li>Working Holiday Visa (Subclass 417)</li>\r\n	<li>Work and Holiday Visa (Subclass 462)</li>\r\n</ul>\r\n\r\n<p>To be eligible, applicants need to meet basic requirements.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px"><strong>Business Visa</strong></span></p>\r\n\r\n<p>Business visitors are business people who visit Australia for business purposes. There are a number of visa options for business people. These includes but not limited to the following:</p>\r\n\r\n<ul>\r\n	<li>Business Owner Visa</li>\r\n	<li>Investor Visa</li>\r\n	<li>Senior Executive Visa</li>\r\n	<li>Business Talent Visa</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px"><strong>Retirement Visa</strong></span></p>\r\n\r\n<p>The visa is designed for retirees and their partner who want to spend some of their retirement years in Australia. Retirement visa is only available to:</p>\r\n\r\n<ul>\r\n	<li>Existing Retirement visa (subclass 410) holders and their partners to rollover their current visa</li>\r\n	<li>Former Retirement visa (subclass 410) holders and their partners who have not held another substantive visa since their last Retirement visa was granted.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px"><strong>Citizenship</strong></span></p>\r\n\r\n<p>we can assist you with the process. The process of applying for Australian citizenship varies depending on your eligibility. Generally, to apply for Australian citizenship you will need to:</p>\r\n\r\n<ul>\r\n	<li>Determine that you are eligible</li>\r\n	<li>Gather your original documents</li>\r\n	<li>Copy and certify your documents</li>\r\n	<li>Complete and lodge your application.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px"><strong>AdministrativeAppeals Tribunal(&ldquo;AAT&rdquo;)</strong></span></p>\r\n\r\n<p>Proper advice from the start means that you are less likely to get any visa appeal refused.</p>\r\n\r\n<p>If you have a visa refusal we can help you with the tribunal process.</p>\r\n\r\n<p>A visa refusal is stressful, costly and also limits significantly further lodgment options.Contact us today to begin your Appeal or AAT Review</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px"><strong>Court</strong></span></p>\r\n\r\n<p>We can file court proceedings on your behalf if there are reasonable grounds that the tribunal made an error of law. This is called judicial review.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Please call us for any other assistance you may require on&nbsp; 9xxxxxx or email us to <a href="mailto:info@rnlegalservices.com">info@rnlegalservices.com</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'public/upload/img/h2.jpg', 1, 2, '2015-08-06 20:20:03', '2015-10-03 08:39:02'),
(7, 'Education', 'education', '<p>RN Legal, formally known as TN Education and Immigration Lawyers acts as intermediaries between students and Australian education institutions to enable enrolment. As education counselors, RN Legal conducts business in accordance with the National code of Practice 2007.</p>\r\n\r\n<p>We offer and simplify the transition and access to education in Australia</p>\r\n\r\n<p>We offer support and assistance in the following:</p>\r\n\r\n<ul>\r\n	<li>Course information and enrolment process</li>\r\n	<li>Visa processing to come to Australia</li>\r\n	<li>Education about Australian Culture</li>\r\n	<li>Knowledge of your legal rights and obligations while living in Australia</li>\r\n	<li>Legal representation on issues that may arise while in Australia.</li>\r\n</ul>\r\n\r\n<p>The founders of RN Legal were once migrant students in Australia; we understand how difficult and frustrating it can be. We have offices overseas and within Australia to support our students even after enrolment.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:16px"><strong>Institutions</strong></span></p>\r\n\r\n<p>Services and benefits for Institutions</p>\r\n\r\n<ul>\r\n	<li>We promote, simplify and ensure your enrolment growth</li>\r\n	<li>Strategic marketing on courses, programs and services offered by institutions.</li>\r\n</ul>\r\n\r\n<p>We offer:</p>\r\n\r\n<ul>\r\n	<li>Representation:&nbsp; an established and effective distribution channel.</li>\r\n	<li>Facilitate Enrolment application process</li>\r\n	<li>Student Visa Processing: As registered migration agents</li>\r\n	<li>Migration Review Tribunal: As practicing lawyers, we are qualified to offer legal advice to students on visa conditions.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:16px"><strong>Institutions that we represent</strong></span></p>\r\n\r\n<p>EDUCATION ACCESS AUSTRALIA - <a href="http://www.eaa.edu.au/" target="_blank">http://www.eaa.edu.au/</a></p>\r\n\r\n<p>AGB TRAINING - <a href="http://www.agb.edu.au/" target="_blank">http://www.agb.edu.au/</a></p>\r\n\r\n<p>Central Australian College - <a href="http://cac.vic.edu.au/" target="_blank">http://cac.vic.edu.au/</a></p>\r\n\r\n<p>Southern Cross Education Institute - <a href="http://www.scei.vic.edu.au/" target="_blank">www.scei.vic.edu.au/</a></p>\r\n\r\n<p>The Imperial College of Australia - <a href="http://www.imperial.edu.au/" target="_blank">http://www.imperial.edu.au/</a></p>\r\n\r\n<p>We work in collaboration with STUDYCO &ndash; <a href="http://www.studyco.com/en" target="_blank">http://www.studyco.com/en</a> This means we can place students to university or institute of their choice worldwide.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:16px"><strong>Students</strong></span></p>\r\n\r\n<p>Services and benefits to international Students</p>\r\n\r\n<p>We offer and simplify the transition and access to education in Australia</p>\r\n\r\n<p>The founders of RN Legal were once migrant students in Australia; we understand how difficult and frustrating it can be.</p>\r\n\r\n<p>We offer support and assistance in the following:</p>\r\n\r\n<ul>\r\n	<li>Course information and enrolment process</li>\r\n	<li>Visa processing to come to Australia</li>\r\n	<li>Education about Australian Culture</li>\r\n	<li>Knowledge of your legal rights and obligations while living in Australia</li>\r\n	<li>Legal representation on issues that may arise while in Australia.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Please call us for any other assistance you may require on&nbsp; 9xxxxxx or email us to <a href="mailto:info@rnlegalservices.com">info@rnlegalservices.com</a></p>\r\n', 'public/upload/img/h3.jpg', 1, 3, '2015-08-06 20:21:57', '2015-10-03 08:38:04'),
(12, 'Legal', 'legal', '<p>We have the experience and expertise to handle your case to the highest level, including the preparation and court appearance.</p>\r\n\r\n<p>We take our time to understand client&rsquo;s concerns, then give legal advice in a manner that the client understands, including&nbsp; his/her legal rights and obligations. Please call us for assistance with making wills, fines/infringements, in trouble with the police, intervention orders, divorce application, court appearances and any other criminal, family or immigration matters that you may have. We are happy to assist.</p>\r\n', 'public/upload/img/h1.jpg', 1, 1, '2015-10-13 01:37:26', '2015-10-13 01:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
`id` int(10) unsigned NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `urlHinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show` tinyint(1) DEFAULT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `title`, `slug`, `content`, `urlHinh`, `show`, `owner`, `order`, `created_at`, `updated_at`) VALUES
(7, 'Education', 'education', '<p>RN Legal, formally known as TN Education and Immigration Lawyers acts as intermediaries between students and Australian education institutions to enable enrolment. As education counselors, RN Legal conducts business in accordance with the National code of Practice 2007.</p>\r\n\r\n<p>We offer and simplify the transition and access to education in Australia</p>\r\n\r\n<p>We offer support and assistance in the following:</p>\r\n\r\n<ul>\r\n	<li>Course information and enrolment process</li>\r\n	<li>Visa processing to come to Australia</li>\r\n	<li>Education about Australian Culture</li>\r\n	<li>Knowledge of your legal rights and obligations while living in Australia</li>\r\n	<li>Legal representation on issues that may arise while in Australia.</li>\r\n</ul>\r\n\r\n<p>The founders of RN Legal were once migrant students in Australia; we understand how difficult and frustrating it can be. We have offices overseas and within Australia to support our students even after enrolment.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:16px"><strong>Institutions</strong></span></p>\r\n\r\n<p>Services and benefits for Institutions</p>\r\n\r\n<ul>\r\n	<li>We promote, simplify and ensure your enrolment growth</li>\r\n	<li>Strategic marketing on courses, programs and services offered by institutions.</li>\r\n</ul>\r\n\r\n<p>We offer:</p>\r\n\r\n<ul>\r\n	<li>Representation:&nbsp; an established and effective distribution channel.</li>\r\n	<li>Facilitate Enrolment application process</li>\r\n	<li>Student Visa Processing: As registered migration agents</li>\r\n	<li>Migration Review Tribunal: As practicing lawyers, we are qualified to offer legal advice to students on visa conditions.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:16px"><strong>Institutions that we represent</strong></span></p>\r\n\r\n<p>EDUCATION ACCESS AUSTRALIA - <a href="http://www.eaa.edu.au/" target="_blank">http://www.eaa.edu.au/</a></p>\r\n\r\n<p>AGB TRAINING - <a href="http://www.agb.edu.au/" target="_blank">http://www.agb.edu.au/</a></p>\r\n\r\n<p>Central Australian College - <a href="http://cac.vic.edu.au/" target="_blank">http://cac.vic.edu.au/</a></p>\r\n\r\n<p>Southern Cross Education Institute - <a href="http://www.scei.vic.edu.au/" target="_blank">www.scei.vic.edu.au/</a></p>\r\n\r\n<p>The Imperial College of Australia - <a href="http://www.imperial.edu.au/" target="_blank">http://www.imperial.edu.au/</a></p>\r\n\r\n<p>We work in collaboration with STUDYCO &ndash; <a href="http://www.studyco.com/en" target="_blank">http://www.studyco.com/en</a> This means we can place students to university or institute of their choice worldwide.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:16px"><strong>Students</strong></span></p>\r\n\r\n<p>Services and benefits to international Students</p>\r\n\r\n<p>We offer and simplify the transition and access to education in Australia</p>\r\n\r\n<p>The founders of RN Legal were once migrant students in Australia; we understand how difficult and frustrating it can be.</p>\r\n\r\n<p>We offer support and assistance in the following:</p>\r\n\r\n<ul>\r\n	<li>Course information and enrolment process</li>\r\n	<li>Visa processing to come to Australia</li>\r\n	<li>Education about Australian Culture</li>\r\n	<li>Knowledge of your legal rights and obligations while living in Australia</li>\r\n	<li>Legal representation on issues that may arise while in Australia.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Please call us for any other assistance you may require on&nbsp; 9xxxxxx or email us to <a href="mailto:info@rnlegalservices.com">info@rnlegalservices.com</a></p>\r\n', 'public/upload/img/h3.jpg', 1, 'Owner', 3, '2015-08-06 20:21:57', '2015-10-13 01:02:26'),
(11, 'Nguyen Ngoc Phuong Uyen', 'nguyen-ngoc-phuong-uyen', '<p><em>How can you achieve a high score on this challenging test? Let&rsquo;s meet Nguyen Vu Ha Yen Nhi who received 7.0 on IELTS after only three English courses at ILA and get to know her tips and strategies.</em></p>\r\n', 'public/upload/img/nhi.jpg', 1, 'Nguyen Ngoc Phuong Uyen', 3, '2015-10-12 21:43:14', '2015-10-13 01:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(66) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `activated` tinyint(1) DEFAULT NULL,
  `reset_code` varchar(255) DEFAULT NULL,
  `gioitinh` varchar(30) DEFAULT NULL,
  `level` tinyint(2) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `dienthoai`, `hoten`, `diachi`, `activated`, `reset_code`, `gioitinh`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '40fbe32a8a5789ea8f62f978c81d2ba7', 'minhliem86@yahoo.com', '0920942054', 'minh liêm', '128 le quang dinh', 1, NULL, NULL, 1, 'BJmohw781IZq61b9QtFry3QSjiRFuh8V3ES2XUdwdoU1fuu7le3j1urMaHHq', '2015-01-18 03:03:45', '2015-10-03 06:16:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
 ADD PRIMARY KEY (`id`), ADD KEY `assigned_roles_user_id_foreign` (`user_id`), ADD KEY `assigned_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
 ADD PRIMARY KEY (`id`), ADD KEY `permission_role_permission_id_foreign` (`permission_id`), ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
