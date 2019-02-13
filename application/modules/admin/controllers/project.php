<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;
//use PhpOffice\PhpSpreadsheet\IOFactory;

class Project extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->lang->load('project');
		$this->load->model('project_model','project');
		$this->load->model('user_model','user');
		//$this->page_title->push(lang('menu_water'));
		//$this->data['pagetitle'] = $this->page_title->show();

		//permissions access group from database
		$this->check_page_access();
		$this->push_breadcrumb(humanize($this->mCtrler),base_url($this->mModule.'/'.$this->mCtrler));//$this->mModule.$this->mCtrler
		//$this->push_breadcrumb(humanize($this->mAction),base_url(str_replace($this->mAction.'/', '', uri_string())));//$this->mModule.$this->mCtrler

	}

public function index()
	{

        $this->mPageTitle =  lang('project_home_title_page');        
        $this->mViewData['data'] = $this->project->get_all();
        $this->render('project/home');
        
	}

	public function forms($action=null, $form_id=null)
	{
		$this->mPageTitle =  lang('project_forms_title_page');
		$this->mViewData['data'] = $this->project->forms();    
        $this->render('project/form/home');
        
	}




	public function add()
	{		
        	$this->mPageTitle = lang('project_add_title_page');
			$this->load->library('form_builder');
			$form = $this->form_builder->create_form(NULL,FALSE,array('class' => 'form-horizontal'));
			
			$form->set_rule_group("project/add");

			if ($form->validate())// passed validation
			{
				$form_data = array(
					'prj_name' 			=> $this->input->post('name'),
					'prj_engineer'		=> $this->input->post('engineer'),
					'prj_manager' 		=> $this->input->post('manager'),
					'prj_inspector'		=> $this->input->post('inspector'),
					'prj_location_id' 	=> $this->input->post('location_id'),
					'status_id' 		=> $this->input->post('status_id')
					);
				$complete = true;
				
				if ($complete)
				{					
					$form_data['prj_created_user_id'] = $this->mUser->id;//
					$form_data['prj_date_created'] = date('Y-m-d h:i:s', now());
					$result = $this->project->insert($form_data);
					
					if($result){
						$messages = "New registration was added ".$result;
						$this->system_message->add_success($messages);
						redirect($this->mModule.'/'.$this->mCtrler.'/info/'.$result);
						//redirect($this->mModule.'/'.$this->mCtrler.'/'.$this->mAction); //redirect back to new registration
					}else {
						$error_messages = "Errors in adding in database";
						$this->system_message->set_error($error_messages);
						redirect($this->mModule);
					}
				}			
	        	
			}
			else
			{
				//$form->errors();
				//$messages = $form->messages();
			}		
			
			$this->mViewData['messages'] = $form->messages(); 
			$this->mViewData['form'] = $form;
			$this->render('project/add_project');
		

		

	}

	public function update($id_project=null)
	{		
		//$this->verify_auth(array('webmaster', 'admin'));
        	if ($id_project===NULL) redirect($this->mModule.'/'.$this->mCtrler);
        	$project = $this->project->get($id_project);
        	
        	$this->mPageTitle = lang('project_update_title_page').' <b>"'.$project->prj_name.'"</b>';
			$this->load->library('form_builder');
			$form = $this->form_builder->create_form(NULL,FALSE,array('class' => 'form-horizontal'));
			
			$form->set_rule_group("project/add");
			if ($form->validate())// passed validation
			{
				$form_data = array(
					'prj_name' 			=> $this->input->post('name'),
					'prj_engineer'		=> $this->input->post('engineer'),
					'prj_manager' 		=> $this->input->post('manager'),
					'prj_inspector'		=> $this->input->post('inspector'),
					'prj_location_id' 	=> $this->input->post('location_id'),
					'status_id' 		=> $this->input->post('status_id')
					);
				$complete = true;
				
				if ($complete)
				{					
					//$form_data['prj_created_user_id'] = $this->mUser->id;//
					//$form_data['prj_date_created'] = date('Y-m-d h:i:s', now());
					$result = $this->project->update($this->input->post('prj_id'), $form_data);
					
					if($result){
						$messages = "Project was updated".$result;
						$this->system_message->add_success($messages);
						redirect($this->mModule.'/'.$this->mCtrler);
					}else {
						$error_messages = "Errors updating project. Problem with database";
						$this->system_message->set_error($error_messages);
						redirect($this->mModule);
					}
				}			
	        	
			}
			else
			{
				//$form->errors();
				//$messages = $form->messages();
			}		
			$this->mViewData['project'] = $project;
			$this->mViewData['messages'] = $form->messages(); 
			$this->mViewData['form'] = $form;
			$this->render('project/update_project');	
	}

	public function delete()
	{
        /* Load Template */
		//$this->template->admin_render('admin/users/delete', $this->data);
	}

	

	public function info($id_project=null, $form_id=null) // general information about project
	{
		//$this->verify_auth(array('webmaster', 'admin'));
		
        	if (is_null($id_project))
        	{
        		if ($id_project===NULL) redirect($this->mModule.'/'.$this->mCtrler);        		
        	}
        	else
        	{
        		$project = $this->project->get($id_project);
        		if (isset($project))
        		{	    
        			$this->mViewData['active_forms'] = $this->project->active_forms();    	

        			if (is_null($form_id)) $form_id = $this->mViewData['active_forms'][0]->form_id;   

        			
	        		$this->mPageTitle = lang('project_info_title_page').' <b>"'.$project->prj_name.'"</b>';	
	        		$this->mViewData['project'] = $project;
	        		$this->mViewData['table_column'] = $this->project->get_form_table_info($form_id);
					$this->mViewData['completed_form'] = $this->project->get_completed_form($form_id,$id_project);
					$this->mViewData['data'] = $this->project->get_forms_data($form_id, $id_project);
					$this->mViewData['project_id'] = $id_project;
					$this->mViewData['form_id'] = $form_id;
	        		
	        		if (!$this->input->is_ajax_request()) $this->render('project/info'); else $this->render_ajax('project/info_ajax');
	        		     		
        		}
        		else 
        		{
        			redirect($this->mModule.'/'.$this->mCtrler);  
        		}
        	}
        
	}



	public function form_data($form_comp_id=null)
	{
		//$this->ion_auth->is_admin() ?
		//$this->verify_auth(array('webmaster', 'admin'));
        	if (is_null($form_comp_id))
        	{
        		redirect($this->mModule.'/'.$this->mCtrler);        		
        	}
        	else 
        	{	//get  form model
        		$form_completed = $this->project->get_completed_form_info($form_comp_id);        		
        		$project = $this->project->get_project($form_completed->project_id);        		
				$structure = $this->project->get_form_structure($form_completed->form_id);
				$form = $this->project->get_form($form_completed->form_id);
        		//$this->load->library('pfbuilder');        						
				//$pfbuilder = $this->pfbuilder; 
        		//$pfbuilder->set_form($form_completed->form_id);   
        		//$this->mViewData['pfbuilder'] = $pfbuilder;  

        		 
        		$this->mViewData['project'] = $project;
        		$this->mViewData['form'] = $form;
        		$this->mViewData['form_completed'] = $form_completed;        		
        		$this->mViewData['structure'] = $structure;
        		$this->mViewData['data'] = $this->project->get_form_data($form_comp_id,1);
        		$this->render('project/form/form_data');
        	}        	
        
	}


	public function form_submit($project_id = null, $form_id = null)
	{
		//$this->ion_auth->is_admin() ?
		//$this->verify_auth(array('webmaster', 'admin'));
        	if (is_null($form_id) or is_null($project_id) )
        	{
        		if ($id_project===NULL) redirect($this->mModule.'/'.$this->mCtrler);        		
        	}
        	else 
        	{	//get  form model
        		$structure = $this->project->get_form_structure($form_id);
        		$project= $this->project->get($project_id);
        		$this->load->library('pfbuilder');
        		$this->mPageTitle =  lang('project_form_submit_title');
				
				$pfbuilder = $this->pfbuilder; 
        		$pfbuilder->set_form($form_id);
        		$pfbuilder->create_form(NULL,TRUE,array('class' => 'form-horizontal'));
        		
        		$pfbuilder->set_rule();
        		if ($pfbuilder->validate())// passed validation
				{			
					foreach($this->input->post() as $item){
						$form_c_data['project_id'] = $project_id;
						$form_c_data['form_id'] = $form_id;
						$form_c_data['date_created'] = date('Y-m-d h:i:s', now());
						$form_c_data['user_created'] = $this->mUser->id;
						$form_c_data['status'] = 'open';
					}
					$result = $this->project->savecompletedform($form_c_data);
					if($result){
						foreach($this->input->post() as $key => $row){
							if(is_array($row)){
								foreach($row as $checkitem)
								{
									$form_data['form_comp_id'] = $result;	
									$form_data['structure_id'] = $pfbuilder->id_structure_by_name($key);
									$form_data['value'] = $checkitem;
									$this->project->savedata($form_data);
								}
							}
							else{
								$form_data['form_comp_id'] = $result;	
								$form_data['structure_id'] = $pfbuilder->id_structure_by_name($key);
								$form_data['value'] = $row;
								$this->project->savedata($form_data);
							}
						}
						
						$messages = "New registration was added ".$result;
						$this->system_message->set_success($messages);
						redirect($this->mModule.'/'.$this->mCtrler.'/info/'.$project_id);
						//redirect($this->mModule.'/'.$this->mCtrler.'/'.$this->mAction); //redirect back to new registration
					}else {
						$error_messages = "Errors in : adding in database Completed Form";
						$this->system_message->set_error($error_messages);
						redirect($this->mModule);
					}
				}
				 
        		$this->mViewData['project'] = $project;
        		$this->mViewData['form_id'] = $form_id;
        		$this->mViewData['pfbuilder'] = $pfbuilder;
        		$this->mViewData['structure'] = $structure;
        		$this->render('project/form/form_submit');
        	}        	
        
	}


	public function addform()
	{
		$this->mPageTitle = lang('project_forms_title_addform');
		$this->push_breadcrumb('Form',base_url(str_replace(__FUNCTION__, '', uri_string())).'forms');//humanize
		$this->add_script('assets/dist/plugins/form-builder/js/vendor.js',1, 'foot');
		$this->add_script('assets/dist/plugins/form-builder/js/form-builder.min.js',1, 'foot');
		$this->add_script('assets/dist/plugins/form-builder/js/form-render.min.js',1, 'foot');
		$this->add_script('assets/dist/plugins/form-builder/js/demo.js',1, 'foot');
        $result= $this->project->get_all();
        $this->mViewData['data'] = $result;
        $this->render('project/form/build_form');
        
	}

	public function saveform()
	{
		$data = file_get_contents('php://input');
		
		$datajson = json_decode($data);

		$this->project->form_last_position($datajson);
		
		exit();
		debug($datajson,1);
		$datajson->formsdata;
		$datajson->form;
		$form_id = $this->newform($datajson->form);		

		foreach ($datajson as $key => $field)
		{
			$fields[$key+1] = $this->checkformfild($field, $form_id, $key+1);				
		}

		debug($fields);
		debug($datajson,1);
		$this->render_json($data);
		
	}

	

	
	public function exportprojectforms($id_project = NULL, $form_id = NULL)
	{
		//$this->verify_auth(array('webmaster', 'admin'));
        	if ($id_project===NULL) redirect($this->mModule.'/'.$this->mCtrler);
        	
        	$project = $this->project->get($id_project);
        	
        	if ($form_id===NULL) {
        		//repeat reading from all forms data for future
        		redirect($this->mModule.'/'.$this->mCtrler);
        	}
        	else{
        		
				$date_completed_form = $this->project->get_completed_form($form_id,$id_project);
				$structure = $this->project->get_form_structure($form_id,1);
				$data = $this->project->export_forms_data($form_id, $id_project);
				//debug($data);
				//debug($structure);
			}
			foreach($structure as $item){
				$columntitle[]= $item->str_field_label;	
				$column[]= $item->str_field_name;			
				foreach($data as $r => $row_item){
					foreach($row_item as $field){
						if ($field->str_field_name == $item->str_field_name)
							$datarow[$r][$item->str_field_name] = $this->project->get_field_value($field->structure_id, $field->str_type, $field->value) ;	
					}
					
				}
			}
			//debug($columntitle);
			//debug($structure)
		    //debug($date_completed_form,1);
		    foreach($date_completed_form as $form){
		    	$completed_form[$form->form_comp_id]['date_created'] = $form->date_created;
		    	$completed_form[$form->form_comp_id]['user_created'] = $form->user_created;
		    }

        	$spreadsheet = new Spreadsheet();
        	$spreadsheet->getActiveSheet()->setCellValue('B1', 'Project:');
        	$spreadsheet->getActiveSheet()->setCellValue('C1', $project->prj_name);
        	$spreadsheet->getActiveSheet()->setCellValue('D1', 'Exported at:');
        	$spreadsheet->getActiveSheet()->setCellValue('E1', Date::PHPToExcel(time()))->getStyle('E1')
    				->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME);
        	$baseRow = 2;
        	$i = 1;
        	$char = 65;
        	foreach($columntitle as $leter => $title){
        		$spreadsheet->getActiveSheet()->setCellValue(chr($char+$leter+1) .$baseRow, $title);
        	}
        		$spreadsheet->getActiveSheet()->setCellValue(chr($char+count($column)+1) .$baseRow, 'Submited date');
        		$spreadsheet->getActiveSheet()->setCellValue(chr($char+count($column)+2) .$baseRow, 'Created by');
			foreach ($datarow as $r => $row) {				
			    $rowexcel = $baseRow + $i;
			   // $spreadsheet->getActiveSheet()->insertNewRowBefore($rowexcel, 1);
			    $spreadsheet->getActiveSheet()->setCellValue(chr($char) . $rowexcel, $i);
			    foreach ($column as $leter => $columnexcel){			    	
			    	if (isset($row[$columnexcel])) $spreadsheet->getActiveSheet()->setCellValue(chr($char+$leter+1) . $rowexcel, $row[$columnexcel]);
			    	else $spreadsheet->getActiveSheet()->setCellValue(chr($char+$leter+1) . $rowexcel, '');			    	
			    }
			    $spreadsheet->getActiveSheet()->setCellValue(chr($char+count($column)+1) . $rowexcel, Date::PHPToExcel($completed_form[$r]['date_created']))
			    ->getStyle(chr($char+count($column)+1) . $rowexcel)
    				->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME);
			    $spreadsheet->getActiveSheet()->setCellValue(chr($char+count($column)+2) . $rowexcel, $this->user->admin_name($completed_form[$r]['user_created']));			    
			    $i++;
			}
			//$spreadsheet->getActiveSheet()->removeRow($baseRow - 1, 1);
               
            //debug('',1);
	        $writer = new Xlsx($spreadsheet);
	 
	        $filename = $project->prj_name.'-'.date("Y-m-d_H-i-s");
	 
	        header('Content-Type: application/vnd.ms-excel');
	        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
	        header('Cache-Control: max-age=0');
	        
	        $writer->save('php://output'); // download file 
        
	}

	public function dashboard($color, $label, $icon, $url = '#')
	{
		$result = $this->project->get_all();
		$data = array(
			'color'		=> $color,
			'number'	=> count($result),
			'label'		=> $label,
			'icon'		=> $icon,
			'url'		=> $url,
		);
		$this->load->view('adminlte/widget/info_box', $data);
	}


	//-----------------Add forms -----------------------------//
	private function checkformfild($data, $form_id, $order)
	{
		$str_type = array('text'=>'1','textarea'=>'2','checkbox'=>'9','radio-group'=>'4','select'=>'5','file'=>'6','autocomplete'=>'7','button'=>'8','checkbox-group'=>'3','date'=>'10','header'=>'11','hidden'=>'12','number'=>'13','paragraph'=>'14');
		$result['form_id'] = $form_id;
		$result['str_field_order'] = $order;
		if (isset($data->type)) $result['str_type'] = $str_type[$data->type];
		if (isset($data->name)) $result['str_field_name'] = $data->name;
		if (isset($data->required)) $result['str_field_required'] = 1; else $result['str_field_required'] = 0;
		if (isset($data->label)) $result['str_field_label'] = $data->label;
		if (isset($data->description)) $result['str_field_helpblock'] = $data->description;
		if (isset($data->placeholder)) $result['str_field_placeholder'] = $data->placeholder;
		//if (isset($data->className)) $result['required'] = 1;
		if (isset($data->value)) $result['str_field_value'] = $data->value;
		if (isset($data->fieldClass)) $result['str_field_class'] = $data->fieldClass;			
		if (isset($data->groupGrid)) $result['str_field_subgroup_grid'] = $data->groupGrid;
		if (isset($data->groupClass)) $result['str_field_subgroup_class'] = $data->groupClass;
		if (isset($data->groupGridSize)) $result['str_field_subgroup_size'] = $data->groupGridSize;
		if (isset($data->maxlength)) $max_length = 'max_length['.$data->maxlength.']'; else $max_length = '';
		if (isset($data->fieldRules)) $result['str_field_rule'] = $data->fieldRules.'|'.$max_length ; else $result['str_field_rule'] = $max_length ;

		if (isset($data->group)) $result['str_field_group'] = $data->group;
		if (isset($data->groupOrder)) $result['str_field_group_order'] = $data->groupOrder;
		if (isset($data->subgroup)) $result['str_field_subgroup'] = $data->subgroup;
		if (isset($data->subgroupSize)) $result['str_field_subgroup_order'] = $data->subgroupSize;
		
		if (isset($data->values)) $result['str_field_value'] = $data->values;
		return $result;
	}

	private function newform($data)
	{
		$data['order_position'] = "";

		return $this->project->createform($data);

	}

}
