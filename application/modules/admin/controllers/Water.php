<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Water extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->lang->load('water');
		$this->load->model('water_model','water');
		//$this->page_title->push(lang('menu_water'));
		//$this->data['pagetitle'] = $this->page_title->show();

	}

	public function index()
	{
		//$this->ion_auth->is_admin() ?
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->in_group(array('webmaster', 'admin')))
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
        	$this->mPageTitle = 'Water';
        	$result= $this->water->get_all();
        	$this->mViewData['locations'] = $this->water->locations_list();
        	$this->mViewData['pumps'] = $this->water->pumps_list();


        	$this->mViewData['data'] = $result;
        	$this->render('water/home');
        }

	}

	public function add_readings()
	{		
		$this->load->library('form_builder');
		$locations = $this->water->active_location_list();
		$this->mViewData['locations'] = $locations;
		reset($locations);
		$this->mViewData['pumps'] = $this->water->active_pump_list(key($locations));		
		$this->add_script($this->config->item('plugins_dir').'/bootstrap-datepicker/js/bootstrap-datepicker.js', $append = TRUE, $position = 'foot');		
		$this->add_stylesheet($this->config->item('plugins_dir').'/bootstrap-datepicker/css/bootstrap-datepicker.min.css', $append = TRUE, $media = 'screen');
		$form = $this->form_builder->create_form(NULL,FALSE,array('class' => 'form-horizontal'));
		
		$form->set_rule_group("water/add_readings");
		if ($form->validate())
		{
			// passed validation
			$form_data = array(
				'date' 			=> $this->input->post('date'),
				'meter'  		=> $this->input->post('meter'),
				//'volume' 		=> $this->input->post('volume'),
				'location_id'	=> $this->input->post('location_id'),
				'pump_id' 		=> $this->input->post('pump_id')
				);
			$complete = true;
			foreach($form_data as $key => $value) {				
				if (empty($value)) {
					$error_messages = "Please complete all fields";
					$this->system_message->set_error($error_messages);
					$complete = false;
				}
			}
			
			$previos_meter = $this->water->last_water_reading($form_data['pump_id'],$form_data['location_id']);			

			if ($complete and (($form_data['meter'] > $previos_meter) or empty($previos_meter)))
			{	
				$form_data['volume'] = $form_data['meter'] - $previos_meter;
				$form_data['user_id'] = $this->mUser->id;//
				$form_data['date'] = date('Y-m-d', strtotime($form_data['date']));
				$result = $this->water->add_reading($form_data);
				
				if($result){
					$messages = "New registration was added ".$result;
					$this->system_message->set_success($messages);
					redirect($this->mModule.'/'.$this->mCtrler.'/'.$this->mAction);
				}else {
					$error_messages = "Errors in adding in database";
					$this->system_message->set_error($error_messages);
					redirect($this->mModule);
				}
			}
			else
			{
				if ($form_data['meter'] <= $previos_meter){
						$error_messages = 'Your previosly meter was <b>'.$previos_meter.'</b>. Now your added meter data was <b>'.$form_data['meter'].'</b>. Please change your meters data';
						$this->system_message->set_error($error_messages);
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
		$this->render('water/add_readings');

	}

	public function delete()
	{
        /* Load Template */
		$this->template->admin_render('admin/users/delete', $this->data);
	}

	public function test()
	{
		$this->load->library('javascript',
		        array(
		                'js_library_driver' => 'scripto',
		                'autoload' => FALSE
		        )
		);
	
    }

	public function get_pump_json($location_id=null)
    {
    	$result = $this->water->active_pump_list($location_id);
    	//if(count($result) > 0) $this->output->set_output(json_encode($result));    
    	$this->render_json($result);    
    }
		

    public function import($location_id=null)
    {
    	$this->load->library('multi_menu');		
    }
}


