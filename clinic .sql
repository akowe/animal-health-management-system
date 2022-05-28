-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2020 at 04:21 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(100) NOT NULL,
  `img_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `x` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `ion_user_id`, `hospital_id`) VALUES
(87, '', 'Sikiru Kehinde', 'sikiru.kehinde@livestock247.com', '99 Opebi Road, Ikeja', '09062903550', '', '721', '411');

-- --------------------------------------------------------

--
-- Table structure for table `alloted_bed`
--

CREATE TABLE `alloted_bed` (
  `id` int(100) NOT NULL,
  `number` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `patient` varchar(100) CHARACTER SET utf8 NOT NULL,
  `a_time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `d_time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `x` varchar(100) CHARACTER SET utf8 NOT NULL,
  `bed_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 NOT NULL,
  `farm` varchar(100) CHARACTER SET utf8 NOT NULL,
  `farm_address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `farm_phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `time_slot` varchar(100) CHARACTER SET utf8 NOT NULL,
  `s_time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `e_time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `remarks` varchar(500) CHARACTER SET utf8 NOT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `s_time_key` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` varchar(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient`, `doctor`, `farm`, `farm_address`, `farm_phone`, `date`, `time_slot`, `s_time`, `e_time`, `remarks`, `add_date`, `s_time_key`, `status`, `hospital_id`) VALUES
(292, '2504', '148', '', '', '', '1583708400', '06:30 PM A 06:30 PM', '06:30 PM', '06:30 PM', 'eerfe', '03/09/20', '222', 'Done', '411'),
(293, '2504', '148', '', '', '', '1584658800', '11:30 AM A 11:30 AM', '11:30 AM', '11:30 AM', 'TESTING', '03/17/20', '138', 'Pending', '411'),
(294, NULL, '148', 'jj farm', '99 opebi ikeja', '08025146887', '1583190000', '02:30 PM A 02:30 PM', '02:30 PM', '02:30 PM', 'testing', '03/23/20', '174', 'Pending', '411'),
(295, NULL, '149', 'jane farm', '99 opebi', '07022257', '1598828400', '12:45 PM A 02:45 PM', '12:45 PM', '02:45 PM', 'test', '08/26/20', '153', 'Pending', '411');

-- --------------------------------------------------------

--
-- Table structure for table `bankb`
--

CREATE TABLE `bankb` (
  `id` int(100) NOT NULL,
  `group` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankb`
--

INSERT INTO `bankb` (`id`, `group`, `status`, `hospital_id`) VALUES
(56, 'O-', '0 Bags', '413'),
(55, 'O+', '0 Bags', '413'),
(54, 'AB-', '0 Bags', '413'),
(53, 'AB+', '0 Bags', '413'),
(52, 'B-', '0 Bags', '413'),
(51, 'B+', '0 Bags', '413'),
(50, 'A-', '0 Bags', '413'),
(49, 'A+', '0 Bags', '413'),
(48, 'O-', '0 Bags', '412'),
(47, 'O+', '0 Bags', '412'),
(46, 'AB-', '0 Bags', '412'),
(45, 'AB+', '0 Bags', '412'),
(44, 'B-', '0 Bags', '412'),
(43, 'B+', '0 Bags', '412'),
(42, 'A-', '0 Bags', '412'),
(41, 'A+', '0 Bags', '412'),
(40, 'O-', '0 Bags', '411'),
(39, 'O+', '0 Bags', '411'),
(38, 'AB-', '0 Bags', '411'),
(37, 'AB+', '0 Bags', '411'),
(36, 'B-', '0 Bags', '411'),
(35, 'B+', '0 Bags', '411'),
(34, 'A-', '0 Bags', '411'),
(33, 'A+', '0 Bags', '411'),
(57, 'A+', '0 Bags', '414'),
(58, 'A-', '0 Bags', '414'),
(59, 'B+', '0 Bags', '414'),
(60, 'B-', '0 Bags', '414'),
(61, 'AB+', '0 Bags', '414'),
(62, 'AB-', '0 Bags', '414'),
(63, 'O+', '0 Bags', '414'),
(64, 'O-', '0 Bags', '414');

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `id` int(10) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `number` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `last_a_time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `last_d_time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `bed_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bed_category`
--

CREATE TABLE `bed_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed_category`
--

INSERT INTO `bed_category` (`id`, `category`, `description`, `hospital_id`) VALUES
(6, 'Icu', '10 beds', ''),
(7, 'Ccu', '10 beds', ''),
(8, 'Children', '5 beds', ''),
(10, 'General Ward', '50 beds', ''),
(14, 'rwerwe', 'werwerw', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `x` varchar(10) CHARACTER SET utf8 NOT NULL,
  `y` varchar(10) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `x`, `y`, `hospital_id`) VALUES
(12, 'Cardiology', '<p>This department provides medical care to patients who have problems with their heart or circulation. It treats people on an inpatient and outpatient basis. </p>\n', '', '', ''),
(15, 'Diagnostic imaging', 'Formerly known as X-ray, this department provides a full range of diagnostic imaging services including:\n\n', '', '', ''),
(17, 'Ear nose and throat (ENT)', 'Ear nose and throat (ENT)\nThe ENT department provides care for patients with a variety of problems, including:\ngeneral ear, nose and throat diseases\nneck lumps\ncancers of the head and neck area\ntear duct problems\nfacial skin lesions\nbalance and hearing disorders\nsnoring and sleep apnoea\nENT allergy problems\nsalivary gland diseases\nvoice disorders.\n', '', '', ''),
(20, 'General surgery', 'The general surgery ward covers a wide range of surgery.', '', '', ''),
(23, 'Maternity departments', 'Women now have a choice of who leads their maternity care and where they give birth. Care can be led by a consultant, a GP or a midwife.\n\n', '', '', ''),
(24, 'Microbiology', 'The microbiology department looks at all aspects of microbiology, such as bacterial and viral infections.\n\n', '', '', ''),
(26, 'Nephrology', 'This department monitors and assesses patients with kidney (renal) problems.\n', '', '', ''),
(27, 'Neurology', 'This unit deals with disorders of the nervous system, including the brain and spinal cord. It\'s run by doctors who specialise in this area (neurologists) and their staff.\n\n', '', '', ''),
(28, 'Nutrition and dietetics', 'Trained dieticians and nutritionists provide specialist advice on diet for hospital wards and outpatient clinics, forming part of a multidisciplinary team.\n\n', '', '', ''),
(32, 'Occupational therapy', 'This profession helps people who are physically or mentally impaired, including temporary disability after medical treatment. It practices in the fields of both healthcare and social care.\n\n', '', '', ''),
(33, 'Oncology', 'This department provides radiotherapy and a full range of chemotherapy treatments for cancerous tumours and blood disorders.\n\n', '', '', ''),
(34, 'Ophthalmology', 'Eye departments provide a range of ophthalmic services for adults and children,\n\n', '', '', ''),
(35, 'Orthopaedics', 'Orthopaedic departments treat problems that affect your musculoskeletal system. That\'s your muscles, joints, bones, ligaments, tendons and nerves.\n\n', '', '', ''),
(36, 'Pain management clinics', 'Usually run by consultant anaesthetists, these clinics aim to help treat patients with severe long-term pain that appears resistant to normal treatments.\n', '', '', ''),
(38, 'Physiotherapy', 'Physiotherapists promote body healing, for example after surgery, through therapies such as exercise and manipulation.\n\n', '', '', ''),
(39, 'Radiotherapy', 'Radiotherapy\nRun by a combination of consultant doctors and specially trained radiotherapists, this department provides radiotherapy (X-ray) treatment for conditions such as malignant tumours and cancer.\n\n', '', '', ''),
(40, 'Renal unit', 'Closely linked with nephrology teams at hospitals, these units provide haemodialysis treatment for patients with kidney failure. Many of these patients are on waiting lists for a kidney transplant.\n\n', '', '', ''),
(41, 'Rheumatology', 'Specialist doctors called rheumatologists run the unit and are experts in the field of musculoskeletal disorders (bones, joints, ligaments, tendons, muscles and nerves).\n\n', '', '', ''),
(42, 'Sexual health (genitourinary medicine)', 'This department provides a free and confidential service offering:\nadvice, testing and treatment for all sexually transmitted infections (STIs)\nfamily planning care (including emergency contraception and free condoms)\npregnancy testing and advice.\nIt also provides care and support for other sexual and genital problems.\nPatients are usually able to phone the department directly for an appointment and don\'t need a referral letter from their GP.\n\n\n', '', '', ''),
(43, 'Urology', 'The urology department is run by consultant urology surgeons and their surgical teams. It investigates all areas linked to kidney and bladder-based problems.\n\n', '', '', ''),
(51, 'Department', '<p>Department</p>\n', '', '', '406'),
(52, 'Department', '<p>Department</p>\n', '', '', '409'),
(53, 'Quality Control', '<p>For Vet doctors and Quality control team</p>\n', '', '', '411');

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_report`
--

CREATE TABLE `diagnostic_report` (
  `id` int(100) NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `invoice` varchar(100) CHARACTER SET utf8 NOT NULL,
  `report` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `img_url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `department` varchar(100) CHARACTER SET utf8 NOT NULL,
  `profile` varchar(100) CHARACTER SET utf8 NOT NULL,
  `x` varchar(100) CHARACTER SET utf8 NOT NULL,
  `y` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `department`, `profile`, `x`, `y`, `ion_user_id`, `hospital_id`) VALUES
(146, '', 'Mr Doctor', 'doctor@hms.com', 'Collegepara, Rajbari', '+0123456789', '0', 'MD Cardiology', '', '', '709', '411'),
(149, '', 'Esther Eze', 'esther.akowe@livestock247.com', '99 Opebi Road Ikeja Lagos', '0906-290-3550', 'Quality Control', 'Doctor', '', '', '733', '411');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `group` varchar(10) CHARACTER SET utf8 NOT NULL,
  `age` varchar(10) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ldd` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `note` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `amount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category`, `date`, `note`, `amount`, `user`, `hospital_id`) VALUES
(83, 'airtime', '1598964046', 'nn', '200', '733', '411'),
(82, 'Transportation', '1583244087', 'transport to the farm', '2000', '706', '411'),
(84, 'Transportation', '1598965401', 'ytftyftu', '500', 'Esther Eze', '411');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `x` varchar(100) CHARACTER SET utf8 NOT NULL,
  `y` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `category`, `description`, `x`, `y`, `hospital_id`) VALUES
(57, 'airtime', 'airtime', '', '', '411'),
(56, 'Transportation', 'transportation', '', '', '411');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Accountant', 'For Financial Activities'),
(4, 'Doctor', ''),
(5, 'Patient', ''),
(6, 'Nurse', ''),
(7, 'Pharmacist', ''),
(8, 'Laboratorist', ''),
(10, 'Receptionist', 'Receptionist'),
(11, 'admin', 'Hospital Admin');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `package` varchar(100) NOT NULL,
  `p_limit` varchar(100) NOT NULL,
  `d_limit` varchar(100) NOT NULL,
  `module` varchar(1000) NOT NULL,
  `ion_user_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `password`, `address`, `phone`, `package`, `p_limit`, `d_limit`, `module`, `ion_user_id`) VALUES
(411, 'Clinic', 'admin@livestock247.com', '', '99 Opebi Road, Ikeja', '09062903550', '', '1000', '500', 'accountant,appointment,lab,department,doctor,finance,pharmacy,laboratorist,medicine,patient,pharmacist,receptionist,report,sms', '706');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(100) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `patient` varchar(100) CHARACTER SET utf8 NOT NULL,
  `chip` varchar(100) NOT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category_name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `report` varchar(10000) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_phone` varchar(100) NOT NULL,
  `patient_address` varchar(100) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `date_string` varchar(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `category`, `patient`, `chip`, `doctor`, `date`, `category_name`, `report`, `status`, `user`, `patient_name`, `patient_phone`, `patient_address`, `doctor_name`, `date_string`, `hospital_id`) VALUES
(1898, '', '2505', '5464564756756757', ' Esther Eze', '1598914800', '', '<p>rfgtgh</p>\n', '', '733', 'esther farm', '0906-290-3550', '99 Opebi Road Ikeja Lagos', '', '01-09-20', '411'),
(1899, '', '2505', '5464564756756757', ' Esther Eze', '1598914800', '', '<p>dgfg</p>\n', '', '733', 'esther farm', '0906-290-3550', '99 Opebi Road Ikeja Lagos', '', '01-09-20', '411'),
(1900, '', '2505', '44444945646546545', ' Esther Eze', '1598914800', '', '<p>fdgefger</p>\n', '', '733', 'esther farm', '0906-290-3550', '99 Opebi Road Ikeja Lagos', '', '01-09-20', '411'),
(1901, '', '2505', '44444945646546545', ' Esther Eze', '1598914800', '', '<p>[k[pk[k</p>\n', '', '733', 'esther farm', '0906-290-3550', '99 Opebi Road Ikeja Lagos', '', '01-09-20', '411'),
(1902, '', '2505', '565756000000123', ' Esther Eze', '1598914800', '', '<p>hguohgouho</p>\n', '', '733', 'esther farm', '0906-290-3550', '99 Opebi Road Ikeja Lagos', '', '01-09-20', '411');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorist`
--

CREATE TABLE `laboratorist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `x` varchar(100) CHARACTER SET utf8 NOT NULL,
  `y` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorist`
--

INSERT INTO `laboratorist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `ion_user_id`, `hospital_id`) VALUES
(6, '', 'Mr Laboratorist', 'laboratorist@hms.com', 'Collegepara, Rajbari', '+0123456789', '', '', '713', '411');

-- --------------------------------------------------------

--
-- Table structure for table `lab_category`
--

CREATE TABLE `lab_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `reference_value` varchar(1000) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_category`
--

INSERT INTO `lab_category` (`id`, `category`, `description`, `reference_value`, `hospital_id`) VALUES
(35, 'Troponin-I', 'Pathological Test', '', ''),
(36, 'CBC (DIGITAL)', 'Pathological Test', '', ''),
(37, 'Eosinophil', 'Pathological Test', '', ''),
(38, 'Platelets', 'Pathological Test', '', ''),
(39, 'Malarial Parasites (MP)', 'Pathological Test', '', ''),
(40, 'BT/ CT', 'Pathological Test', '', ''),
(41, 'ASO Titre', 'Pathological Test', '', ''),
(42, 'CRP', 'Pathological Test', '', ''),
(43, 'R/A test', 'Pathological Test', '', ''),
(44, 'VDRL', 'Pathological Test', '', ''),
(45, 'TPHA', 'Pathological Test', '', ''),
(46, 'HBsAg (Screening)', 'Pathological Test', '', ''),
(47, 'HBsAg (Confirmatory)', 'Pathological Test', '', ''),
(48, 'CFT for Kala Zar', 'Pathological Test', '', ''),
(49, 'CFT for Filaria', 'Pathological Test', '', ''),
(50, 'Pregnancy Test', 'Pathological Test', '', ''),
(51, 'Blood Grouping', 'Pathological Test', '', ''),
(52, 'Widal Test', 'Pathological Test', '(70-110)mg/dl', ''),
(53, 'RBS', 'Pathological Test', '', ''),
(54, 'Blood Urea', 'Pathological Test', '', ''),
(55, 'S. Creatinine', 'Pathological Test', '', ''),
(56, 'S. cholesterol', 'Pathological Test', '', ''),
(57, 'Fasting Lipid Profile', 'Pathological Test', '', ''),
(58, 'S. Bilirubin', 'Pathological Test', '', ''),
(59, 'S. Alkaline Phosohare', 'Pathological Test', '', ''),
(61, 'S. Calcium', 'Pathological Test', '', ''),
(62, 'RBS with CUS', 'Pathological Test', '', ''),
(63, 'SGPT', 'Pathological Test', '', ''),
(64, 'SGOT', 'Pathological Test', '', ''),
(65, 'Urine for R/E', 'Pathological Test', '', ''),
(66, 'Urine C/S', 'Pathological Test', '', ''),
(67, 'Stool for R/E', 'Pathological Test', '', ''),
(68, 'Semen Analysis', 'Pathological Test', '', ''),
(69, 'S. Electrolyte', 'Pathological Test', '', ''),
(70, 'S. T3/ T4/ THS', 'Pathological Test', '', ''),
(71, 'MT', 'Pathological Test', '', ''),
(106, 'ESR', 'Patho Test', '', ''),
(107, 'FBS CUS', 'Pathological test', '', ''),
(108, 'Hb%', 'Pathological test', '', ''),
(114, '2HABF', 'Pathological test', '', ''),
(113, 'FBS', 'Pathological test', '', ''),
(115, 'S. TSH', 'Pathological test', '', ''),
(116, 'S. T3', 'Pathological test', '', ''),
(117, 'DC', 'Pathological test', '', ''),
(118, 'TC', 'Pathological test', '', ''),
(120, 'S. Uric acid', 'Pathological test', '', ''),
(126, 'eosinphil', 'Pathology Test', '', ''),
(128, 'Lab p 1', 'gdg', '10-20', '406');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(100) NOT NULL,
  `patient_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `chip` varchar(100) NOT NULL,
  `patient_address` varchar(500) NOT NULL,
  `patient_phone` varchar(100) NOT NULL,
  `img_url` varchar(500) CHARACTER SET utf8 NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `patient_id`, `description`, `patient_name`, `chip`, `patient_address`, `patient_phone`, `img_url`, `date`, `hospital_id`) VALUES
(39, '2503', '<p>jgjgkugkugkhk</p>\n', 'tripple a farm', '754812578667421', '99 Opebi Road, Ikeja', '09062903550', '', '26-08-2020', '411'),
(40, '2504', '<p>estherrrrrrrrrrrrrrrr</p>\n', 'Sheu Cattle Ranch', '565756000000123', '99 Opebi Road, Ikeja', '07033141516', '', '29-08-2020', '411'),
(38, '2502', '<p>sokoto red</p>\n', 'sokoto red', '565756000000123', '99 Opebi Road, Ikeja', '07033141516', '', '17-08-2020', '411');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` varchar(100) CHARACTER SET utf8 NOT NULL,
  `box` varchar(100) CHARACTER SET utf8 NOT NULL,
  `s_price` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quantity` int(100) NOT NULL,
  `generic` varchar(100) CHARACTER SET utf8 NOT NULL,
  `company` varchar(100) CHARACTER SET utf8 NOT NULL,
  `effects` varchar(100) CHARACTER SET utf8 NOT NULL,
  `e_date` varchar(70) CHARACTER SET utf8 NOT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `category`, `price`, `box`, `s_price`, `quantity`, `generic`, `company`, `effects`, `e_date`, `add_date`, `hospital_id`) VALUES
(2859, 'Polidine 1L', 'BIOSECURITY PRODUCTS', '3', '50', '3.3', 994, 'Polidine', 'Animal Care', 'Iodine base biosecurity product for disinfection and sanitization', '08-04-2020', '03/05/20', '411'),
(2860, 'Ruchamx', 'HERBAL PRODUCTS', '5.7', '50', '7', 50, 'Ruchamx', 'Animal Care', 'Herbal appetite stimulant and digestive tonic effective in solving issues of poor feeding and atony.', '05-03-2022', '03/05/20', '411'),
(2861, 'Yakrifit', 'HERBAL PRODUCTS', '140', '50', '160', 50, 'Yakrifit', 'Animal Care', 'Harbal liver tonic effective in treating liver dysfunction during debility', '06-03-2020', '03/06/20', '411');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`id`, `category`, `description`, `hospital_id`) VALUES
(17, 'Anti-fungai', 'Anti-fungai', '411'),
(23, 'HERBAL PRODUCTS', 'HERBAL', '411'),
(24, 'ANTIHELMINTICS', 'ANTIHELMINTICS', '411'),
(25, 'BIOSECURITY PRODUCTS', 'BIOSECURITY PRODUCTS', '411'),
(26, 'VITAMIN/FEED SUPLEMENTS', 'VITAMIN', '411');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL,
  `modules` varchar(1000) NOT NULL,
  `x` varchar(100) NOT NULL,
  `y` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `x` varchar(100) CHARACTER SET utf8 NOT NULL,
  `y` varchar(100) CHARACTER SET utf8 NOT NULL,
  `z` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `z`, `ion_user_id`, `hospital_id`) VALUES
(15, '', 'Mrs Nurse', 'nurse@hms.com', 'Collegepara, Rajbari', '+0123456789', '', '', '', '711', '411');

-- --------------------------------------------------------

--
-- Table structure for table `ot_payment`
--

CREATE TABLE `ot_payment` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doctor_c_s` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doctor_a_s_1` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doctor_a_s_2` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doctor_anaes` varchar(100) CHARACTER SET utf8 NOT NULL,
  `n_o_o` varchar(100) CHARACTER SET utf8 NOT NULL,
  `c_s_f` varchar(100) CHARACTER SET utf8 NOT NULL,
  `a_s_f_1` varchar(100) CHARACTER SET utf8 NOT NULL,
  `a_s_f_2` varchar(11) CHARACTER SET utf8 NOT NULL,
  `anaes_f` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ot_charge` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cab_rent` varchar(100) CHARACTER SET utf8 NOT NULL,
  `seat_rent` varchar(100) CHARACTER SET utf8 NOT NULL,
  `others` varchar(100) CHARACTER SET utf8 NOT NULL,
  `discount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `amount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doctor_fees` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_fees` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gross_total` varchar(100) CHARACTER SET utf8 NOT NULL,
  `flat_discount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `amount_received` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ot_payment`
--

INSERT INTO `ot_payment` (`id`, `patient`, `doctor_c_s`, `doctor_a_s_1`, `doctor_a_s_2`, `doctor_anaes`, `n_o_o`, `c_s_f`, `a_s_f_1`, `a_s_f_2`, `anaes_f`, `ot_charge`, `cab_rent`, `seat_rent`, `others`, `discount`, `date`, `amount`, `doctor_fees`, `hospital_fees`, `gross_total`, `flat_discount`, `amount_received`, `status`, `user`, `hospital_id`) VALUES
(85, '451', 'None', '123', 'None', '125', 'dbdbd', '', '1000', '0', '1000', '', '', '', '', '', '1506195494', '2000', '2000', '0', '2000', '', '1000', 'unpaid', '614', '');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `p_limit` varchar(100) NOT NULL,
  `d_limit` varchar(100) NOT NULL,
  `module` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `p_limit`, `d_limit`, `module`) VALUES
(4, 'Animal Identification', '1000', '500', 'accountant,appointment,lab,bed,department,doctor,donor,finance,medicine,nurse,patient,receptionist,report,sms');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `chip` varchar(100) CHARACTER SET utf8 NOT NULL,
  `breed` varchar(100) CHARACTER SET utf8 NOT NULL,
  `color` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(100) CHARACTER SET utf8 NOT NULL,
  `birthdate` varchar(100) CHARACTER SET utf8 NOT NULL,
  `age` varchar(100) CHARACTER SET utf8 NOT NULL,
  `bloodgroup` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `patient_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `how_added` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `img_url`, `name`, `email`, `chip`, `breed`, `color`, `doctor`, `address`, `phone`, `sex`, `birthdate`, `age`, `bloodgroup`, `ion_user_id`, `patient_id`, `add_date`, `how_added`, `hospital_id`) VALUES
(2506, '', 'jane ddd', 'gg@ymail.com', '', '', '', '', '', '258/5288', 'Male', '', '18', '', '735', '872018', '08/26/20', 'from_pos', '411'),
(2504, 'uploads/blog-11-dec.jpg', 'Sheu Cattle Ranch', 'scr@ymail.com', '5464564756756757', 'white fulani', 'white', '148', '99 Opebi Road, Ikeja', '07033141516', 'Male', '01-03-2020', '', 'O-', '732', '614664', '03/09/20', '', '411'),
(2505, 'uploads/cow12.png', 'esther farm', 'eee@ymail.com', '44444945646546545', 'gudali', 'red', ' Esther Eze', '99 Opebi Road Ikeja Lagos', '0906-290-3550', 'Male', '04-08-2020', '', 'O+', '734', '940783', '08/26/20', '', '411'),
(2503, 'uploads/cow-2.jpg', 'tripple a farm', 'tfarm@y.com', '565756000000123', 'white fulani', 'white', '146', '99 Opebi Road, Ikeja', '09062903550', 'Male', '06-03-2020', '', 'O-', '731', '772181', '03/06/20', '', '411'),
(2502, 'uploads/red_bororo_-2.jpg', 'sokoto red', 'red@ymail.com', '754812578667421', 'red bororo', 'red', '148', '99 Opebi Road, Ikeja', '07033141516', 'Male', '09-03-2020', '', 'O-', '730', '281825', '03/06/20', '', '411');

-- --------------------------------------------------------

--
-- Table structure for table `patient_deposit`
--

CREATE TABLE `patient_deposit` (
  `id` int(10) NOT NULL,
  `patient` varchar(100) CHARACTER SET utf8 NOT NULL,
  `payment_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `deposited_amount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `amount_received_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_deposit`
--

INSERT INTO `patient_deposit` (`id`, `patient`, `payment_id`, `date`, `deposited_amount`, `amount_received_id`, `user`, `hospital_id`) VALUES
(1478, '2476', '1868', '1530872495', '', '1868.gp', '1', ''),
(1481, '2476', '1871', '1530874800', '', '1871.gp', '1', ''),
(1482, '2476', '1872', '1530788400', '', '1872.gp', '1', ''),
(1483, '2476', '1873', '1522926000', '', '1873.gp', '1', ''),
(1484, '2476', '1874', '25200', '', '1874.gp', '1', ''),
(1485, '2476', '1875', '1530874857', '', '1875.gp', '1', ''),
(1495, '2497', '1885', '1581695921', '0', '1885.gp', '706', '411'),
(1491, '2491', '1881', '1581696015', '0', '1881.gp', '706', '411'),
(1492, '2491', '1882', '1581695982', '0', '1882.gp', '706', '411'),
(1493, '2491', '1883', '1580312249', '', '1883.gp', '706', '411'),
(1494, '2491', '1884', '1581695941', '0', '1884.gp', '706', '411'),
(1496, '2496', '1886', '1581695787', '0', '1886.gp', '706', '411'),
(1497, '2497', '1887', '1583251000', '', '1887.gp', '722', '411'),
(1498, '2497', '1888', '1583408469', '', '1888.gp', '722', '411'),
(1499, '2504', '1889', '1583777345', '', '1889.gp', '722', '411'),
(1500, '2505', '1890', '1598955210', '2000', '1890.gp', '733', '411'),
(1501, '2503', '1891', '1598955815', '500', '1891.gp', '733', '411'),
(1502, '2505', '1892', '1598956081', '500', '1892.gp', '733', '411'),
(1503, '2504', '1893', '1598958418', '500', '1893.gp', '733', '411');

-- --------------------------------------------------------

--
-- Table structure for table `patient_material`
--

CREATE TABLE `patient_material` (
  `id` int(100) NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `patient` varchar(100) CHARACTER SET utf8 NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `chip` varchar(100) NOT NULL,
  `patient_address` varchar(100) NOT NULL,
  `patient_phone` varchar(100) NOT NULL,
  `url` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `date_string` varchar(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_material`
--

INSERT INTO `patient_material` (`id`, `date`, `title`, `category`, `patient`, `patient_name`, `chip`, `patient_address`, `patient_phone`, `url`, `date_string`, `hospital_id`) VALUES
(54, '1583502221', 'testing', '', '2503', 'tripple a farm', '', '99 Opebi Road, Ikeja', '09062903550', 'uploads/banner.jpg', '06-03-20', '411'),
(52, '1583499108', 'ttt', '', '2497', 'Sheu Cattle Ranch', '', '99 Opebi Road, Ikeja', '08155555555', 'uploads/agroBusiness1.jpg', '06-03-20', '411'),
(60, '1598437697', 'tgbtgygygtytg', '', '2503', 'tripple a farm', '5464564756756757', '99 Opebi Road, Ikeja', '09062903550', 'uploads/Signed_Partnership_Agreement.pdf', '26-08-20', '411'),
(57, '1598437362', 'case history', '', '2503', 'tripple a farm', '565756000000123', '99 Opebi Road, Ikeja', '09062903550', 'uploads/cow1.png', '26-08-20', '411'),
(59, '1598437556', 'tttttttt', '', '2502', 'sokoto red', '5464564756756757', '99 Opebi Road, Ikeja', '07033141516', 'uploads/FMD.jpg', '26-08-20', '411');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `patient` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `amount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vat` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `x_ray` varchar(100) CHARACTER SET utf8 NOT NULL,
  `flat_vat` varchar(100) CHARACTER SET utf8 NOT NULL,
  `discount` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gross_total` varchar(100) CHARACTER SET utf8 NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `hospital_amount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doctor_amount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category_amount` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `category_name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `amount_received` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_phone` varchar(100) NOT NULL,
  `patient_address` varchar(100) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `date_string` varchar(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `category`, `patient`, `doctor`, `date`, `amount`, `vat`, `x_ray`, `flat_vat`, `discount`, `flat_discount`, `gross_total`, `remarks`, `hospital_amount`, `doctor_amount`, `category_amount`, `category_name`, `amount_received`, `status`, `user`, `patient_name`, `patient_phone`, `patient_address`, `doctor_name`, `date_string`, `hospital_id`) VALUES
(1868, '', '2476', '133', '1530872495', '1050', '0', '', '', '', '', '1050', '', '855', '195', '', 'E.C.G*250*diagnostic,USG - Pregnancy Pro*400*diagnostic,Ward Fee*400*others', '', 'unpaid', '1', 'Mr Patient', '+0123456789', 'Collegepara, Rajbari', 'Mr Doctor', '06-07-18', ''),
(1871, '', '2476', '133', '1530874800', '1150', '0', '', '', '', '', '1150', '', '955', '195', '', 'E.C.G*250*diagnostic,USG - Pregnancy Pro*400*diagnostic,Ward Fee*400*others,Admission Fees*100*others,Oxyzen*0*others', '', 'unpaid', '1', 'Mr Patient', '+0123456789', 'Collegepara, Rajbari', 'Mr Doctor', '06-07-18', ''),
(1872, '', '2476', '133', '1530788400', '1150', '0', '', '', '', '', '1150', '', '955', '195', '', 'E.C.G*250*diagnostic,USG - Pregnancy Pro*400*diagnostic,Ward Fee*400*others,Admission Fees*100*others,Oxyzen*0*others', '', 'unpaid', '1', 'Mr Patient', '+0123456789', 'Collegepara, Rajbari', 'Mr Doctor', '05-07-18', ''),
(1873, '', '2476', '133', '1522926000', '1210', '0', '', '', '', '', '1210', '', '1015', '195', '', 'E.C.G*250*diagnostic,USG - Pregnancy Pro*400*diagnostic,Ward Fee*400*others,Admission Fees*100*others,Oxyzen*0*others,Nebulizer*60*others', '', 'unpaid', '1', 'Mr Patient', '+0123456789', 'Collegepara, Rajbari', 'Mr Doctor', '05-04-18', ''),
(1874, '', '2476', '133', '25200', '1150', '0', '', '', '', '', '1150', '', '955', '195', '', 'E.C.G*250*diagnostic,USG - Pregnancy Pro*400*diagnostic,Ward Fee*400*others,Admission Fees*100*others,Oxyzen*0*others', '', 'unpaid', '1', 'Mr Patient', '+0123456789', 'Collegepara, Rajbari', 'Mr Doctor', '01-01-70', ''),
(1875, '', '2476', '133', '1530874857', '1210', '0', '', '', '', '', '1210', '', '1015', '195', '', 'E.C.G*250*diagnostic,USG - Pregnancy Pro*400*diagnostic,Ward Fee*400*others,Admission Fees*100*others,Oxyzen*0*others,Nebulizer*60*others', '', 'unpaid', '1', 'Mr Patient', '+0123456789', 'Collegepara, Rajbari', 'Mr Doctor', '06-07-18', ''),
(1885, '', '2497', '148', '1581426535', '9700', '0', '', '', '0', '0', '9700', '', '9700', '0', '', 'Service Charge*5000*others,Transportation*2000*others,Chips*2000*others,Vaccine Cost*700*others', '0', 'unpaid', '706', 'Sheu Cattle Ranch', '08155555555', '99 Opebi Road, Ikeja', 'Emmanuel Mosaku', '11-02-20', '411'),
(1881, '', '2491', '146', '1580307698', '500', '0', '', '', '', '', '500', '', '500', '0', '', 'Consultancy Fee*500*others', '0', 'unpaid', '706', 'adamu', '07033', '99 Opebi Road, Ikeja', 'Mr Doctor', '29-01-20', '411'),
(1882, '', '2491', '146', '1580309948', '500', '0', '', '', '', '', '500', '', '500', '0', '', 'Consultancy Fee*500*others', '0', 'unpaid', '706', 'adamu', '07033', '99 Opebi Road, Ikeja', 'Mr Doctor', '29-01-20', '411'),
(1883, '', '2491', '146', '1580312249', '400', '0', '', '', '', '', '400', '', '280', '120', '', 'USG - Pregnancy Pro*400*diagnostic', '', 'unpaid', '706', 'adamu', '07033', '99 Opebi Road, Ikeja', 'Mr Doctor', '29-01-20', '411'),
(1884, '', '2491', '146', '1580918102', '500', '0', '', '', '100', '100', '400', 'TESTING', '500', '-100', '', 'Consultancy Fee*500*others', '0', 'unpaid', '706', 'adamu', '07033', '99 Opebi Road, Ikeja', 'Mr Doctor', '05-02-20', '411'),
(1886, '', '2496', '148', '1581435268', '500', '0', '', '', '', '', '500', 'Tbfarm will wait for 2 days', '500', '0', '', 'Consultancy Fee*500*others,Registration Fees*0*others', '0', 'unpaid', '706', 'TBfarm', '09062903550', '99 Opebi Road, Ikeja', 'Emmanuel Mosaku', '11-02-20', '411'),
(1887, '', '2497', '148', '1583251000', '4555', '0', '', '', '', '', '4555', '', '4555', '0', '', 'Consultancy Fee*500*others,Registration Fees*0*others,Transportation*2000*others,Chips*2000*others,Isochlor*55*others', '', 'unpaid', '722', 'Sheu Cattle Ranch', '08155555555', '99 Opebi Road, Ikeja', 'Emmanuel Mosaku', '03-03-20', '411'),
(1888, '', '2497', '148', '1583408469', '7503.3', '0', '', '', '', '', '7503.3', '', '7503.3', '0', '', 'Consultancy Fee*500*others,Service Charge*5000*others,Chips*2000*others,Polidine 1L*3.3*others', '', 'unpaid', '722', 'Sheu Cattle Ranch', '08155555555', '99 Opebi Road, Ikeja', 'Emmanuel Mosaku', '05-03-20', '411'),
(1889, '', '2504', '148', '1583777345', '5500', '0', '', '', '', '', '5500', '', '5500', '0', '', 'Consultancy Fee*500*others,Service Charge*5000*others', '', 'unpaid', '722', 'Sheu Cattle Ranch', '07033141516', '99 Opebi Road, Ikeja', 'Emmanuel Mosaku', '09-03-20', '411'),
(1890, '', '2505', ' Esther Eze', '1598955210', '5500', '0', '', '', '0', '0', '5500', 'test', '5500', '0', '', 'Consultancy Fee*500*others,Service Charge*5000*others', '2000', 'unpaid', '733', 'esther farm', '0906-290-3550', '99 Opebi Road Ikeja Lagos', '', '01-09-20', '411'),
(1891, '', '2503', ' Esther Eze', '1598955815', '500', '0', '', '', '0', '0', '500', '0', '500', '0', '', 'Consultancy Fee*500*others', '500', 'unpaid', '733', 'tripple a farm', '09062903550', '99 Opebi Road, Ikeja', '', '01-09-20', '411'),
(1892, '', '2505', ' Esther Eze', '1598956081', '500', '0', '', '', '0', '0', '500', 'test', '500', '0', '', 'Consultancy Fee*500*others', '500', 'unpaid', '733', 'esther farm', '0906-290-3550', '99 Opebi Road Ikeja Lagos', '', '01-09-20', '411'),
(1893, '', '2504', ' Esther Eze', '1598958418', '500', '0', '', '', '0', '0', '500', 'test', '500', '0', '', 'Consultancy Fee*500*others,Registration Fees*0*others', '500', 'unpaid', '733', 'Sheu Cattle Ranch', '07033141516', '99 Opebi Road, Ikeja', '', '01-09-20', '411');

-- --------------------------------------------------------

--
-- Table structure for table `paymentGateway`
--

CREATE TABLE `paymentGateway` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `merchant_key` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `x` varchar(100) NOT NULL,
  `y` varchar(100) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentGateway`
--

INSERT INTO `paymentGateway` (`id`, `name`, `merchant_key`, `salt`, `x`, `y`, `status`, `hospital_id`) VALUES
(1, 'Pay U Money', '0KWJATSQ', '8nBhndVz04', '', '', 'test', ''),
(2, 'Paypal', '0KWJATSQ', '8nBhndVz04', '', '', 'test', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `p_price` varchar(100) CHARACTER SET utf8 NOT NULL,
  `c_price` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quantity` int(100) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `d_commission` int(100) NOT NULL,
  `h_commission` int(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_category`
--

INSERT INTO `payment_category` (`id`, `category`, `description`, `p_price`, `c_price`, `quantity`, `type`, `d_commission`, `h_commission`, `hospital_id`) VALUES
(19, 'Consultancy Fee', 'Deposits from online', '', '500', 0, 'others', 0, 0, '411'),
(20, 'Registration Fees', 'Patient Admission Fees', '', '0', 0, 'others', 0, 0, '411'),
(23, 'Service Charge', 'services charge', '', '5000', 0, 'others', 0, 0, '411'),
(129, 'Laboratory fee', 'Lab test', '', '2000', 0, 'others', 0, 0, '411'),
(130, 'Transportation', 'Transport to farm', '', '2000', 0, 'others', 0, 0, '411'),
(38, 'Chips', 'Animal Identification', '', '2000', 0, 'others', 0, 0, '411'),
(51, 'Blood Grouping', 'Pathological Test', '', '100', 0, 'diagnostic', 30, 0, ''),
(52, 'Widal Test', 'Pathological Test', '', '300', 0, 'diagnostic', 30, 0, ''),
(53, 'RBS', 'Pathological Test', '', '100', 0, 'diagnostic', 30, 0, ''),
(54, 'Blood Urea', 'Pathological Test', '', '250', 0, 'diagnostic', 30, 0, ''),
(55, 'S. Creatinine', 'Pathological Test', '', '250', 0, 'diagnostic', 30, 0, ''),
(56, 'S. cholesterol', 'Pathological Test', '', '250', 0, 'diagnostic', 30, 0, ''),
(57, 'Fasting Lipid Profile', 'Pathological Test', '', '850', 0, 'diagnostic', 30, 0, ''),
(58, 'S. Bilirubin', 'Pathological Test', '', '150', 0, 'diagnostic', 30, 0, ''),
(59, 'S. Alkaline Phosohare', 'Pathological Test', '', '300', 0, 'diagnostic', 30, 0, ''),
(60, 'S. Albumin', 'Pathological Test', '', '250', 0, 'diagnostic', 30, 0, ''),
(61, 'S. Calcium', 'Pathological Test', '', '350', 0, 'diagnostic', 30, 0, ''),
(62, 'RBS with CUS', 'Pathological Test', '', '160', 0, 'diagnostic', 30, 0, ''),
(63, 'SGPT', 'Pathological Test', '', '300', 0, 'diagnostic', 30, 0, ''),
(64, 'SGOT', 'Pathological Test', '', '300', 0, 'diagnostic', 30, 0, ''),
(65, 'Urine for R/E', 'Pathological Test', '', '150', 0, 'diagnostic', 30, 0, ''),
(66, 'Urine C/S', 'Pathological Test', '', '350', 0, 'diagnostic', 30, 0, ''),
(67, 'Stool for R/E', 'Pathological Test', '', '150', 0, 'diagnostic', 30, 0, ''),
(68, 'Semen Analysis', 'Pathological Test', '', '300', 0, 'diagnostic', 30, 0, ''),
(69, 'S. Electrolyte', 'Pathological Test', '', '800', 0, 'diagnostic', 30, 0, ''),
(70, 'S. T3/ T4/ THS', 'Pathological Test', '', '1000', 0, 'diagnostic', 30, 0, ''),
(71, 'MT', 'Pathological Test', '', '150', 0, 'diagnostic', 30, 0, ''),
(77, 'USG - Whole Abdomen ', 'USG - Whole Abdomen ', '', '400', 0, 'diagnostic', 30, 0, ''),
(73, 'ECHO Normal', 'ksdjkfsd', '', '700', 0, 'diagnostic', 30, 0, ''),
(76, 'x-ray chest', 'Normal', '', '200', 0, 'diagnostic', 10, 0, ''),
(79, 'USG - KUB', 'USG - KUB', '', '500', 0, 'diagnostic', 20, 0, ''),
(80, 'USG - Liver', 'USG - Liver', '', '400', 0, 'diagnostic', 30, 0, ''),
(81, 'USG - Breast (Left)', 'USG - Breast (Left)', '', '400', 0, 'diagnostic', 30, 0, ''),
(82, 'USG - Breast (Right)', 'USG - Breast (Right)', '', '400', 0, 'diagnostic', 30, 0, ''),
(83, 'X-RAY - Ba MealS+D  ', 'X-RAY - Ba MealS+D  ', '', '1400', 0, 'diagnostic', 20, 0, ''),
(84, 'X-RAY - Ba Swallo Oesopha', 'X-RAY - Ba Swallo Oesopha', '', '1000', 0, 'diagnostic', 20, 0, ''),
(85, 'X-RAY - KUB                         ', 'X-RAY - KUB ', '', '500', 0, 'diagnostic', 20, 0, ''),
(86, 'X-RAY - Leg Joint(B/V)(L/R)', 'X-RAY - Leg Joint(B/V)(L/R)', '', '500', 0, 'diagnostic', 20, 0, ''),
(87, 'X-RAY -Knee Joint(L/R)', 'X-RAY -Knee Joint(L/R)', '', '500', 0, 'diagnostic', 20, 0, ''),
(88, 'X-RAY - Finger(B/V) ', 'X-RAY - Finger(B/V) ', '', '350', 0, 'diagnostic', 20, 0, ''),
(89, 'X-RAY - Wrist(B/V)(L/R) ', 'X-RAY - Wrist(B/V)(L/R) ', '', '350', 0, 'diagnostic', 20, 0, ''),
(90, 'X-RAY - Hand(B/V)(L/R)                   ', 'X-RAY - Hand(B/V)(L/R)       ', '', '350', 0, 'diagnostic', 20, 0, ''),
(91, 'X-RAY - Elbow(B/V)(L/R)', 'X-RAY - Elbow(B/V)(L/R)', '', '350', 0, 'diagnostic', 20, 0, ''),
(92, 'X-RAY - Erm(B/V)(L/R )', 'X-RAY - Erm(B/V)(L/R )', '', '350', 0, 'diagnostic', 20, 0, ''),
(93, 'X-RAY - Shoulder Joint (B/V)', 'X-RAY - Shoulder Joint (B/V)', '', '500', 0, 'diagnostic', 20, 0, ''),
(94, 'X-RAY - Shoulder Joint (A/P)', 'X-RAY - Shoulder Joint (A/P)', '', '350', 0, 'diagnostic', 20, 0, ''),
(95, 'X-RAY - Foot (B/V)', 'X-RAY - Foot (B/V)', '', '350', 0, 'diagnostic', 20, 0, ''),
(96, 'X-RAY - Thigh(B/V)', 'X-RAY - Thigh(B/V)', '', '500', 0, 'diagnostic', 20, 0, ''),
(97, 'X-RAY - Ankle(B/V)', 'X-RAY - Ankle(B/V)', '', '350', 0, 'diagnostic', 20, 0, ''),
(98, 'X-RAY - Hip Joint(A/P)', 'X-RAY - Hip Joint(A/P)', '', '350', 0, 'diagnostic', 20, 0, ''),
(99, 'X-RAY - Pelvis(A/P)', 'X-RAY - Pelvis(A/P)', '', '500', 0, 'diagnostic', 20, 0, ''),
(100, 'X-RAY - L/S(B/V)(Lamber Spine)', 'X-RAY - L/S(B/V)(Lamber Spine)', '', '500', 0, 'diagnostic', 20, 0, ''),
(101, 'X-RAY - L/S(A/P)(LamberSpine)', 'X-RAY - L/S(A/P)(LamberSpine)', '', '500', 0, 'diagnostic', 20, 0, ''),
(102, 'X-RAY - D/L(A/P)(Thoracic)', 'X-RAY - D/L(A/P)(Thoracic)', '', '500', 0, 'diagnostic', 20, 0, ''),
(103, 'X-RAY - Mandable(B/V)', 'X-RAY - Mandable(B/V)', '', '500', 0, 'diagnostic', 20, 0, ''),
(104, 'X-RAY -C/S(AP)(Carvicai)', 'X-RAY -C/S(AP)(Carvicai)', '', '500', 0, 'diagnostic', 20, 0, ''),
(105, 'X-RAY - PNS (AP)', 'X-RAY - PNS (AP)', '', '350', 0, 'diagnostic', 20, 0, ''),
(106, 'ESR', 'Patho Test', '', '150', 0, 'diagnostic', 30, 0, ''),
(107, 'FBS CUS', 'Pathological test', '', '160', 0, 'diagnostic', 30, 0, ''),
(108, 'Hb%', 'Pathological test', '', '100', 0, 'diagnostic', 30, 0, ''),
(109, 'Physio-Therapy', 'Therapy', '', '1000', 0, '', 0, 0, ''),
(114, '2HABF', 'Pathological test', '', '100', 0, 'diagnostic', 30, 0, ''),
(113, 'FBS', 'Pathological test', '', '100', 0, 'diagnostic', 30, 0, ''),
(115, 'S. TSH', 'Pathological test', '', '400', 0, 'diagnostic', 30, 0, ''),
(116, 'S. T3', 'Pathological test', '', '400', 0, 'diagnostic', 30, 0, ''),
(117, 'DC', 'Pathological test', '', '200', 0, 'diagnostic', 30, 0, ''),
(118, 'TC', 'Pathological test', '', '200', 0, 'diagnostic', 30, 0, ''),
(119, 'X-Ray CXR (Digital)', 'X-Ray', '', '500', 0, 'diagnostic', 20, 0, ''),
(120, 'S. Uric acid', 'Pathological test', '', '250', 0, 'diagnostic', 30, 0, ''),
(122, 'U.S.G OF L/A ', 'U.S.G', '', '400', 0, 'diagnostic', 30, 0, ''),
(125, 'Rt knee joient b/v', 'X-Ray', '', '500', 0, 'diagnostic', 20, 0, ''),
(126, 'eosinphil', 'Pathology Test', '', '100', 0, 'diagnostic', 0, 0, ''),
(128, 'Category 1', 'Description', '', '250', 0, 'diagnostic', 10, 0, '406');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `x` varchar(100) CHARACTER SET utf8 NOT NULL,
  `y` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `ion_user_id`, `hospital_id`) VALUES
(11, '', 'Mr Pharmacist', 'pharmacist@hms.com', 'Collegepara, Rajbari', '+0123456789', '', '', '712', '411');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_expense`
--

CREATE TABLE `pharmacy_expense` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_expense`
--

INSERT INTO `pharmacy_expense` (`id`, `category`, `date`, `amount`, `user`, `hospital_id`) VALUES
(141, 'serum', '1581343364', '1000', '', '411');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_expense_category`
--

CREATE TABLE `pharmacy_expense_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `x` varchar(100) NOT NULL,
  `y` varchar(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_expense_category`
--

INSERT INTO `pharmacy_expense_category` (`id`, `category`, `description`, `x`, `y`, `hospital_id`) VALUES
(66, 'serum', 'serum', '', '', '411');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_payment`
--

CREATE TABLE `pharmacy_payment` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `patient` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) NOT NULL,
  `flat_vat` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) NOT NULL,
  `gross_total` varchar(100) NOT NULL,
  `hospital_amount` varchar(100) NOT NULL,
  `doctor_amount` varchar(100) NOT NULL,
  `category_amount` varchar(1000) NOT NULL,
  `category_name` varchar(1000) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_payment`
--

INSERT INTO `pharmacy_payment` (`id`, `category`, `patient`, `doctor`, `date`, `amount`, `vat`, `x_ray`, `flat_vat`, `discount`, `flat_discount`, `gross_total`, `hospital_amount`, `doctor_amount`, `category_amount`, `category_name`, `amount_received`, `status`, `hospital_id`) VALUES
(1964, '', '0', '', '1528180801', '2', '0', '', '', '', '', '2', '', '', '', '2855*2*1*1', '0', 'unpaid', ''),
(1965, '', '0', '', '1528180814', '20', '0', '', '', '', '', '20', '', '', '', '2855*2*10*1', '0', 'unpaid', ''),
(1968, '', '0', '', '1583414260', '70', '0', '', '', '', '', '70', '', '', '', '2860*7*10*5.7', '0', 'unpaid', '411'),
(1967, '', '0', '', '1583410002', '16.5', '0', '', '', '', '', '16.5', '', '', '', '2859*3.3*5*3', '0', 'unpaid', '411'),
(1969, '', '0', '', '1583414347', '140', '0', '', '', '', '', '140', '', '', '', '2860*7*20*5.7', '0', 'unpaid', '411'),
(1970, '', '0', ' Esther Eze', '1598961434', '3.3', '0', '', '', '0', '0', '3.3', '', '', '', '2859*3.3*1*3', '0', 'unpaid', '411');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_payment_category`
--

CREATE TABLE `pharmacy_payment_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `c_price` varchar(100) NOT NULL,
  `d_commission` int(100) NOT NULL,
  `h_commission` int(100) NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(100) NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `patient` varchar(100) CHARACTER SET utf8 NOT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 NOT NULL,
  `symptom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `advice` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `state` varchar(100) CHARACTER SET utf8 NOT NULL,
  `dd` varchar(100) CHARACTER SET utf8 NOT NULL,
  `medicine` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `validity` varchar(100) CHARACTER SET utf8 NOT NULL,
  `note` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `x` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `ion_user_id`, `hospital_id`) VALUES
(11, '', 'Customer Support', 'support@livestock247.com', '4th Floor, Valley-view Plaza, 99 Opebi Road, Ikeja Lagos', ' 09062903550', '', '718', '411');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(100) NOT NULL,
  `report_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `patient` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `chip` varchar(100) NOT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `report_type`, `patient`, `description`, `chip`, `doctor`, `date`, `add_date`, `hospital_id`) VALUES
(33, 'operation', 'sokoto red*730', 'cytftyfyt', '', 'Emmanuel Mosaku', '06-03-2020', '03/06/20', '411'),
(34, 'birth', 'Sheu Cattle Ranch*732', 'charges for consultation', '', 'Emmanuel Mosaku', '27-07-2020', '08/24/20', '411'),
(35, 'birth', 'esther farm*734', 'charges for consultation', '44444945646546545', ' Clinic', '31-08-2020', '08/26/20', '411'),
(36, 'birth', 'Sheu Cattle Ranch*732', 'charges for consultation', '5464564756756757', ' Esther Eze', '31-08-2020', '08/26/20', '411'),
(37, 'operation', 'esther farm*734', 'operation', '565756000000123', ' Esther Eze', '27-08-2020', '08/26/20', '411');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `system_vendor` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `facebook_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `currency` varchar(100) CHARACTER SET utf8 NOT NULL,
  `language` varchar(100) CHARACTER SET utf8 NOT NULL,
  `discount` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vat` varchar(100) CHARACTER SET utf8 NOT NULL,
  `login_title` varchar(100) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `invoice_logo` varchar(500) NOT NULL,
  `codec_username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `codec_purchase_code` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_vendor`, `title`, `address`, `phone`, `email`, `facebook_id`, `currency`, `language`, `discount`, `vat`, `login_title`, `logo`, `invoice_logo`, `codec_username`, `codec_purchase_code`, `hospital_id`) VALUES
(5, 'Livestock247 Online Clinic', 'Online Clinic', '4th Floor, Valley-view Plaza, 99 Opebi Road, Ikeja Lagos', '0906-290-3550', 'admin@livestock247.com', '', 'NGN', 'english', 'flat', '', '', 'uploads/logo.jpg', '', '', '', '411');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(100) NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 NOT NULL,
  `message` varchar(100) CHARACTER SET utf8 NOT NULL,
  `recipient` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `date`, `message`, `recipient`, `user`, `hospital_id`) VALUES
(50, '1532106451', 'Approval: Appointment is scheduled for you With Doctor khsfhfsgg Date: 05-07-2018 Time: 02:45 AM', 'Patient Id: 2483<br> Patient Name: hsfhgjgjh<br> Patient Phone: gjhgjhgjhgjh', '681', ''),
(51, '1537893782', '<p>hjfghfghfghfhfh</p>\n', 'All Patient', '706', '411'),
(52, '1581324108', 'Patient Registrationdadais successfully registerred', 'Patient Id: 2493<br> Patient Name: dada<br> Patient Phone: 09062903550', '706', '411');

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

CREATE TABLE `sms_settings` (
  `id` int(100) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `api_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hospital_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_settings`
--

INSERT INTO `sms_settings` (`id`, `username`, `password`, `api_id`, `user`, `hospital_id`) VALUES
(1, 'rizviplabon', '', '3570596', '1', ''),
(6, 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', '1', '412'),
(3, 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', '1', '409'),
(5, 'jkfhkjwhjkk', 'jhkjhjkhkjhk', 'jhjkhjkhkjhj', '706', '411'),
(7, 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', '1', '413'),
(8, 'jkfhkjwhjkk', 'jhkjhjkhkjhk', 'jhjkhjkhkjhj', '706', '411'),
(9, 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', '1', '414');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `hospital_ion_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `hospital_ion_id`) VALUES
(1, '127.0.0.1', 'superadmin', '$2y$08$Kxx3I5sZnuDuNUSiIqppdOWmb7CahV/3jdriBFhrM/.RRosZflVdW', '', 'superadmin@hms.com', '', 'eX0.Bq6nP57EuXX4hJkPHO973e7a4c25f1849d3a', 1511432365, 'zCeJpcj78CKqJ4sVxVbxcO', 1268889823, 1583762881, 1, 'Admin', 'istrator', 'ADMIN', '0', ''),
(706, '103.231.162.58', 'Clinic', '$2y$08$yJFWbU6S.jRLHBbNTjj/SupVrVXFQYzYDVhAC3c.tqFjO85K8HQiS', NULL, 'admin@livestock247.com', NULL, 'fLeP3F0BWuHszL.hE..bQe8a4f5461d3445646a1', 1581330608, NULL, 1532277617, 1598965661, 1, NULL, NULL, NULL, NULL, ''),
(709, '103.231.162.58', 'Mr Doctor', '$2y$08$BAGRN0rjwawMzWD0GePzT.Mx3fLJ9MSSsrp9DhyzfpLGTRKg9307e', NULL, 'doctor@hms.com', NULL, 'UO9QMpWp7oYmyYrA6Gd9y.9a86718c4edfbdc3c7', 1581323087, NULL, 1532278982, 1598429699, 1, NULL, NULL, NULL, NULL, '706'),
(711, '103.231.162.58', 'Mrs Nurse', '$2y$08$68SizhazDBD0tNblurC85eHegOmziKcrRMbJwDZsjw5GsNcPiA1By', NULL, 'nurse@hms.com', NULL, NULL, NULL, NULL, 1532279151, 1580736662, 1, NULL, NULL, NULL, NULL, '706'),
(712, '103.231.162.58', 'Mr Pharmacist', '$2y$08$6Qn9Qz6It4Php8a9n4eDhuCmi6bej8p2w5VvNrBKrfHdWf6.qGHPm', NULL, 'pharmacist@hms.com', NULL, NULL, NULL, NULL, 1532279258, 1581331577, 1, NULL, NULL, NULL, NULL, '706'),
(713, '103.231.162.58', 'Mr Laboratorist', '$2y$08$h8pvFrbz4Zbak.HqMH9vfOqD0LAqGvw2uqnIlALRVCcSVFfy1dYda', NULL, 'laboratorist@hms.com', NULL, NULL, NULL, NULL, 1532279278, 1581331714, 1, NULL, NULL, NULL, NULL, '706'),
(718, '127.0.0.1', 'Customer Support', '$2y$08$uI.Nop0geWbwFialk0DoqOjwLZ8yg4xfGZnG.3rdvP8HwvxfcKLLu', NULL, 'support@livestock247.com', NULL, 'Bo4Nt5dFcVFUKpUby9eVH.e09050e9583da44acd', 1581316846, NULL, 1580727411, 1598262492, 1, NULL, NULL, NULL, NULL, '706'),
(721, '127.0.0.1', 'Sikiru Kehinde', '$2y$08$ExfZlgmvfgH8rxUUZBJbSOn0OcI.6t2t.mVNyHWt/QFyr.ud3ufL2', NULL, 'sikiru.kehinde@livestock247.com', NULL, NULL, NULL, NULL, 1581331026, 1583414938, 1, NULL, NULL, NULL, NULL, '706'),
(725, '127.0.0.1', 'TBfarm', '0', NULL, 'tbfarm@ymail.com', NULL, NULL, NULL, NULL, 1581430719, NULL, 1, NULL, NULL, NULL, NULL, '706'),
(727, '127.0.0.1', 'Ali Farm', '0', NULL, 'ali@ymail.com', NULL, NULL, NULL, NULL, 1582556951, NULL, 1, NULL, NULL, NULL, NULL, '706'),
(728, '127.0.0.1', 'Ali Farm1', '0', NULL, 'farm@ymail.com', NULL, NULL, NULL, NULL, 1582557890, NULL, 1, NULL, NULL, NULL, NULL, '706'),
(730, '127.0.0.1', 'sokoto red', '0', NULL, 'red@ymail.com', NULL, NULL, NULL, NULL, 1583494829, NULL, 1, NULL, NULL, NULL, NULL, '706'),
(731, '127.0.0.1', 'tripple a farm', '0', NULL, 'tfarm@y.com', NULL, NULL, NULL, NULL, 1583501223, NULL, 1, NULL, NULL, NULL, NULL, '706'),
(732, '127.0.0.1', 'Sheu Cattle Ranch', '0', NULL, 'scr@ymail.com', NULL, NULL, NULL, NULL, 1583769409, NULL, 1, NULL, NULL, NULL, NULL, '706'),
(733, '::1', 'Esther Eze', '$2y$08$UhBHFd319VXWvAkdE9PTmuhDEXqy0vECV17agBLAJJGEzqHCg/V5.', NULL, 'esther.akowe@livestock247.com', NULL, NULL, NULL, NULL, 1598439036, 1598969642, 1, NULL, NULL, NULL, NULL, '706'),
(734, '::1', 'esther farm', '0', NULL, 'eee@ymail.com', NULL, NULL, NULL, NULL, 1598441172, NULL, 1, NULL, NULL, NULL, NULL, '706'),
(735, '::1', 'jane ddd', '$2y$08$rFNIsWf7Eb6rojZkL.b9S.f5K.RccgCmjg0GEASpENhG0RcF8u3/C', NULL, 'gg@ymail.com', NULL, NULL, NULL, NULL, 1598447651, NULL, 1, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(708, 706, 11),
(711, 709, 4),
(713, 711, 6),
(714, 712, 7),
(715, 713, 8),
(720, 718, 10),
(723, 721, 3),
(727, 725, 5),
(729, 727, 5),
(730, 728, 5),
(732, 730, 5),
(733, 731, 5),
(734, 732, 5),
(735, 733, 4),
(736, 734, 5),
(737, 735, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alloted_bed`
--
ALTER TABLE `alloted_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankb`
--
ALTER TABLE `bankb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed_category`
--
ALTER TABLE `bed_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic_report`
--
ALTER TABLE `diagnostic_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorist`
--
ALTER TABLE `laboratorist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_category`
--
ALTER TABLE `lab_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_payment`
--
ALTER TABLE `ot_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_deposit`
--
ALTER TABLE `patient_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_material`
--
ALTER TABLE `patient_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentGateway`
--
ALTER TABLE `paymentGateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_expense`
--
ALTER TABLE `pharmacy_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_expense_category`
--
ALTER TABLE `pharmacy_expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_payment`
--
ALTER TABLE `pharmacy_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_payment_category`
--
ALTER TABLE `pharmacy_payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `alloted_bed`
--
ALTER TABLE `alloted_bed`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;
--
-- AUTO_INCREMENT for table `bankb`
--
ALTER TABLE `bankb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `bed_category`
--
ALTER TABLE `bed_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `diagnostic_report`
--
ALTER TABLE `diagnostic_report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1903;
--
-- AUTO_INCREMENT for table `laboratorist`
--
ALTER TABLE `laboratorist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2862;
--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ot_payment`
--
ALTER TABLE `ot_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2507;
--
-- AUTO_INCREMENT for table `patient_deposit`
--
ALTER TABLE `patient_deposit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1504;
--
-- AUTO_INCREMENT for table `patient_material`
--
ALTER TABLE `patient_material`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1894;
--
-- AUTO_INCREMENT for table `paymentGateway`
--
ALTER TABLE `paymentGateway`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pharmacy_expense`
--
ALTER TABLE `pharmacy_expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `pharmacy_expense_category`
--
ALTER TABLE `pharmacy_expense_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `pharmacy_payment`
--
ALTER TABLE `pharmacy_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1971;
--
-- AUTO_INCREMENT for table `pharmacy_payment_category`
--
ALTER TABLE `pharmacy_payment_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `sms_settings`
--
ALTER TABLE `sms_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=736;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=738;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
