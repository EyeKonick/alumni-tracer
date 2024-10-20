-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 04:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_tracer`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_survey`
--

CREATE TABLE `alumni_survey` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alumni_id` bigint(20) UNSIGNED NOT NULL,
  `degree_skills_in_line` tinyint(1) NOT NULL,
  `suggestions` text NOT NULL,
  `additional_info_text` text DEFAULT NULL,
  `document_path` varchar(255) DEFAULT NULL,
  `document_path_2` varchar(250) DEFAULT NULL,
  `document_path_3` varchar(250) DEFAULT NULL,
  `challenges_faced` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`challenges_faced`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumni_survey`
--

INSERT INTO `alumni_survey` (`id`, `alumni_id`, `degree_skills_in_line`, `suggestions`, `additional_info_text`, `document_path`, `document_path_2`, `document_path_3`, `challenges_faced`, `created_at`, `updated_at`) VALUES
(2, 15, 0, 'sdsdsd', NULL, NULL, NULL, NULL, '[\"1\",\"2\"]', '2024-09-14 18:12:10', '2024-09-14 18:12:10'),
(3, 16, 1, 'Non quasi rerum quod fugiat delectus expedita dicta.', NULL, NULL, NULL, NULL, '\"[6]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(4, 17, 1, 'Nam rem delectus animi vero et eos.', NULL, 'documents/sample.mp4', NULL, NULL, '\"[8,6,2]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(5, 18, 0, 'Quae esse beatae laborum qui similique aut.', NULL, NULL, NULL, NULL, '\"[3,4,2]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(6, 19, 1, 'Sint aliquid veritatis velit qui et sit debitis.', NULL, 'documents/sample.skd', NULL, NULL, '\"[1]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(7, 20, 0, 'Quae possimus id ea repellendus.', NULL, NULL, NULL, NULL, '\"[2,1,5]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(8, 21, 0, 'Facere animi animi nesciunt accusantium magnam.', NULL, NULL, NULL, NULL, '\"[7,5,2]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(9, 22, 0, 'Ea laborum nihil molestias.', NULL, 'documents/sample.semf', NULL, NULL, '\"[2,8,1]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(10, 23, 0, 'Est tempora sapiente quas modi repudiandae consequatur alias.', NULL, 'documents/sample.uvh', NULL, NULL, '\"[3,5,6]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(11, 24, 0, 'Accusantium sint nihil animi nulla.', NULL, NULL, NULL, NULL, '\"[8,6]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(12, 25, 0, 'Sit corrupti voluptas facilis quis quo quam perspiciatis.', NULL, NULL, NULL, NULL, '\"[6,2,3]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(13, 26, 0, 'Placeat sit exercitationem blanditiis amet voluptatibus voluptatem.', NULL, NULL, NULL, NULL, '\"[5,3]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(14, 27, 1, 'Eum accusamus enim quae voluptatem placeat vel.', NULL, NULL, NULL, NULL, '\"[7]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(15, 28, 1, 'Quia ipsam sit nulla velit earum accusantium perferendis molestiae.', NULL, NULL, NULL, NULL, '\"[8,4,3]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(16, 29, 0, 'Provident quasi ea itaque officiis.', NULL, NULL, NULL, NULL, '\"[8,6]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(17, 30, 0, 'Quod assumenda quaerat ut aut fugit error voluptas temporibus.', NULL, 'documents/sample.t3', NULL, NULL, '\"[4]\"', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(18, 31, 1, 'test', NULL, NULL, NULL, NULL, '[\"1\",\"2\"]', '2024-09-15 07:55:01', '2024-09-15 07:55:01'),
(19, 32, 1, 'test', NULL, NULL, NULL, NULL, '[\"1\",\"2\"]', '2024-09-15 08:05:20', '2024-09-15 08:05:20'),
(20, 33, 0, 'sdsd', 'asdsdasd', NULL, NULL, NULL, '[\"1\",\"2\"]', '2024-09-15 09:07:37', '2024-09-15 09:07:37'),
(21, 34, 0, 'dsfdfdsf', 'sdfsdfsdf', NULL, NULL, NULL, '[\"1\",\"2\"]', '2024-09-15 16:25:14', '2024-09-15 16:25:14'),
(22, 35, 1, 'testdasda', NULL, NULL, NULL, NULL, NULL, '2024-10-19 17:51:27', '2024-10-19 17:51:27'),
(23, 36, 1, 'weqweqdsadasdasdwq', NULL, NULL, NULL, NULL, '[\"1\",\"2\",\"7\",\"8\"]', '2024-10-19 18:00:16', '2024-10-19 18:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `challenge_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `challenge_name`, `created_at`, `updated_at`) VALUES
(1, 'Job Hunting', NULL, NULL),
(2, 'Employment Interview', NULL, NULL),
(3, 'Work Environment', NULL, NULL),
(4, 'Management and Peer Relationship', NULL, NULL),
(5, 'Promotion', NULL, NULL),
(6, 'Personal Problem', NULL, NULL),
(7, 'Career Development', NULL, NULL),
(8, 'Work Life Balance', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `civil_statuses`
--

CREATE TABLE `civil_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civil_statuses`
--

INSERT INTO `civil_statuses` (`id`, `status_name`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Separated'),
(4, 'Widow');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`) VALUES
(1, 'BSCS - Bachelor of Science in Computer Science'),
(2, 'BSOA - Bachelor of Science in Office Administration'),
(3, 'BSFT - Bachelor of Science in Food Technology and Entrepreneurship'),
(4, 'BAEL - Bachelor of Science Arts Major in English'),
(5, 'AB ECON - Bachelor of Arts Major in Economics'),
(6, 'AB POL SCI - Bachelor of Arts Major in Political Science');

-- --------------------------------------------------------

--
-- Table structure for table `employment_statuses`
--

CREATE TABLE `employment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_statuses`
--

INSERT INTO `employment_statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Casual', NULL, NULL),
(2, 'Probationary', NULL, NULL),
(3, 'Regular', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_09_12_135343_create_genders_table', 1),
(2, '2024_09_12_135356_create_civil_statuses_table', 2),
(3, '2024_09_12_135441_create_courses_table', 3),
(4, '2024_09_12_135544_create_employment_statuses_table', 4),
(5, '2024_09_12_135544_create_monthly_incomes_table', 5),
(6, '2024_09_12_135545_create_challenges_table', 6),
(7, '2024_09_12_135545_create_skills_table', 7),
(8, '0001_01_01_000000_create_users_table', 8),
(9, '0001_01_01_000001_create_cache_table', 8),
(10, '0001_01_01_000002_create_jobs_table', 8),
(11, '2024_09_12_135233_create_personal_data_table', 8),
(12, '2024_09_12_135304_create_professional_data_table', 8),
(13, '2024_09_12_135315_create_alumni_survey_table', 8),
(14, '2024_09_15_010031_add_age_to_personal_data_table', 9),
(15, '2024_09_15_013804_create_professional_data_skill_table', 10),
(16, '2024_09_15_015923_drop_skills_used_from_professional_data_table', 11),
(17, '2024_09_15_020555_add_challenges_faced_to_alumni_survey_table', 12),
(18, '2024_09_15_170208_add_additional_info_text_to_alumni_survey_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_incomes`
--

CREATE TABLE `monthly_incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `income_range` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_incomes`
--

INSERT INTO `monthly_incomes` (`id`, `income_range`, `created_at`, `updated_at`) VALUES
(1, '20000 and below', NULL, NULL),
(2, '21000 to 30000', NULL, NULL),
(3, '31000 to 40000', NULL, NULL),
(4, '41000 to 50000', NULL, NULL),
(5, '51000 above', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_data`
--

CREATE TABLE `personal_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `civil_status_id` bigint(20) UNSIGNED NOT NULL,
  `year_graduated` year(4) NOT NULL,
  `course_graduated_id` bigint(20) UNSIGNED NOT NULL,
  `home_address` text NOT NULL,
  `cellphone_number` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`id`, `first_name`, `middle_name`, `last_name`, `gender_id`, `age`, `civil_status_id`, `year_graduated`, `course_graduated_id`, `home_address`, `cellphone_number`, `email`, `created_at`, `updated_at`) VALUES
(15, 'dsds', 'dsds', 'dsdsd', 1, 23, 2, '2023', 2, 'ddsdsd', '09090909099', 'tatte@test', '2024-09-14 18:12:10', '2024-09-14 18:12:10'),
(16, 'Etha', NULL, 'Hauck', 2, 49, 2, '2021', 3, '7839 Tillman Loaf Apt. 505\nNorth Alyssonport, MA 72692-1912', '09488070364', 'gzulauf@example.com', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(17, 'Crystel', NULL, 'Halvorson', 2, 24, 2, '2011', 3, '347 Kuhn Shoal Suite 606\nSouth Samara, HI 03500-0916', '09971288470', 'lauretta39@example.org', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(18, 'Shaylee', NULL, 'Legros', 3, 23, 1, '2013', 1, '886 Chet Fork Apt. 797\nNorth Leslie, DE 42373', '09000383450', 'bertram34@example.com', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(19, 'Ramon', 'Norene', 'Christiansen', 1, 25, 1, '2005', 3, '6709 Zoey Run\nSouth Gonzaloburgh, NC 72634', '09045121375', 'zena.abshire@example.net', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(20, 'John', NULL, 'Gleichner', 1, 22, 1, '2022', 4, '900 Nikolaus Mountain\nSouth Enoch, WY 42275-0776', '09775233280', 'sigmund.cremin@example.net', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(21, 'Nyasia', NULL, 'Crist', 2, 29, 1, '2019', 4, '64767 Sincere Fort\nPort Ona, RI 16851-9763', '09926444078', 'mlubowitz@example.com', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(22, 'Ettie', NULL, 'Grimes', 1, 59, 4, '2011', 2, '211 Santiago Rapids\nSouth Vedatown, CA 49683', '09971004090', 'wyman.mervin@example.net', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(23, 'Breana', NULL, 'Moen', 1, 23, 4, '2004', 4, '6193 Shyanne Summit\nDenesikview, NY 23740', '09605770094', 'aherzog@example.com', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(24, 'Lacey', 'Evans', 'Macejkovic', 2, 46, 3, '2006', 4, '1844 Crooks Gardens Suite 750\nWest Laurelton, ND 69500-1549', '09219434625', 'brigitte89@example.net', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(25, 'Lorenzo', NULL, 'Leuschke', 3, 43, 3, '2004', 1, '9681 Ernser Crossroad\nSouth Dallastown, OR 79703', '09507404073', 'lina91@example.net', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(26, 'Jimmie', 'Carolyn', 'Greenholt', 1, 32, 3, '2007', 2, '23020 Kihn Knolls\nAliciaborough, NV 52272-3709', '09196606048', 'hamill.maribel@example.net', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(27, 'Jairo', 'Remington', 'King', 3, 28, 2, '2012', 3, '203 Marilie Falls Apt. 566\nNorth Leopoldomouth, ID 49305-5470', '09040512103', 'broderick45@example.com', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(28, 'Kenya', NULL, 'Murazik', 3, 27, 3, '2012', 3, '7668 Camylle Coves\nLake Fletcher, WV 64788', '09122886595', 'eankunding@example.com', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(29, 'Jerrod', NULL, 'Hauck', 1, 41, 4, '2000', 2, '4861 Eino Tunnel Apt. 173\nErynport, WV 65049-3959', '09570614005', 'tillman.tess@example.org', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(30, 'Elian', NULL, 'Moore', 2, 35, 1, '2002', 4, '3793 Howell Divide\nWest Bartholomeborough, IA 77123', '09681014093', 'dmarvin@example.com', '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(31, 'juan', 'dela', 'cruz', 1, 23, 3, '2023', 3, 'Test', '09090909099', 'test@test.com', '2024-09-15 07:55:01', '2024-09-15 07:55:01'),
(32, 'test', 'test', 'test', 2, 24, 4, '2023', 4, 'test', '09090909099', 'tesst@test.com', '2024-09-15 08:05:20', '2024-09-15 08:05:20'),
(33, 'dsfs', 'dfsf', 'sdfsdfsf', 2, 25, 3, '2023', 1, 'fsf', '09090909099', 'dsf@test.com', '2024-09-15 09:07:36', '2024-09-15 09:07:36'),
(34, 'asad', 'sadasd', 'asdasd', 1, 23, 2, '2023', 2, 'dasdasd', '09090909099', 'testsdasd@test.com', '2024-09-15 16:25:14', '2024-09-15 16:25:14'),
(35, 'Mark Romel', 'F', 'Feguro', 1, 24, 1, '2024', 1, 'Dumalag', '09672812221', 'markromelfeguro1@gmail.com', '2024-10-19 17:51:27', '2024-10-19 17:51:27'),
(36, 'test', 'test', 'test', 1, 32, 1, '2025', 4, 'test', '09123456789', 'tetset@gmail.com', '2024-10-19 18:00:16', '2024-10-19 18:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `professional_data`
--

CREATE TABLE `professional_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alumni_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_address` text NOT NULL,
  `employer` varchar(255) NOT NULL,
  `employer_address` text NOT NULL,
  `is_traced` tinyint(4) DEFAULT 0,
  `is_employed` tinyint(4) NOT NULL DEFAULT 0,
  `employment_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `present_position` varchar(255) NOT NULL,
  `inclusive_from` year(4) NOT NULL,
  `inclusive_to` year(4) NOT NULL,
  `monthly_income_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professional_data`
--

INSERT INTO `professional_data` (`id`, `alumni_id`, `company_name`, `company_address`, `employer`, `employer_address`, `is_traced`, `is_employed`, `employment_status_id`, `present_position`, `inclusive_from`, `inclusive_to`, `monthly_income_id`, `created_at`, `updated_at`) VALUES
(5, 15, 'dsds', 'dsdsd', 'sds', 'dsdsd', 0, 0, 2, 'sdsd', '2023', '2034', 1, '2024-09-14 18:12:10', '2024-09-14 18:12:10'),
(6, 16, 'Anderson and Sons', '1407 Bashirian Lake\nNew Tom, MI 12984', 'Brekke Ltd', '140 Hilpert Flats Suite 562\nEast Crawfordmouth, MT 18663', 0, 0, 1, 'Aircraft Cargo Handling Supervisor', '2010', '2021', 2, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(7, 17, 'Sauer, Erdman and Kuphal', '326 Donnell Forges\nWehnerview, MA 77298', 'Abernathy, Aufderhar and Jaskolski', '7065 Marty Squares Suite 479\nNorth Marshallberg, NJ 86418-6304', 0, 0, 2, 'Millwright', '2015', '2024', 1, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(8, 18, 'Maggio Ltd', '4750 Madge Harbors Suite 663\nLake Rudolph, DE 89110-4834', 'Hauck, Greenholt and Gusikowski', '810 Emmet Stream Apt. 665\nVolkmanland, AL 29559-1068', 0, 0, 2, 'Meter Mechanic', '2012', '2023', 2, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(9, 19, 'Towne-Osinski', '9219 Adrienne Stravenue\nHirthehaven, NE 53577-6138', 'Corkery, Batz and Jaskolski', '2006 Hyatt Ferry Apt. 252\nLefflerstad, WY 98864-3219', 0, 0, 2, 'Environmental Scientist', '2011', '2024', 5, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(10, 20, 'Hagenes-Kirlin', '20467 Cali Gateway Suite 548\nKshlerinview, CO 59514-4595', 'Bergnaum-Murphy', '344 Donna Views\nRachelland, TX 02069', 0, 0, 1, 'Able Seamen', '2014', '2023', 2, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(11, 21, 'Kreiger LLC', '78858 Lera Landing Suite 671\nWest Mallory, SC 46198', 'Mann, Abernathy and Breitenberg', '213 Haag Drive\nNinamouth, VT 53904-1561', 0, 0, 1, 'Nuclear Monitoring Technician', '2013', '2023', 2, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(12, 22, 'Reinger-Kautzer', '84137 Rozella Ports\nHillchester, NH 21176', 'Jacobson, Rodriguez and Moen', '37921 Gibson Loop\nSanfordfort, RI 37834-0938', 0, 0, 3, 'Food Preparation and Serving Worker', '2012', '2024', 4, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(13, 23, 'Volkman-Cremin', '37223 Lyla Port Suite 164\nWest Dovie, MN 19407', 'Pagac Inc', '306 Mosciski Divide\nSouth Lura, WY 68583-5243', 0, 0, 1, 'Typesetting Machine Operator', '2020', '2023', 4, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(14, 24, 'Sauer-Shields', '41777 Orpha Brooks Apt. 498\nReingerside, PA 39579-0428', 'Denesik-Reichert', '516 Cormier Passage Suite 381\nBeerfurt, AZ 66582-7238', 0, 0, 2, 'Engineer', '2016', '2024', 2, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(15, 25, 'Kreiger Inc', '28150 Walker Centers\nNorth Emmettfurt, TN 53593', 'Reynolds Group', '852 Annette Divide\nLittleport, WA 89959-5028', 0, 0, 2, 'Gaming Manager', '2013', '2021', 4, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(16, 26, 'Hoeger-Connelly', '4711 Runolfsdottir Ranch\nCruickshankborough, WA 17782-5228', 'Tillman LLC', '452 White Junctions Apt. 211\nProsaccofurt, ID 08700', 0, 0, 2, 'Bartender', '2012', '2021', 2, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(17, 27, 'O\'Keefe-Yundt', '48218 Hahn Lakes Suite 058\nPort Elbert, WY 62104-2004', 'Willms Ltd', '57533 Morissette Ferry\nPort Serenitytown, AR 78223-5547', 0, 0, 1, 'Production Manager', '2017', '2023', 2, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(18, 28, 'Champlin-Davis', '2587 Claud Flat Apt. 246\nWindlerbury, AZ 91668', 'Fay, Cassin and Upton', '5898 O\'Keefe Mission Apt. 153\nLake Mauriciofort, AR 98502-9555', 0, 0, 1, 'Precision Etcher and Engraver', '2020', '2023', 5, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(19, 29, 'Green-Batz', '3292 Bart Forge Suite 872\nNew Aleen, MN 53677-9206', 'Braun-Swaniawski', '752 Benton Underpass Apt. 947\nRoobhaven, CA 12753', 0, 0, 3, 'Maintenance Worker', '2016', '2021', 2, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(20, 30, 'Rodriguez, Schulist and Glover', '963 Marcelino Vista Suite 435\nRatkemouth, AL 96769', 'Spencer Inc', '10857 Aaron Hollow Apt. 128\nOrlandobury, AZ 98879-9240', 0, 0, 1, 'Pharmaceutical Sales Representative', '2013', '2022', 4, '2024-09-14 18:17:44', '2024-09-14 18:17:44'),
(21, 31, 'test', 'tsefsf', 'sdfsfd', 'sfsdf', 0, 0, 2, 'teacher', '2023', '2025', 3, '2024-09-15 07:55:01', '2024-09-15 07:55:01'),
(22, 32, 'test', 'test', 'test', 'test', 0, 0, 3, 'teacher', '2020', '2025', 3, '2024-09-15 08:05:20', '2024-09-15 08:05:20'),
(23, 33, 'dsa', 'dasdas', 'dasd', 'adad', 0, 0, 1, 'asdas', '2023', '2026', 3, '2024-09-15 09:07:36', '2024-09-15 09:07:36'),
(24, 34, 'asdfsfsdf', 'sdfsdfdsf', 'dsfsdf', 'sdfsdf', 0, 0, 2, 'dfsdfdsf', '2024', '2025', 4, '2024-09-15 16:25:14', '2024-09-15 16:25:14'),
(25, 35, 'FCU', 'Roxas', 'FCU', 'FCU', 0, 0, 2, 'Faculty', '2024', '2025', 1, '2024-10-19 17:51:27', '2024-10-19 17:51:27'),
(26, 36, 'FCU', 'Roxas', 'FCU', 'FCU', 0, 0, 3, 'Faculty', '2025', '2026', 1, '2024-10-19 18:00:16', '2024-10-19 18:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `professional_data_skill`
--

CREATE TABLE `professional_data_skill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `professional_data_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professional_data_skill`
--

INSERT INTO `professional_data_skill` (`id`, `professional_data_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(9, 5, 1, NULL, NULL),
(10, 5, 2, NULL, NULL),
(11, 6, 4, NULL, NULL),
(12, 6, 6, NULL, NULL),
(13, 6, 5, NULL, NULL),
(14, 7, 3, NULL, NULL),
(15, 7, 5, NULL, NULL),
(16, 7, 6, NULL, NULL),
(17, 8, 6, NULL, NULL),
(18, 9, 8, NULL, NULL),
(19, 9, 3, NULL, NULL),
(20, 9, 4, NULL, NULL),
(21, 10, 6, NULL, NULL),
(22, 11, 5, NULL, NULL),
(23, 12, 8, NULL, NULL),
(24, 13, 2, NULL, NULL),
(25, 14, 7, NULL, NULL),
(26, 14, 4, NULL, NULL),
(27, 14, 1, NULL, NULL),
(28, 15, 4, NULL, NULL),
(29, 15, 2, NULL, NULL),
(30, 15, 6, NULL, NULL),
(31, 16, 5, NULL, NULL),
(32, 16, 7, NULL, NULL),
(33, 17, 7, NULL, NULL),
(34, 17, 1, NULL, NULL),
(35, 17, 6, NULL, NULL),
(36, 18, 2, NULL, NULL),
(37, 18, 4, NULL, NULL),
(38, 18, 5, NULL, NULL),
(39, 19, 4, NULL, NULL),
(40, 20, 2, NULL, NULL),
(41, 20, 3, NULL, NULL),
(42, 21, 1, NULL, NULL),
(43, 21, 2, NULL, NULL),
(44, 22, 1, NULL, NULL),
(45, 22, 2, NULL, NULL),
(46, 23, 1, NULL, NULL),
(47, 23, 2, NULL, NULL),
(48, 24, 1, NULL, NULL),
(49, 24, 2, NULL, NULL),
(50, 25, 1, NULL, NULL),
(51, 25, 2, NULL, NULL),
(52, 25, 3, NULL, NULL),
(53, 25, 5, NULL, NULL),
(54, 25, 6, NULL, NULL),
(55, 25, 7, NULL, NULL),
(56, 25, 8, NULL, NULL),
(57, 26, 1, NULL, NULL),
(58, 26, 2, NULL, NULL),
(59, 26, 6, NULL, NULL),
(60, 26, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6e06iuxAR3NnF1lgNkNGcE86IgvIuRIlnBjUcnuR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFMwV1FjNVFGRlRTYTBET2l4SVZ6RGJETGd5akhNZ0dZUzBXUzBZeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1729389647),
('kYoyiyt7HvKSkEA6xiJ1IfPvPztVty4su5FxUDyq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnRJNkU1NktFemFHZVN3MmVMNXlIcGFVT0tpTGJ6NGNJTzB1enJFcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1729348693);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `created_at`, `updated_at`) VALUES
(1, 'Communication', NULL, NULL),
(2, 'Teamwork', NULL, NULL),
(3, 'Problem Solving', NULL, NULL),
(4, 'Initiative and Enterprising', NULL, NULL),
(5, 'Planning and Organizing', NULL, NULL),
(6, 'Self Management', NULL, NULL),
(7, 'Learning', NULL, NULL),
(8, 'Technical/Technology', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', NULL, '$2y$12$KuwGQwWuT11vZLJeoU9dEeidRHWEG8xbUf1UdAyhFFXTwhV9LeGLy', NULL, '2024-09-15 00:53:10', '2024-09-15 00:53:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_survey`
--
ALTER TABLE `alumni_survey`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumni_survey_alumni_id_foreign` (`alumni_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `civil_statuses`
--
ALTER TABLE `civil_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_statuses`
--
ALTER TABLE `employment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_incomes`
--
ALTER TABLE `monthly_incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_data_email_unique` (`email`),
  ADD KEY `personal_data_gender_id_foreign` (`gender_id`),
  ADD KEY `personal_data_civil_status_id_foreign` (`civil_status_id`),
  ADD KEY `personal_data_course_graduated_id_foreign` (`course_graduated_id`);

--
-- Indexes for table `professional_data`
--
ALTER TABLE `professional_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professional_data_alumni_id_foreign` (`alumni_id`),
  ADD KEY `professional_data_employment_status_id_foreign` (`employment_status_id`),
  ADD KEY `professional_data_monthly_income_id_foreign` (`monthly_income_id`);

--
-- Indexes for table `professional_data_skill`
--
ALTER TABLE `professional_data_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professional_data_skill_professional_data_id_foreign` (`professional_data_id`),
  ADD KEY `professional_data_skill_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_survey`
--
ALTER TABLE `alumni_survey`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `civil_statuses`
--
ALTER TABLE `civil_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employment_statuses`
--
ALTER TABLE `employment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `monthly_incomes`
--
ALTER TABLE `monthly_incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `professional_data`
--
ALTER TABLE `professional_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `professional_data_skill`
--
ALTER TABLE `professional_data_skill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni_survey`
--
ALTER TABLE `alumni_survey`
  ADD CONSTRAINT `alumni_survey_alumni_id_foreign` FOREIGN KEY (`alumni_id`) REFERENCES `personal_data` (`id`);

--
-- Constraints for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD CONSTRAINT `personal_data_civil_status_id_foreign` FOREIGN KEY (`civil_status_id`) REFERENCES `civil_statuses` (`id`),
  ADD CONSTRAINT `personal_data_course_graduated_id_foreign` FOREIGN KEY (`course_graduated_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `personal_data_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`);

--
-- Constraints for table `professional_data`
--
ALTER TABLE `professional_data`
  ADD CONSTRAINT `professional_data_alumni_id_foreign` FOREIGN KEY (`alumni_id`) REFERENCES `personal_data` (`id`),
  ADD CONSTRAINT `professional_data_employment_status_id_foreign` FOREIGN KEY (`employment_status_id`) REFERENCES `employment_statuses` (`id`),
  ADD CONSTRAINT `professional_data_monthly_income_id_foreign` FOREIGN KEY (`monthly_income_id`) REFERENCES `monthly_incomes` (`id`);

--
-- Constraints for table `professional_data_skill`
--
ALTER TABLE `professional_data_skill`
  ADD CONSTRAINT `professional_data_skill_professional_data_id_foreign` FOREIGN KEY (`professional_data_id`) REFERENCES `professional_data` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `professional_data_skill_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
