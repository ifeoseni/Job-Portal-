-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2022 at 02:15 PM
-- Server version: 5.7.38
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intervie_companyjobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `aboutadvert` varchar(50) NOT NULL,
  `adsheader` varchar(100) NOT NULL,
  `adsdescription` text NOT NULL,
  `adscontact` varchar(50) NOT NULL,
  `adsimage` text NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `adstatus` varchar(20) NOT NULL,
  `dateapplied` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `aboutadvert`, `adsheader`, `adsdescription`, `adscontact`, `adsimage`, `name`, `email`, `adstatus`, `dateapplied`) VALUES
(1, 'Excel Training', 'How to ace excel questions', 'Excel traianing by all of us', '08175461196', 'Asus-E210M-1.jpg', 'Ezinne', 'ezinne@gmail.com', '', '20/09/2021'),
(2, 'Excel Training', 'How to ace excel questions', 'What Your Ads Is About. Please let it benefit job applicants. ', '08175461196', 'alexaranking.PNG', 'Ezinne', 'ezinne@gmail.com', '', '20/09/2021');

-- --------------------------------------------------------

--
-- Table structure for table `anonymousjobs`
--

CREATE TABLE `anonymousjobs` (
  `id` int(11) NOT NULL,
  `companyname` varchar(90) NOT NULL,
  `jobposteremail` varchar(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `jobposter` text NOT NULL,
  `level` varchar(40) NOT NULL,
  `industry` varchar(40) NOT NULL,
  `salary` int(11) NOT NULL,
  `yearsofexperience` int(5) NOT NULL,
  `availablevacancy` int(20) NOT NULL,
  `minimumqualification` varchar(40) NOT NULL,
  `jobtype` varchar(25) NOT NULL,
  `preferredcandidatelocation` varchar(20) NOT NULL,
  `remotestatus` varchar(5) NOT NULL,
  `applicationlink` text NOT NULL,
  `deadline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anonymousjobs`
--

INSERT INTO `anonymousjobs` (`id`, `companyname`, `jobposteremail`, `title`, `description`, `jobposter`, `level`, `industry`, `salary`, `yearsofexperience`, `availablevacancy`, `minimumqualification`, `jobtype`, `preferredcandidatelocation`, `remotestatus`, `applicationlink`, `deadline`) VALUES
(1, 'Anonymous', 'ezinne@gmail.com', 'Stylist', 'Style female hair', '', 'Entry Level', 'Fashion', 30000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', 'ifeoseni@gmail.com', '2020-09-24'),
(2, 'Prayer warrior', 'dayo@gmail.com', 'Praying', 'Prayer works', '', 'Executive', 'religion', 300000, 3, 2, 'SSCE', 'volunteeringjob', 'Not stated.', '', 'www.google.com', '2021-10-01'),
(3, 'Tech lead', 'dayo@gmail.com', 'CTO', 'Handle tech', '', 'Executive', 'Finance', 300000, 4, 1, 'SSCE', 'volunteeringjob', 'Not stated.', '', 'https://google.com', '2021-10-09'),
(4, 'Tech head', 'dayo@gmail.com', 'CTO', 'Please give the full job description here', 'Bluetooth Speaker G30.jpg', 'Mid Level', 'Finance', 20000, 4, 1, 'PhD', 'paidinternship', 'Not stated.', '', 'facebook.com', '2021-11-20'),
(5, 'InterviewStories', 'ezinne@gmail.com', 'Web master', 'Hi', '', 'Internship', 'Software', 10000, 0, 1, 'College Degree', 'volunteeringjob', 'Not stated.', '', '', '2021-11-27'),
(6, 'InterviewStories', 'ezinne@gmail.com', 'Web masters', 'Please give the full job description here', '', 'Internship', 'Software', 10000, 0, 1, 'College Degree', 'paidjob', 'Not stated.', '', '', '2021-09-30'),
(7, 'InterviewStories', 'ezinne@gmail.com', 'Web masters', 'Please give the full job description here', 'index.jpg', '', 'Software', 10000, 0, 1, '', 'paidjob', 'Not stated.', '', '', '2021-09-30'),
(8, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(14, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(15, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(16, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(17, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(18, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(19, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(20, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(21, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(22, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(23, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(24, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(25, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(26, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(27, 'Boys', 'ezinne@gmail.com', 'bus', 'here', 'hp726 keyboard.PNG', 'Mid Level', 'computer', 60000, 1, 1, 'SSCE', 'paidjob', 'Not stated.', '', '', '2021-11-20'),
(28, 'king of boys', 'ezinne@gmail.com', 'bus', 'help us', 'beats  ep bluetooth headset.jpg', '', 'computer', 60000, 1, 1, '', 'paidjob', 'Not stated.', '', '', '2021-12-11'),
(29, 'king of boys', 'ezinne@gmail.com', 'bus', 'help us', 'beats  ep bluetooth headset.jpg', '', 'computer', 60000, 1, 1, '', 'paidjob', 'Not stated.', '', '', '2021-12-11'),
(30, 'Tech', 'bobo@gmail.com', 'Database admin', 'Manage db', '', 'Executive', 'Tech', 900000, 6, 2, 'Masters', 'paidjob', 'Not stated.', '', '', '2021-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `createdjobs`
--

CREATE TABLE `createdjobs` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `level` varchar(40) NOT NULL,
  `industry` varchar(40) NOT NULL,
  `salary` int(11) NOT NULL,
  `yearsofexperience` int(5) NOT NULL,
  `availablevacancy` int(20) NOT NULL,
  `minimumqualification` varchar(40) NOT NULL,
  `jobtype` varchar(25) NOT NULL,
  `preferredcandidatelocation` varchar(20) NOT NULL,
  `remotestatus` varchar(5) NOT NULL,
  `applicationlink` text NOT NULL,
  `contactemail` varchar(40) NOT NULL,
  `contactphone` varchar(15) NOT NULL,
  `deadline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `createdjobs`
--

INSERT INTO `createdjobs` (`id`, `name`, `email`, `title`, `description`, `level`, `industry`, `salary`, `yearsofexperience`, `availablevacancy`, `minimumqualification`, `jobtype`, `preferredcandidatelocation`, `remotestatus`, `applicationlink`, `contactemail`, `contactphone`, `deadline`) VALUES
(1, 'dayo@gmail.com', 'dayo@gmail.com', 'Intern', 'Web intern', 'Entry Level', 'IT', 500000, 2, 2, 'SSCE', 'paidjob', 'Oyo', 'yes', '', 'ifeoseni@gmail.com', '09072025732', '2021-09-04'),
(2, 'dayo@gmail.com', 'dayo@gmail.com', 'Intern', 'Web dev', 'Entry Level', 'IT', 50000, 2, 5, 'College Degree', 'paidinternship', '- None -', 'no', '', 'ifeoseni@gmail.com', '08175461196', '2021-09-30'),
(3, 'dayo@gmail.com', 'dayo@gmail.com', 'HR Manager', 'Handle HR Department', 'Executive', 'Tech', 150000, 2, 5, 'College Degree', 'paidjob', '', '', '', '', '', '2021-10-05'),
(4, 'dayo@gmail.com', 'dayo@gmail.com', 'Project Manager', 'Handle projects', 'Contract', 'Software', 50000, 3, 2, 'Masters', 'paidjob', '', '', '', '', '', '2021-10-09'),
(5, 'dayo@gmail.com', 'dayo@gmail.com', 'Software tester', 'Test our softwares', 'Executive', 'Software', 60000, 2, 10, 'College Degree', 'paidjob', '', '', '', '', '', '2021-11-02'),
(6, 'dayo@gmail.com', 'dayo@gmail.com', ' IT intern', 'Someone ready to learn', 'Entry Level', 'Engineering', 20000, 0, 2, 'SSCE', 'paidinternship', '', '', '', '', '', '2021-09-16'),
(7, 'dayo@gmail.com', 'dayo@gmail.com', 'Graphics designer', 'Design graphics for us', 'Entry Level', 'Design', 33000, 1, 1, 'College Degree', 'paidjob', '', '', '', '', '', '2021-09-23'),
(8, 'bobo@gmail.com', 'bobo@gmail.com', 'Sales Rep', 'Edo', 'Entry Level', 'Sales', 50000, 1, 3, 'SSCE', 'paidjob', '', '', '', '', '', '2021-09-20'),
(9, 'bobo@gmail.com', 'bobo@gmail.com', 'Web master', 'Handle our websites', 'Contract', 'Software', 50000, 2, 1, 'SSCE', 'paidjob', '', '', '', '', '', '2021-09-24'),
(10, 'Charms', '1public@bk.ru', 'Cleaner', 'Cleaner', 'Contract', 'Housing', 50000, 2, 250, 'SSCE', 'paidjob', 'All states are desir', '', '', 'nxndbdbdbdb@hk.ru', '848484747474', '2022-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `emaillist`
--

CREATE TABLE `emaillist` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emaillist`
--

INSERT INTO `emaillist` (`id`, `name`, `email`) VALUES
(1, 'Adedeji', 'ifeoseni@gmail.com'),
(2, 'Ezinne', 'emenoguezinne97@gmail.com'),
(3, 'Jamiu', 'jamiu@gmail.com'),
(4, 'Jboy@Gboy.vom', 'ggg@gboi.com'),
(5, ' Ipo', 'hvk25249@bcafoo.com'),
(6, 'Kola', 'kola@gmail.com'),
(7, 'Vvv', 'vva@gmail.com'),
(8, 'Subscribers', 'sub@gmail.com'),
(9, 'Bode', 'bode@gmail.com'),
(10, 'Lol', 'lsddd@gmail.com'),
(11, ' Ss', 'ss@ghhh.cpm'),
(12, 'Ddd', 'Zzxd@dfff.com'),
(13, 'Www', 'kfvg@fgd.cuh'),
(14, 'Cola', 'cola@gmilc.cvv'),
(15, 'Fff', 'ccc@gnagg.gvc'),
(16, 'Ife', 'ddd@ddd.cig'),
(17, 'Ccc', 'dss@gmil.com'),
(18, 'Ak@gmail.com', 'hhh@gnv.com'),
(19, 'Bbvb', 'ygg@fgg.con'),
(20, 'Fff', 'rfft@gsrxdd.ckw'),
(21, 'kossi', 'kossi@gmail.com'),
(22, 'bos@gmail.cdd', 'bos@gmail.cdd'),
(23, 'kola', 'lols@lsd.com'),
(24, 'Jsf', 'jsv@vbhj.vfd'),
(25, 'SSS', 'SSS@GDSDS.CDS'),
(26, 'Kk', 'k@gmail.ddd'),
(27, 'Rrr', 'sdggg@dfffg.bbs'),
(28, 'ds', 'qwasds@gsdd.csf'),
(29, 'Rtt', 'khgg@sgdg.hhr'),
(30, 'cghjh', 'wasd@sdftr.vdd'),
(31, 'D2', 'd2@gboh.com'),
(32, 'Ggg', 'gg@dddd.cvb'),
(33, 'Bhhh@fhh.bjj', 'Bhhh@fhh.bjj'),
(34, 'bk', 'bola@gmail.cdom'),
(35, 'Kkk', 'kkk@dfgg.cdg'),
(36, 'ddf', 'ifeoseni@gmail.coms'),
(37, 'Vbbb', 'hhb@fgg.vdb');

-- --------------------------------------------------------

--
-- Table structure for table `jobapplication`
--

CREATE TABLE `jobapplication` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `jobid` varchar(11) NOT NULL,
  `companyname` varchar(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `deadline` text NOT NULL,
  `iappliedon` text NOT NULL,
  `whyiamqualified` text NOT NULL,
  `qualification` text NOT NULL,
  `whyme` text NOT NULL,
  `mytopskills` text NOT NULL,
  `salaryiwant` int(11) NOT NULL,
  `proposedsalary` int(11) NOT NULL,
  `cviwanttouse` text NOT NULL,
  `response` varchar(100) NOT NULL,
  `reasongiven` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobapplication`
--

INSERT INTO `jobapplication` (`id`, `name`, `email`, `jobid`, `companyname`, `title`, `deadline`, `iappliedon`, `whyiamqualified`, `qualification`, `whyme`, `mytopskills`, `salaryiwant`, `proposedsalary`, `cviwanttouse`, `response`, `reasongiven`) VALUES
(2, 'Ezinne', 'ezinne@gmail.com', '2', 'dayo@gmail.com', 'Intern', '2021-09-30', '2021-09-07', 'I am a good intern', 'Public health...', 'I am pretty ambitious', 'Codibg', 30000, 50000, 'Ezinne Mirian EMENOGU.pdf', 'Rejected', 'Applicants needed chosen'),
(8, 'Ezinne', 'ezinne@gmail.com', '9', 'bobo@gmail.com', 'Web master', '2021-09-24', '2021-09-07', 'Because I sabi work', 'Ccna', 'I have been a web master for 10 years', 'Codibg', 20, 50, 'Ezinne Mirian EMENOGU.pdf', '', ''),
(10, 'Ezinne', 'ezinne@gmail.com', '4', 'dayo@gmail.com', 'Project Manager', '2021-10-09', '2021-09-07', 'Hello', 'Ccna', 'I sabi work well', 'Smart', 60000, 50, 'Ezinne Mirian EMENOGU.pdf', '', ''),
(12, 'Ezinne', 'ezinne@gmail.com', '8', 'bobo@gmail.com', 'Sales Rep', '2021-09-20', '2021-09-07', 'Because I am Ezinne Mirian', 'Ccc', 'Ddd', 'Testingvvv', 40000, 50, 'Ezinne Mirian EMENOGU.pdf', 'Accepted', 'We can proceed now'),
(16, 'Ezinne', 'ezinne@gmail.com', '5', 'dayo@gmail.com', 'Software tester', '2021-11-02', '2021-09-08', 'I am good', 'Vsc', 'Greatness is in me', 'Codibg', 3000000, 60, 'Ezinne Mirian EMENOGU.pdf', '', ''),
(18, 'Ezinne', 'ezinne@gmail.com', '6', 'dayo@gmail.com', ' IT intern', '2021-09-16', '2021-09-08', 'Because I sabi work', 'Ccc', 'I sabi work', 'Smart', 50000, 20000, 'Ezinne Mirian EMENOGU.pdf', '', ''),
(20, 'Ezinne', 'ezinne@gmail.com', '7', 'dayo@gmail.com', 'Graphics designer', '2021-09-23', '2021-09-08', 'I am a good intern', 'Boss', 'I am pretty', 'Testing', 90000, 33000, 'Ezinne Mirian EMENOGU.pdf', '', ''),
(22, 'Ada', 'ada@gmail.com', '7', 'dayo@gmail.com', 'Graphics designer', '2021-09-23', '2021-09-09', 'Hello', 'Ccna', 'I sabi work well', 'Smart', 5581110, 33000, 'Gad', '', ''),
(23, 'ife', 'ife@gmail.com', '10', 'Charms', 'Cleaner', '2022-04-30', '2022-04-20', 'Because I am good at cleaning', 'Cleaning document', 'I am availavle', 'Moppknh', 50000, 50000, 'https://google.coo', 'Accepted', 'You did well');

-- --------------------------------------------------------

--
-- Table structure for table `messageus`
--

CREATE TABLE `messageus` (
  `id` int(11) NOT NULL,
  `contactname` varchar(40) NOT NULL,
  `contactemail` varchar(40) NOT NULL,
  `contactphone` varchar(15) NOT NULL,
  `messagesubject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `datemessaged` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messageus`
--

INSERT INTO `messageus` (`id`, `contactname`, `contactemail`, `contactphone`, `messagesubject`, `message`, `datemessaged`) VALUES
(1, 'Nicholas', 'ifeoseni@gmail.com', '08175461196', 'Use Google Kit', 'Hi Nicholas, hope you are good', '23/08/2021'),
(2, 'Ifeoluwa Oseni', 'ifeoseni@gmail.com', '08175461196', 'Boss man', 'Chief', '23/08/2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `accounttype` varchar(20) NOT NULL,
  `state` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `picture` text NOT NULL,
  `aboutuser` varchar(40) NOT NULL,
  `testimonial` text NOT NULL,
  `dateofbirth` varchar(30) NOT NULL,
  `userdocument` text NOT NULL,
  `linktoonlinepresence` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gender`, `accounttype`, `state`, `address`, `picture`, `aboutuser`, `testimonial`, `dateofbirth`, `userdocument`, `linktoonlinepresence`, `password`) VALUES
(1, 'Ifeoluwa', 'ifeoseni@gmail.com', '08175461196', '', 'individual', 'Oyo', '', 'avxxxx - Copy.jpg', 'Webmaster', 'I know this platform will help thousands of Nigerians find good jobs', '0', '', '', '8dcdd82f43e2f9d348a6507dc8c4badd'),
(2, 'Ezinne', 'ezinne@gmail.com', '08175461197', 'Female', 'individual', 'Akwa Ibom', 'Uyo', 'sy-bt1615 wireless headphones.jpg', 'Public Health', 'They will help you find the best public health jobs around', '2021-08-20', 'Ezinne Mirian EMENOGU.pdf', 'https://LinkedIn.com', '8dcdd82f43e2f9d348a6507dc8c4badd'),
(3, 'Gabriel', 'ifeosenibusiness@gmail.com', '08175461198', '', 'individual', 'Akwa Ibom', '', '', 'Health', 'We have got the best staff from this platform', '0', '', '', '2821e29f7fb82f182ecca8d8c9e681cf'),
(4, 'Nicholas', 'Nicholas@gmail.com', '08175461199', '', 'individual', 'Akwa Ibom', '', '', '', '', '0', '', '', '7aee268bc23bbbd9ad4cc03edb6d1a4e'),
(5, 'Ada', 'ada@gmail.com', '08075013555', '', 'individual', 'Oyo', '', '', '', '', '0', '', '', '08e24671d7cc52b854a86b9e7d6dd73b'),
(6, 'dayo@gmail.com', 'dayo@gmail.com', '08175461196', 'Male', 'company', 'Anambra', 'Ibom hall', 'designer.PNG', 'IT', 'Technology', '2021-08-10', '', 'https://interviewstories.org', '881c164072a819f2d5c7b8ae13dfa3dd'),
(7, 'bobo@gmail.com', 'bobo@gmail.com', '08175461196', '', 'company', 'Edo', 'Benin city', 'apple-touch-icon.png', 'IT', 'Great platform', '2019-09-18', 'National Youth Service Corps.pdf', '', 'e1ce76f012018c45601323addbeae4f6'),
(8, 'Ak@gmail.com', 'Ak@gmail.com', '08175461196', '', 'individual', 'Oyo', '', '', '', '', '', '', '', 'fcaa8b03de3d269ac81b4e194b47a3c4'),
(9, 'Ak1@gmail.com', 'Ak1@gmail.com', '08175461196', '', 'individual', 'Oyo', '', '', '', '', '', '', '', '6c5bc0af6df0c67a8b6e1599d51ff4f4'),
(10, 'ak2@gmail.com', 'ak2@gmail.com', '08175461196', '', 'individual', 'Akwa Ibom', '', '', '', '', '', '', '', '0770e9754703a99a6c1a67d53cd37e3d'),
(11, 'Test Company', 'ojshollyofficial@gmail.com', '08029054433', '', 'individual', 'Plateau', 'Test Address', 'Screenshot (2).png', '', '', '1967-08-31', '', '', 'd4c4bce81e47efa178c7b514f8004778'),
(13, 'EcoTech Nigeria', 'delightsolutionsnigeria@gmail.com', '08077109077', 'Male', 'individual', 'Ogun', 'Block 17, Samuel Ajayi Street, The Bells, Ota, Ogun State', 'SECURITY IS OUR LANGUAGE.jpg', '', '', '1999-09-07', '', 'https://', '6bcfc3e48f58b875fd09001d5d2e1c64'),
(14, 'Lordfriar', 'herrdamilord@gmail.com', '08134367973', 'Male', 'individual', 'Osun', 'Osogbo', '939630cc56384035831be670d3857eba.jpg', '', '', '2000-05-03', '', 'https://www.linkedin.com/mwlite/in/damilare-abogunrin-344b50187', 'ce16fe4978c0682c3ba03d4e99e83fe3'),
(15, 'ife', 'ife@gmail.com', '08175461196', 'Male', 'individual', 'Anambra', 'Uruan', '', '', '', '2022-04-21', 'AmaPromiscom.pdf', 'https://linkedin.com/in/ifeoluwaoseni', 'c4ca4238a0b923820dcc509a6f75849b'),
(16, 'Charms', '1public@bk.ru', '07034964463', 'Male', 'company', 'HI', 'Address: 45-265 William Henry Rd', 'IMG_20220413_221825.png', '', '', '1976-04-20', '', 'https://Facebook.com/clo', '3028135879f0b93efe7d1be10b7a4d75');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anonymousjobs`
--
ALTER TABLE `anonymousjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `createdjobs`
--
ALTER TABLE `createdjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emaillist`
--
ALTER TABLE `emaillist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobapplication`
--
ALTER TABLE `jobapplication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messageus`
--
ALTER TABLE `messageus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anonymousjobs`
--
ALTER TABLE `anonymousjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `createdjobs`
--
ALTER TABLE `createdjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emaillist`
--
ALTER TABLE `emaillist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `jobapplication`
--
ALTER TABLE `jobapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messageus`
--
ALTER TABLE `messageus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
