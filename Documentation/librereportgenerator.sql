SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- 
-- Use this file to seed the Report generator for now.
--
-- Database: `librereportgenerator`
--
-- --------------------------------------------------------
--
-- Dumping data for table `draggable_components`
--
INSERT INTO `draggable_components` (`id`, `option_id`, `is_default`, `user`, `title`, `order`, `active`, `notes`, `toggle_sort`, `toggle_display`, `created_at`, `updated_at`) VALUES
(1, 'pfullname', 1, 'default', 'Patient Fullname', 5, 1, 'patient_data:fname|mname|lname', 0, 0, NULL, NULL),
(2, 'plfname', 1, 'default', 'Patient Last Firstname', 10, 1, 'patient_data:lname|fname', 0, 0, NULL, NULL),
(3, 'pflname', 1, 'default', 'Patient First Lastname', 15, 1, 'patient_data:fname|lname', 0, 0, NULL, NULL),
(4, 'preversedname', 1, 'default', 'Patient Full reversed name', 20, 1, 'patient_data:lname|mname|fname', 0, 0, NULL, NULL),
(5, 'pfmname', 1, 'default', 'Patient First Middlename', 25, 1, 'patient_data:fname|mname', 0, 0, NULL, NULL),
(6, 'pid', 1, 'default', 'Patient Id', 30, 1, 'patient_data:id', 0, 0, NULL, NULL),
(7, 'pstreet', 1, 'default', 'Patient Street', 35, 1, 'patient_data:street', 0, 0, NULL, NULL),
(8, 'pcity', 1, 'default', 'Patient First Lastname', 40, 1, 'patient_data:city', 0, 0, NULL, NULL),
(9, 'pstate', 1, 'default', 'Patient Full reversed name', 45, 1, 'patient_data:lname|mname|fname', 0, 0, NULL, NULL),
(10, 'pstreetcity', 1, 'default', 'Patient Street City', 50, 1, 'patient_data:street|city', 0, 0, NULL, NULL),
(11, 'pcitystate', 1, 'default', 'Patient City State', 55, 1, 'patient_data:city|state', 0, 0, NULL, NULL),
(12, 'pstreetcitystate', 1, 'default', 'Patient Street City State', 60, 1, 'patient_data:street|city|state', 0, 0, NULL, NULL),
(13, 'ppcode', 1, 'default', 'Patient Postal Code', 65, 1, 'patient_data:postal_code', 0, 0, NULL, NULL),
(14, 'poccupation', 1, 'default', 'Patient Occupation', 70, 1, 'patient_data:occupation', 0, 0, NULL, NULL),
(15, 'pemail', 1, 'default', 'Patient Email', 75, 1, 'patient_data:email', 0, 0, NULL, NULL),
(16, 'pphone', 1, 'default', 'Patient Phone Contact', 80, 1, 'patient_data:phone_contact', 0, 0, NULL, NULL),
(17, 'planguage', 1, 'default', 'Patient Language', 85, 1, 'patient_data:language', 0, 0, NULL, NULL),
(18, 'pregdate', 1, 'default', 'Patient Register date', 90, 1, 'patient_data:regdate', 0, 0, NULL, NULL),
(19, 'psex', 1, 'default', 'Patient Sex', 95, 1, 'patient_data:sex', 0, 0, NULL, NULL),
(20, 'pemailphone', 1, 'default', 'Patient Email Phone', 100, 1, 'patient_data:email|phone_contact', 0, 0, NULL, NULL),
(21, 'pidfullname', 1, 'default', 'Patient PID Fullname', 105, 1, 'patient_data:id|fname|mname|lname', 0, 0, NULL, NULL),
(22, 'pdob', 1, 'default', 'Patient Date of birth', 110, 1, 'patient_data:DOB', 0, 0, NULL, NULL),
(23, 'pss', 1, 'default', 'Patient SS', 115, 1, 'patient_data:ss', 0, 0, NULL, NULL),
(24, 'pstatus', 1, 'default', 'Patient Status', 120, 1, 'patient_data:status', 0, 0, NULL, NULL),
(25, 'preferrer', 1, 'default', 'Patient Referrer', 125, 1, 'patient_data:referrer', 0, 0, NULL, NULL),
(26, 'pstatussex', 1, 'default', 'Patient Status Sex', 130, 1, 'patient_data:status|sex', 0, 0, NULL, NULL),
(27, 'pidnamecontact', 1, 'default', 'Patient ID Name Contact', 135, 1, 'patient_data:id|fname|mname|phone_contact|email', 0, 0, NULL, NULL),
(28, 'pidnameAddress', 1, 'default', 'Patient ID Name Address', 140, 1, 'patient_data:id|fname|mname|street|city|state|postal_code', 0, 0, NULL, NULL),
(29, 'poccupationmonthlyincome', 1, 'default', 'Patient Occupation Monthly Income', 145, 1, 'patient_data:occupation|monthly_income', 0, 0, NULL, NULL),
(30, 'psexstatusfamilysize', 1, 'default', 'Patient Sex Status Family Size', 150, 1, 'patient_data:sex|status|family_size', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Dumping data for table `report_formats`
--

