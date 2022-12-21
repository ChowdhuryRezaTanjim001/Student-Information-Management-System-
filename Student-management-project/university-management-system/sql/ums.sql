-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2018 at 06:14 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id575696_abd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`s_id`, `sub_id`, `status`, `date`) VALUES
(15103029, 'CSC-433', 'P', '2016-12-12'),
(15103047, 'CSC-433', 'P', '2016-12-12'),
(15103057, 'CSC-433', 'A', '2016-12-12'),
(15200000, 'CSC-433', 'A', '2016-12-12'),
(15209016, 'CSC-433', 'A', '2016-12-12'),
(15103022, 'CSC-433', 'P', '2016-12-12'),
(15103058, 'CSC-433', 'A', '2016-12-12'),
(15103006, 'CSC-433', 'P', '2016-12-12'),
(1430006, 'CSC-433', 'P', '2016-12-12'),
(15103005, 'CSC-433', 'P', '2016-12-12'),
(15103015, 'CSC-433', 'P', '2016-12-12'),
(15103050, 'CSC-433', 'A', '2016-12-12'),
(15103150, 'CSC-433', 'P', '2016-12-12'),
(15103100, 'CSC-433', 'P', '2016-12-12'),
(15103029, 'CSC-434', 'P', '2016-12-06'),
(15103047, 'CSC-434', 'A', '2016-12-06'),
(15103057, 'CSC-434', 'P', '2016-12-06'),
(15200000, 'CSC-434', 'P', '2016-12-06'),
(15209016, 'CSC-434', 'A', '2016-12-06'),
(15103022, 'CSC-434', 'P', '2016-12-06'),
(15103058, 'CSC-434', 'P', '2016-12-06'),
(15103006, 'CSC-434', 'P', '2016-12-06'),
(1430006, 'CSC-434', 'P', '2016-12-06'),
(15103005, 'CSC-434', 'P', '2016-12-06'),
(15103015, 'CSC-434', 'P', '2016-12-06'),
(15103050, 'CSC-434', 'A', '2016-12-06'),
(15103150, 'CSC-434', 'P', '2016-12-06'),
(15103100, 'CSC-434', 'P', '2016-12-06'),
(15103029, 'CSC-433', 'P', '2016-12-07'),
(15103047, 'CSC-433', 'A', '2016-12-07'),
(15103057, 'CSC-433', 'A', '2016-12-07'),
(15200000, 'CSC-433', 'A', '2016-12-07'),
(15209016, 'CSC-433', 'A', '2016-12-07'),
(15103022, 'CSC-433', 'P', '2016-12-07'),
(15103058, 'CSC-433', 'P', '2016-12-07'),
(15103006, 'CSC-433', 'A', '2016-12-07'),
(1430006, 'CSC-433', 'A', '2016-12-07'),
(15103005, 'CSC-433', 'A', '2016-12-07'),
(15103015, 'CSC-433', 'A', '2016-12-07'),
(15103050, 'CSC-433', 'A', '2016-12-07'),
(15103150, 'CSC-433', 'A', '2016-12-07'),
(15103100, 'CSC-433', 'P', '2016-12-07'),
(15103029, 'CSC-433', 'P', '2016-12-13'),
(15103047, 'CSC-433', 'P', '2016-12-13'),
(15103057, 'CSC-433', 'P', '2016-12-13'),
(15200000, 'CSC-433', 'A', '2016-12-13'),
(15209016, 'CSC-433', 'P', '2016-12-13'),
(15103022, 'CSC-433', 'P', '2016-12-13'),
(15103058, 'CSC-433', 'P', '2016-12-13'),
(15103006, 'CSC-433', 'P', '2016-12-13'),
(1430006, 'CSC-433', 'P', '2016-12-13'),
(15103005, 'CSC-433', 'A', '2016-12-13'),
(15103015, 'CSC-433', 'A', '2016-12-13'),
(15103050, 'CSC-433', 'A', '2016-12-13'),
(15103150, 'CSC-433', 'A', '2016-12-13'),
(15103100, 'CSC-433', 'A', '2016-12-13'),
(15103029, 'CSC-433', 'A', '2016-12-14'),
(15103047, 'CSC-433', 'A', '2016-12-14'),
(15103057, 'CSC-433', 'A', '2016-12-14'),
(15200000, 'CSC-433', 'A', '2016-12-14'),
(15209016, 'CSC-433', 'A', '2016-12-14'),
(15103022, 'CSC-433', 'A', '2016-12-14'),
(15103058, 'CSC-433', 'A', '2016-12-14'),
(15103006, 'CSC-433', 'A', '2016-12-14'),
(1430006, 'CSC-433', 'A', '2016-12-14'),
(15103005, 'CSC-433', 'A', '2016-12-14'),
(15103015, 'CSC-433', 'A', '2016-12-14'),
(15103050, 'CSC-433', 'A', '2016-12-14'),
(15103150, 'CSC-433', 'A', '2016-12-14'),
(15103100, 'CSC-433', 'A', '2016-12-14'),
(15103029, 'EEN-183', 'P', '2017-01-10'),
(15103047, 'EEN-183', 'P', '2017-01-10'),
(15103057, 'EEN-183', 'P', '2017-01-10'),
(15200000, 'EEN-183', 'A', '2017-01-10'),
(15209016, 'EEN-183', 'A', '2017-01-10'),
(15103022, 'EEN-183', 'A', '2017-01-10'),
(15103058, 'EEN-183', 'A', '2017-01-10'),
(15103006, 'EEN-183', 'P', '2017-01-10'),
(1430006, 'EEN-183', 'A', '2017-01-10'),
(15103005, 'EEN-183', 'A', '2017-01-10'),
(15103015, 'EEN-183', 'A', '2017-01-10'),
(15103050, 'EEN-183', 'A', '2017-01-10'),
(15103150, 'EEN-183', 'A', '2017-01-10'),
(15103100, 'EEN-183', 'A', '2017-01-10'),
(15103029, 'CSC-433', 'A', '2017-08-03'),
(15103047, 'CSC-433', 'P', '2017-08-03'),
(15103057, 'CSC-433', 'A', '2017-08-03'),
(15200000, 'CSC-433', 'A', '2017-08-03'),
(15209016, 'CSC-433', 'A', '2017-08-03'),
(15103022, 'CSC-433', 'A', '2017-08-03'),
(15103058, 'CSC-433', 'A', '2017-08-03'),
(15103006, 'CSC-433', 'A', '2017-08-03'),
(1430006, 'CSC-433', 'A', '2017-08-03'),
(15103005, 'CSC-433', 'A', '2017-08-03'),
(15103015, 'CSC-433', 'A', '2017-08-03'),
(15103050, 'CSC-433', 'A', '2017-08-03'),
(15103150, 'CSC-433', 'A', '2017-08-03'),
(15103100, 'CSC-433', 'A', '2017-08-03'),
(16203009, 'CSC-433', 'P', '2017-08-03'),
(15103029, 'CSC-433', 'A', '2018-01-25'),
(15103047, 'CSC-433', 'A', '2018-01-25'),
(15103057, 'CSC-433', 'A', '2018-01-25'),
(15200000, 'CSC-433', 'A', '2018-01-25'),
(15209016, 'CSC-433', 'A', '2018-01-25'),
(15103022, 'CSC-433', 'A', '2018-01-25'),
(15103058, 'CSC-433', 'A', '2018-01-25'),
(15103006, 'CSC-433', 'A', '2018-01-25'),
(1430006, 'CSC-433', 'A', '2018-01-25'),
(15103005, 'CSC-433', 'A', '2018-01-25'),
(15103015, 'CSC-433', 'A', '2018-01-25'),
(15103050, 'CSC-433', 'A', '2018-01-25'),
(15103150, 'CSC-433', 'A', '2018-01-25'),
(15103100, 'CSC-433', 'A', '2018-01-25'),
(16203009, 'CSC-433', 'A', '2018-01-25');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `id`, `department`, `password`, `dob`, `bg`, `gender`, `email`, `p_number`, `prt_address`, `pmt_address`, `fpic_id`) VALUES
('Humayun Kabir', '1310', 'BCSE', '12345678', '1993-12-21', 'A+', 'male', 'hkabir@iubat.edu', '01724694056', '     Uttara,Dhaka', 'Dhaka', '125722BA-F968-ED90-774E-D24BE4F2A31F.jpg'),
('Prof Dr Md Abdul Haque ', 'chair', 'BCSE', 'chair', '1965-12-14', 'A+', 'male', 'mahaque@iubat.edu', '01748 487776', 'Uttara Model Town Dhaka ', 'Uttara Model Town Dhaka ', 'E83A5970-296D-466A-85E9-3F526EB38AF2.jpg'),
('Dr Utpal Kanti Das ', 'ukd', 'BCSE', 'ukd', '1970-12-14', 'A+', 'male', 'ukd@iubat.edu', '01819199419', 'Ranavola, Turag Dhaka ', 'Niswarga Nir, City College Road, Mohishkhola , Narail ', 'BACD3F80-FEF6-42E8-B381-52A09098B1A9.jpg'),
('Mr Rashedul Islam ', 'rana', 'BCSE', 'rana', '1980-12-14', 'A+', 'male', 'rashed@iubat.edu', '01776445218', 'Uttara Model Town Dhaka ', 'Uttara Model Town Dhaka ', '69D14D6A-8DCF-4D2E-B2E2-E7DD9E36664F.jpg'),
('Md Alomgir Hossain ', 'mah', 'BCSE', 'mah', '1985-12-15', 'A+', 'male', 'alomgir.hossain@iubat.edu', ' 01718 735128', 'uttara', 'uttara', ''),
('Shahinur Alam ', 'sa', 'BCSE', 'sa', '1990-12-15', 'B-', 'male', 'shahin@iubat.edu', '01683732787', 'Uttara Model Town Dhaka ', 'Uttara Model Town Dhaka ', '2BC1BEB7-189A-4F03-AAF9-433B57C374CF.jpg'),
('Arifa Tur Rahman', 'atr', 'BCSE', 'atr', '1988-12-06', 'B+', 'male', 'arifarahman@iubat.edu', '01718 891405', 'Dhaka', 'Dhaka', '9C8F42CD-F33A-4BC3-9D30-205C24FE22C2.jpg'),
('Shaila Nasrin', '15103043', 'BCSE', '1', '1995-12-13', 'A+', 'male', '15103043@gmail.com', '11', '11', '111', 'F544707A-E82E-492B-974B-91B446E69900.png'),
('Mridula ', '15103015', 'BCSE', '15103015', '1995-12-15', 'A+', 'male', '15103015@iubat.edu', '11', '11', '11', 'F791FF5C-7C5E-4272-8EF3-B6589A9FB6BF.png');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`s_id`, `sub_id`, `f_t`, `m_t`, `final`, `attendance`, `quize`, `presentation`, `extra`) VALUES
(15103029, 'CSC-247', 90, 90, 90, 90, 90, 90, 100),
(15103057, 'CSC-434', 100, 80, 90, 80, 90, 100, 0),
(15103029, 'CSC-433', 100, 75, 90, 90, 90, 100, 100),
(15103057, 'CSC-433', 100, 80, 90, 85, 100, 95, 95),
(15103029, 'CSC-434', 90, 97, 90, 90, 100, 95, 95),
(15103047, 'CSC-433', 98, 89, 80, 100, 100, 78, 80),
(15103029, 'EEN-183', 90, 90, 90, 100, 90, 90, 100),
(15103029, 'EEN-184', 90, 94, 100, 90, 90, 95, 95),
(15103029, 'STA-240', 90, 92, 90, 90, 95, 90, 100),
(15103047, 'CSC-433', 98, 89, 80, 100, 100, 78, 80),
(15103047, 'CSC-247', 100, 25, 35, 90, 100, 80, 100),
(15103047, 'CSC-434', 100, 100, 90, 90, 100, 20, 70),
(15103047, 'EEN-183', 100, 90, 80, 90, 100, 100, 100),
(15103047, 'EEN-184', 100, 80, 90, 100, 80, 70, 100),
(15103047, 'STA-240', 100, 40, 100, 100, 100, 100, 100),
(15103006, 'CSC-247', 90, 25, 35, 90, 80, 80, 100),
(15103006, 'CSC-434', 100, 100, 90, 90, 100, 20, 70),
(15103006, 'EEN-183', 100, 90, 80, 90, 80, 100, 100),
(15103006, 'EEN-184', 80, 80, 90, 100, 80, 70, 100),
(15103006, 'STA-240', 100, 40, 100, 100, 80, 100, 100),
(15103006, 'CSC-434', 80, 80, 90, 100, 80, 70, 100),
(15200000, 'CSC-247', 90, 25, 35, 90, 80, 80, 100),
(15200000, 'CSC-434', 100, 100, 90, 90, 100, 20, 70),
(15200000, 'EEN-183', 100, 90, 80, 90, 80, 100, 100),
(15200000, 'EEN-184', 80, 80, 90, 100, 80, 70, 100),
(15200000, 'STA-240', 100, 40, 100, 100, 80, 100, 100),
(15200000, 'CSC-434', 80, 80, 90, 100, 80, 70, 100),
(15209016, 'CSC-247', 90, 100, 35, 90, 80, 80, 100),
(15209016, 'CSC-434', 100, 100, 90, 90, 100, 20, 70),
(15209016, 'EEN-183', 100, 90, 80, 90, 80, 100, 100),
(15209016, 'EEN-184', 100, 100, 90, 100, 80, 70, 100),
(15209016, 'STA-240', 100, 100, 100, 100, 80, 100, 100),
(15209016, 'CSC-434', 100, 80, 90, 100, 80, 70, 100),
(15103022, 'CSC-247', 90, 80, 35, 90, 80, 80, 100),
(15103022, 'CSC-434', 100, 100, 90, 90, 100, 20, 70),
(15103022, 'EEN-183', 100, 90, 80, 90, 80, 100, 100),
(15103022, 'EEN-184', 80, 100, 90, 100, 80, 70, 100),
(15103022, 'STA-240', 100, 100, 100, 100, 80, 100, 100),
(15103022, 'CSC-434', 80, 80, 90, 100, 80, 70, 100),
(15103005, 'CSC-247', 12, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(15) NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Name`, `Program`, `password`, `Blood_group`, `Date_of_Birth`, `Gender`, `Email`, `Phone`, `Pr_Address`, `Pe_Address`, `Father_Name`, `Mother_Name`, `Contact_no`, `pic_id`) VALUES
(15103029, 'Md. Abdullah', 'BCSE', '12345678', 'A+', '2016-10-21', 'male', 'abdullah001rti@gmail.com', '+8801738868597', ' Uttara,Dhaka', '       Kaliganj,Satkhira,Bangladesh ', 'Md. Abu Bakar', 'Mst. Lutfunnesa', '+88017139030833', '1764190A-F894-4D2E-8AFD-A2D180DB263E.jpg'),
(15103047, 'Md. Suzon', 'BCSE', '1', 'A+', '2016-10-12', 'male', 'suzonim@gmail.com', '00000000000', 'Gazipur,konabari', '   Gazipur,konabari', '44444', '?', '?', 'logo.png'),
(15103057, 'Tipu', 'BCSE', '1', 'A+', '2016-10-28', 'male', 'tipusultan@gmail.com', '0101010101', 'bamnartek', '     bamnartek', 'jani naa', 'jani naaa', '01401010101', 'logo.png'),
(15200000, 'Aslam', 'BCSE', 'aminkhan', 'B+', '2016-10-12', 'male', 'amin@gmail.com', '017655555555', 'Dhaka,Bangladesh.', 'Bangladesh.', 'Atif', 'Asuma', '00000000111111', 'logo.png'),
(15209016, 'Mahmudul Hasan', 'BCSE', 'sriti', 'A+', '1995-11-10', 'male', 'hasan696@gmail.com', '01722433365', 'uttara,Dhaka', 'mnbnk,ggs', 'Md. ..........', 'Mst.  ........', '9004780324', 'logo.png'),
(15103022, 'Badhon', 'BCSE', '1', 'A+', '1996-12-12', 'male', '15103022@iubat.edu', '01683732787', 'Dhaka,Uttara', 'Pabna', '111', 'aaaa', '111', ' 23CFD498-FA9F-492B-9B49-5F85BFB6AEC2.jpg'),
(15103058, 'Rasel Hossain', 'BCSE', '1', 'A+', '1995-12-07', 'male', '15103058@iubat.edu', '01010101010', 'Dhaka,Uttara', 'uttara, Dhaka', '111', 'aaa', '11', ' 3BB2A7ED-DF25-4AFB-9242-F7AA1C0CE9DA.png'),
(15103006, 'Alif Mariam Bijori', 'BCSE', '1', 'A+', '1995-12-20', 'male', '15103006@iubat.edu', '016', 'Dhaka,Uttara', 'uttara, Dhaka', '111', 'aaaa', '111', ' E66B88B0-5932-40FC-BC05-48976BDF8CFA.png'),
(1430006, 'Md Haris', 'BCSE', '1', 'A+', '1993-12-14', 'male', '1430006@iubat.edu', '01748 487776', 'Dhaka,Uttara', 'Rangpur', '111', 'aaaa', '111', ' 52FF8180-8BF1-459C-B5D3-6E48CF7B8256.jpg'),
(15103005, 'Anik Khan', 'BCSE', '1', 'A+', '1995-12-14', 'male', '15103005@iubat.edu', '01819199419', 'Dhaka,Uttara', 'Pabna', 'aaaaa', 'aaaa', '11111', ' 52D0D54B-1E9D-4931-AB19-8E1A73BB7AFC.png'),
(15103015, 'Mridula', 'BCSE', '1', 'B+', '1990-12-20', 'female', '15103015@iubat.edu', '11', 'Uttara, Dhaka', 'Uttara, Dhaka', 'jani na', 'jani na', '1111', ''),
(15103050, 'Shaila', 'BCSE', '1', 'B+', '1990-12-20', 'female', '15103050@iubat.edu', '1111111', 'Uttara, Dhaka', 'Gazipur, Dhaka', 'jani na', 'jani na', '1111', ''),
(15103150, 'Imam Hosain', 'BCSE', '1', 'A+', '1995-12-20', 'male', '15103150@iubat.edu', '111111111', 'Uttara, Dhaka', 'Comilla, Dhaka', 'jani na', 'jani na', '1111', ''),
(15103100, 'Shamim', 'BCSE', '1', 'A+', '1985-12-20', 'male', '15103100@iubat.edu', '111111111', 'Uttara, Dhaka', 'Comilla, Dhaka', 'jani na', 'jani na', '1111', ''),
(16203009, 'Saidur Rahman Sajol', 'BCSE', '12345', 'B+', '1996-08-08', 'male', 'rahmansaidur970@gmail.com', '01725940852', 'Mirpur,Sector !0,Dhaka,Bangladesh', 'Magura,Khulna,Bangladesh', 'Md.Abdus Sattar Sheikh', 'Mst.Sheeuly Sattar', '01725940852', ' 1AEA6089-85B3-D801-A063-F6D500BB4242.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` varchar(10) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `credit_h` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `credit_h`) VALUES
('CSC-433', 'Database Management System', 3),
('CSC-434', 'Database Management System (Lab)', 1),
('CSC-247', 'Computer Organization and Architecture', 3),
('EEN-183', 'Circuit Analysis', 3),
('EEN-184', 'Circuit Analysis (Lab)', 1),
('STA-240', 'Statistics ', 3);

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
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
