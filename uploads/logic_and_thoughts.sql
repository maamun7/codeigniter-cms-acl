-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2014 at 09:41 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `logic_and_thoughts`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_name` varchar(255) NOT NULL,
  `featured_image` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_latest_news` tinyint(1) NOT NULL,
  `is_news_scroller_view` tinyint(1) NOT NULL,
  `is_home_view` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modyfied_date` datetime NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `featured_image`, `image_path`, `category_id`, `status`, `is_latest_news`, `is_news_scroller_view`, `is_home_view`, `created_date`, `modyfied_date`) VALUES
(1, 'Default', 'R3O4c-1401790476.jpg', 'D:/XAMPP/htdocs/logicnthought/uploads/articles/article_fet_img/orginal_img/', 1, 1, 0, 0, 0, '2014-06-03 00:00:00', '0000-00-00 00:00:00'),
(2, 'Mission', 'ichaI-1401794558.jpg', 'D:/XAMPP/htdocs/logicnthought/uploads/articles/article_fet_img/orginal_img/', 2, 1, 0, 0, 0, '2014-06-03 00:00:00', '0000-00-00 00:00:00'),
(3, 'Who we are?', 'wlzwY-1401861448.jpg', 'D:/XAMPP/htdocs/logicnthought/uploads/articles/article_fet_img/orginal_img/', 1, 1, 0, 0, 1, '2014-06-04 00:00:00', '2014-06-04 00:00:00'),
(4, 'Why Logic and Thoughts ?', 'ulExC-1401863537.jpg', 'D:/XAMPP/htdocs/logicnthought/uploads/articles/article_fet_img/orginal_img/', 1, 1, 0, 0, 1, '2014-06-04 00:00:00', '2014-06-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `articles_details`
--

CREATE TABLE IF NOT EXISTS `articles_details` (
  `articles_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `articles_id` int(11) NOT NULL,
  `deatils` longtext NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`articles_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `articles_details`
--

INSERT INTO `articles_details` (`articles_details_id`, `articles_id`, `deatils`, `image`) VALUES
(1, 1, '&lt;p&gt;Under Maintanance&lt;br /&gt;\r\n&amp;nbsp;&lt;/p&gt;\r\n', ''),
(2, 2, '&lt;p&gt;We are a client-driven, market responsive innovator. We pledge to provide easy access to global information by delivering cost-effective, state-of-the-art products and services to all types of libraries and knowledge management centers.&lt;/p&gt;\r\n\r\n&lt;p&gt;We are committed to meeting the growing demand for digital content management by providing customizable, flexible and easy-to- use software, while seamlessly integrating and delivering search results for users.&lt;/p&gt;\r\n\r\n&lt;p&gt;We provide exceptional client technical support. Our goal is for every client to be satisfied with the implementation and ongoing operation of our software solutions. Our dedicated support team is available 24 hours a day, 7 days a week, 365 days a year.&lt;/p&gt;\r\n', ''),
(3, 3, '&lt;p&gt;Logic and Thoughts has been a leading provider of managed IT services, including IT Advisory, Software Development, website design&amp;nbsp;&amp;amp;&amp;nbsp;development, graphic design, multimedia services.&lt;/p&gt;\r\n\r\n&lt;p&gt;Logic and Thoughts has been recognized by the industry for its exceptional performance, expert advice and quality services. We have developed efficient methods of achieving success, building strong relationships with our customers and delivering quality results.&lt;/p&gt;\r\n', ''),
(4, 4, '&lt;p&gt;Recognising that each business has unique IT requirements, our experienced consultants take the time to listen, carefully analyse your business&amp;rsquo; needs and fully understand your processes. With a diverse range of skills and experience, our team translates your business requirements into a software design specification for a system that is as intuitive and as user-friendly as possible, and one that is designed to grow with your business.&lt;/p&gt;\r\n\r\n&lt;h3&gt;Innovative Solutions&lt;/h3&gt;\r\n\r\n&lt;p&gt;Intergy Consulting is more than just a software development company - our knowledge and systems development expertise is second-to-none. You can be assured that we use the latest technology and web application / designtechniques to provide you with the most cost-effective and innovative IT solutions.&lt;/p&gt;\r\n\r\n&lt;h3&gt;Proven Track Record&lt;/h3&gt;\r\n\r\n&lt;p&gt;Intergy Consulting has a proven track record in providing quality, cost-effective IT solutions to our growing list of local and overseas clients. Our flexible approach and resourcefulness has delivered success in many private and government offices. Discover more about our industry experience and read some of our valuable client case studies.&lt;/p&gt;\r\n\r\n&lt;h3&gt;Superior Support and Maintenance&lt;/h3&gt;\r\n\r\n&lt;p&gt;A quality support and maintenance service is critical to any business. Intergy Consulting is proud to provide client care, support and maintenance to ensure the ongoing smooth operation of your business. In doing so, our high level of client satisfaction is maintained, as evidenced by the repeat business we have. We not only provide support and maintenance services for applications that we build, but also for your existing applications.&lt;/p&gt;\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `article_comments`
--

CREATE TABLE IF NOT EXISTS `article_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_detail` longtext NOT NULL,
  `article_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE IF NOT EXISTS `basic_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_moto` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `email_address` varchar(150) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `logo_height` int(4) NOT NULL,
  `logo_width` int(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `company_name`, `company_moto`, `contact_address`, `email_address`, `phone_no`, `mobile_no`, `logo`, `logo_height`, `logo_width`, `created_on`, `edited_on`, `status`) VALUES
(1, 'Logic and thoughts', 'We SOLVE with logic & thoughts.', 'Dhaka Trade Center (15th Floor),Suite: G,\r\n99 Kazi Nzrul Islam Avenue,\r\nKawran Bazar,Dhaka-1215.', 'info@logicandthought.com', '02-8189700', '02-8189700', 'Mf06p-1401778935.png', 80, 170, '2014-06-03 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  `categories_status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modyfied_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_status`, `created_date`, `modyfied_date`) VALUES
(1, 'Home', 1, '2014-06-03 00:00:00', '0000-00-00 00:00:00'),
(2, 'About Us', 1, '2014-06-03 00:00:00', '2014-06-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE IF NOT EXISTS `home_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_heading` varchar(255) NOT NULL,
  `url_path` varchar(255) NOT NULL,
  `slider_details` longtext NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `slider_sorting` int(5) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`slider_id`, `slider_heading`, `url_path`, `slider_details`, `slider_image`, `image_path`, `status`, `slider_sorting`) VALUES
(1, 'E-commerece Solutions', '#', ' E-commerece Solutions', 'UVCWP-1401789616.jpg', 'D:/XAMPP/htdocs/logicnthought/uploads/home_slider/orginal_img/', 1, 1),
(2, 'Web Design', '#', ' Web Design', 'BoAHT-1401789706.jpg', 'D:/XAMPP/htdocs/logicnthought/uploads/home_slider/orginal_img/', 1, 2),
(3, 'Search Engine Optimization', '#', ' Search Engine Optimization', 'HrPUK-1401793745.jpg', 'D:/XAMPP/htdocs/logicnthought/uploads/home_slider/orginal_img/', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text,
  `type` varchar(50) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `contentid` int(11) unsigned NOT NULL DEFAULT '0',
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `sublevel` int(11) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `is_current` tinyint(2) NOT NULL,
  `menu_icon` varchar(150) NOT NULL,
  `bottom_text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `componentid` (`contentid`,`menutype`,`published`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `contentid`, `meta_description`, `meta_keyword`, `sublevel`, `ordering`, `created_date`, `modified_date`, `is_current`, `menu_icon`, `bottom_text`) VALUES
(1, 'mainmenu', 'About Us', 'about us', '#', '', 1, 0, 0, ' ', ' ', 0, 0, '2014-06-03 00:00:00', '0000-00-00 00:00:00', 0, 'icon-nav icon-home', 'About Us'),
(2, 'mainmenu', 'Mission', 'mission', 'http://localhost/logicnthought/content/view_content', '', 1, 1, 2, ' ', ' ', 0, 1, '2014-06-03 00:00:00', '2014-06-03 00:00:00', 0, '0', '0'),
(3, 'mainmenu', 'Vission', 'vission', 'http://localhost/logicnthought/content/view_content', '', 1, 1, 0, ' ', ' ', 0, 2, '2014-06-03 00:00:00', '2014-06-03 00:00:00', 0, '0', '0'),
(4, 'mainmenu', 'Services', 'services', '#', '', 1, 0, 0, ' ', ' ', 0, 3, '2014-06-03 00:00:00', '0000-00-00 00:00:00', 0, '0', '0'),
(5, 'mainmenu', 'Software Development', 'software development', 'content/view_content', '', 1, 4, 1, ' ', ' ', 0, 4, '2014-06-03 00:00:00', '0000-00-00 00:00:00', 0, '0', '0'),
(6, 'mainmenu', 'Search Engine Optimization (SEO)', 'search engine optimization', 'http://content/view_content', '', 1, 4, 1, ' ', ' ', 0, 6, '2014-06-03 00:00:00', '0000-00-00 00:00:00', 0, '0', '0'),
(7, 'mainmenu', 'Web Development', 'web development', 'http://content/view_category', '', 1, 4, 1, ' ', ' ', 0, 5, '2014-06-03 00:00:00', '0000-00-00 00:00:00', 0, '0', '0'),
(8, 'mainmenu', 'Projects', 'projects', '#', '', 1, 0, 0, ' ', ' ', 0, 8, '2014-06-03 00:00:00', '0000-00-00 00:00:00', 0, '0', '0'),
(9, 'mainmenu', 'Our Clients', 'our clients', 'http://#', '', 1, 0, 0, ' ', ' ', 0, 9, '2014-06-03 00:00:00', '0000-00-00 00:00:00', 0, '0', '0'),
(10, 'mainmenu', 'Graphics and Multimedia', 'graphics and multimedia', 'content/view_content', '', 1, 4, 1, ' ', ' ', 0, 7, '2014-06-03 00:00:00', '0000-00-00 00:00:00', 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `our_clients`
--

CREATE TABLE IF NOT EXISTS `our_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_details` longtext NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  `image_path` varchar(150) NOT NULL,
  `web_link` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(100) NOT NULL,
  `permission_alias` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission`, `permission_alias`, `description`, `created_on`, `edited_on`, `group_id`, `status`) VALUES
(60, 'Manage Home', 'manage_home', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 1, 0),
(61, 'Manage Article', 'manage_article', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 14, 0),
(62, 'Add Article', 'add_article', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 14, 0),
(63, 'Edit Article', 'edit_article', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 14, 0),
(64, 'Change Article Status', 'change_article_status', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 14, 0),
(65, 'Delete Article', 'delete_article', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 14, 0),
(66, 'Manage Category', 'manage_category', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 15, 0),
(67, 'Add Category', 'add_category', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 15, 0),
(68, 'Edit Category', 'edit_category', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 15, 0),
(69, 'Delete Category', 'delete_category', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 15, 0),
(74, 'Manage Comments', 'manage_comments', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 6, 0),
(75, 'Delete Comments', 'delete_comments', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 6, 0),
(76, 'Approved Comments', 'approved_comments', '', '2014-03-12 00:00:00', '0000-00-00 00:00:00', 6, 0),
(111, 'Manage Main Menu', 'manage_main_menu', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 3, 0),
(112, 'Add Main Menu', 'add_main_menu', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 3, 0),
(113, 'Edit Main Menu', 'edit_main_menu', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 3, 0),
(114, 'Delete Main Menu', 'delete_main_menu', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 3, 0),
(115, 'Change Main Menu Status', 'change_main_menu_status', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 3, 0),
(116, 'Manage Home Slider', 'manage_home_slider', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 11, 0),
(117, 'Change Status', 'home_slider_change_sts', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 11, 0),
(118, 'Delete Home Slider', 'delete_home_slider', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 11, 0),
(119, 'Edit Home Slider', 'edit_home_slider', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 11, 0),
(120, 'Add Home Slider', 'add_home_slider', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 11, 0),
(121, 'Manage News Scroller', 'manage_news_scroller', '', '2014-03-13 00:00:00', '0000-00-00 00:00:00', 14, 0),
(122, 'Manage Our Client', 'manage_our_client', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 17, 1),
(123, 'Add Our Client', 'add_our_client', '', '2014-05-11 00:00:00', '2014-05-11 00:00:00', 17, 1),
(124, 'Edit Our Client', 'edit_our_client', '', '2014-05-09 00:00:00', '2014-05-11 00:00:00', 17, 1),
(125, 'Delete Our Client', 'delete_our_client', '', '2014-05-11 00:00:00', '2014-05-11 00:00:00', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE IF NOT EXISTS `permission_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(100) NOT NULL,
  `group_alias` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`group_id`, `group`, `group_alias`, `status`) VALUES
(1, 'Home', 'home', 1),
(2, 'User', 'user', 1),
(3, 'Main Menu', 'menu', 1),
(4, 'Content', 'content', 1),
(5, 'Tiger', 'tiger', 1),
(6, 'Comments', 'comments', 1),
(11, 'Home Slider', 'home_slider', 1),
(14, 'Article', 'article', 1),
(15, 'Category', 'category', 1),
(17, 'Our Clients', 'our_clients', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `status`) VALUES
(1, 'Administrator', 1),
(2, 'Developer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission_relation`
--

CREATE TABLE IF NOT EXISTS `role_permission_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `role_permission_relation`
--

INSERT INTO `role_permission_relation` (`id`, `role_id`, `permission`) VALUES
(1, 2, ',manage_home,manage_poll,edit_poll,delete_poll,edit_poll_option,');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `designition` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `designition`, `address`, `image`, `image_path`, `status`) VALUES
(1, 'Site', 'Admin', '', '', '0', '', 2),
(14, 'Alam', 'Badrul', '', '', '', '', 1),
(11, 'Khan', 'Shahrukh', 'Hero', 'Shahrukh', '', '', 1),
(12, 'b', 'a', 'c', 'd', '', '', 1),
(15, 'Alam', 'Badrul', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(2) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `can_login` tinyint(1) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `username`, `password`, `user_type`, `is_active`, `can_login`, `activation_code`) VALUES
(1, 'admin@admin.com', '44e548d8931b7a08f2675213bb378f45', 2, 1, 1, ''),
(15, 'badrul@alam.com', '44e548d8931b7a08f2675213bb378f45', 1, 1, 1, ''),
(11, 'sharukh@ak.com', '44e548d8931b7a08f2675213bb378f45', 2, 1, 1, ''),
(12, 'test@test3.com', '44e548d8931b7a08f2675213bb378f45', 2, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_relation`
--

CREATE TABLE IF NOT EXISTS `user_role_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_role_relation`
--

INSERT INTO `user_role_relation` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 5, 2),
(4, 6, 2),
(5, 8, 2),
(6, 9, 3),
(8, 11, 2),
(9, 12, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
