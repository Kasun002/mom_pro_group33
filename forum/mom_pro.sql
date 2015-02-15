-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2014 at 08:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mom_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_banlists`
--

CREATE TABLE IF NOT EXISTS `mlf2_banlists` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mlf2_banlists`
--

INSERT INTO `mlf2_banlists` (`name`, `list`) VALUES
('user_agents', ''),
('ips', ''),
('words', '');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_categories`
--

CREATE TABLE IF NOT EXISTS `mlf2_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `category` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `accession` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_entries`
--

CREATE TABLE IF NOT EXISTS `mlf2_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `tid` int(11) NOT NULL DEFAULT '0',
  `uniqid` varchar(255) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_reply` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edited_by` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `hp` varchar(255) NOT NULL DEFAULT '',
  `location` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(128) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `tags` varchar(255) NOT NULL DEFAULT '',
  `show_signature` tinyint(4) DEFAULT '0',
  `email_notification` tinyint(4) DEFAULT '0',
  `marked` tinyint(4) DEFAULT '0',
  `locked` tinyint(4) DEFAULT '0',
  `sticky` tinyint(4) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `spam` tinyint(4) DEFAULT '0',
  `spam_check_status` tinyint(4) DEFAULT '0',
  `edit_key` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `tid` (`tid`),
  KEY `category` (`category`),
  KEY `pid` (`pid`),
  KEY `sticky` (`sticky`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mlf2_entries`
--

INSERT INTO `mlf2_entries` (`id`, `pid`, `tid`, `uniqid`, `time`, `last_reply`, `edited`, `edited_by`, `user_id`, `name`, `subject`, `category`, `email`, `hp`, `location`, `ip`, `text`, `tags`, `show_signature`, `email_notification`, `marked`, `locked`, `sticky`, `views`, `spam`, `spam_check_status`, `edit_key`) VALUES
(1, 0, 1, '5436dd2bdc56c', '2014-10-09 19:08:56', '2014-10-09 22:17:00', '0000-00-00 00:00:00', NULL, 0, 'Kasun', 'Headec', 0, '', '', '', '::1', 'vfivrv iff nfrn friof4r ffi4rf rfirf 4rf4rif4r d4f4r 4rir4c 4rc4r 4rc4rir c4rfrwksn3e drcri', '', 0, 0, 0, 0, 0, 39, 0, 0, ''),
(2, 1, 1, '5436dd6c32190', '2014-10-09 19:13:52', '2014-10-09 22:17:00', '0000-00-00 00:00:00', NULL, 0, 'Viraj', 'Headec', 0, '', '', '', '::1', 'jfrnff firf rrifrf rfrdf 3ed3ed 3wsew frfrn f 4r', '', 0, 0, 0, 0, 0, 32, 0, 0, ''),
(3, 1, 1, '543708db1e2d3', '2014-10-09 22:17:00', '2014-10-09 22:17:00', '0000-00-00 00:00:00', NULL, 0, 'Kamal', 'Headec', 0, '', '', '', '::1', 'jdsojvds fidfds ifewdf fiedf fndf jfed fiewn fiodfds dfidf dfidnf dsfdsifnde fdnfd fdfd fdfd fdfc d[size=large]:-) [/size]', '', 0, 0, 0, 0, 0, 12, 0, 0, ''),
(4, 0, 4, '543709c7917b1', '2014-10-09 22:20:01', '2014-10-09 22:20:01', '0000-00-00 00:00:00', NULL, 0, 'Vidushan', 'General', 0, '', '', '', '::1', 'jdns jfjdf ifnds ujfew ejfew jfbads fbkj [b]kdssdns[/b]', '', 0, 0, 0, 0, 0, 3, 0, 0, ''),
(5, 0, 5, '54370daa4c4e3', '2014-10-09 22:36:27', '2014-10-11 01:42:14', '0000-00-00 00:00:00', NULL, 0, 'Asanka', 'Doubt', 0, '', '', '', '::1', '[color=#f00]sjdbsdasio cd doubt sdandasdbasbdfd fdsf fdbhfadf fkjwdfds fj[/color]', '', 0, 0, 0, 0, 0, 6, 0, 0, ''),
(6, 5, 5, '5438864a1819d', '2014-10-11 01:42:14', '2014-10-11 01:42:14', '0000-00-00 00:00:00', NULL, 0, 'Teem', 'Doubt', 0, '', '', '', '::1', 'jd fdf fjef fbndfewfn dnfnf fjf fndd fnv vnv vndv vn', '', 0, 0, 0, 0, 0, 4, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_entries_cache`
--

CREATE TABLE IF NOT EXISTS `mlf2_entries_cache` (
  `cache_id` int(11) NOT NULL,
  `cache_text` mediumtext NOT NULL,
  PRIMARY KEY (`cache_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mlf2_entries_cache`
--

INSERT INTO `mlf2_entries_cache` (`cache_id`, `cache_text`) VALUES
(1, '<p>vfivrv iff nfrn friof4r ffi4rf rfirf 4rf4rif4r d4f4r 4rir4c 4rc4r 4rc4rir c4rfrwksn3e drcri</p>\n'),
(2, '<p>jfrnff firf rrifrf rfrdf 3ed3ed 3wsew frfrn f 4r</p>\n'),
(3, '<p>jdsojvds fidfds ifewdf fiedf fndf jfed fiewn fiodfds dfidf dfidnf dsfdsifnde fdnfd fdfd fdfd fdfc d<span style="font-size:large;"><img src="images/smilies/smile.png" alt=":-)" /> </span></p>\n'),
(4, '<p>jdns jfjdf ifnds ujfew ejfew jfbads fbkj <strong>kdssdns</strong></p>\n'),
(5, '<p><span style="color:#f00;">sjdbsdasio cd doubt sdandasdbasbdfd fdsf fdbhfadf fkjwdfds fj</span></p>\n'),
(6, '<p>jd fdf fjef fbndfewfn dnfnf fjf fndd fnv vnv vndv vn</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_logincontrol`
--

CREATE TABLE IF NOT EXISTS `mlf2_logincontrol` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL DEFAULT '',
  `logins` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_pages`
--

CREATE TABLE IF NOT EXISTS `mlf2_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `menu_linkname` varchar(255) NOT NULL DEFAULT '',
  `access` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_settings`
--

CREATE TABLE IF NOT EXISTS `mlf2_settings` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mlf2_settings`
--

INSERT INTO `mlf2_settings` (`name`, `value`) VALUES
('forum_name', 'my little forum'),
('forum_description', 'yet another little forum'),
('forum_email', '@'),
('forum_address', ''),
('home_linkaddress', '../'),
('home_linkname', ''),
('language_file', 'english.lang'),
('theme', 'default'),
('access_for_users_only', '0'),
('entries_by_users_only', '0'),
('register_mode', '0'),
('default_email_contact', '0'),
('user_area_public', '0'),
('rss_feed', '1'),
('rss_feed_max_items', '20'),
('session_prefix', 'mlf2_'),
('default_view', '0'),
('remember_userdata', '1'),
('remember_last_visit', '1'),
('empty_postings_possible', '0'),
('email_notification_unregistered', '0'),
('user_edit', '1'),
('user_edit_if_no_replies', '0'),
('show_if_edited', '1'),
('dont_reg_edit_by_admin', '0'),
('dont_reg_edit_by_mod', '0'),
('edit_min_time_period', '5'),
('edit_max_time_period', '60'),
('edit_delay', '3'),
('bbcode', '1'),
('bbcode_img', '1'),
('bbcode_color', '1'),
('bbcode_size', '1'),
('bbcode_code', '0'),
('bbcode_tex', '0'),
('bbcode_flash', '0'),
('flash_default_width', '425'),
('flash_default_height', '344'),
('upload_images', '0'),
('smilies', '1'),
('autolink', '1'),
('count_views', '1'),
('autologin', '1'),
('threads_per_page', '30'),
('search_results_per_page', '20'),
('name_maxlength', '70'),
('name_word_maxlength', '30'),
('email_maxlength', '70'),
('hp_maxlength', '70'),
('location_maxlength', '40'),
('location_word_maxlength', '30'),
('subject_maxlength', '60'),
('subject_word_maxlength', '30'),
('text_maxlength', '5000'),
('profile_maxlength', '5000'),
('signature_maxlength', '255'),
('text_word_maxlength', '90'),
('email_subject_maxlength', '100'),
('email_text_maxlength', '10000'),
('quote_symbol', '>'),
('count_users_online', '10'),
('last_reply_link', '0'),
('time_difference', '0'),
('time_zone', ''),
('auto_lock_old_threads', '0'),
('upload_max_img_size', '60'),
('upload_max_img_width', '600'),
('upload_max_img_height', '600'),
('mail_parameter', ''),
('forum_enabled', '1'),
('forum_readonly', '0'),
('forum_disabled_message', ''),
('page_browse_range', '10'),
('page_browse_show_last', '0'),
('deep_reply', '15'),
('very_deep_reply', '30'),
('users_per_page', '20'),
('username_maxlength', '40'),
('bad_behavior', '0'),
('akismet_entry_check', '0'),
('akismet_mail_check', '0'),
('akismet_key', ''),
('akismet_check_registered', '0'),
('stop_forum_spam', '0'),
('tags', '1'),
('tag_cloud', '0'),
('tag_cloud_day_period', '30'),
('tag_cloud_scale_min', '0'),
('tag_cloud_scale_max', '6'),
('latest_postings', '0'),
('terms_of_use_agreement', '0'),
('terms_of_use_url', ''),
('syntax_highlighter', '0'),
('save_spam', '1'),
('auto_delete_spam', '168'),
('auto_lock', '0'),
('temp_block_ip_after_repeated_failed_logins', '1'),
('flood_prevention_minutes', '2'),
('fold_threads', '0'),
('avatars', '0'),
('avatar_max_filesize', '20'),
('avatar_max_width', '80'),
('avatar_max_height', '80'),
('captcha_posting', '0'),
('captcha_email', '0'),
('captcha_register', '0'),
('min_pw_length', '8'),
('cookie_validity_days', '30'),
('access_permission_checks', '0'),
('daily_actions_time', '3:30'),
('next_daily_actions', '1413257400'),
('auto_lock_old_threads', '0'),
('max_read_items', '200'),
('delete_ips', '0'),
('last_changes', '0'),
('ajax_preview', '1'),
('version', '2.3.3');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_smilies`
--

CREATE TABLE IF NOT EXISTS `mlf2_smilies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `file` varchar(100) NOT NULL DEFAULT '',
  `code_1` varchar(50) NOT NULL DEFAULT '',
  `code_2` varchar(50) NOT NULL DEFAULT '',
  `code_3` varchar(50) NOT NULL DEFAULT '',
  `code_4` varchar(50) NOT NULL DEFAULT '',
  `code_5` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mlf2_smilies`
--

INSERT INTO `mlf2_smilies` (`id`, `order_id`, `file`, `code_1`, `code_2`, `code_3`, `code_4`, `code_5`, `title`) VALUES
(1, 1, 'smile.png', ':-)', '', '', '', '', ''),
(2, 2, 'wink.png', ';-)', '', '', '', '', ''),
(3, 3, 'tongue.png', ':-P', '', '', '', '', ''),
(4, 4, 'biggrin.png', ':-D', '', '', '', '', ''),
(5, 5, 'neutral.png', ':-|', '', '', '', '', ''),
(6, 6, 'frown.png', ':-(', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_userdata`
--

CREATE TABLE IF NOT EXISTS `mlf2_userdata` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` tinyint(4) NOT NULL DEFAULT '0',
  `user_name` varchar(255) NOT NULL DEFAULT '',
  `user_real_name` varchar(255) NOT NULL DEFAULT '',
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `user_pw` varchar(255) NOT NULL DEFAULT '',
  `user_email` varchar(255) NOT NULL DEFAULT '',
  `email_contact` tinyint(4) DEFAULT '0',
  `user_hp` varchar(255) NOT NULL DEFAULT '',
  `user_location` varchar(255) NOT NULL DEFAULT '',
  `signature` varchar(255) NOT NULL DEFAULT '',
  `profile` text NOT NULL,
  `logins` int(11) NOT NULL DEFAULT '0',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_logout` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_ip` varchar(128) NOT NULL DEFAULT '',
  `registered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_selection` varchar(255) DEFAULT NULL,
  `thread_order` tinyint(4) NOT NULL DEFAULT '0',
  `user_view` tinyint(4) NOT NULL DEFAULT '0',
  `sidebar` tinyint(4) NOT NULL DEFAULT '1',
  `fold_threads` tinyint(4) NOT NULL DEFAULT '0',
  `thread_display` tinyint(4) NOT NULL DEFAULT '0',
  `new_posting_notification` tinyint(4) DEFAULT '0',
  `new_user_notification` tinyint(4) DEFAULT '0',
  `user_lock` tinyint(4) DEFAULT '0',
  `auto_login_code` varchar(50) NOT NULL DEFAULT '',
  `pwf_code` varchar(50) NOT NULL,
  `activate_code` varchar(50) NOT NULL DEFAULT '',
  `language` varchar(255) NOT NULL DEFAULT '',
  `time_zone` varchar(255) NOT NULL DEFAULT '',
  `time_difference` smallint(4) DEFAULT '0',
  `theme` varchar(255) NOT NULL DEFAULT '',
  `entries_read` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mlf2_userdata`
--

INSERT INTO `mlf2_userdata` (`user_id`, `user_type`, `user_name`, `user_real_name`, `gender`, `birthday`, `user_pw`, `user_email`, `email_contact`, `user_hp`, `user_location`, `signature`, `profile`, `logins`, `last_login`, `last_logout`, `user_ip`, `registered`, `category_selection`, `thread_order`, `user_view`, `sidebar`, `fold_threads`, `thread_display`, `new_posting_notification`, `new_user_notification`, `user_lock`, `auto_login_code`, `pwf_code`, `activate_code`, `language`, `time_zone`, `time_difference`, `theme`, `entries_read`) VALUES
(1, 2, 'admin', '', 0, '0000-00-00', 'c3ccb88dc0a985b9b5da20bb9333854194dfbc7767d91c6936', 'admin@example.com', 1, '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2014-10-07 04:42:49', NULL, 0, 0, 1, 0, 0, 0, 0, 0, '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_userdata_cache`
--

CREATE TABLE IF NOT EXISTS `mlf2_userdata_cache` (
  `cache_id` int(11) NOT NULL,
  `cache_signature` text NOT NULL,
  `cache_profile` text NOT NULL,
  PRIMARY KEY (`cache_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_useronline`
--

CREATE TABLE IF NOT EXISTS `mlf2_useronline` (
  `ip` char(15) NOT NULL DEFAULT '',
  `time` int(14) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mlf2_useronline`
--

INSERT INTO `mlf2_useronline` (`ip`, `time`, `user_id`) VALUES
('::1', 1413222874, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
