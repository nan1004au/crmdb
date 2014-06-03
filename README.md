

SQL 
 CREATE TABLE `ha_db_admin` (
`idx` int(10) NOT NULL AUTO_INCREMENT,
`company_name` varchar(20) NOT NULL,
`user_id` varchar(20) NOT NULL,
`c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ;

ha_db_branch | CREATE TABLE `ha_db_branch` (
`idx` int(10) NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

CREATE TABLE `ha_db_client` (
`idx` int(10) NOT NULL AUTO_INCREMENT,
`name` varchar(50) NOT NULL,
`age` int(11) DEFAULT NULL,
`phone` varchar(20) NOT NULL,
`time` varchar(20) DEFAULT NULL,
`event` varchar(200) DEFAULT NULL,
`etc` varchar(300) DEFAULT NULL,
`sex` varchar(10) DEFAULT NULL,
`r_date` date DEFAULT NULL,
`branch` varchar(20) DEFAULT NULL,
`email` varchar(100) DEFAULT NULL,
`j_category` varchar(100) DEFAULT NULL,
`memo` varchar(300) DEFAULT NULL,
`ch` tinyint(2) DEFAULT NULL,
`j_group` varchar(300) DEFAULT NULL,
`event_idx` int(11) DEFAULT NULL,
`event_name` varchar(30) DEFAULT NULL,
`prev_url` varchar(255) DEFAULT NULL,
`user_agent` varchar(20) DEFAULT NULL,
`agree` varchar(2) DEFAULT NULL,
`c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

CREATE TABLE `ha_db_event_form` (
`idx` int(10) NOT NULL AUTO_INCREMENT,
`id` varchar(50) NOT NULL,
`title` varchar(50) NOT NULL,
`comment` varchar(1000) DEFAULT NULL,
`img_hash_01` varchar(1000) DEFAULT NULL,
`img_hash_02` varchar(1000) DEFAULT NULL,
`form_type` varchar(1000) DEFAULT NULL,
`category` varchar(1000) DEFAULT NULL,
`c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`ch_name` char(1) DEFAULT NULL,
`ch_age` char(1) DEFAULT NULL,
`ch_sex` char(1) DEFAULT NULL,
`ch_day` char(1) DEFAULT NULL,
`ch_time` char(1) DEFAULT NULL,
`ch_phone` char(1) DEFAULT NULL,
`ch_price` char(1) DEFAULT NULL,
`ch_branch` char(1) DEFAULT NULL,
`ch_email` char(1) DEFAULT NULL,
`ch_story` char(1) DEFAULT NULL,
`ch_group` char(1) DEFAULT NULL,
`ch_agree` char(1) DEFAULT NULL,
PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

CREATE TABLE `ha_db_event_list` (
`idx` int(10) NOT NULL AUTO_INCREMENT,
`event_id` varchar(50) NOT NULL,
`name` varchar(50) NOT NULL,
`price` varchar(50) NOT NULL,
PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 ;




CREATE TABLE `ha_db_j_category` (
`idx` int(10) NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;


CREATE TABLE `ha_db_member` (
`idx` int(10) NOT NULL AUTO_INCREMENT,
`user_id` char(15) NOT NULL,
`pass` varchar(32) NOT NULL,
`company_name` varchar(20) NOT NULL,
`branch` varchar(20) NOT NULL,
PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8



