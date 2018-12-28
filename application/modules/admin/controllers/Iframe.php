<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iframe extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
		$this->lang->load('iframe');
		$this->load->model('iframe_model','iframe');
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
        	$this->mPageTitle = 'Iframe';
        	$result= $this->iframe->get_all();
        	$this->mViewData['data'] = $result;
        	$this->render('iframe/home');
        }

	}

	public function insert()
	{		
		$this->load->library('form_builder');		
		$form = $this->form_builder->create_form(NULL,FALSE,array('class' => 'form-horizontal'));
		
		$form->set_rule_group("iframe/insert");
		if ($form->validate())
		{
			// passed validation
			$form_data = array(
				'name' 			=> $this->input->post('name'),
				'url_name'  	=> $this->input->post('url_name'),
				'path' 			=> $this->input->post('path'),
				'width'			=> $this->input->post('width'),
				'height' 		=> $this->input->post('height'),
				'status' 		=> $this->input->post('status'),
				'created_by' 	=> $this->mUser->id
				);

			$complete = true;
			foreach($form_data as $key => $value) {				
				if (empty($value)) {
					$error_messages = "Please complete all fields";
					$this->system_message->set_error($error_messages);
					$complete = false;
				}
			}
			
			if ($complete)
			{	
				$result = $this->iframe->add_iframe($form_data);
				
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
			
        	
		}
		else
		{
			
		}		
		
		$this->mViewData['messages'] = $form->messages(); 
		$this->mViewData['form'] = $form;
		$this->render('iframe/insert');

	}

}


