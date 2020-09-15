-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 08:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imc`
--

-- --------------------------------------------------------

--
-- Table structure for table `initiatives`
--

CREATE TABLE `initiatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `where_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `where_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `project_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `business_owner_id` int(11) DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `brief_en` text COLLATE utf8mb4_unicode_ci,
  `brief_ar` text COLLATE utf8mb4_unicode_ci,
  `start_at` date DEFAULT NULL,
  `end_at` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `initiatives`
--

INSERT INTO `initiatives` (`id`, `title_en`, `title_ar`, `slug_en`, `slug_ar`, `where_en`, `where_ar`, `url_title`, `url`, `project_id`, `department_id`, `business_owner_id`, `description_en`, `description_ar`, `brief_en`, `brief_ar`, `start_at`, `end_at`, `status`, `created_at`, `updated_at`) VALUES
(2, 'COVID-19 Enhancements - Visual Triage in ER', 'تحسينات COVID-19 - الفرز المرئي في ER', 'covid-19-enhancements-visual-triage-in-er', 'thsynat-covid-19-alfrz-almrey-fy-er', 'asd', 'asdd', 'Click here', 'https://www.imc.med.sa/en/doctors', 6, 68, 4, '<p>Descriptions</p>', '<p>Descriptions</p>', '<p>Featured Speakers: 1. Alisa Ladyk-Bryzgalova, World Health Organization (office in Ukraine), &laquo;Psychosocial Aspects of COVID-19 Pandemic&raquo; 2. Robert van Voren, international foundation &laquo;Global Initiative on Psychiatry (GIP)&raquo;, General Secretary, &laquo;International campaign &quot;Mind the Gap&quot; as a tool of destigmatization in the field of mental health&raquo; 3. Iryna Pinchuk, Institute of Psychiatry of Taras Shevchenko National University of Kyiv, Director, &laquo;Risk perception, stress factors in healthcare professionals during COVID-19 pandemic&raquo; 4. Albert Feldman, Golda Meir Institute of Strategic Research, &laquo;Creation of a socio-psychological model of the hotline &laquo;Stop, Panic&raquo; in the conditions of quarantine measures of the COVID-19 pandemic&raquo; This Webinar is presented in Ukrainian and was recorded on June 3rd 2020.</p>', '<pre data-placeholder=\"Translation\" dir=\"rtl\" id=\"tw-target-text\">\r\n\r\n1. أليسا ليدك بريزغالوفا ، منظمة الصحة العالمية (مكتب في أوكرانيا) ، &laquo;الجوانب النفسية الاجتماعية لوباء COVID-19&raquo;\r\n\r\n2. روبرت فان فورين ، المؤسسة الدولية &laquo;المبادرة العالمية للطب النفسي (GIP)&raquo; ، الأمين العام ، &laquo;الحملة الدولية&quot; Mind the Gap &quot;كأداة لإزالة الوصمة في مجال الصحة النفسية&quot;\r\n\r\n3. إيرينا بينشوك ، معهد الطب النفسي بجامعة تاراس شيفتشينكو الوطنية في كييف ، مدير &quot;إدراك المخاطر وعوامل الإجهاد لدى المتخصصين في الرعاية الصحية أثناء جائحة COVID-19&quot;\r\n\r\n4. ألبرت فيلدمان ، معهد جولدا مئير للبحوث الاستراتيجية ، &quot;إنشاء نموذج اجتماعي - نفسي للخط الساخن&quot; توقف ، ذعر &quot;في ظروف تدابير الحجر الصحي لوباء COVID-19&quot;\r\n\r\nيتم تقديم هذه الندوة عبر الإنترنت باللغة الأوكرانية وتم تسجيلها في 3 يونيو 2</pre>', '2020-09-19', '2020-10-27', 1, '2020-09-09 13:30:16', '2020-09-14 14:15:02'),
(3, 'COVID-19 Webinars', 'ندوات عبر الإنترنت حول COVID-19', 'covid-19-webinars', 'ndoat-aabr-alentrnt-hol-covid-19', 'asd', 'asdd', 'Click here', 'https://www.imc.med.sa/en/doctors', 7, 6, 4, NULL, NULL, '<p>The Lancet Psychiatry, Mental Health Innovation Network, and United for Global Mental Health are launching a series of weekly webinars designed to provide policymakers and the wider health community with the latest evidence on the impact of COVID-19 on mental health and how to address it.</p>\r\n\r\n<p>The webinars will provide practical solutions to the challenging issues we are all grappling with. Participants will be encouraged to join from around the world, including those with lived experience of mental health and of COVID-19. The format will be short remarks by up to 4 panellists followed by a Q&amp;A chaired by Niall Boyce, Editor of The Lancet Psychiatry.</p>', '<pre data-placeholder=\"Translation\" dir=\"rtl\" id=\"tw-target-text\">\r\nتطلق Lancet Psychiatry و Mental Health Innovation Network و United for Global Mental Health سلسلة من الندوات الأسبوعية على الإنترنت مصممة لتزويد صانعي السياسات والمجتمع الصحي الأوسع بأحدث الأدلة حول تأثير COVID-19 على الصحة العقلية وكيفية معالجتها .\r\n\r\nستوفر الندوات عبر الإنترنت حلولاً عملية للقضايا الصعبة التي نواجهها جميعًا. سيتم تشجيع المشاركين على الانضمام من جميع أنحاء العالم ، بما في ذلك أولئك الذين لديهم خبرة معيشية في الصحة العقلية و COVID-19. سيكون الشكل عبارة عن ملاحظات قصيرة من قبل ما يصل إلى 4 من المشاركين يتبعها سؤال وجواب برئاسة نيال بويس ، محرر The Lancet Psychiatry.</pre>', '2020-10-06', '2020-09-14', 1, '2020-09-09 13:31:52', '2020-09-14 14:10:22'),
(4, 'Objective', 'Objective  ar', 'objective', 'objective-ar', 'Where en', 'Where', 'Find a Doctor', 'https://www.imc.med.sa/en/doctors', 6, 4, 4, '<p>Descriptions</p>', '<p>Descriptions&nbsp;Ar</p>', '<p>Brief</p>', '<p>Brief ar</p>', '2020-10-14', '2020-09-30', 1, '2020-09-09 13:36:23', '2020-09-14 14:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `initiative_categories`
--

CREATE TABLE `initiative_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `initiative_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `initiative_categories`
--

INSERT INTO `initiative_categories` (`id`, `initiative_id`, `category_id`, `created_at`, `updated_at`) VALUES
(13, 7, 5, '2020-09-10 18:10:22', '2020-09-10 18:10:22'),
(63, 4, 5, '2020-09-14 14:03:16', '2020-09-14 14:03:16'),
(64, 4, 4, '2020-09-14 14:03:16', '2020-09-14 14:03:16'),
(67, 3, 6, '2020-09-14 14:10:22', '2020-09-14 14:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `initiative_media`
--

CREATE TABLE `initiative_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `initiative_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `initiative_media`
--

INSERT INTO `initiative_media` (`id`, `initiative_id`, `media_id`, `created_at`, `updated_at`) VALUES
(39, 4, 1707, '2020-09-14 14:03:16', '2020-09-14 14:03:16'),
(40, 4, 1713, '2020-09-14 14:03:16', '2020-09-14 14:03:16'),
(41, 4, 1708, '2020-09-14 14:03:16', '2020-09-14 14:03:16'),
(44, 3, 1716, '2020-09-14 14:10:22', '2020-09-14 14:10:22'),
(45, 3, 1699, '2020-09-14 14:10:23', '2020-09-14 14:10:23'),
(46, 2, 1717, '2020-09-14 14:15:03', '2020-09-14 14:15:03'),
(47, 2, 1695, '2020-09-14 14:15:03', '2020-09-14 14:15:03'),
(48, 2, 1692, '2020-09-14 14:15:03', '2020-09-14 14:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `init_business_owners`
--

CREATE TABLE `init_business_owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `init_business_owners`
--

INSERT INTO `init_business_owners` (`id`, `title_en`, `title_ar`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Cumiya Johnson', 'Johnson Cumiya', 1, '2020-09-07 17:42:57', '2020-09-13 17:39:19'),
(5, 'Muhammad M. Siddiqui', 'Muhammad M. Siddiqui', 1, '2020-09-13 17:18:53', '2020-09-13 17:18:53'),
(6, 'Khalid B. Alem', 'Khalid B. Alem', 1, '2020-09-13 17:19:08', '2020-09-13 17:19:42'),
(7, 'Samer AbuGhazaleh', 'Samer AbuGhazaleh', 1, '2020-09-13 17:19:29', '2020-09-13 17:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `init_categories`
--

CREATE TABLE `init_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `_lft` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `_rgt` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `init_categories`
--

INSERT INTO `init_categories` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `slug_en`, `slug_ar`, `status`, `_lft`, `_rgt`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'EDUCATIONAL', 'التعليمية', '<p>test child</p>', '<p>test child</p>', 'educational', 'altaalymy', 1, 7, 8, NULL, '2020-09-06 06:15:54', '2020-09-07 17:45:49'),
(4, 'ETHICAL', 'أخلاقي', NULL, NULL, 'ethical', 'akhlaky', 1, 3, 4, NULL, '2020-09-06 12:34:09', '2020-09-06 18:31:06'),
(5, 'QUALITY', 'جودة', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id ligula in velit semper malesuada nec in sem. Nullam at finibus justo. Nulla scelerisque tellus vitae nisi mattis, at mattis odio molestie. Aenean vestibulum elit sit amet sollicitudin auctor. Sed convallis tristique augue, et dignissim augue tincidunt congue. In eget odio pharetra ipsum scelerisque accumsan ut in mauris. Suspendisse pharetra turpis non arcu aliquet placerat. Vivamus lacinia leo diam. Maecenas auctor justo quam, sed eleifend dui fermentum nec. Nam lacinia tellus nec elit sodales, et malesuada ex lobortis. Donec semper pulvinar nibh scelerisque euismod. Nulla mattis, nisi ut rhoncus euismod, arcu lorem hendrerit diam, vitae posuere eros nulla vel dolor. Sed nunc ante, dapibus eget vestibulum ut, aliquet quis odio. Nunc a risus quis lectus accumsan ullamcorper vitae non ex.</p>', '<p>عندما يريد العالم أن ‪يتكلّم ‬ ، فهو يتحدّث بلغة يونيكود. تس</p>', 'quality', 'jod', 1, 5, 6, NULL, '2020-09-06 18:26:37', '2020-09-06 18:31:44'),
(6, 'SOCIAL', 'الاجتماعية', NULL, NULL, 'social', 'alajtmaaay', 1, 9, 10, NULL, '2020-09-07 17:46:20', '2020-09-07 17:46:20'),
(7, 'FINANCIAL', 'الأمور المالية', NULL, NULL, 'financial', 'alamor-almaly', 1, 11, 12, NULL, '2020-09-07 17:46:56', '2020-09-07 17:46:56'),
(8, 'LEADERSHIP', 'القيادة', NULL, NULL, 'leadership', 'alkyad', 1, 13, 14, NULL, '2020-09-07 17:47:50', '2020-09-07 17:47:50'),
(9, 'ENVIRONMENTAL', 'البيئة', NULL, NULL, 'environmental', 'albye', 1, 15, 16, NULL, '2020-09-07 17:48:19', '2020-09-07 17:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `init_projects`
--

CREATE TABLE `init_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `media_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `init_projects`
--

INSERT INTO `init_projects` (`id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `slug_en`, `slug_ar`, `image`, `media_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 'COVID-19 INITIATIVES', 'مبادرات COVID-19', NULL, NULL, 'covid-19-initiatives', 'mbadrat-covid-19', '2020/08/f30a38f9694d8cc2c6a3759eb7f105b91598516402.jpg', 1702, 1, '2020-09-07 17:45:02', '2020-09-07 17:48:56'),
(7, 'Covid19  in 2020', 'Covid19  in 2020', NULL, NULL, 'covid19-in-2020', 'covid19-in-2020', '2020/08/f30a38f9694d8cc2c6a3759eb7f105b91598516402.jpg', 1702, 1, '2020-09-08 18:11:43', '2020-09-08 18:11:43'),
(8, 'IMC	Way 2021', 'IMC	Way 2021 arabic', '<p>asdasdasd</p>', '<p>asdad ar</p>', 'imcway-2021', 'imcway-2021-arabic', '2020/08/c83e6ebc57d39a63a308c30c847d7ba11598881096.jpg', 1705, 1, '2020-09-09 17:20:09', '2020-09-09 17:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `init_project_categories`
--

CREATE TABLE `init_project_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `init_project_categories`
--

INSERT INTO `init_project_categories` (`id`, `project_id`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 6, 9, '2020-09-07 17:48:56', '2020-09-07 17:48:56'),
(4, 6, 8, '2020-09-07 17:48:56', '2020-09-07 17:48:56'),
(5, 6, 7, '2020-09-07 17:48:56', '2020-09-07 17:48:56'),
(6, 6, 6, '2020-09-07 17:48:56', '2020-09-07 17:48:56'),
(7, 6, 5, '2020-09-07 17:48:57', '2020-09-07 17:48:57'),
(8, 6, 4, '2020-09-07 17:48:57', '2020-09-07 17:48:57'),
(9, 6, 2, '2020-09-07 17:48:57', '2020-09-07 17:48:57'),
(10, 7, 6, '2020-09-08 18:11:43', '2020-09-08 18:11:43'),
(11, 7, 4, '2020-09-08 18:11:43', '2020-09-08 18:11:43'),
(12, 8, 8, '2020-09-09 17:20:09', '2020-09-09 17:20:09'),
(13, 8, 7, '2020-09-09 17:20:09', '2020-09-09 17:20:09'),
(14, 8, 6, '2020-09-09 17:20:10', '2020-09-09 17:20:10'),
(15, 8, 5, '2020-09-09 17:20:10', '2020-09-09 17:20:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `initiatives`
--
ALTER TABLE `initiatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `initiative_categories`
--
ALTER TABLE `initiative_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `initiative_media`
--
ALTER TABLE `initiative_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `init_business_owners`
--
ALTER TABLE `init_business_owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `init_categories`
--
ALTER TABLE `init_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `init_categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`);

--
-- Indexes for table `init_projects`
--
ALTER TABLE `init_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `init_project_categories`
--
ALTER TABLE `init_project_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `initiatives`
--
ALTER TABLE `initiatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `initiative_categories`
--
ALTER TABLE `initiative_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `initiative_media`
--
ALTER TABLE `initiative_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `init_business_owners`
--
ALTER TABLE `init_business_owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `init_categories`
--
ALTER TABLE `init_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `init_projects`
--
ALTER TABLE `init_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `init_project_categories`
--
ALTER TABLE `init_project_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
