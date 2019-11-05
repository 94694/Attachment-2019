-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 08:23 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attachment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminAutoId` int(10) NOT NULL,
  `adminSUID` int(10) NOT NULL,
  `adminFname` varchar(30) NOT NULL,
  `adminLname` varchar(30) NOT NULL,
  `adminPhone` varchar(30) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminGender` varchar(10) NOT NULL,
  `adminPassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminAutoId`, `adminSUID`, `adminFname`, `adminLname`, `adminPhone`, `adminEmail`, `adminGender`, `adminPassword`) VALUES
(1, 1002, 'Serah', 'Mwangi', '0700148553', 'serah@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `attachmentdetails`
--

CREATE TABLE `attachmentdetails` (
  `adAutoId` int(10) NOT NULL,
  `adAttachmentTypeId` int(5) NOT NULL,
  `adStudentId` int(10) NOT NULL,
  `adStartDate` date NOT NULL,
  `adEndDate` date DEFAULT NULL,
  `adHoursPerDay` int(2) NOT NULL,
  `adOrgName` varchar(100) NOT NULL,
  `adOrgEmail` varchar(100) NOT NULL,
  `adOrgPhysicalAdddress` varchar(100) NOT NULL,
  `adHostSupervName` varchar(100) NOT NULL,
  `adHostSupervEmail` varchar(100) NOT NULL,
  `adHostSupervPhone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `attachmenttype`
--

CREATE TABLE `attachmenttype` (
  `attAutoId` int(2) NOT NULL,
  `attName` varchar(50) NOT NULL,
  `attCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachmenttype`
--

INSERT INTO `attachmenttype` (`attAutoId`, `attName`, `attCode`) VALUES
(1, 'Community Based Attachment', 'CBA'),
(2, 'Industrial Attachment', 'IA');

-- --------------------------------------------------------

--
-- Table structure for table `cbadailyactivities`
--

CREATE TABLE `cbadailyactivities` (
  `cbaDailyAutoId` int(10) NOT NULL,
  `cbaDailyDate` date NOT NULL,
  `Cbaobjectives` varchar(250) NOT NULL,
  `cbaActivities` varchar(500) NOT NULL,
  `Lessonlearnt` varchar(250) NOT NULL,
  `totalhours` int(20) NOT NULL,
  `cbaStudentId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbadailyactivities`
--

INSERT INTO `cbadailyactivities` (`cbaDailyAutoId`, `cbaDailyDate`, `Cbaobjectives`, `cbaActivities`, `Lessonlearnt`, `totalhours`, `cbaStudentId`) VALUES
(5, '2017-10-31', '', 'Magna laudantium similique cupiditate omnis aut ut voluptate magnam accusantium ea doloremque dolor', '', 0, 94694);

-- --------------------------------------------------------

--
-- Table structure for table `cbareports`
--

CREATE TABLE `cbareports` (
  `studentId` int(10) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_ext` varchar(10) NOT NULL,
  `dateUploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbareports`
--

INSERT INTO `cbareports` (`studentId`, `file_name`, `file_ext`, `dateUploaded`) VALUES
(1003, 'CBA1003', 'docx', '2019-11-02 14:06:58'),
(94694, 'CBA94694', 'doc', '2017-11-14 08:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseAutoId` int(5) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseFacultyId` int(5) NOT NULL,
  `courseCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseAutoId`, `courseName`, `courseFacultyId`, `courseCode`) VALUES
(1, 'Bachelor of Business Information Technology', 1, 'BBIT'),
(2, 'Bachelor of Commerce', 2, 'BCOM');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `facultyAutoId` int(5) NOT NULL,
  `facultyName` varchar(100) NOT NULL,
  `facultyCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`facultyAutoId`, `facultyName`, `facultyCode`) VALUES
(1, 'Faculty of Information technology', 'FIT'),
(2, 'School of Management and Commerce', 'SMC');

-- --------------------------------------------------------

--
-- Table structure for table `iadailyactivities`
--

CREATE TABLE `iadailyactivities` (
  `iaDailyAutoId` int(10) NOT NULL,
  `iaDailyDate` date NOT NULL,
  `Iaobjectives` varchar(250) NOT NULL,
  `iaActivities` varchar(500) NOT NULL,
  `Lessonlearnt` varchar(250) NOT NULL,
  `totalhours` int(11) NOT NULL,
  `iaStudentId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iadailyactivities`
--

INSERT INTO `iadailyactivities` (`iaDailyAutoId`, `iaDailyDate`, `Iaobjectives`, `iaActivities`, `Lessonlearnt`, `totalhours`, `iaStudentId`) VALUES
(5, '2017-11-07', '', 'Reprehenderit aliqua Ex labore veniam et dolor dicta natus in et eum fugiat est irure sint repudiandae harum quaerat', '', 0, 94694);

-- --------------------------------------------------------

--
-- Table structure for table `iareports`
--

CREATE TABLE `iareports` (
  `studentId` int(10) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_ext` varchar(10) NOT NULL,
  `dateUploaded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iareports`
--

INSERT INTO `iareports` (`studentId`, `file_name`, `file_ext`, `dateUploaded`) VALUES
(3214, 'ia3214', 'docx', '2017-11-12 15:28:28'),
(94694, 'ia94694', 'docx', '2017-11-14 07:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentAutoId` int(10) NOT NULL,
  `studentSUID` int(10) NOT NULL,
  `studentFname` varchar(30) NOT NULL,
  `studentLname` varchar(30) NOT NULL,
  `studentGender` varchar(10) NOT NULL,
  `studentPhone` varchar(30) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentCourseId` int(5) NOT NULL,
  `studentPassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentAutoId`, `studentSUID`, `studentFname`, `studentLname`, `studentGender`, `studentPhone`, `studentEmail`, `studentCourseId`, `studentPassword`) VALUES
(6, 94694, 'Angella', 'Obiero', 'Female', '0719005015', 'angella@gmail.com', 1, '9bb65bb66d0ca2d0f61045758778f0d2'),
(8, 90000, 'Holmes', 'Keith', 'Female', '075424165', 'firubynol@gmail.com', 1, 'e98ff526ad76393f7dfb9717aa548154'),
(11, 97477, 'tuma', 'Baraka', ' Female', '0714576818', 'tuma.baraka@gmail.com', 1, 'e645fac0eb6ba202e3dc7b413dab7b7f');

-- --------------------------------------------------------

--
-- Table structure for table `studentsupervisors`
--

CREATE TABLE `studentsupervisors` (
  `stsupAutoId` int(10) NOT NULL,
  `stsupAttachmentTypeId` int(5) NOT NULL,
  `stsupSupervisorId` int(10) NOT NULL,
  `stsupStudentId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsupervisors`
--

INSERT INTO `studentsupervisors` (`stsupAutoId`, `stsupAttachmentTypeId`, `stsupSupervisorId`, `stsupStudentId`) VALUES
(12, 1, 1, 94694),
(13, 1, 1, 94694);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `supervisorAutoId` int(10) NOT NULL,
  `supervisorSUID` int(10) NOT NULL,
  `supervisorFname` varchar(30) NOT NULL,
  `supervisorLname` varchar(30) NOT NULL,
  `supervisorPhone` varchar(30) NOT NULL,
  `supervisorEmail` varchar(100) NOT NULL,
  `supervisorGender` varchar(10) NOT NULL,
  `supervisorPassword` varchar(200) NOT NULL,
  `supervisorFacultyId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`supervisorAutoId`, `supervisorSUID`, `supervisorFname`, `supervisorLname`, `supervisorPhone`, `supervisorEmail`, `supervisorGender`, `supervisorPassword`, `supervisorFacultyId`) VALUES
(1, 1003, 'Sarah', 'Serem', '0700153356', 'serem@gmail.com', 'Female', 'aa68c75c4a77c87f97fb686b2f068676', 1),
(2, 1004, 'Malachi', 'Thadeus', '074563222', 'thadeus@yahoo.com', 'Male', 'fed33392d3a48aa149a87a38b875ba4a', 1),
(3, 2030, 'Richarg', 'Mwangi', '0720719128', 'serah.mwangi716@strathmore.edu', 'Male', '2d579dc29360d8bbfbb4aa541de5afa9', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminAutoId`),
  ADD UNIQUE KEY `adminSUID` (`adminSUID`),
  ADD UNIQUE KEY `adminPhone` (`adminPhone`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `attachmentdetails`
--
ALTER TABLE `attachmentdetails`
  ADD PRIMARY KEY (`adAutoId`),
  ADD KEY `ad_attachment_type_id_fk` (`adAttachmentTypeId`),
  ADD KEY `ad_student_id_fk` (`adStudentId`);

--
-- Indexes for table `attachmenttype`
--
ALTER TABLE `attachmenttype`
  ADD PRIMARY KEY (`attAutoId`);

--
-- Indexes for table `cbadailyactivities`
--
ALTER TABLE `cbadailyactivities`
  ADD PRIMARY KEY (`cbaDailyAutoId`),
  ADD KEY `cba_student_id_fk` (`cbaStudentId`);

--
-- Indexes for table `cbareports`
--
ALTER TABLE `cbareports`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseAutoId`),
  ADD UNIQUE KEY `courseCode` (`courseCode`),
  ADD KEY `course_faculty_id_fk` (`courseFacultyId`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`facultyAutoId`),
  ADD UNIQUE KEY `facultyCode` (`facultyCode`),
  ADD UNIQUE KEY `facultyName` (`facultyName`);

--
-- Indexes for table `iadailyactivities`
--
ALTER TABLE `iadailyactivities`
  ADD PRIMARY KEY (`iaDailyAutoId`),
  ADD KEY `ia_student_id_fk` (`iaStudentId`);

--
-- Indexes for table `iareports`
--
ALTER TABLE `iareports`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentAutoId`),
  ADD UNIQUE KEY `studentSUID` (`studentSUID`),
  ADD UNIQUE KEY `studentPhone` (`studentPhone`),
  ADD UNIQUE KEY `studentEmail` (`studentEmail`),
  ADD KEY `student_course_id_fk` (`studentCourseId`);

--
-- Indexes for table `studentsupervisors`
--
ALTER TABLE `studentsupervisors`
  ADD PRIMARY KEY (`stsupAutoId`),
  ADD KEY `stsup_attachment_type_id` (`stsupAttachmentTypeId`),
  ADD KEY `stsup_supervisor_id_fk` (`stsupSupervisorId`),
  ADD KEY `stsup_student_id_fk` (`stsupStudentId`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisorAutoId`),
  ADD UNIQUE KEY `supervisorSUID` (`supervisorSUID`),
  ADD UNIQUE KEY `supervisorPhone` (`supervisorPhone`),
  ADD UNIQUE KEY `supervisorEmail` (`supervisorEmail`),
  ADD KEY `supervisor_faculty_id_fk` (`supervisorFacultyId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminAutoId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attachmentdetails`
--
ALTER TABLE `attachmentdetails`
  MODIFY `adAutoId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachmenttype`
--
ALTER TABLE `attachmenttype`
  MODIFY `attAutoId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cbadailyactivities`
--
ALTER TABLE `cbadailyactivities`
  MODIFY `cbaDailyAutoId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseAutoId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `facultyAutoId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iadailyactivities`
--
ALTER TABLE `iadailyactivities`
  MODIFY `iaDailyAutoId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentAutoId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `studentsupervisors`
--
ALTER TABLE `studentsupervisors`
  MODIFY `stsupAutoId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisorAutoId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachmentdetails`
--
ALTER TABLE `attachmentdetails`
  ADD CONSTRAINT `ad_attachment_type_id_fk` FOREIGN KEY (`adAttachmentTypeId`) REFERENCES `attachmenttype` (`attAutoId`),
  ADD CONSTRAINT `ad_student_id_fk` FOREIGN KEY (`adStudentId`) REFERENCES `students` (`studentAutoId`);

--
-- Constraints for table `cbadailyactivities`
--
ALTER TABLE `cbadailyactivities`
  ADD CONSTRAINT `cba_student_id_fk` FOREIGN KEY (`cbaStudentId`) REFERENCES `students` (`studentSUID`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `course_faculty_id_fk` FOREIGN KEY (`courseFacultyId`) REFERENCES `faculties` (`facultyAutoId`);

--
-- Constraints for table `iadailyactivities`
--
ALTER TABLE `iadailyactivities`
  ADD CONSTRAINT `ia_student_id_fk` FOREIGN KEY (`iaStudentId`) REFERENCES `students` (`studentSUID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_course_id_fk` FOREIGN KEY (`studentCourseId`) REFERENCES `courses` (`courseAutoId`);

--
-- Constraints for table `studentsupervisors`
--
ALTER TABLE `studentsupervisors`
  ADD CONSTRAINT `stsup_attachment_type_id` FOREIGN KEY (`stsupAttachmentTypeId`) REFERENCES `attachmenttype` (`attAutoId`),
  ADD CONSTRAINT `stsup_student_id_fk` FOREIGN KEY (`stsupStudentId`) REFERENCES `students` (`studentSUID`),
  ADD CONSTRAINT `stsup_supervisor_id_fk` FOREIGN KEY (`stsupSupervisorId`) REFERENCES `supervisor` (`supervisorAutoId`);

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_faculty_id_fk` FOREIGN KEY (`supervisorFacultyId`) REFERENCES `faculties` (`facultyAutoId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
