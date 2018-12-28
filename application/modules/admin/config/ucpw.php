<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['assets_dir']     = 'assets';
$config['frameworks_dir'] = $config['assets_dir'] . '/dist';
$config['plugins_dir']    = $config['frameworks_dir'] . '/plugins';
$config['upload_dir']     = 'upload';
$config['avatar_dir']     = $config['upload_dir'] . '/avatar';

$config['ucpw'] = array(

	// Site name
	'site_name' => 'UCPW',
	'title_mini' => 'UCPW',
	'title_lg' => 'Control Panel UCPW',
	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',
	
	//icon
	'icon' => 'data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAqElEQVRYR+2WYQ6AIAiF8W7cq7oXd6v5I2eYAw2nbfivYq+vtwcUgB1EPPNbRBR4Tby2qivErYRvaEnPAdyB5AAi7gCwvSUeAA4iis/TkcKl1csBHu3HQXg7KgBUegVA7UW9AJKeA6znQKULoDcDkt46bahdHtZ1Por/54B2xmuz0uwA3wFfd0Y3gDTjhzvgANMdkGb8yAyY/ro1d4H2y7R1DuAOTHfgAn2CtjCe07uwAAAAAElFTkSuQmCC',
	
	// Default meta data
	'meta_data'	=> array(
		'author'		=> '',
		'description'	=> '',
		'keywords'		=> ''
	),
	
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(			
			$config['frameworks_dir'].'/js/jquery.min.js',
			//$config['frameworks_dir'].'/admin/js/dashboard.min.js'
			//'assets/dist/admin/app.min.js'
		),
		'foot'	=> array(
			$config['frameworks_dir'].'/js/bootstrap.min.js',
			$config['plugins_dir'].'/slimscroll/slimscroll.min.js',
			$config['plugins_dir'].'/colorpickersliders/colorpickersliders.min.js',
			$config['plugins_dir'].'/tinycolor/tinycolor.min.js',
			$config['frameworks_dir'].'/admin/js/adminlte.min.js',
			$config['frameworks_dir'].'/admin/js/dashboard.min.js',
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			$config['frameworks_dir'].'/css/bootstrap.min.css',
			$config['frameworks_dir'].'/admin/css/adminlte.min.css',
			$config['frameworks_dir'].'/admin/css/skins/_all-skins.min.css',
			
			$config['frameworks_dir'].'/css/font-awesome.min.css',
			$config['frameworks_dir'].'/css/ionicons.min.css',
			$config['frameworks_dir'].'/css/master.min.css',
			$config['plugins_dir'].'/colorpickersliders/colorpickersliders.min.css',
			'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,700italic',
		)
	),

	// Default CSS class for <body> tag
	'body_class' => 'hold-transition fixed sidebar-mini',
	
	// Multilingual settings
	'languages' => array(
	),
	
	'mobile_version' => true,

	// Menu items
	'menu' => array(
		
		'water' => array(
			'name'		=> 'Water',
			'url'		=> '',
			'icon'		=> 'fa fa-tint',
			'children'  => array(
				'List'			=> 'water',
				'Add Readings'		=> 'water/insert',
				'Select Readings'	=> 'water/filter',				
			)
		),
		'project' => array(
			'name'		=> 'Projects',
			'url'		=> '',
			'icon'		=> 'fa fa-university',
			'children'  => array(
				'List'			=> 'project',
				'Create'		=> 'project/add',
				'Forms'			=> 'project/forms',	

			)
		),
		'user' => array(
			'name'		=> 'Users',
			'url'		=> 'user',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'List'			=> 'user',
				'Create'		=> 'user/create',
				'User Groups'	=> 'user/group',
			)
		),
		'iframe' => array(
			'name'		=> 'Iframe Forms',
			'url'		=> 'iframe',
			'icon'		=> 'fa fa-desktop',
			'children'  => array(
				'List'			=> 'iframe',
				'Create new'		=> 'iframe/insert',
			)
		),
		'panel' => array(
			'name'		=> 'Admin Panel',
			'url'		=> 'panel',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Admin Users'			=> 'panel/admin_user',
				'Create Admin User'		=> 'panel/admin_user_create',
				'Admin User Groups'		=> 'panel/admin_user_group',
			)
		),
		'util' => array(
			'name'		=> 'Utilities',
			'url'		=> 'util',
			'icon'		=> 'fa fa-cogs',
			'children'  => array(
				'Database Versions'		=> 'util/list_db',
			)
		),
		'logout' => array(
			'name'		=> 'Sign Out',
			'url'		=> 'panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
	),

	// Login page
	'login_url' => 'admin/login',

	// Restricted pages
	'page_auth' => array(
		'water'						=> array('webmaster', 'admin', 'manager'),
		'water/insert'				=> array('webmaster', 'admin', 'manager'),
		'water/filter'				=> array('webmaster', 'admin', 'manager'),
		'iframe'						=> array('webmaster', 'admin', 'manager'),
		'iframe/insert'				=> array('webmaster', 'admin', 'manager'),
		'panel'						=> array('webmaster'),
		'panel/admin_user'			=> array('webmaster'),
		'panel/admin_user_create'	=> array('webmaster'),
		'panel/admin_user_group'	=> array('webmaster'),
		'util'						=> array('webmaster'),
		'util/list_db'				=> array('webmaster'),
		'util/backup_db'			=> array('webmaster'),
		'util/restore_db'			=> array('webmaster'),
		'util/remove_db'			=> array('webmaster'),
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'skin-green',
			'admin'		=> 'skin-purple',
			'manager'	=> 'skin-black',
			'staff'		=> 'skin-blue',
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Frontend Website',
			'url'		=> '',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		),
		array(
			'auth'		=> array('webmaster', 'admin'),
			'name'		=> 'API Site',
			'url'		=> 'api',
			'target'	=> '_blank',
			'color'		=> 'text-orange'
		),
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Github Repo',
			'url'		=> CI_BOOTSTRAP_REPO,
			'target'	=> '_blank',
			'color'		=> 'text-green'
		),
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_admin';


