-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 04:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeraccount`
--

CREATE TABLE `employeraccount` (
  `empID` int(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `q1` varchar(255) NOT NULL,
  `q2` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `industryCategory` varchar(255) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactMobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeraccount`
--

INSERT INTO `employeraccount` (`empID`, `userName`, `password`, `q1`, `q2`, `companyName`, `industryCategory`, `contactName`, `contactEmail`, `contactMobile`) VALUES
(2, 'pran-rfl', '123', 'egg', 'chess', 'PRAN-RFL Group', 'Marketing/Sales', 'Amjad Khan ', 'amkhan@gmail.com', '880-2-8835546'),
(3, 'atc', '1234', 'khicuri', 'football', 'Android ToTo Company', 'IT/Telecommunication', 'atc', 'atc@gmail.com', '880-2-8835546'),
(14, 'microsoftbd', '123', '', '', 'Microsoft Bangladesh', 'IT & Telecommunication', 'bil gates', 'microsoftbd@gmail.com', '01521332143'),
(15, 'brainstation', '123', 'bread', 'hockey', 'Brain Station', 'IT/Telecommunication', 'Amjad', 'amd@gmail.com', '01521332123'),
(17, 'batabd', '123', '', '', 'Bata Bangladesh', 'Marketing/Sales', 'Amjad Khan', 'dkhan@gmail.com', '01521332123'),
(18, 'samsungbd', '123', 'pizza', 'basketball', 'Samsung Bangladesh', 'IT/Telecommunication', 'tamanna khan', 'tama@gmail.com', '01529332123'),
(19, 'abc', '12', 'burger', 'baseball', 'abc company', 'Law/Legal', 'abc khan', 'abc@gmail.com', '01529392123');

-- --------------------------------------------------------

--
-- Table structure for table `jobapplicant`
--

CREATE TABLE `jobapplicant` (
  `jobApplicantID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `jobPostID` int(255) NOT NULL,
  `empID` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `applyDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobapplicant`
--

INSERT INTO `jobapplicant` (`jobApplicantID`, `userID`, `jobPostID`, `empID`, `status`, `applyDate`) VALUES
(1, 20, 29, 14, 'Accept', '0000-00-00 00:00:00'),
(7, 7, 31, 15, '', '0000-00-00 00:00:00'),
(26, 20, 33, 14, 'Accept', '0000-00-00 00:00:00'),
(27, 20, 20, 15, '', '0000-00-00 00:00:00'),
(28, 20, 30, 2, '', '2019-11-26 12:36:47'),
(29, 20, 35, 14, '', '2019-11-26 13:18:13'),
(30, 20, 39, 14, '', '2019-11-26 13:25:20'),
(31, 20, 40, 14, '', '2019-11-26 13:50:29'),
(32, 20, 41, 14, 'Accept', '2019-11-26 16:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

CREATE TABLE `jobpost` (
  `jobPostID` int(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `vacancy` int(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `empStatus` varchar(255) NOT NULL,
  `postedDate` date NOT NULL,
  `deadline` date NOT NULL,
  `experiences` varchar(255) NOT NULL,
  `educationLevel` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `companyDescription` varchar(500) NOT NULL,
  `jobDescription` varchar(500) NOT NULL,
  `empID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobpost`
--

INSERT INTO `jobpost` (`jobPostID`, `jobTitle`, `vacancy`, `location`, `empStatus`, `postedDate`, `deadline`, `experiences`, `educationLevel`, `salary`, `companyDescription`, `jobDescription`, `empID`) VALUES
(20, 'Software Engineer, ASP.NET (MVC)', 3, 'Anywhere in Bangladesh', 'partTime', '2019-10-22', '2019-11-30', 'At least 2 year(s)', 'B.Sc. in Computer Science from any reputed University or From any other Background who is Confident enough to be Fit to join this adventure with us.', 'Negotiable', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1. Updating Company\'s Accounting Software by inputting data and preparation of different Financial Reports as required by the Management and peraration of analytical report assigned by the Head of the Department as well as Management.\\n\r\n2.Preparation of monthly, quarterly, half yearly and yearly financial statements for management.\\n\r\n3.Assist management to formulate and administer financial policy to ensure that financial discipline is maintained in the organization effectively and efficie', 15),
(30, 'Digital Marketing Officer', 1, 'Dhaka, Bangladesh', 'fullTime', '2019-10-28', '2019-12-01', 'At least 2 year(s)', 'HSC, Diploma in Engineering, Bachelor degree in any discipline', 'Negotiable', 'Containers provide a means to center and horizontally pad your site’s contents. Use .container for a responsive pixel width or .container-fluid for width: 100% across all viewport and device sizes.', 'Containers provide a means to center and horizontally pad your site’s contents. Use .container for a responsive pixel width or .container-fluid for width: 100% across all viewport and device sizes.', 2),
(31, 'Senior Java Developer', 1, 'Dhaka, Bangladesh', 'fullTime', '2019-10-31', '2019-12-02', 'At least 3 year(s)', 'B.Sc in Computer Science or similar discipline.', 'Negotiable', '1.Preparation of monthly, quarterly, half yearly and yearly financial statements for management./n\r\n2.Assist management to formulate and administer financial policy to ensure that financial discipline is maintained in the organization effectively and efficiently.', '1.Assist management to formulate and administer financial policy to ensure that financial discipline is maintained in the organization effectively and efficiently.\"/r\"\r\n2.Preparation of monthly, quarterly, half yearly and yearly financial statements for management.', 15),
(40, 'WordPress Developer', 2, 'Anywhere in Bangladesh', 'Full-time', '2019-11-26', '2019-11-30', 'At least 3 year(s)', 'B.Sc in Computer Science or similar discipline.', 'Negotiable', 'd', 'ed', 14),
(41, 'Software Quality Assurance Engineer', 1, 'Anywhere in Bangladesh', 'fullTime', '2019-11-26', '2019-11-28', 'At least 3 year(s)', 'B.Sc in Computer Science or similar discipline.', 'Negotiable', 'We are looking for a Quality Assurance (QA) engineer with focus in Automation to develop and execute exploratory and automated tests to ensure product quality. QA engineer responsibilities include designing and implementing tests, debugging and defining corrective actions. He/She will also review system requirements and track quality assurance metrics (e.g. defect densities and open defect counts.)', 'Review requirements, specifications and technical design documents to provide timely and meaningful feedback\r\nCreate detailed, comprehensive and well-structured test plans and test cases\r\nEstimate, prioritize, plan and coordinate testing activities', 14),
(42, 'Account Executive West Palm Beach', 1, 'Dhaka, Bangladesh', 'fullTime', '2019-11-26', '2020-01-01', 'NULL', 'Bsc in reputed university', 'negotiable', 'The Atlantic Ocean touches the eastern half of Palm Beach County with over 47 miles of coastal beach front. The western part of the county leads the nation in production of sugarcane. In between is the third most populous county in the state of Florida and home to 1.3 Million people, more than 60% of whom engage with Hubbard Radio. Hubbard Radio West Palm is a full-service media company with legendary radio stations and cutting-edge digital solutions.', 'Meet and exceed monthly, quarterly, and annual budgets including spot, digital, and new direct business. Prospect new businesses on a weekly basis.', 2),
(52, 'Trail Post', 2, 'Anywhere in Bangladesh', 'partTime', '2019-11-27', '2019-11-30', 'At least 3 year(s)', 'B.Sc in Computer Science or similar discipline.', 'Negotiable', 'we', 'rock', 14);

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `userID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `q1` varchar(255) NOT NULL,
  `q2` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name_cv` varchar(255) NOT NULL,
  `location` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`userID`, `name`, `gender`, `email`, `mobile`, `q1`, `q2`, `password`, `name_cv`, `location`) VALUES
(1, 'Latif siddik', 'male', 'latif@gmail.com', '1454545454', '', '', '123456', '', ''),
(4, 'Asif Akbor', 'male', 'asif@gmail.com', '1455382123',  '', '', '456123', '', ''),
(6, 'Md Yunus', 'male', 'yunus@gmail.com', '1755382123', 'kacci', 'kabadi', '123', '', ''),
(7, 'Md Ovi ', 'male', 'ovivai@gmail.com', '01521332123',  '', '', '1234', '', ''),
(19, 'Tonni Mitro', 'female', 'tonni@gmail.com', '+8801521332123',  '', '', '1234', '', ''),
(20, 'hasibur rahman', 'male', 'shanto.ewu99@gmail.com', '01521332123',  '', '', '1234', '2410mysql_tutorial.pdf', 'resume/2410mysql_tutorial.pdf'),
(21, 'Habib Wahid', 'male', 'habib@gmail.com', '01755382123', 'biriani', 'cricket', '123', '', ''),
(22, 'sumaia tamanna', 'female', 'tama@gmail.com', '01512332123',  '', '', '123', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeraccount`
--
ALTER TABLE `employeraccount`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `jobapplicant`
--
ALTER TABLE `jobapplicant`
  ADD PRIMARY KEY (`jobApplicantID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `jobPostID` (`jobPostID`),
  ADD KEY `empID` (`empID`),
  ADD KEY `jobApplicantID` (`jobApplicantID`);

--
-- Indexes for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD PRIMARY KEY (`jobPostID`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeraccount`
--
ALTER TABLE `employeraccount`
  MODIFY `empID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jobapplicant`
--
ALTER TABLE `jobapplicant`
  MODIFY `jobApplicantID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jobpost`
--
ALTER TABLE `jobpost`
  MODIFY `jobPostID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
