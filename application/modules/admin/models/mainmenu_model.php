<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainmenu_model extends MY_Model {

	public $primary_key = 'id';
	public $_table = 'main_menus';

	public function __construct()
	{
		parent::__construct();

	}

	public function get_menu($type ='public', $show = 1)
	{
		$result = $this->as_array()->get_many_by(array('type'=>$type,'show'=>$show));

		return $result;	
	}

	public function get_menu_level($type ='public', $show = 1)
	{
		return true;
	}


	public function get_menu_group($group, $type ='public', $show = 1)
	{
		$result = $this->as_array()->get_many_by(array('group'=>$group,'type'=>$type,'show'=>$show));

		return $result;
	}


	public function get_backend_menu()
	{
		return $result = $this->get_many_by('type','admin');

	}

	public function get_all_menu()
	{
		return $this->get_all();;

	}


}