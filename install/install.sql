CREATE TABLE IF NOT EXISTS `log_sql` (
  `qid` int(5) NOT NULL AUTO_INCREMENT,
  `query` varchar(255) NOT NULL,
  `time` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `session` (
  `sessionId` int(5) NOT NULL AUTO_INCREMENT,
  `sessionKey` varchar(32) NOT NULL,
  `ipAddr` varchar(16) NOT NULL,
  `timeout` int(10) NOT NULL,
  PRIMARY KEY (`sessionId`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `session_vars` (
  `sessionKey` varchar(32) NOT NULL,
  `sessionVar` varchar(32) NOT NULL,
  `sessionValue` varchar(32) NOT NULL,
  KEY `sessionKey` (`sessionKey`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(5) NOT NULL AUTO_INCREMENT,
  `userName` varchar(90) NOT NULL,
  `userPass` varchar(99) NOT NULL,
  `lastLogin` int(10) NOT NULL,
  `register` int(10) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM;

INSERT INTO `users` (`userId`, `userName`, `userPass`, `lastLogin`, `register`) VALUES
(1, 'admin', '1478f4a0d25eda986e417b4168ac622f', 1290246037, 1290246037);

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_var` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  `setting_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

INSERT INTO `settings` (`id`, `setting_var`, `setting_value`, `setting_id`) VALUES
(1, 'bbframe_title', 'bbframe - PHP framework', 1),
(2, 'bbframe_mmKey1', 'articles', NULL),
(3, 'bbframe_mmKey2', 'comments', NULL);

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) NOT NULL,
  `article_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

INSERT INTO `articles` (`id`, `article_title`, `article_description`) VALUES
(1, 'bbframe launch PHP Framework version 0.1', '<img src=''../../../images/bbframe_pic.jpg''>\r\n<p>One typical MVC solutions for your website. More information <a href=''http://bbframe.com''>HERE</a></p>\r\n'),
(7, 'bbframe / work Main block structure.', '<a id="bbfolders" href="../../../images/bbframe_structure.jpg"><img src="../../../images/bbframe_structure_sm.jpg" style="float: right; border: 0px none; width: 100px;"></a>\r\n\r\n<p>\r\nbbframe structure are consist of four main parts. The core of the framework and MVC blocks. Such structure is easy expandable. Current project version is 0.1. More information about  <a href="http://bbframe.com">HERE</a></p>\r\n');

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_title` varchar(255) NOT NULL,
  `comment_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

INSERT INTO `comments` (`id`, `comment_title`, `comment_description`) VALUES
(1, 'Example comment', '<p>\r\n	.... This&nbsp; is sample comment. Post just for test the comment system. You can easily erase it from Mysql table &#39;comments&#39;.</p>');