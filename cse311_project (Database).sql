-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 04:29 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse311_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
(1510, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `s_id` int(15) NOT NULL,
  `sub_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`s_id`, `sub_id`, `status`, `date`) VALUES
(1931336042, 'CSE311L', 'P', '0000-00-00'),
(2022589642, 'MAT125', 'P', '0000-00-00'),
(1931336042, 'CSE311', 'P', '0000-00-00'),
(2022589642, 'ENG102', 'P', '0000-00-00'),
(15103029, 'ENG102', 'P', '0000-00-00'),
(2022589642, 'HIS102', 'P', '0000-00-00'),
(15103029, 'HIS102', 'A', '0000-00-00'),
(2022589642, 'CSE311L', 'P', '0000-00-00'),
(15103029, 'SOC101', 'P[', '0000-00-00'),
(2022589642, 'CSE311', 'P', '0000-00-00'),
(1931336042, 'SOC101', 'P', '0000-00-00'),
(15103029, 'MAT125', 'A', '0000-00-00'),
(1913063042, 'ENG102', 'P', '0000-00-00'),
(1931336042, 'MAT125', 'P', '0000-00-00'),
(15103029, 'CSE311L', 'P', '0000-00-00'),
(1913063042, 'MAT125', 'P', '0000-00-00'),
(1913063042, 'CSE311', 'P', '0000-00-00'),
(1931336042, 'HIS102', 'P', '0000-00-00'),
(15103029, 'CSE311', 'P', '0000-00-00'),
(1913063042, 'SOC101', 'P', '0000-00-00'),
(1913063042, 'HIS102', 'P', '0000-00-00'),
(1931336042, 'ENG102', 'P', '0000-00-00'),
(2022589642, 'SOC101', 'P', '0000-00-00'),
(1913063042, 'CSE311L', 'P', '0000-00-00'),
(1913063042, 'HIS102', 'P', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name` varchar(50) NOT NULL,
  `id` varchar(11) NOT NULL,
  `department` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `bg` varchar(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `p_number` varchar(15) NOT NULL,
  `prt_address` varchar(100) NOT NULL,
  `pmt_address` varchar(100) NOT NULL,
  `fpic_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `id`, `department`, `password`, `dob`, `bg`, `gender`, `email`, `p_number`, `prt_address`, `pmt_address`, `fpic_id`) VALUES
('Humayun Kabir', '1310', 'BCSE', '12345678', '1993-12-21', 'A+', 'male', 'hkabir@iubat.edu', '01724694056', '     Uttara,Dhaka', 'Dhaka', '125722BA-F968-ED90-774E-D24BE4F2A31F.jpg'),
('Mridula ', '15103015', 'BCSE', '15103015', '1995-12-15', 'A+', 'male', '15103015@iubat.edu', '11', '11', '11', 'F791FF5C-7C5E-4272-8EF3-B6589A9FB6BF.png'),
('Shaila Nasrin', '15103043', 'BCSE', '1', '1995-12-13', 'A+', 'male', '15103043@gmail.com', '11', '11', '111', 'F544707A-E82E-492B-974B-91B446E69900.png'),
('Arifa Tur Rahman', 'atr', 'BCSE', 'atr', '1988-12-06', 'B+', 'male', 'arifarahman@iubat.edu', '01718 891405', 'Dhaka', 'Dhaka', '9C8F42CD-F33A-4BC3-9D30-205C24FE22C2.jpg'),
('Prof Dr Md Abdul Haque ', 'chair', 'BCSE', 'chair', '1965-12-14', 'A+', 'male', 'mahaque@iubat.edu', '01748 487776', 'Uttara Model Town Dhaka ', 'Uttara Model Town Dhaka ', 'E83A5970-296D-466A-85E9-3F526EB38AF2.jpg'),
('Md Alomgir Hossain ', 'mah', 'BCSE', 'mah', '1985-12-15', 'A+', 'male', 'alomgir.hossain@iubat.edu', ' 01718 735128', 'uttara', 'uttara', ''),
('Mr Rashedul Islam ', 'rana', 'BCSE', 'rana', '1980-12-14', 'A+', 'male', 'rashed@iubat.edu', '01776445218', 'Uttara Model Town Dhaka ', 'Uttara Model Town Dhaka ', '69D14D6A-8DCF-4D2E-B2E2-E7DD9E36664F.jpg'),
('Shahinur Alam ', 'sa', 'BCSE', 'sa', '1990-12-15', 'B-', 'male', 'shahin@iubat.edu', '01683732787', 'Uttara Model Town Dhaka ', 'Uttara Model Town Dhaka ', '2BC1BEB7-189A-4F03-AAF9-433B57C374CF.jpg'),
('Dr Utpal Kanti Das ', 'ukd', 'BCSE', 'ukd', '1970-12-14', 'A+', 'male', 'ukd@iubat.edu', '01819199419', 'Ranavola, Turag Dhaka ', 'Niswarga Nir, City College Road, Mohishkhola , Narail ', 'BACD3F80-FEF6-42E8-B381-52A09098B1A9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `s_id` int(11) NOT NULL,
  `sub_id` varchar(10) NOT NULL,
  `f_t` int(3) NOT NULL,
  `m_t` int(3) NOT NULL,
  `final` int(3) NOT NULL,
  `attendance` int(3) NOT NULL,
  `quize` int(3) NOT NULL,
  `presentation` int(3) NOT NULL,
  `extra` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`s_id`, `sub_id`, `f_t`, `m_t`, `final`, `attendance`, `quize`, `presentation`, `extra`) VALUES
(1913063042, 'HIS102', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'SOC101', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'ENG102', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'CSE311', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'CSE311L', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'MAT125', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'HIS102', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'SOC101', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'CSE311', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'CSE311L', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'ENG102', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'MAT125', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'HIS102', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'MAT125', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'ENG102', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'CSE311L', 12, 15, 25, 10, 15, 10, 10),
(15103029, 'SOC101', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'CSE311', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'CSE311L', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'HIS102', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'MAT125', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'ENG102', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'CSE311', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'SOC101', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'HIS102', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'SOC101', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'ENG102', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'CSE311', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'CSE311L', 15, 15, 25, 10, 15, 10, 10),
(1913063042, 'MAT125', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'HIS102', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'SOC101', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'CSE311', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'CSE311L', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'ENG102', 15, 15, 25, 10, 15, 10, 10),
(2022589642, 'MAT125', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'HIS102', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'MAT125', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'ENG102', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'CSE311L', 12, 15, 25, 10, 15, 10, 10),
(15103029, 'SOC101', 15, 15, 25, 10, 15, 10, 10),
(15103029, 'CSE311', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'CSE311L', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'HIS102', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'MAT125', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'ENG102', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'CSE311', 15, 15, 25, 10, 15, 10, 10),
(1931336042, 'SOC101', 15, 15, 25, 10, 15, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(30) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Program` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Blood_group` varchar(10) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Pr_Address` varchar(150) NOT NULL,
  `Pe_Address` varchar(150) NOT NULL,
  `Father_Name` text NOT NULL,
  `Mother_Name` text NOT NULL,
  `Contact_no` varchar(15) NOT NULL,
  `pic_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Name`, `Program`, `password`, `Blood_group`, `Date_of_Birth`, `Gender`, `Email`, `Phone`, `Pr_Address`, `Pe_Address`, `Father_Name`, `Mother_Name`, `Contact_no`, `pic_id`) VALUES
(15103029, 'Chowdhury Reza Tanjim', 'BCSE', '1234', 'B+', '2000-06-09', 'male', 'chowdhury.tanjim@northsouth.edu', '01310699957', 'Mohammadpur', 'Mohammadpur', 'Chowdhury Reza MD. Monower', 'Nadira Islam', '01711224010', ' 90DDDE21-AEC6-7520-E8BF-8C7D1977C5EB.png'),
(1913063042, 'Mashruva Sumona', 'BSEEE', '4444', 'A+', '2000-06-06', 'female', 'sumona@gmail.com', '01811111111', 'uttora', 'uttora', 'Dad', 'Mom', '01900000000', ' '),
(1931336042, 'Jhumu Akhter Ema', 'BSCE', '3333', 'A+', '1990-06-06', 'female', 'jhumur@gmail.com', '01611111111', 'bashundhara', 'bashundhara', 'DAD', 'MOM', '01522222222', ' '),
(2022589642, 'Sumaiya Nafisa Nawar', 'BSEEE', '1111', 'B+', '1986-06-06', 'female', 'sumaiya@gmail.com', '01711224010', 'bashundhara', 'bashundhara', 'Sayeed Kamrul Anwar', 'Umme Ruma', '01311111111', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` varchar(10) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `credit_h` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `credit_h`) VALUES
('ENG102', ' Introduction to Composition ', 3),
('HIS102', ' World History ', 3),
('CSE311L', ' Database Management System Lab ', 1),
('CSE311', ' Database Management System ', 3),
('MAT125', ' Linear Algebra', 3),
('SOC101', ' Introduction to Sociology ', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `faculty` ADD FULLTEXT KEY `password` (`password`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD KEY `s_id` (`s_id`),
  ADD KEY `s_id_2` (`s_id`),
  ADD KEY `s_id_3` (`s_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
