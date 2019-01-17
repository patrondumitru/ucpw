<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class PFBuilder {
	protected $structure_table = 'project_form_structure';
	protected $structure_id = 'structure_id';	

	protected $field_value_table = 'project_field_value';
	protected $field_value_id = 'fl_id';

	protected $field_type = 'project_fields_type';
	protected $type_id = 'type_id';

	protected $project_data_table = 'project_data';
	protected $project_data_id = 'id';

	protected $project_completed_table = 'project_form_comp';
	protected $project_completed_id = 'form_comp_id';


	public $structure = array();
	public $groups = array();
	public $subgroups = array();
	public $by_groups = array();
	public $form_id = null;
	public $project_id = null;

	protected $mRuleGroup ;
	protected $mFormUrl ;
	protected $mMultipart ;
	protected $mAttributes ;
	protected $mFormCount;
	protected $mPostUrl;
	//saved data
	protected $mFormData; 
	protected $mSessionKey;

	public function __construct($config = array())
	{
		// just in case url helper has not load yet
		$this->ci =& get_instance();
		//$this->ci->load->helper('url');
		//$this->ci->load->library('Form_builder');
		$this->ci->load->helper('form');
		$this->ci->load->library('form_validation');
		$this->ci->load->library('system_message');
		$this->mFormUrl = current_url();

		$this->initialize($config);
		$this->mFormCount++;
	}

	public function initialize($config = array())
	{
		foreach ($config as $key => $value) {
			$this->$key = $value;
		}

	}
	public function set_session($id)
	{
		$this->mSessionKey = 'pfform-'.$id;	
		$this->mFormData = $this->ci->session->flashdata($this->mSessionKey);		
	}
		

	public function set_form($form_id) {
		$this->form_id = $form_id;		
		$this->get_structure_by_form();	
		return true;
	}

/*/////////////////////
Submit Form METHODS
////////////////////*/

	public function create_form($url = NULL, $multipart = FALSE, $attributes = array())
	{
		$url = ($url===NULL) ? current_url() : $url;
		$this->mPostUrl = $url;
		$this->mMultipart = $multipart;
		$this->mAttributes = $attributes;		
		$this->set_session($this->mFormCount);
		return true;
	}

	public function set_rule_group($rule_group)
	{
		$this->mRuleGroup = $rule_group;
	}

	// Update target URL:
	// 	- $this->mPostUrl = the page where the form is submitted to (i.e. "action" attribute of the form)
	// 	- $this->mFormUrl = the page where the form is located at (for redirection when failed)
	public function set_post_url($url)
	{
		$this->mPostUrl = $url;
	}
	public function set_form_url($url)
	{
		$this->mFormUrl = $url;
	}

	// Render form open tag
	public function openhtmlform()
	{
		if ($this->mMultipart)
			return form_open_multipart($this->mPostUrl, $this->mAttributes);
		else
			return form_open($this->mPostUrl, $this->mAttributes);
	}

	// Render form close tag
	public function closehtmlform()
	{
		return form_close();
	}

/*/////////////////////
DATABASE METHODS
////////////////////*/

	public function get_structure_by_form($form_id = null) {
		if (is_null($form_id) and is_null($this->form_id)) return false;
		if (!is_null($form_id)) $this->form_id = $form_id; 
		

		$CI =& get_instance();
		$CI->db->escape_str($this->structure_table);
		$CI->db->escape_str($this->structure_id);
		$CI->db->from($this->structure_table);
		$CI->db->where('form_id', $this->form_id);
		$CI->db->order_by('str_field_group_order');
		$CI->db->order_by('str_field_subgroup_order');		
		$CI->db->order_by('str_field_order');	
		$query = $CI->db->get();
		if ($query->num_rows() > "0") {	
			$this->structure = $query->result_object();			
			$this->get_form_group();
			return $this->structure;
		}
		else
		{
			return false;
		}
	}

	public function get_structure_by_name($name, $form_id = null) {
		if ($this->check($form_id)){
			$CI =& get_instance();
			$CI->db->escape_str($this->structure_table);
			$CI->db->escape_str($this->structure_id);
			$CI->db->from($this->structure_table);
			$CI->db->where('form_id', $this->form_id);
			$CI->db->where('str_field_name', $name);
			$CI->db->order_by('str_field_group_order');
			$CI->db->order_by('str_field_subgroup_order');		
			$CI->db->order_by('str_field_order');	
			$query = $CI->db->get();
			if ($query->num_rows() > "0") {							
				return $query->result();
			}
			else
			{
				return false;
			}
		}
		else 
		{
			return false;
		}
	}

	public function id_structure_by_name($name, $form_id = null)
	{	
		if ($this->check($form_id))
		{
			$row = $this->get_structure_by_name($name, $form_id);
			return $row[0]->structure_id;
		}
		else 
		{
			return false;
		}
	}

	public function get_field_values($id = null) {
		$CI =& get_instance();
		$CI->db->escape_str($this->field_value_table);
		$CI->db->escape_str($this->field_value_id);
		$CI->db->from($this->field_value_table);
		$CI->db->where($this->structure_id, $id);		
		$query = $CI->db->get();	
		$outputArray = array();
		if ($query->num_rows() > "0") {			
			foreach($query->result() as $val) {
				$outputArray[$val->fl_id] = $val->fl_value;
			}			
			return $outputArray;
		}else {
			return false;	
		}
		
	}

	public function get_field_type($id = null) {
		$CI =& get_instance();
		$CI->db->escape_str($this->field_type);
		$CI->db->escape_str($this->type_id);
		$CI->db->from($this->field_type);
		$CI->db->where($this->type_id, $id);		
		$query = $CI->db->get();	
		$output = '';
		if ($query->num_rows() > "0") {	
			foreach($query->result() as $item){				
				$output = $item->type_type;
			}
			return $output;
		}else {
			return false;	
		}
		
	}


	public function get_completed_form($id = null) 
	{
		$CI =& get_instance();
		$CI->db->escape_str($this->project_completed_table);
		$CI->db->escape_str($this->project_completed_id);
		$CI->db->from($this->project_completed_table);
		$CI->db->where($this->project_completed_id, $id);		
		$query = $CI->db->get();	
		$output = '';
		if ($query->num_rows() > "0") {	
			foreach($query->result() as $item){				
				$output['project_id'] = $item->type_type;
			}
			return $output->result();;
		}else {
			return false;	
		}

	}
	public function get_completed_form_id($id = null) 
	{
		$result = $this->get_completed_form($id);
		foreach($query as $item){				
			$form_id = $item->form_id;
		}
		$this->form_id = $form_id;
		return $form_id;
	}


	public function get_completed_project_id($id = null) 
	{
		$result = $this->get_completed_form($id);
		foreach($query as $item){				
			$project_id = $item->form_id;
		}
		$this->project_id = $project_id;
		return $project_id;

	}

	public function get_form_group($form_id = null) 
	{
		if ($this->check($form_id)){

			$outputArray = array();
			foreach($this->structure as $item){
				$outputArray[] =  $item->str_field_group;
			}		
			$this->groups = array_unique($outputArray);
			$this->separate_groups();
			return $this->groups;	
		}
		else {
			return false;
		}
	}

	
	public function get_form_subgroup($form_id = null) 
	{
		if ($this->check($form_id)){

			$outputArray = array();
			foreach($this->structure as $item){
				$outputArray[] =  $item->str_field_group;
			}		
			$this->groups = array_unique($outputArray);
			
			return $this->subgroups;	
		}
		else {
			return false;
		}
	}

	public function separate_groups($form_id = null) 
	{
		if ($this->check($form_id)){
			$outputArray = array();
			
			foreach($this->groups as $group)
			{
				foreach($this->structure as $item)
				{					
					if ($item->str_field_group == $group) {
						$outputArray[$group][$item->str_field_subgroup][$item->str_field_order] = $item;

					}
				}
			}				
		
		$this->by_groups = $outputArray;
		return $this->by_groups;	
		}
		else {
			return false;
		}
	}

	protected function check($form_id = null) 
	{
		if (is_null($form_id) and is_null($this->form_id)) return false;
		if (!is_null($form_id)) $this->get_structure_by_form($form_id); 
		if ($this->structure) return true; else return false;
	}

// ---------------------------------------------------------------------------

	// Get saved value for single field
	public function get_field_value($name)
	{
		return isset($this->mFormData[$name]) ? $this->mFormData[$name] : set_value($name);
	}

	public function field_text($name, $value = NULL, $extra = array())
	{
		$data = array('type' => 'text', 'id' => $name, 'name' => $name);
		$value = ($value===NULL) ? $this->get_field_value($name) : $value;
		return form_input($data, $value, $extra);
	}

	public function pf_text($data)
	{
		$extra['class'] = 'form-control '.$data->str_field_class;
		$extra['placeholder'] = $data->str_field_placeholder;
		return '<div class="'.$this->pf_size($data).'">'.form_label($data->str_field_label.$this->pf_required($data), $data->str_field_name, 'class="control-label"').$this->field_text($data->str_field_name, $data->str_field_value, $extra).$this->pf_help($data).'</div>';

	}

	public function field_textarea($name, $value = NULL, $extra = array())
	{
		$data = array('id' => $name, 'name' => $name);
		$value = ($value===NULL) ? $this->get_field_value($name) : $value;
		return form_textarea($data, $value, $extra);
	}

	public function pf_textarea($data)
	{
		$extra['class'] = 'form-control '.$data->str_field_class;
		$extra['placeholder'] = $data->str_field_placeholder;
		return '<div class="'.$this->pf_size($data).'">'.form_label($data->str_field_label.$this->pf_required($data), $data->str_field_name, 'class="control-label"').$this->field_textarea($data->str_field_name, $data->str_field_value, $extra).$this->pf_help($data).'</div>';
	}

	public function field_dropdown($name, $options = array(), $selected = array(), $extra = array())
	{
		return form_dropdown($name, $options, $selected, $extra);
	}

	public function pf_dropdown($data, $options = array(), $value = NULL, $extra = array())
	{
		$extra['class'] = 'form-control '.$data->str_field_class;
		if ($value===NULL) $value = (isset($this->mFormData[$data->str_field_name])) ? $this->get_field_value($data->str_field_name) : $data->str_field_value;
		return '<div class="'.$this->pf_size($data).'">'.form_label($data->str_field_label.$this->pf_required($data), $data->str_field_name, 'class="control-label"').$this->field_dropdown($data->str_field_name, $options, $value, $extra).$this->pf_help($data).'</div>';
	}


	public function field_checkbox($name, $value = NULL, $checked = FALSE, $id=NULL, $extra = array())
	{
		if (is_null($id)) $id = $name;		
		$data = array('id' => $id, 'name' => $name, 'type' => "checkbox", 'value' => $value );
		
		return form_checkbox($data, $value, $checked, $extra);
	}

	public function pf_checkbox($data, $option=array(), $with_name=true)
	{
		//debug($this->get_field_values($data->structure_id));
		$extra['class'] = "".$data->str_field_class;

		$output = '<div class="'.$this->pf_size($data).'">'.form_label($data->str_field_label.$this->pf_required($data), $data->str_field_name, 'class="control-label"');		
		$default_value = explode(";", $data->str_field_value);
		if (!empty($option)){
			foreach($option as $key => $item){
				
				if(in_array($key, $default_value)) $checked = TRUE; else $checked = FALSE;
				$output .= '<div class="checkbox">';			
				if ($with_name) $output .= form_label($this->field_checkbox($data->str_field_name.'[]', $key, $checked, $data->str_field_name.$key, $extra).$item, $data->str_field_name.$key, 'class="control-label"');
	            $output .='</div>';            
			}
		}
		$output .= $this->pf_help($data).'</div>'; 
		return $output;
	}

	public function field_radiobox($name, $value = NULL, $checked = FALSE, $id=NULL, $extra = array())
	{
		if (is_null($id)) $id = $name;
		$data = array('id' => $id, 'name' => $name, 'type' => "radio", 'value' => $value );			
		return form_radio($data, $value, $checked, $extra);
	}

	public function pf_radiobox($data, $option=array(), $with_name=true)
	{
		//debug($this->get_field_values($data->structure_id));
		$extra['class'] = "".$data->str_field_class;

		$output = '<div class="'.$this->pf_size($data).'">'.form_label($data->str_field_label.$this->pf_required($data), $data->str_field_name, 'class="control-label"');		
		$default_value = explode(";", $data->str_field_value);
		if (!empty($option)){
			foreach($option as $key => $item){

				if(in_array($key, $default_value)) $checked = TRUE; else $checked = FALSE;


				$output .= '<div class="radio">';			
				if ($with_name) $output .= form_label($this->field_radiobox($data->str_field_name, $key, $checked, $data->str_field_name.$key, $extra).$item, $data->str_field_name.$key, 'class="control-label"');
	            $output .= $this->pf_help($data).'</div>';            
			}
		}
		$output .= '</div>'; 
		return $output;
	}

	public function field_file($name, $value = NULL, $extra = array())
	{
		$data = array('type' => 'file', 'id' => $name, 'name' => $name);
		$value = ($value===NULL) ? $this->get_field_value($name) : $value;
		return form_upload($data, $value, $extra);
	}

	public function pf_file($data)
	{	
		$extra['class'] = $data->str_field_class;
		$extra['placeholder'] = $data->str_field_placeholder;		
		return '<div class="'.$this->pf_size($data).'">'.form_label($data->str_field_label, $data->str_field_name, 'class="control-label"').$this->pf_required($data).$this->field_file($data->str_field_name, $data->str_field_value, $extra).$this->pf_help($data).'</div>';
	}

	public function field_hidden($name, $value = NULL, $extra = array())
	{
		$data = array('id' => $name, 'name' => $name);
		$value = ($value===NULL) ? '' : $value;
		return form_hidden($data, $value, $extra);
	}

	public function generate_form_field($data=null)
	{	
		switch ($data->str_type){
			case 1: return $this->pf_text($data); break;
			case 2: return $this->pf_textarea($data); break;
			case 3: return $this->pf_checkbox($data, $this->get_field_values($data->structure_id)); break;
			case 4: return $this->pf_radiobox($data, $this->get_field_values($data->structure_id)); break;
			case 5: return $this->pf_dropdown($data, $this->get_field_values($data->structure_id)); break;
			case 6: return $this->pf_file($data); break;				
			default: return false;	break;
		
		}//end switch
	}

	public function generate_form_pagination($page)	
	{		
		$groups = $this->groups;	
		$keys = array_keys($groups); 
		$total_page = count($groups);
		$output = '<div class="footer">'; 			
		if ($page != 1) $output .= '<a data-toggle="tab" href="#'.$groups[$keys[$page-2]].'" class="btn btn-default">Previous</a>';
		if ($page < $total_page ) $output .= '<a data-toggle="tab" href="#'.$groups[$keys[$page]].'" class="btn btn-info pull-right">Next</a>';
		if ($page == $total_page) $output .= '<button type="submit" class="btn btn-info pull-right" pb-role="submit">Submit</button>';
		$output .='</div>';
		return $output;
	}

	public function set_rule($form_id=null)	
	{
		if ($this->check($form_id)){
			$outputArray = array();
			$i=0;
			foreach($this->structure as $item){
				if($item->str_type == 3) 
					$outputArray[$item->structure_id]['field']	= $item->str_field_name.'[]';
				else 
					$outputArray[$item->structure_id]['field']	= $item->str_field_name;
				$outputArray[$item->structure_id]['label']	= $item->str_field_label;
				$outputArray[$item->structure_id]['rules']	= $item->str_field_rule;
				if ($item->str_field_required) {
					if (empty($outputArray[$item->structure_id]['rules'])) 
						$outputArray[$item->structure_id]['rules'] .='required';
					else
						$outputArray[$item->structure_id]['rules'] .='|required';
					}
				else{

				}

				
			}		
			
			$this->mRuleGroup = $outputArray;			
			return $this->mRuleGroup;	
		}
		else {
			return false;
		}
	}

	public function messages()
	{
		return $this->ci->system_message->render();
	}

	/**
	 * Form Validation
	 */
	public function validate()
	{
		// only run validation upon form submission
		$post_data = $this->ci->input->post();		
		if ( !empty($post_data) )
		{
			// Step 1. reCAPTCHA verification (skipped in development mode)
			$recaptcha_response = $this->ci->input->post('g-recaptcha-response');
			if ( isset($recaptcha_response) && ENVIRONMENT!='development' )
			{
				$config = $this->ci->config->item('recaptcha');
				$secret_key = $config['secret_key'];
				$recaptcha = new \ReCaptcha\ReCaptcha($secret_key);
				$resp = $recaptcha->verify($recaptcha_response, $_SERVER['REMOTE_ADDR']);
				
				if (!$resp->isSuccess())
				{
					// save POST data to flashdata
					$this->ci->session->set_flashdata($this->mSessionKey, $post_data);

					// failed
					//$errors = $resp->getErrorCodes();
					$this->ci->system_message->set_error('ReCAPTCHA failed.');

					// redirect to form page (interrupt other operations)
					redirect($this->mFormUrl);
				}
			}

			// Step 2. CodeIgniter form validation
			
			$this->ci->form_validation->set_rules($this->mRuleGroup);
			$result = $this->ci->form_validation->run();
			
			if ($result===FALSE)
			{			
				// save POST data to flashdata
				$this->ci->session->set_flashdata($this->mSessionKey, $post_data);

				// store validation error message from CodeIgniter
				$this->ci->system_message->set_error(validation_errors());

				// redirect to form page (interrupt other operations)
				redirect($this->mFormUrl);
			}
			else
			{
				// return TRUE to indicate the result is positive
				return TRUE;
			}
		}
	}

	private function pf_required($data)
	{
		if ($data->str_field_required) 
			$required = '<span class="text-red"> * </span>'; 
		else $required = '';
		return $required;
	}

	private function pf_size($data)
	{
		$size = 'col-md-12';
		if (!empty($data->str_field_subgroup_grid)) $size = $data->str_field_subgroup_grid.'-'.$data->str_field_subgroup_size; 		
		if (!empty($data->str_field_subgroup_class)) $size .=' '.$data->str_field_subgroup_class; 
		return $size;
	}
	private function pf_help($data) 
	{
		$help = '';
		if (!empty($data->str_field_helpblock)) $help ='<p class="help-block">'.$data->str_field_helpblock.'</p>'; 		
		return $help;
	}
/*
			[structure_id] => 2
            [form_id] => 1
            [type_id] => 1
            [str_field_name] => Temperature (low)
            [str_type] => 2
            [str_field_order] => 1
            [str_field_group] => Project
            [str_field_group_order] => 1
            [str_field_subgroup] => General
            [str_field_subgroup_order] => 1
            [str_field_value] => optional default name
            [str_field_placeholder] => 
            [str_field_subgroup_size] => 200
            [str_field_required] => 1
            [str_field_class] => temperature-name

			[str_field_subgroup_class] => 200
            data->str_field_layer_size = xs (phones), sm (tablets), md (desktops), and lg (larger desktops). 
*/
}//end class
/*
<div class="col-lg-3 has-success ">
	<label for="temp_low" class="control-label">Temperature (low)<span class="text-red"> * </span></label>
	<select name="temp_low" class="form-control input-lg"><option value="9">20</option><option value="10">21</option></select>
	<p class="help-block">test</p>
</div>

*/