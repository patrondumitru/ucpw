<?php

/**
 * Config file for form validation
 * Reference: http://www.codeigniter.com/user_guide/libraries/form_validation.html
 * (Under section "Creating Sets of Rules")
 */

$config = array(

	// Admin User Login
	'login/index' => array(
		array(
			'field'		=> 'username',
			'label'		=> 'Username',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
	),

	// Create User
	'user/create' => array(
		array(
			'field'		=> 'first_name',
			'label'		=> 'First Name',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'last_name',
			'label'		=> 'Last Name',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'username',
			'label'		=> 'Username',
			'rules'		=> 'is_unique[users.username]',				// use email as username if empty
		),
		array(
			'field'		=> 'email',
			'label'		=> 'Email',
			'rules'		=> 'required|valid_email|is_unique[users.email]',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[password]',
		),
	),

	// Reset User Password
	'user/reset_password' => array(
		array(
			'field'		=> 'new_password',
			'label'		=> 'New Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[new_password]',
		),
	),

	// Create Admin User
	'panel/admin_user_create' => array(
		array(
			'field'		=> 'username',
			'label'		=> 'Username',
			'rules'		=> 'required|is_unique[users.username]',
		),
		array(
			'field'		=> 'first_name',
			'label'		=> 'First Name',
			'rules'		=> 'required',
		),
		/* Admin User can have no email
		array(
			'field'		=> 'email',
			'label'		=> 'Email',
			'rules'		=> 'valid_email|is_unique[users.email]',
		),*/
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[password]',
		),
	),

	// Reset Admin User Password
	'panel/admin_user_reset_password' => array(
		array(
			'field'		=> 'new_password',
			'label'		=> 'New Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[new_password]',
		),
	),

	// Admin User Update Info
	'panel/account_update_info' => array(
		array(
			'field'		=> 'username',
			'label'		=> 'Username',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'password',
			'label'		=> 'Password',
			'rules'		=> 'required',
		),
	),

	// Admin User Change Password
	'panel/account_change_password' => array(
		array(
			'field'		=> 'new_password',
			'label'		=> 'New Password',
			'rules'		=> 'required',
		),
		array(
			'field'		=> 'retype_password',
			'label'		=> 'Retype Password',
			'rules'		=> 'required|matches[new_password]',
		),
	),

	'water/add_readings'=>array(
		array(
			'field'		=> 'location_id',
			'label'		=> 'Location',
			'rules'		=> 'required|numeric'),
		array(
			'field'		=> 'pump_id',
			'label'		=> 'Pumps',
			'rules'		=> 'required|numeric'),
		array(
			'field'		=> 'date',
			'label'		=> 'Date',
			'rules'		=> 'required'),
		array(
			'field'		=> 'meter',
			'label'		=> 'Meters',
			'rules'		=> 'required|numeric'),
		
		),

	'iframe/insert'=>array(
		array(
			'field'		=> 'name',
			'label'		=> 'Name',
			'rules'		=> 'required'),
		array(
			'field'		=> 'path',
			'label'		=> 'Address iframe',
			'rules'		=> 'required'),
		array(
			'field'		=> 'url_name',
			'label'		=> 'Menu name',
			'rules'		=> 'required'),
		array(
			'field'		=> 'width',
			'label'		=> 'Width',
			'rules'		=> 'required'),
		array(
			'field'		=> 'height',
			'label'		=> 'Height',
			'rules'		=> 'required'),
		array(
			'field'		=> 'status',
			'label'		=> 'Status',
			'rules'		=> 'required'),
		
		),

	'project/add'=>array(
		array(
			'field'		=> 'location_id',
			'label'		=> 'Location',
			'rules'		=> 'required|numeric'),
		array(
			'field'		=> 'name',
			'label'		=> 'Project name',
			'rules'		=> 'required'),
		array(
			'field'		=> 'engineer',
			'label'		=> 'Engineer',
			'rules'		=> 'required'),
		array(
			'field'		=> 'manager',
			'label'		=> 'Manager',
			'rules'		=> 'required'),
		array(
			'field'		=> 'inspector',
			'label'		=> 'Inspector',
			'rules'		=> 'required'),
		array(
			'field'		=> 'status_id',
			'label'		=> 'Status',
			'rules'		=> 'required'),
		
		),

	'project/fillform'=>array(
		array(
			'field'		=> 'id_project',
			'label'		=> 'Project',
			'rules'		=> 'required|numeric'),
		array(
			'field'		=> 'form_id',
			'label'		=> 'Form name',
			'rules'		=> 'required'),		
		),
);
