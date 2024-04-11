-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 10:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispensary_final_approve_reject`
--

CREATE TABLE `dispensary_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispensary_final_approve_reject`
--

INSERT INTO `dispensary_final_approve_reject` (`student_id`, `status`, `signature`, `staff_name`, `date`) VALUES
('STD/01', 'Approved', 0x7369676e61747572655f3039353531302e706e67, 'Jane Morris', '2024-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `dispensary_record`
--

CREATE TABLE `dispensary_record` (
  `material_id` varchar(50) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `date_taken` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dispensary_rejected_requests`
--

CREATE TABLE `dispensary_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dispensary_request`
--

CREATE TABLE `dispensary_request` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_final_approve_reject`
--

CREATE TABLE `faculty_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_final_approve_reject`
--

INSERT INTO `faculty_final_approve_reject` (`student_id`, `status`, `signature`, `staff_name`, `date`) VALUES
('STD/01', 'Approved', 0x7369676e61747572655f3039353033352e706e67, 'Faith Joy', '2024-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_record`
--

CREATE TABLE `faculty_record` (
  `material_id` varchar(50) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `date_taken` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_rejected_requests`
--

CREATE TABLE `faculty_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_request`
--

CREATE TABLE `faculty_request` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_final_approve_reject`
--

CREATE TABLE `hostel_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_final_approve_reject`
--

INSERT INTO `hostel_final_approve_reject` (`student_id`, `status`, `signature`, `staff_name`, `date`) VALUES
('STD/01', 'Approved', 0x7369676e61747572655f3039353333322e706e67, 'Ben Sila', '2024-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_record`
--

CREATE TABLE `hostel_record` (
  `material_id` varchar(50) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `date_taken` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_rejected_requests`
--

CREATE TABLE `hostel_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_request`
--

CREATE TABLE `hostel_request` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_final_approve_reject`
--

CREATE TABLE `lab_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_final_approve_reject`
--

INSERT INTO `lab_final_approve_reject` (`student_id`, `status`, `signature`, `staff_name`, `date`) VALUES
('STD/01', 'Approved', 0x7369676e61747572655f3039353232342e706e67, 'Morris Kyl', '2024-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `lab_record`
--

CREATE TABLE `lab_record` (
  `material_id` varchar(50) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `date_taken` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_rejected_requests`
--

CREATE TABLE `lab_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_request`
--

CREATE TABLE `lab_request` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_final_approve_reject`
--

CREATE TABLE `library_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_final_approve_reject`
--

INSERT INTO `library_final_approve_reject` (`student_id`, `status`, `signature`, `staff_name`, `date`) VALUES
('STD/01', 'Approved', 0x7369676e61747572655f3039343533352e706e67, '', '2024-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `library_record`
--

CREATE TABLE `library_record` (
  `material_id` varchar(50) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `date_taken` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_rejected_requests`
--

CREATE TABLE `library_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_rejected_requests`
--

INSERT INTO `library_rejected_requests` (`student_id`, `status`, `staff_username`) VALUES
('STD/01', 'Rejected', ''),
('STD/01', 'Rejected', 'Leonard Ronaldo'),
('STD/01', 'Rejected', 'Leonard Ronaldo');

-- --------------------------------------------------------

--
-- Table structure for table `library_request`
--

CREATE TABLE `library_request` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
('DSP/01', 'e10adc3949ba59abbe56e057f20f883e', 'dispensary head'),
('FCL/01', 'e10adc3949ba59abbe56e057f20f883e', 'faculty head'),
('HST/01', 'e10adc3949ba59abbe56e057f20f883e', 'hostel'),
('LAB/01', 'e10adc3949ba59abbe56e057f20f883e', 'Lab assistant'),
('LIB/01', 'e10adc3949ba59abbe56e057f20f883e', 'Librarian'),
('STD/01', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/02', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/03', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/04', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/05', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/06', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STF', 'e10adc3949ba59abbe56e057f20f883e', 'faculty head');

-- --------------------------------------------------------

--
-- Table structure for table `registrar_final_approve`
--

CREATE TABLE `registrar_final_approve` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrar_final_approve`
--

INSERT INTO `registrar_final_approve` (`student_id`, `status`, `date`) VALUES
('STD/01', 'Approved', '2024-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `registrar_final_rejected`
--

CREATE TABLE `registrar_final_rejected` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `image` text DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `fullName` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `position` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass_word` varchar(200) NOT NULL,
  `im_age` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`fullName`, `age`, `sex`, `position`, `username`, `pass_word`, `im_age`) VALUES
('Jane Morris', 32, 'female', 'dispensary head', 'DSP/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/IMG_20211216_104125_9.jpg'),
('Faith Joy', 30, 'female', 'faculty head', 'FCL/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/-5924985051181856910_121.jpg'),
('Ben Sila', 34, 'male', 'hostel', 'HST/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/contact2.jpg'),
('Morris Kyl', 24, 'male', 'Lab assistant', 'LAB/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/-5897946797534460244_121.jpg'),
('Leonard Ronaldo', 34, 'male', 'Librarian', 'LIB/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/IMG_20210715_180657~2.jpg'),
('ben', 34, 'male', 'faculty head', 'STF', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/IMG_20231207_135331_632.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `fullName` varchar(200) NOT NULL,
  `id` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `faculty` varchar(30) NOT NULL,
  `class_year` year(4) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `pass_word` varchar(200) NOT NULL,
  `st_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fullName`, `id`, `age`, `sex`, `faculty`, `class_year`, `semester`, `pass_word`, `st_image`) VALUES
('Peter Morris', 'STD/01', 20, 'Male', 'CIT', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f2d353839333034363338313538333634343631315f3132312e6a7067),
('Fridar Leonard', 'STD/02', 19, 'female', 'Bussiness and Economics', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f46425f494d475f31353639373138393634313634313939312e6a7067),
('Moses Willy', 'STD/03', 22, 'Male', 'Engineering and Technology', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f494d475f32303231313131315f3133343730395f372e6a7067),
('Elijah Wambua', 'STD/04', 23, 'Male', 'Media and Communication', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f2d353932343938353035313138313835363935375f3132302e6a7067),
('Reginah Kyl', 'STD/05', 23, 'Female', 'Science and Technology', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f494d475f32303231303731315f3131313335335f382e6a7067),
('Mutheu Leonard', 'STD/06', 21, 'Female', 'Social Science and Technology', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f426573744d655f32303231303531373138343931352e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispensary_final_approve_reject`
--
ALTER TABLE `dispensary_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `dispensary_rejected_requests`
--
ALTER TABLE `dispensary_rejected_requests`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `dispensary_request`
--
ALTER TABLE `dispensary_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_final_approve_reject`
--
ALTER TABLE `faculty_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `faculty_record`
--
ALTER TABLE `faculty_record`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `faculty_request`
--
ALTER TABLE `faculty_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_final_approve_reject`
--
ALTER TABLE `hostel_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `hostel_record`
--
ALTER TABLE `hostel_record`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `hostel_rejected_requests`
--
ALTER TABLE `hostel_rejected_requests`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `hostel_request`
--
ALTER TABLE `hostel_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_final_approve_reject`
--
ALTER TABLE `lab_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `lab_record`
--
ALTER TABLE `lab_record`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `lab_request`
--
ALTER TABLE `lab_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_final_approve_reject`
--
ALTER TABLE `library_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `library_record`
--
ALTER TABLE `library_record`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `library_request`
--
ALTER TABLE `library_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `registrar_final_approve`
--
ALTER TABLE `registrar_final_approve`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `registrar_final_rejected`
--
ALTER TABLE `registrar_final_rejected`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
