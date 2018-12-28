<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['assets_dir']     = 'assets';
$config['frameworks_dir'] = $config['assets_dir'] . '/dist';
$config['plugins_dir']    = $config['frameworks_dir'] . '/plugins';
$config['upload_dir']     = 'upload';
$config['avatar_dir']     = $config['upload_dir'] . '/avatar';

$config['ucpw'] = array(

	// Site name
	'site_name' => 'UCPW Project',

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
		),
		'foot'	=> array(
			$config['plugins_dir'].'/jquery/jquery.min.js',
			$config['plugins_dir'].'/bootstrap/js/bootstrap.bundle.min.js',
			$config['plugins_dir'].'/jquery-easing/jquery.easing.min.js',
			$config['plugins_dir'].'/scrollreveal/scrollreveal.min.js',
			$config['plugins_dir'].'/magnific-popup/jquery.magnific-popup.min.js',			
			$config['frameworks_dir'].'/frontend/creative.min.js',
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			$config['plugins_dir'].'/bootstrap/css/bootstrap.min.css',						
			$config['plugins_dir'].'/font-awesome/css/font-awesome.min.css',
			'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
			'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic',
			$config['plugins_dir'].'/magnific-popup/magnific-popup.css',
			$config['frameworks_dir'].'/frontend/creative.min.css'

		)
	),

	// Default CSS class for <body> tag
	'body_class' => 'hold-transition fixed sidebar-mini',
	
	// Multilingual settings
	'languages' => array(
		'default'		=> 'en',
		'autoload'		=> array('general'),
		'available'		=> array(
			'en' => array(
				'label'	=> 'English',
				'value'	=> 'english'
			),
			'zh' => array(
				'label'	=> '繁體中文',
				'value'	=> 'traditional-chinese'
			),
			'cn' => array(
				'label'	=> '简体中文',
				'value'	=> 'simplified-chinese'
			),
			'es' => array(
				'label'	=> 'Español',
				'value' => 'spanish'
			)
		)
	),

	'mobile_version' => true,
	
	// Google Analytics User ID
	'ga_id' => '',

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
		),
	),

	// Login page
	'login_url' => '',

	// Restricted pages
	'page_auth' => array(
	),

	// Email config
	'email' => array(
		'from_email'		=> '',
		'from_name'			=> '',
		'subject_prefix'	=> '',
		
		// Mailgun HTTP API
		'mailgun_api'		=> array(
			'domain'			=> '',
			'private_api_key'	=> ''
		),
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> false,
		'profiler'	=> false
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_frontend';