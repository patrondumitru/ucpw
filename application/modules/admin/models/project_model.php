<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends MY_Model {

	public $primary_key = 'prj_id';
	public $_table = 'project';

	public function __construct()
	{
		parent::__construct();

	}

	public function status()
	{
		$this->primary_key = 'status_id';
		$this->_table = 'project_status';
		if (func_num_args() > 0) {			
		 	$row = $this->as_array()->get(implode(func_get_args()));
		 	$result = $row['status_name'];
		 }
		else {
		 	$result = $this->get_all();
		 }
		 return $result;
	}

	public function get_project($prj_id)
	{
		$this->primary_key = 'prj_id';
		$this->_table = 'project';
		$result = $this->get($prj_id);
		return $result;
	}
//if (isset($params) && !empty($params))
	//array_slice(func_get_args(), 3)

	public function status_list()
	{
		$this->primary_key = 'status_id';
		$this->_table = 'project_status';
		$result = $this->get_all();
		if (mycount($result) < 0 or is_null($result)) return false; 
		else{
			foreach ($result as $item){
				$result_array[$item->status_id]= $item->status_name;
			}
		}
		return $result_array;
	}

	public function location()
	{
		$this->primary_key = 'location_id';
		$this->_table = 'project_location';
		if (func_num_args() > 0) {			
		 	$row = $this->as_array()->get(implode(func_get_args()));
		 	$result = $row['location_name'];
		 }
		else {
		 	$result = $this->get_all();
		 }
		 return $result;

	}

	public function active_location($status = 1)
	{
		$this->primary_key = 'location_id';
		$this->_table = 'project_location';

		$result = $this->order_by('location_name')->get_many_by('status',$status);
		if (mycount($result) < 1) return null; 
		else{
			foreach ($result as $item){
				$result_array[$item->location_id]= $item->location_name;
			}
		}
		return $result_array;

	}

	public function forms()
	{
		$this->primary_key = 'form_id';
		$this->_table = 'project_form';

		$result = $this->order_by('order_position')->get_all();
		if (mycount($result) < 0 or is_null($result)) return false; 
		else{
			return $result;
		}

		return false;
	}

	public function active_forms($status = 1)
	{
		$this->primary_key = 'form_id';
		$this->_table = 'project_form';

		$result = $this->order_by('order_position')->get_many_by('status',$status);
		if (mycount($result) < 0 or is_null($result)) return false; 
		else{
			return $result;
		}

		return false;
	}

	public function get_form($form_id)
	{
		$this->primary_key = 'form_id';
		$this->_table = 'project_form';

		$result = $this->get($form_id);
		if (mycount($result) < 0 or is_null($result)) return false; 
		else{
			return $result;
		}

		return false;
	}

	public function count_completed_form($form_id, $project_id=null)
	{
		$this->primary_key = 'form_comp_id';
		$this->_table = 'project_form_comp';
		if (is_null($project_id)) $result = $this->count_by(array('form_id'=>$form_id));
		else $result = $this->count_by(array('form_id'=>$form_id, 'project_id'=>$project_id));
		if (mycount($result) < 0 or is_null($result)) return false; 
		else{
			return $result;
		}

		return false;
	}


	public function get_completed_form($form_id, $project_id=null)
	{
		$this->primary_key = 'form_comp_id';
		$this->_table = 'project_form_comp';
		if (is_null($project_id)) $get_by = array('form_id'=>$form_id);
			else $get_by = array('form_id'=>$form_id, 'project_id'=>$project_id);
		$result = $this->get_many_by($get_by);
		if (mycount($result) < 0 or is_null($result)) return false; 
		else{
			return $result;
		}

	}

	public function get_completed_form_info($form_comp_id) //get_completed_form_info($form_id,$id_project);
	{
		$this->primary_key = 'form_comp_id';
		$this->_table = 'project_form_comp';
		
		$result = $this->get($form_comp_id);		
		if (mycount($result) < 0 or is_null($result)) return false; 
		else{
			return $result;
		}

		return false;
	}


	public function get_form_table_info($form_id)
	{
		$this->primary_key = 'form_id';
		$this->_table = 'project_form';

		$result = $this->get_by('form_id', $form_id);

		if (mycount($result) < 0 or is_null($result)) return false; 
		else{
			$table_info = json_decode($result->table_info);
			return $table_info;
		}

		return false;
	}
	//debug(json_decode('{"Name":"form_id","prj_name":"My first edit project"}'));
	  
	public function get_form_structure($form_id, $order = false)
	{
		$this->primary_key = 'structure_id';
		$this->_table = 'project_form_structure';
		if ($order) $this->db->order_by('str_field_group_order')->order_by('str_field_subgroup_order')->order_by('str_field_order');
		
		$result = $this->get_many_by('form_id', $form_id);
		if (mycount($result) < 0 or is_null($result)) return false; 
		else{			
			return $result;
		}

		return false;
	}
/*
	public function get_form_field($prj_fields_id)
	{
		$this->primary_key = 'prj_fields_id';
		$this->_table = 'project_form_fields';

		$result = $this->get_many_by('form_id', $form_id);
		if (mycount($result) < 0) return 0; 
		else{			
			return $result;
		}

		return false;
	} 
*/
	public function get_form_field_value($structure_id, $value=null)
	{
		$this->primary_key = 'fl_id';
		$this->_table = 'project_field_value';
		if (is_null($value)) $result = $this->get_by('structure_id', $structure_id);
		else {
			$result = $this->get_by('fl_id',$value);
		}

		if (mycount($result) < 0 or is_null($result)) return false; 
		else{			
			return $result->fl_value;
		}

		return false;
	} 

	/*public function get_form_field_value($prj_fields_id, $value=null)
	{
		$this->primary_key = 'fl_id';
		$this->_table = 'project_field_value';//$this->_table = 'project_form_field_value';
		if (is_null($value)	$result = $this->get_by('prj_fields_id', $prj_fields_id);
		else $result = $this->where('fl_value',$value)->get_by('prj_fields_id', $prj_fields_id); //_set_where($where)

		if (mycount($result) < 0) return 0; 
		else{			
			return $result;
		}

		return false;
	} 
*/
	

	public function export_forms_data($form_id=null, $id_project=null)
	{
		$table = 'project_data';
		$join = array('project_form_structure'=>'project_data.structure_id = project_form_structure.structure_id');
		$data_field = array('project_data.id','project_form_structure.structure_id','project_form_structure.str_type','project_data.value','project_form_structure.str_field_name');
		$completed_form = $this->get_completed_form($form_id,$id_project); 
		$where = null;

		$this->db->order_by('project_form_structure.str_field_group_order');
		$this->db->order_by('project_form_structure.str_field_subgroup_order');		
		$this->db->order_by('project_form_structure.str_field_order');

		foreach($completed_form as $item){
			$in = array('project_data.form_comp_id'=>$item->form_comp_id);
			$result[$item->form_comp_id] = $this->get_join($table,$data_field,$join,$where, $in);
		}		
		return $result;
	}

	public function get_forms_data($form_id=null, $id_project=null, $all_data = false)
	{
		$table_rows = $this->get_form_table_info($form_id);
		if($table_rows){
			foreach ($table_rows  as $row){
				$rows[] = $row;
			}	
		}
		else return false;
		//$completed_form = $this->get_completed_form_info($form_id,$id_project); 
		if (is_null($id_project)) $completed_form = $this->get_completed_form($form_id); 
		else $completed_form = $this->get_completed_form($form_id,$id_project); 
		
			
		$table = 'project_data';
		$join = array('project_form_structure'=>'project_data.structure_id = project_form_structure.structure_id');
		if ($all_data) $data_field = '*';
		else $data_field = array('project_data.id','project_form_structure.structure_id','project_form_structure.str_type','project_data.value','project_form_structure.str_field_name');
		$where = null;	
		if (count($completed_form) >= 1){	
			//debug($completed_form,1);
			foreach($completed_form as $item){
				$in = array('project_data.form_comp_id'=>$item->form_comp_id,'project_form_structure.str_field_name'=>$rows);
				$result[$item->form_comp_id] = $this->get_join($table,$data_field,$join,$where, $in);
			}				
			return $result;
		}
		else {
			return false;
		}
	}

	public function get_form_data($completed_id, $all_data = false)
	{		
		$table = 'project_data';
		$join = array('project_form_structure'=>'project_data.structure_id = project_form_structure.structure_id');
		if ($all_data) $data_field = '*';
		else $data_field = array('project_data.id','project_form_structure.structure_id','project_form_structure.str_type','project_data.value','project_form_structure.str_field_name');

		$where = array('project_data.form_comp_id'=>$completed_id);
		$result = $this->get_join($table,$data_field,$join,$where);
		return $result;
	}

	public function get_field_value($structure_id, $type, $value)
	{	
		$type_array = array('1','2');
		if (!in_array($type, $type_array)) {
			$value = $this->get_form_field_value($structure_id, $value);
		}
		return $value;
	}

	public function get_join($table,$fields,$join,$where=null, $in=null) 
	{ 
		if(is_array($fields)){
		    foreach($fields as $coll => $value){
				$this->db->select($value);
		    }  
		}
		else  $this->db->select($fields);
	    $this->db->from($table);
	    
	    if(!is_null($where)){
		    if(is_array($where)){
			    foreach($where as $key => $cond){
					$this->db->where($key, $cond);
			    }  
			}
			else  $this->db->where($where);
		}

		if(!is_null($in)){
		    if(is_array($in)){
			    foreach($in as $keyIn => $condIn){
					$this->db->where_in($keyIn, $condIn);
			    }  
			}
		}
		if (is_array($join)){    
		    foreach($join as $coll => $value){
				$this->db->join($coll, $value);
		    }
	    }

	    $query = $this->db->get();

	    return $query->result();
	}

	public function savecompletedform($data)
	{
		$this->primary_key = 'form_comp_id';
		$this->_table = 'project_form_comp';

		return $this->insert($data);
	}

	public function savedata($data)
	{
		$this->primary_key = 'id';
		$this->_table = 'project_data';

		return $this->insert($data);
	}

	public function createform($data)
	{
		$this->primary_key = 'form_id';
		$this->_table = 'project_form';

		return $this->insert($data);
	}

	public function createformstructure($data)
	{
		$this->primary_key = 'structure_id';
		$this->_table = 'project_form_structure';

		return $this->insert($data);
	}

	public function form_last_position($data)
	{
		$this->primary_key = 'form_id';
		$this->_table = 'project_form';

		 $result = $this->order_by('order_position', 'DESC')->limit(1)->get_all();
		 debug($result);
		return true;
		//return $this->insert($data);
	}
}
