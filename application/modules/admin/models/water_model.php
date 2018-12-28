<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Water_model extends MY_Model {

	public $primary_key = 'id';
	public $_table = 'water_readings';

	public function __construct()
	{
		parent::__construct();

	}

	public function locations_list()
	{
		$this->primary_key = 'location_id';
		$this->_table = 'water_location';
		$result = $this->get_all();
		if (count($result) < 1) return null; 
		else{
			foreach ($result as $item){
				$result_array[$item->location_id]= $item->name_location;
			}
		}
		return $result_array;

	}

	public function active_location_list()
	{
		$this->primary_key = 'location_id';
		$this->_table = 'water_location';

		$result = $this->order_by('name_location')->get_many_by('status','1');
		if (count($result) < 1) return null; 
		else{
			foreach ($result as $item){
				$result_array[$item->location_id]= $item->name_location;
			}
		}
		return $result_array;

	}

	public function location($location_id)
	{
		$this->primary_key = 'location_id';
		$this->_table = 'water_location';
		$result = $this->get($location_id);
		if (count($result) < 1) return null; 
		else{
			foreach ($result as $item){
				$result_array[$item->location_id]= $item->name_location;
			}
		}
		return $result_array;

	}


	public function active_pump_list($location_id = null)
	{
		$this->primary_key = 'pump_id';
		$this->_table = 'water_pump';
		if (!is_null($location_id)) $condition = array('status'=>'1','location_id'=>$location_id);	else $condition = array('status'=>'1');
		$result = $this->order_by('name_pump')->get_many_by($condition);		
		if (count($result) < 1) return null; 
		else{
			foreach ($result as $item){
				$result_array[$item->pump_id]= $item->name_pump;
			}
		}
		return $result_array;

	}


	public function pumps_list()
	{
		$this->primary_key = 'pump_id';
		$this->_table = 'water_pump';
		$result = $this->get_all();
		if (count($result) < 1) return null; 
		else{
			foreach ($result as $item){
				$result_array[$item->pump_id]= $item->name_pump;
			}
		}	
		return $result_array;

	}

	public function pump($pump_id)
	{
		$this->primary_key = 'pump_id';
		$this->_table = 'water_pump';
		$result = $this->get($pump_id);
		if (count($result) < 1) return null; 
		else{
			foreach ($result as $item){
				$result_array[$item->pump_id]= $item->name_pump;
			}
		}		
		return $result_array;

	}

	public function last_water_reading($pump_id,$location_id,$row='meter')	
	{
		$this->primary_key = 'id';
		$this->_table = 'water_readings';
		$condition = array('pump_id'=>$pump_id,'location_id'=>$location_id);
		//$this->db->where("(LOWER(location) LIKE '%{$term}%' OR LOWER(name) LIKE '%{$term}%')");
		$this->db->select_max($row);
		$result = $this->get_by($condition);
		if (count($result) < 1) return null; 
		
		return $result->$row;
	}

	public function add_reading($data)
	{
		$this->primary_key = 'id';
		$this->_table = 'water_readings';		
		return $this->insert($data);
	}
}
