-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 10:12 AM
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
('STD/01', 'Approved', 0x7369676e61747572652f7369676e61747572655f3130303534392e706e67, 'Fridar Kavutha', '2024-04-02');

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

--
-- Dumping data for table `dispensary_request`
--

INSERT INTO `dispensary_request` (`id`, `reason`, `image`, `date`) VALUES
('STD/02', 'Graduation', NULL, '2024-04-02'),
('STD/03', 'Graduation', NULL, '2024-04-02'),
('STD/04', 'Graduation', NULL, '2024-04-02'),
('STD/05', 'Graduation', NULL, '2024-04-02');

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
('STD/01', 'Approved', 0x7369676e61747572652f7369676e61747572655f3130303732322e706e67, 'Morris Kyl', '2024-04-02');

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

--
-- Dumping data for table `faculty_request`
--

INSERT INTO `faculty_request` (`id`, `reason`, `image`, `date`) VALUES
('STD/02', 'Graduation', NULL, '2024-04-02'),
('STD/03', 'Graduation', NULL, '2024-04-02'),
('STD/04', 'Graduation', NULL, '2024-04-02'),
('STD/05', 'Graduation', NULL, '2024-04-02');

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

--
-- Dumping data for table `hostel_request`
--

INSERT INTO `hostel_request` (`id`, `reason`, `image`, `date`) VALUES
('STD/01', 'Graduation', NULL, '2024-04-02'),
('STD/02', 'Graduation', NULL, '2024-04-02'),
('STD/03', 'Graduation', NULL, '2024-04-02'),
('STD/04', 'Graduation', NULL, '2024-04-02'),
('STD/05', 'Graduation', NULL, '2024-04-02');

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

--
-- Dumping data for table `lab_request`
--

INSERT INTO `lab_request` (`id`, `reason`, `image`, `date`) VALUES
('STD/01', 'Graduation', NULL, '2024-04-02'),
('STD/02', 'Graduation', NULL, '2024-04-02'),
('STD/03', 'Graduation', NULL, '2024-04-02'),
('STD/04', 'Graduation', NULL, '2024-04-02'),
('STD/05', 'Graduation', NULL, '2024-04-02');

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

--
-- Dumping data for table `library_request`
--

INSERT INTO `library_request` (`id`, `reason`, `image`, `date`) VALUES
('STD/01', 'Graduation', NULL, '2024-04-02'),
('STD/02', 'Graduation', NULL, '2024-04-02'),
('STD/03', 'Graduation', NULL, '2024-04-02'),
('STD/04', 'Graduation', NULL, '2024-04-02'),
('STD/05', 'Graduation', NULL, '2024-04-02');

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
('FCT/01', 'e10adc3949ba59abbe56e057f20f883e', 'faculty head'),
('HST/01', 'e10adc3949ba59abbe56e057f20f883e', 'hostel'),
('LAB/01', 'e10adc3949ba59abbe56e057f20f883e', 'Lab assistant'),
('LIB/01', 'e10adc3949ba59abbe56e057f20f883e', 'Librarian'),
('STD/01', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/02', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/03', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/04', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/05', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/06', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('STD/07', 'e10adc3949ba59abbe56e057f20f883e', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `registrar_final_approve`
--

CREATE TABLE `registrar_final_approve` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `reason`, `image`, `date`) VALUES
('STD/01', 'Graduation', NULL, '2024-04-02'),
('STD/02', 'Graduation', NULL, '2024-04-02'),
('STD/03', 'Graduation', NULL, '2024-04-02'),
('STD/04', 'Graduation', NULL, '2024-04-02'),
('STD/05', 'Graduation', NULL, '2024-04-02');

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
('Fridar Kavutha', 40, 'female', 'dispensary head', 'DSP/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/anime-profile-picture-mhivm61nnmjezzs8.webp'),
('Morris Kyl', 50, 'male', 'faculty head', 'FCT/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/IMG_20231105_123526_892.webp'),
('Regina Kalili', 60, 'female', 'Dormitory', 'HST/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/wp6409332.webp'),
('Leonard Kyl', 54, 'male', 'Lab assistant', 'LAB/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/IMG_20230122_143505_888.jpg'),
('Priscah Jane', 35, 'female', 'Librarian', 'LIB/01', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/Screenshot_20231011-214600.png');

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
('Benard Sila Morris', 'STD/01', 22, 'Male', 'CIT', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f494d475f32303233313031355f3132323134355f3133362e6a7067),
('Peter Munyao', 'STD/02', 22, 'Male', 'Engineering and Technology', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f494d475f32303233313131345f3133303332395f3031392e6a7067),
('Faith Morris', 'STD/03', 21, 'Female', 'Media and Communication', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f616e696d652d6769726c732d7066702d626c61636b2d616e642d77686974652d346365717a68737438793569723532652e77656270),
('Elijah Wambua', 'STD/04', 21, 'Male', 'Bussiness and Economics', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f494d475f32303233303730365f3038323631355f3335352e6a7067),
('Moses Willy', 'STD/05', 21, 'Male', 'Social sciences and Technology', 2019, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f34653936623530643335363637303933303031656633633665393662363761362e77656270),
('Mutheu Reginah', 'STD/06', 20, 'Female', 'CIT', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f33392d3339363435325f616e696d652d70726f66696c652d706963747572652d6769726c2e77656270),
('Paul Kavula', 'STD/07', 22, 'Male', 'Science and Technology', 2020, 'II', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f53637265656e73686f745f32303233313030392d3136303030312e706e67);

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
