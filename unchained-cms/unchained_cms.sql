
--
-- Table structure for table `tbl_category`
--


CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `published` char(1) NOT NULL DEFAULT 'Y',
  `created_time` BIGINT NOT NULL,
  `modified_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `tbl_article`
--

CREATE TABLE IF NOT EXISTS `tbl_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `content` text,
  `category_id` int(11) NOT NULL,
  `published` char(1) NOT NULL DEFAULT 'Y',
  `frontpage` char(1) NOT NULL DEFAULT 'Y',
  `article_order` int(5) DEFAULT NULL,
  `tags` text,
  `created_time` BIGINT NOT NULL,
  `modified_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_visit_time` BIGINT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`)  REFERENCES tbl_category(`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
