-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 07:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `average_grade` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`job_id`, `user_id`, `first_name`, `last_name`, `age`, `gender`, `location`, `country`, `department`, `average_grade`, `email`, `phone_number`) VALUES
(29, 67, 'Ahmad', 'Adil', '2006-03-22', 'Male', 'Hawler', 'Kurdistan', 'Computer Science - Programming', 99, 'Ahmadkurdking99@gmail.com', '07512175799'),
(31, 67, 'Ahmad', 'Morningstar', '2006-03-21', 'Male', 'Hawler, 120m', 'Kurdistan', 'Computer', 97, 'Ahmadkurdking99@gmail.com', '07512175799'),
(35, 67, 'Ahmad', 'Morningstar', '0000-00-00', 'Female', 'Hawler', 'Kurdistan', 'Computer Science - Programming', 90, 'Ahmadkurdking99@gmail.com', '07512175799');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `end_of_registration` date NOT NULL,
  `eligibility` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `company`, `location`, `event_date`, `event_end_date`, `end_of_registration`, `eligibility`, `created_at`) VALUES
(4, 'Event 1', 'Tech Innovations', 'New York, USA', '2025-03-01', '2025-03-03', '2025-02-28', 'Open to all participants', '2025-02-13 18:54:22'),
(5, 'Event 2', 'Global Solutions', 'San Francisco, USA', '2025-03-05', '2025-03-07', '2025-03-03', 'University students and graduates', '2025-02-13 18:54:22'),
(6, 'Event 3', 'Creative Works', 'London, UK', '2025-03-10', '2025-03-12', '2025-03-08', 'Must have at least 1 year of experience', '2025-02-13 18:54:22'),
(7, 'Event 4', 'Innovate Tech', 'Berlin, Germany', '2025-03-15', '2025-03-17', '2025-03-13', 'Open to international participants', '2025-02-13 18:54:22'),
(8, 'Event 5', 'Tech Innovators', 'Paris, France', '2025-03-20', '2025-03-22', '2025-03-18', 'Graduates with a background in technology', '2025-02-13 18:54:22'),
(9, 'Event 6', 'Startup Hub', 'Toronto, Canada', '2025-03-25', '2025-03-27', '2025-03-23', 'Professionals in the tech industry', '2025-02-13 18:54:22'),
(10, 'Event 7', 'Global Creators', 'Sydney, Australia', '2025-03-30', '2025-04-01', '2025-03-28', 'Open to creative minds', '2025-02-13 18:54:22'),
(11, 'Event 8', 'Data Ventures', 'Toronto, Canada', '2025-04-05', '2025-04-07', '2025-04-03', 'Graduates and professionals in data science', '2025-02-13 18:54:22'),
(12, 'Event 9', 'Health Tech Forum', 'Los Angeles, USA', '2025-04-10', '2025-04-12', '2025-04-08', 'Health professionals and tech enthusiasts', '2025-02-13 18:54:22'),
(13, 'Event 10', 'Engineering Summit', 'Berlin, Germany', '2025-04-15', '2025-04-17', '2025-04-13', 'Engineering degree holders', '2025-02-13 18:54:22'),
(14, 'Event 11', 'Future Technologies', 'New York, USA', '2025-04-20', '2025-04-22', '2025-04-18', 'Professionals in technology fields', '2025-02-13 18:54:22'),
(15, 'Event 12', 'Design Expo', 'London, UK', '2025-04-25', '2025-04-27', '2025-04-23', 'Design students and professionals', '2025-02-13 18:54:22'),
(16, 'Event 13', 'AI Innovations', 'Tokyo, Japan', '2025-05-01', '2025-05-03', '2025-04-29', 'AI researchers and enthusiasts', '2025-02-13 18:54:22'),
(17, 'Event 14', 'Global Ventures', 'San Francisco, USA', '2025-05-05', '2025-05-07', '2025-05-03', 'Open to entrepreneurs and innovators', '2025-02-13 18:54:22'),
(18, 'Event 15', 'Robotics Challenge', 'Paris, France', '2025-05-10', '2025-05-12', '2025-05-08', 'Students and professionals in robotics', '2025-02-13 18:54:22'),
(19, 'Event 16', 'Tech Leaders', 'Berlin, Germany', '2025-05-15', '2025-05-17', '2025-05-13', 'Tech industry professionals', '2025-02-13 18:54:22'),
(20, 'Event 17', 'Engineering Innovation', 'Toronto, Canada', '2025-05-20', '2025-05-22', '2025-05-18', 'Open to engineers and innovators', '2025-02-13 18:54:22'),
(21, 'Event 18', 'Startup World', 'Los Angeles, USA', '2025-05-25', '2025-05-27', '2025-05-23', 'Entrepreneurs and aspiring founders', '2025-02-13 18:54:22'),
(22, 'Event 19', 'Creative Future', 'Sydney, Australia', '2025-06-01', '2025-06-03', '2025-05-30', 'Designers, artists, and creators', '2025-02-13 18:54:22'),
(23, 'Event 20', 'Digital Growth', 'New York, USA', '2025-06-05', '2025-06-07', '2025-06-03', 'Professionals in digital marketing', '2025-02-13 18:54:22'),
(24, 'Event 21', 'Innovation Summit', 'London, UK', '2025-06-10', '2025-06-12', '2025-06-08', 'Entrepreneurs and business leaders', '2025-02-13 18:54:22'),
(25, 'Event 22', 'Future Leaders', 'Paris, France', '2025-06-15', '2025-06-17', '2025-06-13', 'Leaders and aspiring leaders in business', '2025-02-13 18:54:22'),
(26, 'Event 23', 'Tech Talk', 'Tokyo, Japan', '2025-06-20', '2025-06-22', '2025-06-18', 'Open to all tech enthusiasts', '2025-02-13 18:54:22'),
(27, 'Event 24', 'Global Collaboration', 'San Francisco, USA', '2025-06-25', '2025-06-27', '2025-06-23', 'Students and professionals from all fields', '2025-02-13 18:54:22'),
(28, 'Event 25', 'Innovation Showcase', 'Berlin, Germany', '2025-07-01', '2025-07-03', '2025-06-29', 'Innovators in technology and design', '2025-02-13 18:54:22'),
(29, 'Event 26', 'Engineering Excellence', 'New York, USA', '2025-07-05', '2025-07-07', '2025-07-03', 'Engineers and technology professionals', '2025-02-13 18:54:22'),
(30, 'Event 27', 'Creative Visionaries', 'London, UK', '2025-07-10', '2025-07-12', '2025-07-08', 'Creative professionals and designers', '2025-02-13 18:54:22'),
(31, 'Event 28', 'AI Revolution', 'Toronto, Canada', '2025-07-15', '2025-07-17', '2025-07-13', 'AI experts and enthusiasts', '2025-02-13 18:54:22'),
(32, 'Event 29', 'Future Tech Expo', 'Paris, France', '2025-07-20', '2025-07-22', '2025-07-18', 'Tech professionals and startups', '2025-02-13 18:54:22'),
(33, 'Event 30', 'Digital Transformation', 'Los Angeles, USA', '2025-07-25', '2025-07-27', '2025-07-23', 'Digital transformation experts', '2025-02-13 18:54:22'),
(34, 'Event 31', 'Innovation in Action', 'Berlin, Germany', '2025-08-01', '2025-08-03', '2025-07-30', 'Innovation leaders and entrepreneurs', '2025-02-13 18:54:22'),
(35, 'Event 32', 'Tech Creators', 'Sydney, Australia', '2025-08-05', '2025-08-07', '2025-08-03', 'Technology professionals and enthusiasts', '2025-02-13 18:54:22'),
(36, 'Event 33', 'Future of Business', 'San Francisco, USA', '2025-08-10', '2025-08-12', '2025-08-08', 'Business leaders and entrepreneurs', '2025-02-13 18:54:22'),
(37, 'Event 34', 'AI Summit', 'New York, USA', '2025-08-15', '2025-08-17', '2025-08-13', 'AI researchers and professionals', '2025-02-13 18:54:22'),
(38, 'Event 35', 'Design Future', 'London, UK', '2025-08-20', '2025-08-22', '2025-08-18', 'Design students and industry leaders', '2025-02-13 18:54:22'),
(39, 'Event 36', 'Startup Challenge', 'Paris, France', '2025-08-25', '2025-08-27', '2025-08-23', 'Entrepreneurs and early-stage startups', '2025-02-13 18:54:22'),
(40, 'Event 37', 'Global Innovation', 'Tokyo, Japan', '2025-09-01', '2025-09-03', '2025-08-30', 'Innovators from all fields', '2025-02-13 18:54:22'),
(41, 'Event 38', 'Tech Workshop', 'San Francisco, USA', '2025-09-05', '2025-09-07', '2025-09-03', 'Tech professionals and learners', '2025-02-13 18:54:22'),
(42, 'Event 39', 'Business Growth', 'Berlin, Germany', '2025-09-10', '2025-09-12', '2025-09-08', 'Business leaders and growth experts', '2025-02-13 18:54:22'),
(43, 'Event 40', 'Robotics Expo', 'Toronto, Canada', '2025-09-15', '2025-09-17', '2025-09-13', 'Robotics enthusiasts and professionals', '2025-02-13 18:54:22'),
(44, 'Event 41', 'Leadership Summit', 'Paris, France', '2025-09-20', '2025-09-22', '2025-09-18', 'Aspiring and established leaders', '2025-02-13 18:54:22'),
(45, 'Event 42', 'Tech Visionaries', 'Los Angeles, USA', '2025-09-25', '2025-09-27', '2025-09-23', 'Tech professionals and entrepreneurs', '2025-02-13 18:54:22'),
(46, 'Event 43', 'Future of AI', 'Berlin, Germany', '2025-10-01', '2025-10-03', '2025-09-29', 'AI experts and researchers', '2025-02-13 18:54:22'),
(47, 'Event 44', 'Startup Expo', 'Sydney, Australia', '2025-10-05', '2025-10-07', '2025-10-03', 'Entrepreneurs and startup teams', '2025-02-13 18:54:22'),
(48, 'Event 45', 'Innovators Meetup', 'San Francisco, USA', '2025-10-10', '2025-10-12', '2025-10-08', 'Open to all innovators', '2025-02-13 18:54:22'),
(49, 'Event 46', 'AI Tech Talk', 'New York, USA', '2025-10-15', '2025-10-17', '2025-10-13', 'AI researchers and developers', '2025-02-13 18:54:22'),
(50, 'Event 47', 'Future World Expo', 'London, UK', '2025-10-20', '2025-10-22', '2025-10-18', 'Professionals from all industries', '2025-02-13 18:54:22'),
(51, 'Event 48', 'Tech Career Fair', 'Paris, France', '2025-10-25', '2025-10-27', '2025-10-23', 'Job seekers and tech professionals', '2025-02-13 18:54:22'),
(52, 'Event 49', 'Business Innovation', 'Toronto, Canada', '2025-10-30', '2025-11-01', '2025-10-28', 'Innovators and business leaders', '2025-02-13 18:54:22'),
(53, 'Event 50', 'Digital Future', 'Los Angeles, USA', '2025-11-05', '2025-11-07', '2025-11-03', 'Digital marketing experts and entrepreneurs', '2025-02-13 18:54:22'),
(54, 'DEMO2', 'DEMO2', 'DEMO2', '2025-02-15', '2025-02-15', '2025-02-15', 'DEMO', '2025-02-15 10:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `event_applications`
--

CREATE TABLE `event_applications` (
  `application_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `location` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_applications`
--

INSERT INTO `event_applications` (`application_id`, `event_id`, `first_name`, `last_name`, `birthdate`, `gender`, `location`, `country`, `department`, `email`, `phone_number`, `created_at`) VALUES
(1, 4, 'Ahmad', 'Morningstar', '2006-03-21', 'Male', 'Hawler, 120m', 'Kurdistan', 'Computer', 'Ahmadkurdking99@gmail.com', '07512175799', '2025-02-13 18:54:53'),
(1044, 15, 'Henry', 'Johnson', '2001-11-22', 'Male', 'East New Raymond', 'Cyprus', 'enforcement', 'davismichael@west.com', '(646)850-9511', '2025-01-30 21:00:00'),
(1586, 23, 'Eric', 'Adams', '1993-11-21', 'Male', 'South Meganland', 'Brunei', 'customer service', 'taylorchristine@adams.com', '0093131566344', '2025-02-03 21:00:00'),
(2202, 19, 'Derek', 'Morris', '1998-09-11', 'Male', 'Port Charlestown', 'Falkland Islands', 'maintenance', 'sean67@taylor-jones.com', '0856351615', '2025-02-04 21:00:00'),
(2820, 6, 'Lindsay', 'Mitchell', '2000-02-19', 'Female', 'Nelsonstad', 'New Zealand', 'quite', 'hallandrea@lopez-green.com', '001-113-979-1590x707', '2025-01-26 21:00:00'),
(3226, 12, 'Bonnie', 'Powell', '1994-01-20', 'Female', 'Deanfort', 'Oman', 'activity', 'tylerpeters@moreno.com', '2555961716', '2025-01-28 21:00:00'),
(3232, 11, 'Kathryn', 'Johnson', '1990-01-10', 'Female', 'Conradtown', 'San Marino', 'tell', 'jessicamiranda@thomas.org', '7349275857', '2025-01-01 21:00:00'),
(3327, 16, 'Olivia', 'Hernandez', '2002-10-02', 'Female', 'Rosenthalport', 'Poland', 'communication', 'johnsoncarla@hotmail.com', '(928)453-9050x8183', '2025-01-12 21:00:00'),
(3811, 18, 'Sophia', 'Evans', '1991-04-04', 'Female', 'Port Jeffrey', 'Anguilla', 'sales', 'markjohnson@casey-woods.com', '258.845.8109', '2025-02-02 21:00:00'),
(4814, 21, 'Aidan', 'Garcia', '1999-08-05', 'Male', 'North Robertport', 'Malta', 'development', 'paul76@gmail.com', '254-367-9815', '2025-02-06 21:00:00'),
(4907, 8, 'Glenn', 'King', '1987-10-31', 'Female', 'South Matthewshire', 'Jersey', 'finally', 'taylorchristine@hotmail.com', '(034)686-0203x66423', '2025-01-17 21:00:00'),
(5068, 14, 'Paige', 'Anderson', '1993-12-14', 'Female', 'Jacksonborough', 'United Kingdom', 'management', 'harrison88@lopez.com', '(046)236-6791x1613', '2025-01-15 21:00:00'),
(5225, 4, 'Jessica', 'Johnson', '1995-04-01', 'Male', 'Marcberg', 'Morocco', 'collection', 'ppalmer@hotmail.com', '(142)303-1809x3880', '2025-02-10 21:00:00'),
(7222, 22, 'Brianna', 'Nelson', '1988-12-14', 'Female', 'East Johnburgh', 'Greece', 'communication', 'robertsmichelle@yahoo.com', '7134262923', '2025-02-01 21:00:00'),
(8085, 20, 'Nina', 'Wagner', '1994-06-24', 'Female', 'Alexandriaview', 'Malta', 'networking', 'jeremybailey@clark.com', '(136)477-8315', '2025-01-28 21:00:00'),
(8131, 13, 'Michelle', 'Acevedo', '2003-04-21', 'Male', 'South Matthewborough', 'Bulgaria', 'garden', 'lallen@yahoo.com', '(258)957-5892', '2025-02-04 21:00:00'),
(8942, 7, 'Angela', 'Sanchez', '1969-05-08', 'Male', 'Jessicastad', 'Saint Vincent and the Grenadines', 'letter', 'zhunt@gmail.com', '751.726.3238', '2025-01-31 21:00:00'),
(8962, 10, 'Susan', 'Nunez', '1979-09-29', 'Female', 'Port Derek', 'Rwanda', 'involve', 'jonathan52@carney.com', '(725)398-4245', '2025-02-03 21:00:00'),
(9223, 9, 'Alexander', 'Hayes', '1965-06-28', 'Female', 'West Jeffrey', 'Vietnam', 'consumer', 'gregory73@gmail.com', '003.137.4468', '2025-02-03 21:00:00'),
(9360, 5, 'Grace', 'Rojas', '1974-07-29', 'Male', 'Joseberg', 'Equatorial Guinea', 'letter', 'anthony58@yahoo.com', '+1-890-983-1757x5856', '2025-01-18 21:00:00'),
(9820, 17, 'Marcus', 'Roberts', '1997-08-30', 'Male', 'North Davidborough', 'Armenia', 'coding', 'bwalker@carter.com', '001-785-560-2160x203', '2025-02-08 21:00:00'),
(9821, 9, 'Ahmad', 'Adil', '2001-02-21', 'Male', 'Hawler, 120m', 'Kurdistan', 'Computer', 'Ahmadkurdking99@gmail.com', '07512175799', '2025-02-13 19:36:13'),
(9822, 38, 'Ahmad', 'Morningstar', '2002-03-22', 'Male', 'Hawler, 120m', 'Kurdistan', 'Computer', 'Ahmadkurdking99@gmail.com', '07512175799', '2025-02-13 19:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `requirements` text NOT NULL,
  `grade` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `company_name`, `department`, `location`, `description`, `requirements`, `grade`) VALUES
(1, 'Software Engineer', 'TechCorp', 'IT', 'New York', 'Develop and maintain software applications.', 'Experience with PHP, JavaScript, and SQL.', 85),
(2, 'Marketing Manager', 'BrandBoost', 'Marketing', 'Los Angeles', 'Lead marketing campaigns and brand strategies.', 'Strong analytical and leadership skills.', 78),
(3, 'Data Analyst', 'DataWorks', 'Analytics', 'San Francisco', 'Analyze business data and generate reports.', 'Proficiency in Python and SQL.', 90),
(4, 'HR Specialist', 'PeopleFirst', 'Human Resources', 'Chicago', 'Manage recruitment and employee relations.', 'Experience in HR policies and practices.', 75),
(5, 'Project Manager', 'BuildCorp', 'Construction', 'Houston', 'Oversee construction projects from start to finish.', 'PMP certification preferred.', 88),
(6, 'Graphic Designer', 'CreativeStudio', 'Design', 'Miami', 'Create visual content for digital and print media.', 'Proficiency in Adobe Creative Suite.', 80),
(7, 'Accountant', 'FinancePros', 'Finance', 'Dallas', 'Manage financial records and prepare reports.', 'CPA certification required.', 82),
(8, 'Mechanical Engineer', 'AutoTech', 'Engineering', 'Detroit', 'Design and develop automotive components.', 'Knowledge of CAD software and manufacturing.', 87),
(9, 'Customer Service Rep', 'HelpDesk', 'Customer Support', 'Phoenix', 'Assist customers with product-related inquiries.', 'Strong communication skills required.', 70),
(10, 'Sales Executive', 'SalesForce', 'Sales', 'Seattle', 'Develop sales strategies and close deals.', 'Proven sales experience.', 83),
(11, 'Cybersecurity Analyst', 'SecureNet', 'IT Security', 'New York', 'Monitor and prevent security breaches.', 'Experience in network security.', 91),
(12, 'Business Analyst', 'BizGrowth', 'Business', 'Boston', 'Analyze market trends and business needs.', 'Strong problem-solving skills.', 86),
(13, 'Civil Engineer', 'InfraBuild', 'Engineering', 'Denver', 'Design and oversee infrastructure projects.', 'Experience with structural engineering.', 84),
(14, 'Content Writer', 'MediaHouse', 'Content', 'San Diego', 'Write and edit engaging content.', 'Excellent writing and grammar skills.', 77),
(15, 'Network Engineer', 'NetSolutions', 'Networking', 'San Jose', 'Maintain and optimize network infrastructure.', 'CCNA certification preferred.', 89),
(16, 'Pharmacist', 'MediCare', 'Healthcare', 'Philadelphia', 'Dispense medication and provide patient guidance.', 'Pharmacy degree required.', 92),
(17, 'Legal Advisor', 'LawFirmX', 'Legal', 'Washington DC', 'Provide legal counsel and draft contracts.', 'Licensed attorney with experience.', 88),
(18, 'Electrical Engineer', 'PowerGrid', 'Engineering', 'Austin', 'Design and test electrical systems.', 'Knowledge of circuit design.', 85),
(19, 'Digital Marketing Specialist', 'AdVantage', 'Marketing', 'Portland', 'Create and manage online advertising campaigns.', 'Experience in SEO and Google Ads.', 79),
(20, 'Quality Assurance Tester', 'SoftTest', 'IT', 'Las Vegas', 'Test software applications for bugs and errors.', 'Attention to detail and debugging skills.', 81),
(21, 'Software Developer', 'CodeCrafters', 'IT', 'Chicago', 'Develop web and mobile applications.', 'Experience in React and Node.js.', 88),
(22, 'UX/UI Designer', 'DesignPro', 'Design', 'Miami', 'Create intuitive and user-friendly designs.', 'Proficiency in Figma and Sketch.', 82),
(23, 'Operations Manager', 'LogiTech', 'Operations', 'Seattle', 'Oversee business operations and logistics.', 'Strong leadership skills.', 85),
(24, 'Medical Assistant', 'HealthFirst', 'Healthcare', 'San Francisco', 'Assist doctors in patient care.', 'Medical certification required.', 78),
(25, 'HR Manager', 'HR Solutions', 'Human Resources', 'Los Angeles', 'Manage HR processes and recruitment.', 'Experience with HR software.', 86),
(26, 'Frontend Developer', 'WebWave', 'IT', 'Boston', 'Develop responsive UI for web apps.', 'Experience in HTML, CSS, JavaScript.', 87),
(27, 'Back-end Developer', 'ServerSide', 'IT', 'New York', 'Manage databases and API integrations.', 'Experience in PHP and MySQL.', 90),
(28, 'Database Administrator', 'DataGuard', 'IT', 'Houston', 'Optimize and secure databases.', 'Experience in PostgreSQL and NoSQL.', 89),
(29, 'Cloud Engineer', 'CloudNet', 'IT', 'Austin', 'Manage cloud-based infrastructure.', 'AWS certification preferred.', 91),
(30, 'Game Developer', 'GameStudioX', 'Game Development', 'San Francisco', 'Create engaging video games.', 'Experience in Unity or Unreal Engine.', 85),
(31, 'AI Engineer', 'DeepMindTech', 'AI', 'Seattle', 'Develop machine learning algorithms.', 'Experience with TensorFlow and AI models.', 92),
(32, 'Biochemist', 'BioLab', 'Research', 'San Diego', 'Conduct biochemical research and analysis.', 'PhD in Biochemistry preferred.', 84),
(33, 'Mechanical Technician', 'AutoFix', 'Engineering', 'Detroit', 'Repair and maintain mechanical systems.', 'Technical diploma required.', 77),
(34, 'Customer Support Manager', 'ClientCare', 'Customer Support', 'Phoenix', 'Lead customer service team.', 'Excellent communication skills.', 80),
(35, 'Financial Analyst', 'WallStreetPro', 'Finance', 'New York', 'Analyze financial data and trends.', 'CFA certification preferred.', 89),
(36, 'Electrician', 'PowerFix', 'Engineering', 'Dallas', 'Install and repair electrical systems.', 'Licensed electrician.', 83),
(37, 'Architect', 'BuildDesigns', 'Architecture', 'Chicago', 'Design commercial and residential buildings.', 'Degree in Architecture.', 88),
(38, 'Dentist', 'SmileCare', 'Healthcare', 'Philadelphia', 'Perform dental procedures and cleanings.', 'DDS degree required.', 90),
(39, 'Teacher', 'EduTech', 'Education', 'Los Angeles', 'Teach STEM subjects in high school.', 'Teaching certification required.', 87),
(40, 'Environmental Scientist', 'EcoSafe', 'Research', 'Boston', 'Study environmental impacts and solutions.', 'Master’s degree in Environmental Science.', 91),
(41, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 100),
(42, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 100),
(43, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 100),
(44, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 100),
(45, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 100),
(46, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 100),
(47, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 100),
(48, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 100),
(49, 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 'DEMO', 100),
(50, 'DEMO2', 'DEMO2', 'DEMO2', 'DEMO2', 'DEMO2', 'DEMO2', 100);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `location`, `message`, `created_at`) VALUES
(1, 1, 'Ahmad', 'Morningstar', 'Ahmadkurdking99@gmail.com', '07512175799', 'Hawler, 120m', 'Meow meow', '2025-02-13 18:31:26'),
(2, 1, 'Ahmad', 'Morningstar', 'Ahmadkurdking99@gmail.com', '7512175799', 'Hawler, 120m', '22', '2025-02-13 18:38:31'),
(3, 1, 'Ahmad', 'Morningstar', 'Ahmadkurdking99@gmail.com', '7512175799', 'Hawler, 120m', '22', '2025-02-13 18:38:58'),
(4, 1, 'Ahmad', 'Morningstar', 'Ahmadkurdking99@gmail.com', '07512175799', 'Hawler, 120m', 'MEOWWWWWWWWWWW', '2025-02-14 12:24:50'),
(5, 1, 'Ahmad', 'Adil', 'Ahmad99@gmail.com', '751', 'MEOW', 'hello?', '2025-02-15 17:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('mardin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`job_id`,`user_id`),
  ADD UNIQUE KEY `unique_application` (`user_id`,`job_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_applications`
--
ALTER TABLE `event_applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `event_applications`
--
ALTER TABLE `event_applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9823;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `event_applications`
--
ALTER TABLE `event_applications`
  ADD CONSTRAINT `event_applications_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
