-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: May 30, 2021 at 02:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizsystem`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkEmailExistance` (IN `ID` VARCHAR(30))  READS SQL DATA
select * from signup where email=ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCategory` (IN `catID` INT(4))  MODIFIES SQL DATA
DELETE FROM category WHERE id=catID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteQuestion` (IN `qstID` INT(11))  MODIFIES SQL DATA
DELETE FROM questions WHERE id=qstID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAdminDetail` (IN `loginID` VARCHAR(25), IN `pin` VARCHAR(25))  READS SQL DATA
select login ,pass from admin where login=loginID and pass=pin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllQuestions` (IN `cat` INT(11))  READS SQL DATA
select * from questions where cat_id=cat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAnswer` (IN `ans` INT(4))  READS SQL DATA
select id,ans from questions where cat_id=ans$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategory` ()  READS SQL DATA
select * from category$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategoryName` (IN `catID` INT(4))  READS SQL DATA
SELECT cat_name FROM category where id=catID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getQuestionForDeletion` (IN `catID` INT(4))  READS SQL DATA
select id,question from questions where cat_id=catID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getResult` (IN `categoryID` INT(4))  READS SQL DATA
select id,ans from questions where cat_id=categoryID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentByEmail` (IN `emailID` VARCHAR(30))  READS SQL DATA
SELECT name,pass,city,address,gender,phoneNumber,img FROM signup WHERE email=emailID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentEmail` ()  READS SQL DATA
SELECT email FROM signup$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentResult` (IN `emailID` VARCHAR(30))  READS SQL DATA
select quizName, totalQuestion, attemptedQuestion, unattemptedQuestion, rightAnswer, wrongAnswer, percentage from result where email=emailID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserDetail` (IN `loginID` VARCHAR(30), IN `pin` VARCHAR(255))  READS SQL DATA
select email,pass from signup where email=loginID and pass=pin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserEmail` (IN `userEmail` VARCHAR(30))  READS SQL DATA
select * from signup where email=userEmail$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCategory` (IN `categoryName` VARCHAR(40))  MODIFIES SQL DATA
INSERT INTO category(cat_name) VALUES (categoryName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertQuestion` (IN `qst` VARCHAR(100), IN `opt1` VARCHAR(80), IN `opt2` VARCHAR(80), IN `opt3` VARCHAR(80), IN `opt4` VARCHAR(80), IN `trueOpt` INT(4), IN `catID` INT(4))  MODIFIES SQL DATA
INSERT INTO questions(question, ans1, ans2, ans3, ans4, ans, cat_id) VALUES (qst, opt1, opt2, opt3, opt4, trueopt,catID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudentData` (IN `userName` VARCHAR(30), IN `emailID` VARCHAR(30), IN `pin` VARCHAR(255), IN `userCity` VARCHAR(30), IN `userAddress` VARCHAR(30), IN `type` VARCHAR(11), IN `number` INT(11), IN `profilePic` VARCHAR(255))  MODIFIES SQL DATA
INSERT INTO signup(name, email, pass, city, address, gender, phoneNumber, img) VALUES (userName, emailID, pin, userCity, userAddress, type, number, profilePic)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertStudentResult` (IN `totalQst` INT(11), IN `testName` VARCHAR(40), IN `attemptQst` INT(11), IN `unattemptQst` INT(11), IN `rightAns` INT(11), IN `wrongAns` INT(11), IN `percent` FLOAT, IN `email` VARCHAR(50))  MODIFIES SQL DATA
INSERT INTO result (totalQuestion, quizName, attemptedQuestion, unattemptedQuestion, rightAnswer, wrongAnswer, percentage, email) VALUES (totalQst, testName, attemptQst, unattemptQst, rightAns, wrongAns, percent, email)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifyStudentProfile` (IN `sName` VARCHAR(30), IN `emailID` VARCHAR(30), IN `pin` VARCHAR(255), IN `sCity` VARCHAR(30), IN `sAddress` VARCHAR(30), IN `sType` VARCHAR(11), IN `sNum` BIGINT(11), IN `image` VARCHAR(255))  UPDATE signup SET name=sName, pass=pin, city=sCity, address=sAddress, gender=sType, phoneNumber=sNum, img=image WHERE email=emailID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `admin`:
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `login`, `pass`) VALUES
(1, 'soban', 'soban');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(4) NOT NULL,
  `cat_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `category`:
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(3, 'HTML'),
(2, 'JavaScript'),
(1, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `ans1` varchar(80) NOT NULL,
  `ans2` varchar(80) NOT NULL,
  `ans3` varchar(80) NOT NULL,
  `ans4` varchar(80) NOT NULL,
  `ans` int(4) NOT NULL,
  `cat_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `questions`:
--   `cat_id`
--       `category` -> `id`
--

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `ans`, `cat_id`) VALUES
(1, 'Which symbol is used to concatenate string with variable in PHP', '.', '-', '+', '@', 0, 1),
(2, 'PHP is a', 'Open Source Language', 'Widely Used Language', 'Server side scripting language', 'All of the above', 3, 1),
(3, 'The date_sunset() function returns the sunset time for a specified day and location.', 'False', 'True', 'Not a valid function', 'None of the above', 1, 1),
(4, 'PHP is a case sensitive', 'True', 'False', 'None of the above', 'Depend on cases', 0, 1),
(5, 'Which of following is not a Superglobals in PHP?', '$_SERVER', '$_ENV', '$_FILES', '$_PUT', 3, 1),
(6, '______ is used to unset a variable in PHP ?', 'delete()', 'unset()', 'unlink();', 'delete();', 1, 1),
(7, 'Which of the following function is used to compress a string?', 'zip()', 'compress()', 'zip_compress()', 'gzcompress()', 3, 1),
(8, 'What is the original name of JavaScript?', 'LiveScript', 'EScript', 'Mocha', 'JavaScript', 2, 2),
(11, 'Which of the following is not JavaScript Data Types?', 'Undefined', 'Number', 'Boolean', 'Float', 3, 2),
(12, 'Which of the following keyword is used box alert box in JavaScript', 'alert-box', 'confirm', 'msgbox', 'alert', 3, 2),
(13, 'A webpage displays a picture. What﻿﻿﻿ ﻿﻿tag ﻿﻿﻿﻿﻿was used to display that picture?', 'picture', 'image', 'img', 'src', 2, 3),
(14, 'Which of the following allow you to add a row in a table?', 'td', 'cr', 'th', 'tr', 3, 3),
(15, ' Which of the following is used to write paragraph', 'p', 'para', 'paragraph', 'word', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `ID` int(11) NOT NULL,
  `quizName` varchar(40) NOT NULL,
  `totalQuestion` int(11) NOT NULL,
  `attemptedQuestion` int(11) NOT NULL,
  `unattemptedQuestion` int(11) NOT NULL,
  `rightAnswer` int(11) NOT NULL,
  `wrongAnswer` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `result`:
--   `email`
--       `signup` -> `email`
--   `quizName`
--       `category` -> `cat_name`
--

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`ID`, `quizName`, `totalQuestion`, `attemptedQuestion`, `unattemptedQuestion`, `rightAnswer`, `wrongAnswer`, `percentage`, `email`) VALUES
(1, 'PHP', 7, 6, 1, 6, 0, 85.71, 'subi.soban1@gmail.com'),
(2, 'JavaScript', 3, 3, 0, 3, 0, 100, 'subi.soban1@gmail.com'),
(3, 'HTML', 3, 1, 2, 1, 0, 33.33, 'subi.soban1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `phoneNumber` bigint(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `signup`:
--

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `pass`, `city`, `address`, `gender`, `phoneNumber`, `img`) VALUES
(1, 'M. Soban Mian', 'subi.soban1@gmail.com', '123', 'Lahore', 'MS Town, Lahore', 'Male', 3201048079, '2784445.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`),
  ADD KEY `quizName` (`quizName`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`email`) REFERENCES `signup` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`quizName`) REFERENCES `category` (`cat_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
