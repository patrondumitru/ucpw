#
# TABLE STRUCTURE FOR: admin_groups
#

DROP TABLE IF EXISTS `admin_groups`;

CREATE TABLE `admin_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES (1, 'webmaster', 'Webmaster');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES (2, 'admin', 'Administrator');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES (3, 'manager', 'Manager');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES (4, 'staff', 'Staff');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES (5, 'engineers', 'Engineers Union County');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES (6, 'inspectors', 'Inspectors Union County');


#
# TABLE STRUCTURE FOR: admin_login_attempts
#

DROP TABLE IF EXISTS `admin_login_attempts`;

CREATE TABLE `admin_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: admin_preferences
#

DROP TABLE IF EXISTS `admin_preferences`;

CREATE TABLE `admin_preferences` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `user_panel` tinyint(1) NOT NULL DEFAULT 0,
  `sidebar_form` tinyint(1) NOT NULL DEFAULT 0,
  `messages_menu` tinyint(1) NOT NULL DEFAULT 0,
  `notifications_menu` tinyint(1) NOT NULL DEFAULT 0,
  `tasks_menu` tinyint(1) NOT NULL DEFAULT 0,
  `user_menu` tinyint(1) NOT NULL DEFAULT 1,
  `ctrl_sidebar` tinyint(1) NOT NULL DEFAULT 0,
  `transition_page` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `admin_preferences` (`id`, `user_panel`, `sidebar_form`, `messages_menu`, `notifications_menu`, `tasks_menu`, `user_menu`, `ctrl_sidebar`, `transition_page`) VALUES (1, 0, 1, 0, 0, 0, 0, 0, 0);


#
# TABLE STRUCTURE FOR: admin_users
#

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES (1, '127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, NULL, 1451900190, 1546037760, 1, 'Webmaster', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES (2, '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, NULL, 1451900228, 1451903990, 1, 'Admin', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES (3, '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, 1451900430, NULL, 1, 'Manager', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES (4, '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, 1451900439, NULL, 1, 'Staff', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES (5, '127.0.0.1', 'engineer1', '$2y$08$YBaP2tzY.o0o2l/kZzvp8.yvnpYbJI85pIFLxcfjTCvXH..Os.glC', NULL, NULL, NULL, NULL, NULL, NULL, 1546026064, 1546026238, 1, 'Engineer', 'First');


#
# TABLE STRUCTURE FOR: admin_users_groups
#

DROP TABLE IF EXISTS `admin_users_groups`;

CREATE TABLE `admin_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES (1, 1, 1);
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES (2, 2, 2);
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES (3, 3, 3);
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES (4, 4, 4);
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES (5, 5, 4);


#
# TABLE STRUCTURE FOR: api_access
#

DROP TABLE IF EXISTS `api_access`;

CREATE TABLE `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: api_keys
#

DROP TABLE IF EXISTS `api_keys`;

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: api_limits
#

DROP TABLE IF EXISTS `api_limits`;

CREATE TABLE `api_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: api_logs
#

DROP TABLE IF EXISTS `api_logs`;

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: groups
#

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES (1, 'members', 'General User');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES (2, 'water', '');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES (3, 'Managers', '');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES (4, 'Inspectors', '');


#
# TABLE STRUCTURE FOR: groups_permissions
#

DROP TABLE IF EXISTS `groups_permissions`;

CREATE TABLE `groups_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `value` tinyint(4) DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleID_2` (`group_id`,`perm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `groups_permissions` (`id`, `group_id`, `perm_id`, `value`, `created_at`, `updated_at`) VALUES (1, 5, 1, 1, 1546037036, 1546037036);
INSERT INTO `groups_permissions` (`id`, `group_id`, `perm_id`, `value`, `created_at`, `updated_at`) VALUES (2, 5, 3, 0, 1546037036, 1546037036);


#
# TABLE STRUCTURE FOR: laserfiche_forms
#

DROP TABLE IF EXISTS `laserfiche_forms`;

CREATE TABLE `laserfiche_forms` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `width` varchar(6) NOT NULL DEFAULT '100%',
  `height` varchar(6) NOT NULL,
  `created_by` int(4) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `laserfiche_forms` (`id`, `name`, `url_name`, `path`, `width`, `height`, `created_by`, `status`, `add_date`) VALUES (1, 'Construction Inspection Daily Log', 'Construction Inspection', 'http://lfportal.unioncountync.gov/Forms/cidl', '100%', '100%', 1, '1', '2018-07-02 14:31:31');
INSERT INTO `laserfiche_forms` (`id`, `name`, `url_name`, `path`, `width`, `height`, `created_by`, `status`, `add_date`) VALUES (2, 'Water Use Ordinance Enforcement', 'Water Use', 'http://lfportal.unioncountync.gov/Forms/water_use', '100%', '100%', 1, '1', '0000-00-00 00:00:00');
INSERT INTO `laserfiche_forms` (`id`, `name`, `url_name`, `path`, `width`, `height`, `created_by`, `status`, `add_date`) VALUES (3, 'New User Lucity ', 'User Lucity', 'http://lfportal.unioncountync.gov/Forms/ucpwlucityuserform', '100%', '100%', 1, '1', '2018-06-27 14:53:50');


#
# TABLE STRUCTURE FOR: login_attempts
#

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: main_menus
#

DROP TABLE IF EXISTS `main_menus`;

CREATE TABLE `main_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `type` set('backend','admin','user','public') NOT NULL DEFAULT 'public',
  `group` varchar(50) NOT NULL,
  `show` int(1) NOT NULL,
  `external` tinyint(1) NOT NULL DEFAULT 0,
  `protect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `main_menus_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `main_menus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (1, NULL, 'GIS Forms', 'glyphicon glyphicon-user', 'http://lfportal.unioncountync.gov/Forms/ucpwlucityuserform', 1, 'public', 'home', 0, 1, 1);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (2, NULL, 'Help Desk', 'glyphicon glyphicon-remove', 'https://ucpwhelpdesk.trakdesk.com/support/', 2, 'public', 'home', 1, 1, 1);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (3, NULL, 'GIS', '', '#GIS', 3, 'public', 'home', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (4, NULL, 'APPS', '', '#portofolio', 4, 'public', 'home', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (5, NULL, 'Contact', '', '#contact', 5, 'public', 'home', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (6, NULL, 'Item 5', '', 'Item-5', 6, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (7, NULL, 'Item 6', '', 'Item-6', 7, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (8, 1, 'Item 0.1', '', 'item-0.1', 1, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (9, 1, 'Item 0.2', 'glyphicon glyphicon-search', 'item-0-2', 2, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (10, 8, 'Item 0.1.1', '', 'item-0-1-1', 1, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (11, 8, 'Item 0.1.2', '', 'Item-0-1-2', 2, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (12, 10, 'Item 0.1.1.1', '', 'Item-0-1-1-1', 1, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (13, 10, 'Item 0.1.1.2', '', 'Item-0-1-1-2', 2, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (14, 2, 'Item 1.1', '', 'item-1-1', 1, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (15, 2, 'Item 1.2', '', 'item-1-2', 2, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (16, 3, 'Item 2.2', '', 'item-2-2', 2, 'public', '', 1, 0, 0);
INSERT INTO `main_menus` (`id`, `parent`, `name`, `icon`, `slug`, `number`, `type`, `group`, `show`, `external`, `protect`) VALUES (17, 3, 'Item 2.1', '', 'item-2.1', 1, 'public', '', 1, 0, 0);


#
# TABLE STRUCTURE FOR: permissions
#

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perm_key` varchar(30) NOT NULL,
  `perm_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permKey` (`perm_key`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `permissions` (`id`, `perm_key`, `perm_name`) VALUES (1, 'create_user', 'Create Users');
INSERT INTO `permissions` (`id`, `perm_key`, `perm_name`) VALUES (2, 'edit_user', 'Edit users');
INSERT INTO `permissions` (`id`, `perm_key`, `perm_name`) VALUES (3, 'delete_user', 'Delete users');


#
# TABLE STRUCTURE FOR: project
#

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `prj_id` int(6) NOT NULL AUTO_INCREMENT,
  `prj_name` varchar(100) NOT NULL,
  `status_id` int(2) NOT NULL,
  `prj_engineer` int(4) NOT NULL,
  `prj_manager` int(4) NOT NULL,
  `prj_inspector` int(4) NOT NULL,
  `prj_location_id` int(4) NOT NULL,
  `prj_date_created` datetime NOT NULL,
  `prj_created_user_id` int(3) NOT NULL,
  PRIMARY KEY (`prj_id`),
  KEY `Project_fk0` (`status_id`),
  CONSTRAINT `Project_fk0` FOREIGN KEY (`status_id`) REFERENCES `project_status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `project` (`prj_id`, `prj_name`, `status_id`, `prj_engineer`, `prj_manager`, `prj_inspector`, `prj_location_id`, `prj_date_created`, `prj_created_user_id`) VALUES (5, 'My first edit project', 2, 4, 4, 4, 3, '2018-08-01 00:00:00', 1);
INSERT INTO `project` (`prj_id`, `prj_name`, `status_id`, `prj_engineer`, `prj_manager`, `prj_inspector`, `prj_location_id`, `prj_date_created`, `prj_created_user_id`) VALUES (6, 'test 1', 2, 2, 4, 4, 1, '2018-08-29 00:00:00', 1);
INSERT INTO `project` (`prj_id`, `prj_name`, `status_id`, `prj_engineer`, `prj_manager`, `prj_inspector`, `prj_location_id`, `prj_date_created`, `prj_created_user_id`) VALUES (7, 'test234', 1, 2, 4, 3, 3, '2018-09-05 05:21:20', 1);
INSERT INTO `project` (`prj_id`, `prj_name`, `status_id`, `prj_engineer`, `prj_manager`, `prj_inspector`, `prj_location_id`, `prj_date_created`, `prj_created_user_id`) VALUES (8, 'Enginers Developers', 4, 3, 4, 4, 1, '2018-09-05 04:33:35', 1);
INSERT INTO `project` (`prj_id`, `prj_name`, `status_id`, `prj_engineer`, `prj_manager`, `prj_inspector`, `prj_location_id`, `prj_date_created`, `prj_created_user_id`) VALUES (9, 'Managers Project', 1, 2, 4, 3, 3, '2018-09-05 04:38:02', 1);
INSERT INTO `project` (`prj_id`, `prj_name`, `status_id`, `prj_engineer`, `prj_manager`, `prj_inspector`, `prj_location_id`, `prj_date_created`, `prj_created_user_id`) VALUES (10, '#PR-232 Test project at 19 September', 3, 2, 4, 4, 3, '2018-09-19 04:01:01', 1);
INSERT INTO `project` (`prj_id`, `prj_name`, `status_id`, `prj_engineer`, `prj_manager`, `prj_inspector`, `prj_location_id`, `prj_date_created`, `prj_created_user_id`) VALUES (11, 'Luke\'s Test Project', 1, 2, 4, 3, 3, '2018-10-17 03:56:46', 1);
INSERT INTO `project` (`prj_id`, `prj_name`, `status_id`, `prj_engineer`, `prj_manager`, `prj_inspector`, `prj_location_id`, `prj_date_created`, `prj_created_user_id`) VALUES (12, 'Secont test Project', 1, 2, 4, 3, 3, '2018-10-17 04:04:24', 1);
INSERT INTO `project` (`prj_id`, `prj_name`, `status_id`, `prj_engineer`, `prj_manager`, `prj_inspector`, `prj_location_id`, `prj_date_created`, `prj_created_user_id`) VALUES (13, 'Enginers', 1, 2, 4, 3, 3, '2018-10-18 02:05:36', 1);


#
# TABLE STRUCTURE FOR: project_data
#

DROP TABLE IF EXISTS `project_data`;

CREATE TABLE `project_data` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `form_comp_id` int(12) NOT NULL,
  `structure_id` int(12) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (1, 5, 5, '5');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (2, 17, 2, '9');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (3, 17, 7, '8');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (4, 17, 1, '2');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (5, 17, 4, 'sdsd');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (6, 17, 3, '6');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (7, 17, 5, '11');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (8, 17, 6, '');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (9, 18, 2, '9');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (10, 18, 7, '8');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (11, 18, 1, '3');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (12, 18, 4, 'a sd fsad ');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (13, 18, 3, '6');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (14, 18, 5, '11');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (15, 18, 6, '');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (16, 19, 2, '10');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (17, 19, 7, '8');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (18, 19, 1, '2');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (19, 19, 4, 'jh jkh gj');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (20, 19, 3, '6');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (21, 19, 5, '11');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (22, 19, 6, 'Test custom');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (23, 20, 2, '10');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (24, 20, 7, '7');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (25, 20, 1, '1');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (26, 20, 4, 'Rain');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (27, 20, 3, '6');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (28, 20, 5, '11');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (29, 20, 6, 'Example');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (30, 21, 2, '9');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (31, 21, 7, '8');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (32, 21, 1, '2');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (33, 21, 4, 'df sdf g');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (34, 22, 2, '9');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (35, 22, 7, '8');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (36, 22, 1, '2');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (37, 22, 4, 't ');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (38, 23, 2, '9');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (39, 23, 7, '8');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (40, 23, 1, '2');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (41, 23, 4, 't ');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (42, 24, 2, '9');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (43, 24, 7, '8');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (44, 24, 1, '2');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (45, 24, 4, 't ');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (46, 24, 3, '4');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (47, 24, 3, '6');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (48, 24, 5, '11');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (49, 24, 6, '');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (50, 25, 2, '9');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (51, 25, 7, '8');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (52, 25, 1, '2');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (53, 25, 4, 't ');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (54, 25, 3, '4');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (55, 25, 3, '6');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (56, 25, 5, '11');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (57, 25, 6, '');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (58, 26, 2, '10');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (59, 26, 7, '7');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (60, 26, 1, '1');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (61, 26, 4, 'Monday');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (62, 26, 3, '4');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (63, 26, 5, '12');
INSERT INTO `project_data` (`id`, `form_comp_id`, `structure_id`, `value`) VALUES (64, 26, 6, 'test for export');


#
# TABLE STRUCTURE FOR: project_field_value
#

DROP TABLE IF EXISTS `project_field_value`;

CREATE TABLE `project_field_value` (
  `fl_id` int(6) NOT NULL AUTO_INCREMENT,
  `fl_value` varchar(50) NOT NULL,
  `structure_id` int(10) NOT NULL,
  PRIMARY KEY (`fl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (1, '70', 1);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (2, '71', 1);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (3, '72', 1);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (4, 'Select 1', 3);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (5, 'Select 2', 3);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (6, 'Select 3', 3);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (7, 'Yes', 7);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (8, 'No', 7);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (9, '20', 2);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (10, '21', 2);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (11, 'January', 5);
INSERT INTO `project_field_value` (`fl_id`, `fl_value`, `structure_id`) VALUES (12, 'February', 5);


#
# TABLE STRUCTURE FOR: project_fields_type
#

DROP TABLE IF EXISTS `project_fields_type`;

CREATE TABLE `project_fields_type` (
  `type_id` int(6) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) NOT NULL,
  `type_type` varchar(30) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `project_fields_type` (`type_id`, `type_name`, `type_type`) VALUES (1, 'input', 'text');
INSERT INTO `project_fields_type` (`type_id`, `type_name`, `type_type`) VALUES (2, 'textarea', 'textarea');
INSERT INTO `project_fields_type` (`type_id`, `type_name`, `type_type`) VALUES (3, 'input', 'checkbox');
INSERT INTO `project_fields_type` (`type_id`, `type_name`, `type_type`) VALUES (4, 'input', 'radiobox');
INSERT INTO `project_fields_type` (`type_id`, `type_name`, `type_type`) VALUES (5, 'select', 'select');
INSERT INTO `project_fields_type` (`type_id`, `type_name`, `type_type`) VALUES (6, 'input', 'file');


#
# TABLE STRUCTURE FOR: project_form
#

DROP TABLE IF EXISTS `project_form`;

CREATE TABLE `project_form` (
  `form_id` int(6) NOT NULL AUTO_INCREMENT,
  `form_name` varchar(100) NOT NULL,
  `form_icon` varchar(100) NOT NULL,
  `form_color` varchar(100) NOT NULL,
  `order_position` int(4) NOT NULL,
  `table_info` text NOT NULL,
  `date_created` date NOT NULL,
  `user_created` int(6) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `publish` enum('1','0') NOT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `project_form` (`form_id`, `form_name`, `form_icon`, `form_color`, `order_position`, `table_info`, `date_created`, `user_created`, `status`, `publish`) VALUES (1, 'Construction Inspection Daily Log', 'fa-building', 'blue', 1, '{\"Temperature\":\"temp_high\",\"Precipitation\":\"prep_volume\",\"Custom\":\"custom\",\"Weather\":\"weather_day\"}', '2018-09-23', 1, '1', '1');
INSERT INTO `project_form` (`form_id`, `form_name`, `form_icon`, `form_color`, `order_position`, `table_info`, `date_created`, `user_created`, `status`, `publish`) VALUES (2, 'Inspection quality', 'fa-bitbucket', 'green', 2, '', '2018-09-18', 1, '0', '1');
INSERT INTO `project_form` (`form_id`, `form_name`, `form_icon`, `form_color`, `order_position`, `table_info`, `date_created`, `user_created`, `status`, `publish`) VALUES (3, 'Inspection quality new', 'fa-ambulance', 'red', 3, '', '2018-09-18', 1, '1', '0');
INSERT INTO `project_form` (`form_id`, `form_name`, `form_icon`, `form_color`, `order_position`, `table_info`, `date_created`, `user_created`, `status`, `publish`) VALUES (4, 'New Form ', 'fa-building', 'blue', 4, '', '2018-11-15', 1, '1', '1');


#
# TABLE STRUCTURE FOR: project_form_comp
#

DROP TABLE IF EXISTS `project_form_comp`;

CREATE TABLE `project_form_comp` (
  `form_comp_id` int(12) NOT NULL AUTO_INCREMENT,
  `project_id` int(6) NOT NULL,
  `form_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_created` int(4) NOT NULL,
  `status` enum('open','closed') NOT NULL,
  PRIMARY KEY (`form_comp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (3, 5, 3, '2018-09-27 13:30:27', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (17, 5, 1, '2018-10-19 04:59:53', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (18, 5, 1, '2018-10-23 04:20:18', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (19, 5, 1, '2018-10-24 09:38:17', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (20, 5, 1, '2018-10-24 05:05:24', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (21, 5, 1, '2018-11-13 11:43:01', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (22, 5, 1, '2018-11-13 12:07:41', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (23, 5, 1, '2018-11-13 12:10:05', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (24, 5, 1, '2018-11-13 12:10:41', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (25, 5, 1, '2018-11-13 12:11:41', 1, 'open');
INSERT INTO `project_form_comp` (`form_comp_id`, `project_id`, `form_id`, `date_created`, `user_created`, `status`) VALUES (26, 5, 1, '2018-12-10 08:42:35', 1, 'open');


#
# TABLE STRUCTURE FOR: project_form_structure
#

DROP TABLE IF EXISTS `project_form_structure`;

CREATE TABLE `project_form_structure` (
  `structure_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(6) NOT NULL,
  `type_id` int(6) NOT NULL,
  `str_field_name` varchar(255) NOT NULL,
  `str_field_label` varchar(255) NOT NULL,
  `str_type` int(2) NOT NULL,
  `str_field_order` int(4) NOT NULL,
  `str_field_group` varchar(50) NOT NULL,
  `str_field_group_order` int(4) NOT NULL,
  `str_field_subgroup` varchar(50) NOT NULL,
  `str_field_subgroup_order` int(4) NOT NULL,
  `str_field_value` varchar(255) NOT NULL,
  `str_field_placeholder` varchar(100) NOT NULL,
  `str_field_subgroup_size` int(4) NOT NULL,
  `str_field_required` tinyint(1) NOT NULL,
  `str_field_rule` varchar(255) NOT NULL,
  `str_field_class` char(100) NOT NULL,
  PRIMARY KEY (`structure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `project_form_structure` (`structure_id`, `form_id`, `type_id`, `str_field_name`, `str_field_label`, `str_type`, `str_field_order`, `str_field_group`, `str_field_group_order`, `str_field_subgroup`, `str_field_subgroup_order`, `str_field_value`, `str_field_placeholder`, `str_field_subgroup_size`, `str_field_required`, `str_field_rule`, `str_field_class`) VALUES (1, 1, 1, 'temp_high', 'Temperature (high)', 5, 4, 'Project', 1, 'General', 1, '2', '', 8, 1, '', 'temperature-name');
INSERT INTO `project_form_structure` (`structure_id`, `form_id`, `type_id`, `str_field_name`, `str_field_label`, `str_type`, `str_field_order`, `str_field_group`, `str_field_group_order`, `str_field_subgroup`, `str_field_subgroup_order`, `str_field_value`, `str_field_placeholder`, `str_field_subgroup_size`, `str_field_required`, `str_field_rule`, `str_field_class`) VALUES (2, 1, 1, 'temp_low', 'Temperature (low)', 5, 1, 'Project', 1, 'General', 1, '7', '', 4, 1, 'numeric', '');
INSERT INTO `project_form_structure` (`structure_id`, `form_id`, `type_id`, `str_field_name`, `str_field_label`, `str_type`, `str_field_order`, `str_field_group`, `str_field_group_order`, `str_field_subgroup`, `str_field_subgroup_order`, `str_field_value`, `str_field_placeholder`, `str_field_subgroup_size`, `str_field_required`, `str_field_rule`, `str_field_class`) VALUES (3, 1, 1, 'prep_volume', 'Precipitation Volume (in)', 3, 1, 'Project', 1, 'Condition', 3, '4;6', '', 12, 1, '', '');
INSERT INTO `project_form_structure` (`structure_id`, `form_id`, `type_id`, `str_field_name`, `str_field_label`, `str_type`, `str_field_order`, `str_field_group`, `str_field_group_order`, `str_field_subgroup`, `str_field_subgroup_order`, `str_field_value`, `str_field_placeholder`, `str_field_subgroup_size`, `str_field_required`, `str_field_rule`, `str_field_class`) VALUES (4, 1, 3, 'weather_day', 'Weather Day?', 1, 1, 'Project', 1, 'Weather', 2, '', '', 6, 1, '', '');
INSERT INTO `project_form_structure` (`structure_id`, `form_id`, `type_id`, `str_field_name`, `str_field_label`, `str_type`, `str_field_order`, `str_field_group`, `str_field_group_order`, `str_field_subgroup`, `str_field_subgroup_order`, `str_field_value`, `str_field_placeholder`, `str_field_subgroup_size`, `str_field_required`, `str_field_rule`, `str_field_class`) VALUES (5, 1, 2, 'weather_month', 'Weather Month', 5, 1, 'Organization', 2, 'General', 1, '', '', 4, 0, '', '');
INSERT INTO `project_form_structure` (`structure_id`, `form_id`, `type_id`, `str_field_name`, `str_field_label`, `str_type`, `str_field_order`, `str_field_group`, `str_field_group_order`, `str_field_subgroup`, `str_field_subgroup_order`, `str_field_value`, `str_field_placeholder`, `str_field_subgroup_size`, `str_field_required`, `str_field_rule`, `str_field_class`) VALUES (6, 1, 2, 'custom', 'Custom', 2, 1, 'Organization', 2, 'Weather', 1, '', '', 12, 0, '', '');
INSERT INTO `project_form_structure` (`structure_id`, `form_id`, `type_id`, `str_field_name`, `str_field_label`, `str_type`, `str_field_order`, `str_field_group`, `str_field_group_order`, `str_field_subgroup`, `str_field_subgroup_order`, `str_field_value`, `str_field_placeholder`, `str_field_subgroup_size`, `str_field_required`, `str_field_rule`, `str_field_class`) VALUES (7, 1, 1, 'expert', 'Expert', 4, 2, 'Project', 1, 'General', 1, '8', '', 10, 1, '', 'temperature-name');
INSERT INTO `project_form_structure` (`structure_id`, `form_id`, `type_id`, `str_field_name`, `str_field_label`, `str_type`, `str_field_order`, `str_field_group`, `str_field_group_order`, `str_field_subgroup`, `str_field_subgroup_order`, `str_field_value`, `str_field_placeholder`, `str_field_subgroup_size`, `str_field_required`, `str_field_rule`, `str_field_class`) VALUES (8, 1, 1, 'file', 'Upload picture', 6, 3, 'Project', 1, 'General', 1, '', '', 5, 0, '', 'file-picture');


#
# TABLE STRUCTURE FOR: project_location
#

DROP TABLE IF EXISTS `project_location`;

CREATE TABLE `project_location` (
  `location_id` int(4) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(150) NOT NULL,
  `user_id` int(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `project_location` (`location_id`, `location_name`, `user_id`, `date_created`, `status`) VALUES (1, 'Monroe', 1, '2018-03-13 20:24:01', '1');
INSERT INTO `project_location` (`location_id`, `location_name`, `user_id`, `date_created`, `status`) VALUES (2, 'Waxhax', 2, '2018-03-13 20:24:01', '0');
INSERT INTO `project_location` (`location_id`, `location_name`, `user_id`, `date_created`, `status`) VALUES (3, 'Indian Trail', 1, '2018-05-14 20:23:07', '1');


#
# TABLE STRUCTURE FOR: project_status
#

DROP TABLE IF EXISTS `project_status`;

CREATE TABLE `project_status` (
  `status_id` int(2) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL,
  `status_description` varchar(255) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `project_status` (`status_id`, `status_name`, `status_description`) VALUES (1, 'Active', '');
INSERT INTO `project_status` (`status_id`, `status_name`, `status_description`) VALUES (2, 'Inactive', '');
INSERT INTO `project_status` (`status_id`, `status_name`, `status_description`) VALUES (3, 'Deleted', '');
INSERT INTO `project_status` (`status_id`, `status_name`, `status_description`) VALUES (4, 'Aproved', '');


#
# TABLE STRUCTURE FOR: project_worker_position
#

DROP TABLE IF EXISTS `project_worker_position`;

CREATE TABLE `project_worker_position` (
  `position_id` int(4) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(50) NOT NULL,
  `position_description` varchar(255) NOT NULL,
  `position_enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES (1, '127.0.0.1', 'member', '$2y$08$z.qHM.ypmI9whvLxkLdeB.wGpdt4Pi3O9AJ.J.yln.kEZ56TTbuo6', NULL, 'member@member.com', NULL, NULL, NULL, NULL, 1451903855, 1451905011, 1, 'Member', 'One', NULL, NULL);
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES (3, '127.0.0.1', 'pdpd', '$2y$08$KKbDfQmEUyR.n8wmOzejBe1X74Pdn.rsVk4hCtRtrzBlpXMQIq76O', NULL, 'sdfu@gmail.com', NULL, NULL, NULL, NULL, 1536174700, NULL, 1, 'pdp', 'user ', NULL, NULL);
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES (4, '127.0.0.1', 'qwerty', '$2y$08$TNL/ywN9i9C5xL6W8xBpcuqMrsNWxp.xo8OcqoUdGcB5WkaGfcfEq', NULL, 'ina-2992@gmal.com', NULL, NULL, NULL, NULL, 1536174755, NULL, 1, 'wer', 'qwer', NULL, NULL);


#
# TABLE STRUCTURE FOR: users_groups
#

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (1, 1, 1);
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (2, 2, 2);
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (3, 3, 1);
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (4, 3, 2);
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (5, 3, 4);
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (6, 4, 2);
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (7, 4, 3);
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (8, 4, 4);


#
# TABLE STRUCTURE FOR: users_permissions
#

DROP TABLE IF EXISTS `users_permissions`;

CREATE TABLE `users_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userID` (`user_id`,`perm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `users_permissions` (`id`, `user_id`, `perm_id`, `value`, `created_at`, `updated_at`) VALUES (2, 1, 1, 1, 1546036197, 1546036197);


#
# TABLE STRUCTURE FOR: water_location
#

DROP TABLE IF EXISTS `water_location`;

CREATE TABLE `water_location` (
  `location_id` int(4) NOT NULL AUTO_INCREMENT,
  `name_location` varchar(150) NOT NULL,
  `user_id` int(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `water_location` (`location_id`, `name_location`, `user_id`, `date_created`, `status`) VALUES (1, 'Monroe', 1, '2018-03-13 16:24:01', '1');
INSERT INTO `water_location` (`location_id`, `name_location`, `user_id`, `date_created`, `status`) VALUES (2, 'Waxhax', 2, '2018-03-13 16:24:01', '0');
INSERT INTO `water_location` (`location_id`, `name_location`, `user_id`, `date_created`, `status`) VALUES (3, 'Indian Trail', 1, '2018-05-14 16:23:07', '1');


#
# TABLE STRUCTURE FOR: water_pump
#

DROP TABLE IF EXISTS `water_pump`;

CREATE TABLE `water_pump` (
  `pump_id` int(4) NOT NULL AUTO_INCREMENT,
  `name_pump` varchar(150) NOT NULL,
  `location_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`pump_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `water_pump` (`pump_id`, `name_pump`, `location_id`, `user_id`, `date_created`, `status`) VALUES (1, 'Pump1', 1, 1, '2018-03-13 16:25:31', '1');
INSERT INTO `water_pump` (`pump_id`, `name_pump`, `location_id`, `user_id`, `date_created`, `status`) VALUES (2, 'Pump2', 1, 1, '2018-03-13 16:25:31', '1');
INSERT INTO `water_pump` (`pump_id`, `name_pump`, `location_id`, `user_id`, `date_created`, `status`) VALUES (3, 'Pump3', 3, 1, '2018-06-14 16:36:14', '1');
INSERT INTO `water_pump` (`pump_id`, `name_pump`, `location_id`, `user_id`, `date_created`, `status`) VALUES (4, 'Pump4', 2, 3, '2018-06-14 16:36:14', '0');


#
# TABLE STRUCTURE FOR: water_readings
#

DROP TABLE IF EXISTS `water_readings`;

CREATE TABLE `water_readings` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `meter` double NOT NULL,
  `volume` double NOT NULL,
  `location_id` int(4) NOT NULL,
  `pump_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (1, '2018-03-12', '1111', '32', 1, 1, 1, '2018-03-13 16:34:36');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (2, '2018-03-22', '1546', '23', 2, 2, 1, '2018-03-23 15:54:46');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (3, '2018-03-23', '1550', '4', 2, 2, 1, '2018-03-23 15:54:46');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (4, '0000-00-00', '12345', '11234', 1, 1, 1, '2018-06-15 16:31:49');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (5, '0000-00-00', '23', '23', 1, 2, 1, '2018-06-15 16:53:22');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (6, '0000-00-00', '25', '2', 1, 2, 1, '2018-06-15 16:55:18');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (7, '0000-00-00', '27', '2', 1, 2, 1, '2018-06-15 16:57:55');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (8, '0000-00-00', '30', '3', 1, 2, 1, '2018-06-15 17:00:14');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (9, '0000-00-00', '34', '4', 1, 2, 1, '2018-06-15 17:00:38');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (10, '0000-00-00', '40', '6', 1, 2, 1, '2018-06-15 17:07:22');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (11, '0000-00-00', '45', '5', 1, 2, 1, '2018-06-18 15:36:27');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (12, '2018-06-30', '12346', '1', 1, 1, 1, '2018-06-18 15:37:41');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (13, '2018-06-26', '2', '2', 3, 3, 1, '2018-06-18 15:39:13');
INSERT INTO `water_readings` (`id`, `date`, `meter`, `volume`, `location_id`, `pump_id`, `user_id`, `create_date`) VALUES (14, '2018-08-14', '3333', '3331', 3, 3, 1, '2018-08-24 16:26:48');


