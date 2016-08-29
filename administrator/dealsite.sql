-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2014 at 02:53 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dealsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `deal_category`
--

CREATE TABLE IF NOT EXISTS `deal_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `deal_category`
--

INSERT INTO `deal_category` (`id`, `user_id`, `name`, `description`, `image`, `status`) VALUES
(4, 0, 'Trekking', 'sadfasfsdf', 'cubagallery-img-1.jpg', 1),
(6, 0, 'Climbing', 'db44db', '', 1),
(5, 0, 'Water Skies', '4571c7', '', 1),
(7, 0, 'Hiking', '43bfa0', '', 1),
(8, 0, 'Deep Sea Diving', 'e8cae8', '', 1),
(9, 0, 'Air Sports', 'bec99e', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deal_cms`
--

CREATE TABLE IF NOT EXISTS `deal_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagename` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `pagedetail` longtext NOT NULL,
  `image` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='adventure_circle_cms' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `deal_cms`
--

INSERT INTO `deal_cms` (`id`, `pagename`, `title`, `pagedetail`, `image`) VALUES
(1, 'Aboutus', 'Aboutus', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus nulla ullamcorper dolor tincidunt adipiscing imperdiet dolor bibendum. Donec sed metus eu ligula laoreet volutpat non nec eros. Integer sollicitudin felis eu turpis euismod sit amet consequat tellus tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus enim ipsum, pretium eu tristique quis, sagittis at arcu. Maecenas arcu felis, tempor sit amet dignissim sit amet, facilisis vitae ante. Integer vehicula dictum leo eu hendrerit. Etiam nibh ligula, mattis sed vestibulum quis, ultrices at nulla. Aenean vel est arcu, nec gravida lectus. Nullam accumsan, felis sed rhoncus porttitor, augue purus ultrices mi, nec rutrum magna odio eget quam. Proin ac dolor et odio placerat rhoncus. Pellentesque nunc nunc, facilisis sit amet lobortis ac, euismod nec enim.</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, coxcvxcvnsectetur adipiscing elit. Phasellus varius dui eget tortor aliquam suscipit. Vivamus eu nisl at nunc sollicitudin lacinia id ac nibh. Nunc ultricies gravida purus sit amet lobortis. Duis hendrerit varius ante, eget tristique erat gravida eget. Aliquam egestas, mauris non porta scelerisque, dolor mauris facilisis risus, id sagittis quam sem volutpat tellus. Sed dapibus facilisis augue aliquam feugiat. Donec dapibus metus ac purus ultrices interdum.</p>\r\n<p>\r\n	Pellentesque pellentesque turpis vitae justo laoreet feugiat. In hac habitasse platea dictumst. Aliquam volutpat facilisis faucibus. Duis ullamcorper aliquam elementum. Donec pulvinar est urna, vel ultricies libero. Nam commodo tellus vel ligula elementum in mattis turpis varius. Morbi sagittis ornare ipsum, sed egestas leo bibendum ut. Donec gravida adipiscing semper. Integer et erat orci. In hendrerit odio lacus, volutpat condimentum nulla. Integer sit amet lorem vitae magna cursus fringilla id ut lorem. Morbi diam libero, tincidunt eu condimentum sit amet, mattis ac velit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed iaculis pulvinar sapien nec varius. Nullam sit amet sollicitudin elit. Etiam nec ligula risus, sit amet venenatis massa.nascetur ridiculus mus. Sed iaculis pulvinar sapien nec varius. Nullam sit amet sollicitudin elit. Etiam nec ligula risus, sit amet venenatis massa1</p>\r\n', ''),
(4, 'Contact Info ', 'Contact Info ', '<h2>\r\n	Contact Info</h2>\r\n<ul>\r\n	<li>\r\n		<strong>Address: </strong>Rounaq &amp; CO. Plot No.-97/1746, Laxmisagar, Cuttack Road, Bhubaneswar-6,Odisha.</li>\r\n	<li>\r\n		<strong>Mob: </strong>Mob:09647070207</li>\r\n	<li>\r\n		<strong>Mail Id:</strong> rahamanmohafijur@gmail.com</li>\r\n	<li>\r\n		<iframe frameborder=\\"0\\" height=\\"255\\" src=\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3742.837046333167!2d85.84670125000001!3d20.265591850000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a19a0acac0a8713%3A0xcb1af448902c7466!2sPuri+Cuttack+Rd%2C+Laxmisagar%2C+Bhubaneshwar%2C+Odisha+751006!5e0!3m2!1sen!2sin!4v1391202773350\\" style=\\"border:0\\" width=\\"100%\\"></iframe></li>\r\n</ul>\r\n', ''),
(5, 'Terms And Condition', 'Terms And Condition', '<p>\r\n	Terms And Condition</p>\r\n', ''),
(6, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', ''),
(7, 'Help', 'Help', 'Help', '');

-- --------------------------------------------------------

--
-- Table structure for table `deal_tbladmin`
--

CREATE TABLE IF NOT EXISTS `deal_tbladmin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `paypal_email` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deal_tbladmin`
--

INSERT INTO `deal_tbladmin` (`id`, `name`, `admin_username`, `admin_password`, `email`, `address`, `image`, `status`, `paypal_email`) VALUES
(1, 'Super Administrator', 'admin', 'admin', 'nits.avik@gmail.com', '', '', '1', 'test@yahoo.co.in');

-- --------------------------------------------------------

--
-- Table structure for table `deal_user`
--

CREATE TABLE IF NOT EXISTS `deal_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_user_id` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `about_me` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_loggedin` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `deal_user`
--

INSERT INTO `deal_user` (`id`, `fb_user_id`, `type`, `fname`, `lname`, `email`, `password`, `gender`, `dob`, `about_me`, `image`, `add_date`, `status`, `is_loggedin`, `last_login`, `ip`) VALUES
(3, '0', 0, 'Avik', 'Ghosh', 'nits.avik@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'F', '1985-08-11', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \\''Content here, content here\\'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\''lorem ipsum\\'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'user_image/1402464216Winter.jpg', '2014-05-31', '1', 1, '2014-06-12 10:47:58', '122.160.187.85'),
(4, '0', 0, 'Chndn', 'Chtrje', 'nitschandanchat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'M', '1990-05-4', 'THis is my test description THis is my test descriptionTHis is my test descriptionTHis is my test descriptionTHis is my test descriptionTHis is my test descriptionTHis is my test descriptionTHis is my test descriptionTHis is my test descriptionTHis is my test description', 'user_image/1401712627Koala.jpg', '2014-05-31', '1', 1, '2014-06-02 08:53:41', '122.160.187.85'),
(7, '0', 0, 'Santanu1', 'Patra1', 'nits.santanu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'M', '1986-05-18', 'fhgfhfg hgfhgfh', 'user_image/1402464349cubagallery-img-4.jpg', '2014-06-02', '1', 1, '2014-06-12 00:26:38', '122.160.187.85'),
(21, '0', 0, 'Sandy', 'Johnson', 'nits.abhijit@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'M', '1984-04-11', '', 'user_image/1401719491Desert.jpg', '2014-06-02', '1', 0, '2014-06-02 09:05:07', '122.160.187.85'),
(23, '0', 0, 'Sandeep', 'Tewary', 'nits.sandeeptewary@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'M', '1981-06-12', '', 'user_image/1402464896cubagallery-img-11.jpg', '2014-06-03', '1', 0, '2014-06-11 00:34:30', '122.160.187.85'),
(34, '865895163425579', 0, 'Jim', 'Ceparano', 'jimmyceparano@yahoo.com', '', 'M', '', '', 'user_image/1401896681Home Dogs.jpg', '2014-06-04', '1', 0, '2014-06-05 16:43:47', '12.208.193.2');
