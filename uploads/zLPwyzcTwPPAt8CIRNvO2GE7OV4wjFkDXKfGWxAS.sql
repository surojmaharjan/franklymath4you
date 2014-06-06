-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2013 at 12:57 AM
-- Server version: 5.5.31
-- PHP Version: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_frankly`
--

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('published','unpublished') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `content`, `status`) VALUES
(1, 'Home Page', 'As mentioned above, students in category 2 understand what is going on in class and can complete 80 to 90 percent of their homework problems without assistance. Because of this, they do not really need an in person tutor once a week but rather someone they can call on to ask questions a few minutes a day. Some times they benefit from working with a tutor before a test or quiz but other times they understand the material and would do just as well without that session. Unfortunately it is difficult to find a tutor who is this flexible and willing to hold a weekly spot open in case that student needs them and therefore parents end up hiring a tutor to come once a week which ends up being costly and not ideally effective for the student. This service is a solution to this problem. “ from “who is this service for page.', 'published'),
(2, 'How it works', '\r\nHomework Help:\r\n\r\n    1)Student sends me the question that they are having difficulty answering.\r\n    2)Within two hours * I send feedback on the problem. Depending on the question posed, students will receive either a written explanation with step-by-step instructions on how to solve the problem** or a video file that contains a written and verbal explanation. Since this is still a personalized tutoring service, what comes back will depend on the student and question involved.\r\n\r\n    * This time frame applies to the hours between 7 am and 9 pm. If you submit a question outside of those hours you may have to wait longer to receive feedback.\r\n\r\n    ** Please note that with few exceptions I will not answer the exact question sent to me. When I receive a homework question from a student, I will write and solve a different problem that uses the same process that is needed for the one sent to me. This provides the student with a model of how to solve the problem without eliminating the opportunity for them to do so on their own.\r\n    3)There is no limit to the number of email exchanges so if the student still has questions we will stay in contact until he or she understands.\r\n\r\n    * Please note that with few exceptions I will not answer the exact question sent to me. When I receive a homework question from a student, I will write and solve a different problem that uses the same process that is needed for the one sent to me. This provides the student with a model of how to solve the problem without eliminating the opportunity for them to do so on their own.\r\n\r\nPractice exams\r\n\r\n    1)student sends me a list of topics as well as any review material or relevant handouts for an upcoming exam\r\n    2)Based on the information received as well as the homework questions the student and I have previously reviewed, I will write a practice exam.\r\n    3)The student sends me back the exam when he or she completes it.\r\n    3)I grade the exam and recommend follow up depending on the students score.\r\n     a.    If the student preforms well, we stop there\r\n     b.    If it is clear the student still has gaps in his or her understanding of the material, I will either recommend we sit down for a one hour in person tutoring session or send more practice material for the student to work on.\r\n\r\nIn person tutoring\r\n\r\n    On occasion I may recommend setting up a one hour in person tutoring session with a student.\r\n    http://www.privateprep.com/about/corevalues.php\r\n\r\n', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `payment_package`
--

CREATE TABLE IF NOT EXISTS `payment_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(225) NOT NULL,
  `month_duration` int(2) NOT NULL,
  `charge` decimal(10,2) NOT NULL,
  `short_note` varchar(225) DEFAULT '',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment_package`
--

INSERT INTO `payment_package` (`id`, `package_name`, `month_duration`, `charge`, `short_note`, `is_active`) VALUES
(1, '1 month', 1, 160.00, '', 1),
(2, '4 month', 4, 608.00, 'Save 5%', 1),
(3, '7 month', 7, 1043.00, 'Save 7%', 1),
(4, '9 month', 9, 40.00, 'Save 10%', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(225) NOT NULL,
  `question` text,
  `attach_file` varchar(225) DEFAULT NULL,
  `is_register` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `course`, `question`, `attach_file`, `is_register`) VALUES
(45, 'kkkk', 'How to solve this question?', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE IF NOT EXISTS `register_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone_num` varchar(25) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `school` varchar(225) NOT NULL,
  `course` varchar(225) NOT NULL,
  `teacher_name` varchar(225) DEFAULT NULL,
  `textbook` varchar(225) DEFAULT NULL,
  `how_hear` text,
  `package_id` int(11) NOT NULL,
  `payment_status` enum('not payed','payed','expired') NOT NULL DEFAULT 'not payed',
  `payment_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`email`),
  KEY `package_pk` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unregister_users`
--

CREATE TABLE IF NOT EXISTS `unregister_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone_num` varchar(225) NOT NULL,
  `grade` varchar(15) NOT NULL,
  `school` varchar(225) NOT NULL,
  `payment_status` enum('not payed','payed') NOT NULL DEFAULT 'not payed',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `unregister_users`
--

INSERT INTO `unregister_users` (`id`, `name`, `email`, `phone_num`, `grade`, `school`, `payment_status`) VALUES
(52, 'sailendra', 'sailendra.shakya@hotmail.com', '9841398441', '10', 'nmc', 'not payed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `mid_name` varchar(225) DEFAULT NULL,
  `last_name` varchar(225) DEFAULT NULL,
  `password` varchar(225) NOT NULL DEFAULT '',
  `email` varchar(225) NOT NULL,
  `role` enum('tutor','admin') NOT NULL DEFAULT 'tutor',
  `street` varchar(225) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `state` varchar(225) DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `mid_name`, `last_name`, `password`, `email`, `role`, `street`, `city`, `state`, `phone`) VALUES
(1, 'sailendra', 'sailendra', 'shakya', 'shakya', 'b2791b1ab189740fbd4bebdf101d915e', 'sailendra.shakya@gmail.com', 'admin', 'lalitpur', 'kathmandu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website_setting`
--

CREATE TABLE IF NOT EXISTS `website_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `paypal_username` varchar(255) NOT NULL,
  `paypal_password` varchar(255) NOT NULL,
  `paypal_signature` varchar(255) NOT NULL,
  `google_analytic` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `website_setting`
--

INSERT INTO `website_setting` (`id`, `name`, `email`, `paypal_username`, `paypal_password`, `paypal_signature`, `google_analytic`) VALUES
(1, 'Frankly Math', 'contact@frankly.com', '', '', '', ''),
(2, 'tea', 'asdf', '', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `register_users`
--
ALTER TABLE `register_users`
  ADD CONSTRAINT `package_pk` FOREIGN KEY (`package_id`) REFERENCES `payment_package` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
