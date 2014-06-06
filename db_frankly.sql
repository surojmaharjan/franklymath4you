/*
SQLyog Community v10.3 
MySQL - 5.5.31-0ubuntu0.12.04.1 : Database - db_frankly
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_frankly` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_frankly`;

/*Table structure for table `attached_files` */

DROP TABLE IF EXISTS `attached_files`;

CREATE TABLE `attached_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `attach_for` enum('ask_homework','request_exam') NOT NULL DEFAULT 'ask_homework',
  `reference_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`attach_for`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `attached_files` */

/*Table structure for table `homework_questions` */

DROP TABLE IF EXISTS `homework_questions`;

CREATE TABLE `homework_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `course` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `question` text,
  `is_register_user` tinyint(1) NOT NULL DEFAULT '0',
  `charge` decimal(10,2) NOT NULL DEFAULT '0.00',
  `is_payed` tinyint(1) DEFAULT '0',
  `how_know` enum('teacher','friend','google search','others') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `homework_questions` */

/*Table structure for table `page` */

DROP TABLE IF EXISTS `page`;

CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('published','unpublished') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `page` */

insert  into `page`(`id`,`name`,`content`,`status`) values (1,'Home Page','As mentioned above, students in category 2 understand what is going on in class and can complete 80 to 90 percent of their homework problems without assistance. Because of this, they do not really need an in person tutor once a week but rather someone they can call on to ask questions a few minutes a day. Some times they benefit from working with a tutor before a test or quiz but other times they understand the material and would do just as well without that session. Unfortunately it is difficult to find a tutor who is this flexible and willing to hold a weekly spot open in case that student needs them and therefore parents end up hiring a tutor to come once a week which ends up being costly and not ideally effective for the student. This service is a solution to this problem. “ from “who is this service for page.','published'),(2,'How it works','\r\nHomework Help:\r\n\r\n    1)Student sends me the question that they are having difficulty answering.\r\n    2)Within two hours * I send feedback on the problem. Depending on the question posed, students will receive either a written explanation with step-by-step instructions on how to solve the problem** or a video file that contains a written and verbal explanation. Since this is still a personalized tutoring service, what comes back will depend on the student and question involved.\r\n\r\n    * This time frame applies to the hours between 7 am and 9 pm. If you submit a question outside of those hours you may have to wait longer to receive feedback.\r\n\r\n    ** Please note that with few exceptions I will not answer the exact question sent to me. When I receive a homework question from a student, I will write and solve a different problem that uses the same process that is needed for the one sent to me. This provides the student with a model of how to solve the problem without eliminating the opportunity for them to do so on their own.\r\n    3)There is no limit to the number of email exchanges so if the student still has questions we will stay in contact until he or she understands.\r\n\r\n    * Please note that with few exceptions I will not answer the exact question sent to me. When I receive a homework question from a student, I will write and solve a different problem that uses the same process that is needed for the one sent to me. This provides the student with a model of how to solve the problem without eliminating the opportunity for them to do so on their own.\r\n\r\nPractice exams\r\n\r\n    1)student sends me a list of topics as well as any review material or relevant handouts for an upcoming exam\r\n    2)Based on the information received as well as the homework questions the student and I have previously reviewed, I will write a practice exam.\r\n    3)The student sends me back the exam when he or she completes it.\r\n    3)I grade the exam and recommend follow up depending on the students score.\r\n     a.    If the student preforms well, we stop there\r\n     b.    If it is clear the student still has gaps in his or her understanding of the material, I will either recommend we sit down for a one hour in person tutoring session or send more practice material for the student to work on.\r\n\r\nIn person tutoring\r\n\r\n    On occasion I may recommend setting up a one hour in person tutoring session with a student.\r\n    http://www.privateprep.com/about/corevalues.php\r\n\r\n','published');

/*Table structure for table `payment_package` */

DROP TABLE IF EXISTS `payment_package`;

CREATE TABLE `payment_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(225) NOT NULL,
  `month_duration` int(2) NOT NULL,
  `charge` decimal(10,2) NOT NULL,
  `short_note` varchar(225) DEFAULT '',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `payment_package` */

insert  into `payment_package`(`id`,`package_name`,`month_duration`,`charge`,`short_note`,`is_active`) values (1,'1 month',1,'160.00','',1),(2,'4 month',4,'608.00','Save 5%',1),(3,'7 month',7,'1043.00','Save 7%',1),(4,'9 month',9,'40.00','Save 10%',1),(5,'per_homework',0,'2.00','',1);

/*Table structure for table `practice_exam_request` */

DROP TABLE IF EXISTS `practice_exam_request`;

CREATE TABLE `practice_exam_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone_num` varchar(15) DEFAULT NULL,
  `grade` varchar(50) NOT NULL,
  `school` varchar(225) DEFAULT NULL,
  `course` varchar(225) NOT NULL,
  `exam_type` enum('Quiz','Test','Midterm','Final') NOT NULL DEFAULT 'Quiz',
  `exam_date` date NOT NULL,
  `exam_topics` text NOT NULL,
  `charge` decimal(10,2) NOT NULL,
  `is_payed` tinyint(1) NOT NULL DEFAULT '0',
  `is_register_user` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `practice_exam_request` */

/*Table structure for table `practrice_exams` */

DROP TABLE IF EXISTS `practrice_exams`;

CREATE TABLE `practrice_exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_type` varchar(255) NOT NULL DEFAULT 'quiz',
  `charge` decimal(10,2) NOT NULL,
  `short_note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `practrice_exams` */

insert  into `practrice_exams`(`id`,`exam_type`,`charge`,`short_note`) values (1,'Quiz','20.00',NULL),(2,'Test','30.00',NULL),(3,'Midterm','50.00',NULL),(4,'Final','50.00',NULL);

/*Table structure for table `register_users` */

DROP TABLE IF EXISTS `register_users`;

CREATE TABLE `register_users` (
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
  KEY `package_pk` (`package_id`),
  CONSTRAINT `package_pk` FOREIGN KEY (`package_id`) REFERENCES `payment_package` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `register_users` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`user_name`,`first_name`,`mid_name`,`last_name`,`password`,`email`,`role`,`street`,`city`,`state`,`phone`) values (1,'admin','admin',NULL,'admin','e7fb7cf3f195acea91d2c29d4983f7d5','erica@franklymath4you.com','admin',NULL,NULL,NULL,NULL);

/*Table structure for table `website_setting` */

DROP TABLE IF EXISTS `website_setting`;

CREATE TABLE `website_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `paypal_username` varchar(225) NOT NULL,
  `paypal_password` varchar(225) NOT NULL,
  `paypal_signature` varchar(225) NOT NULL,
  `apiLive` tinyint(1) DEFAULT '0',
  `google_analytic` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `website_setting` */

insert  into `website_setting`(`id`,`name`,`email`,`paypal_username`,`paypal_password`,`paypal_signature`,`apiLive`,`google_analytic`) values (2,'sanish','sanishmaharjan@lftechnology.com','sanishmaharjan_api1.lftechnology.com','1376672818','AlwhKqWKLPwz3-wih05jdQJi79iLAiI3ZO..CM0ain49I74uuV0496JS',0,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
