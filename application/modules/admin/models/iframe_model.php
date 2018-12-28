<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iframe_model extends MY_Model {

	public $primary_key = 'id';
	public $_table = 'laserfiche_forms';

	public function __construct()
	{
		parent::__construct();

	}

	public function iframe_list($id=null, $active_status=1, $order_by='name')
	{
		if (!is_null($id)) $result = $this->get($id);
		elseif (!is_null($active_status)) $result = $this->order_by($order_by)->get_many_by('status',$active_status);
		elseif (is_null($active_status)) $result = $this->order_by($order_by)->get_all();

		if (count($result) < 1) return null; 
		else{
			foreach ($result as $item){
				$result_array[$item->id]= $item->name;
			}
		}
		return $result_array;

	}


	public function add_iframe($data)
	{		
		return $this->insert($data);
	}
}
