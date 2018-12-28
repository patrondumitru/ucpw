<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	public $primary_key = 'id';
	public $_table = 'users';

	public function __construct()
	{
		parent::__construct();

	}

	public function name($id)
	{
		$this->ion_auth_model->tables = array(
				'users'				=> 'users',
				'groups'			=> 'groups',
				'users_groups'		=> 'users_groups',
				'login_attempts'	=> 'login_attempts',
			);

		$users = $this->ion_auth->user($id)->row(); 
		$user = $users->first_name.' '.$users->last_name;
		return $user;
	}
	
	public function user_group($group)
	{
		$this->ion_auth_model->tables = array(
				'users'				=> 'users',
				'groups'			=> 'groups',
				'users_groups'		=> 'users_groups',
				'login_attempts'	=> 'login_attempts',
			);
		$users = $this->ion_auth->users($group)->result();				
		return $users;
		//$users = $this->ion_auth->in_group(3);
		//$users = $this->ion_auth->get_users_groups()->row(2);
		//$users = $this->ion_auth->users($id)->row(); 
		//$user = $users->first_name.' '.$users->last_name;
	}

	public function users_by_group($group)
	{
		$users = $this->user_group($group);
		
		foreach ($users as $item){
			$user_list[$item->id] = $item->first_name.' '.$item->last_name;
		}
		return $user_list;		
	}


	public function engineers()
	{
		return $this->users_by_group(2);
	}

	public function managers()
	{
		return $this->users_by_group(3);
	}

	public function inspectors()
	{
		return $this->users_by_group(4);
	}

	public function get_users_groups($id){ // get all users 
		$this->ion_auth->get_users_groups()->row()->id;
	}
}
