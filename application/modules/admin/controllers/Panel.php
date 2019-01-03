<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Panel management, includes: 
 * 	- Admin Users CRUD
 * 	- Admin User Groups CRUD
 * 	- Admin User Reset Password
 * 	- Account Settings (for login user)
 */
class Panel extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');

		//permissions access group from database
        $this->check_page_access();

	}

	public function index()
	{	
		$this->verify_auth(array('webmaster', 'admin'));
		$this->mViewData['users_groups']           =   $this->ion_auth->get_users_groups()->result();
        $this->mViewData['users_permissions']      =   $this->ion_auth_acl->build_acl();
        $this->render('panel/dashboard');
	}


	public function module_access()
	{	
		$this->verify_auth(array('webmaster', 'admin'));

        $this->render('panel/access');
	}


	public function manage()
	{
        $this->render('user/admin/manage');
	}


	 public function permissions()
    {
        $this->mViewData['permissions']    =   $this->ion_auth_acl->permissions('full');

        $this->render('user/admin/permissions');
    }

    public function add_permission()
    {
        if( $this->input->post() && $this->input->post('cancel') )
            redirect('/admin/user/permissions', 'refresh');

        $this->form_validation->set_rules('perm_key', 'key', 'required|trim');
        $this->form_validation->set_rules('perm_name', 'name', 'required|trim');

        $this->form_validation->set_message('required', 'Please enter a %s');

        if( $this->form_validation->run() === FALSE )
        {
            $this->mViewData['message'] = ($this->ion_auth_acl->errors() ? $this->ion_auth_acl->errors() : $this->session->flashdata('message'));

            $this->render('user/admin/add_permission');
        }
        else
        {
            $new_permission_id = $this->ion_auth_acl->create_permission($this->input->post('perm_key'), $this->input->post('perm_name'));
            if($new_permission_id)
            {
                // check to see if we are creating the permission
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("/admin/user/permissions", 'refresh');
            }
        }
    }

    public function update_permission()
    {
        if( $this->input->post() && $this->input->post('cancel') )
            redirect('admin/user/permissions', 'refresh');

        $permission_id  =   $this->uri->segment(4);

        if( ! $permission_id )
        {
            $this->session->set_flashdata('message', "No permission ID passed");
            redirect("admin/user/permissions", 'refresh');
        }

        $permission =   $this->ion_auth_acl->permission($permission_id);

        $this->form_validation->set_rules('perm_key', 'key', 'required|trim');
        $this->form_validation->set_rules('perm_name', 'name', 'required|trim');

        $this->form_validation->set_message('required', 'Please enter a %s');

        if( $this->form_validation->run() === FALSE )
        {
            $this->mViewData['message']    = ($this->ion_auth_acl->errors() ? $this->ion_auth_acl->errors() : $this->session->flashdata('message'));
            $this->mViewData['permission'] = $permission;

            $this->render('user/admin/edit_permission');
        }
        else
        {
            $additional_data    =   array(
                'perm_name' =>  $this->input->post('perm_name')
            );

            $update_permission = $this->ion_auth_acl->update_permission($permission_id, $this->input->post('perm_key'), $additional_data);
            if($update_permission)
            {
                // check to see if we are creating the permission
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("/admin/user/permissions", 'refresh');
            }
        }
    }

    public function delete_permission()
    {
        if( $this->input->post() && $this->input->post('cancel') )
            redirect('/admin/user/permissions', 'refresh');

        $permission_id  =   $this->uri->segment(4);

        if( ! $permission_id )
        {
            $this->session->set_flashdata('message', "No permission ID passed");
            redirect("admin/user/permissions", 'refresh');
        }

        if( $this->input->post() && $this->input->post('delete') )
        {
            if( $this->ion_auth_acl->remove_permission($permission_id) )
            {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("admin/user/permissions", 'refresh');
            }
            else
            {
                echo $this->ion_auth_acl->messages();
            }
        }
        else
        {
            $this->mViewData['message'] = ($this->ion_auth_acl->errors() ? $this->ion_auth_acl->errors() : $this->session->flashdata('message'));

            $this->render('/admin/delete_permission');
        }
    }

    public function groups()
    {
        $this->mViewData['groups'] = $this->ion_auth->groups()->result();

        $this->render('user/admin/groups');
    }

    public function group_permissions()
    {
        if( $this->input->post() && $this->input->post('cancel') )
            redirect('/admin/user/groups', 'refresh');

        $group_id  =   $this->uri->segment(4);

        if( ! $group_id )
        {
            $this->session->set_flashdata('message', "No group ID passed");
            redirect("admin/user/groups", 'refresh');
        }

        if( $this->input->post() && $this->input->post('save') )
        {
            foreach($this->input->post() as $k => $v)
            {
                if( substr($k, 0, 5) == 'perm_' )
                {
                    $permission_id  =   str_replace("perm_","",$k);

                    if( $v == "X" )
                        $this->ion_auth_acl->remove_permission_from_group($group_id, $permission_id);
                    else
                        $this->ion_auth_acl->add_permission_to_group($group_id, $permission_id, $v);
                }
            }

            redirect('/admin/user/groups', 'refresh');
        }

        $this->mViewData['permissions']            =   $this->ion_auth_acl->permissions('full', 'perm_key');
        $this->mViewData['group_permissions']      =   $this->ion_auth_acl->get_group_permissions($group_id);

        $this->render('user/admin/group_permissions');
    }

    public function users()
    {
        $this->mViewData['users']  =   $this->ion_auth->users()->result();

        $this->render('user/admin/users');
    }

    public function manage_user()
    {
        $user_id  =   $this->uri->segment(4);

        if( ! $user_id )
        {
            $this->session->set_flashdata('message', "No user ID passed");
            redirect("/admin/user/users", 'refresh');
        }

        $this->mViewData['user']               =   $this->ion_auth->user($user_id)->row();
        $this->mViewData['user_groups']        =   $this->ion_auth->get_users_groups($user_id)->result();
        $this->mViewData['user_acl']           =   $this->ion_auth_acl->build_acl($user_id);

        $this->render('user/admin/manage_user');
    }

    public function user_permissions()
    {
        $user_id  =   $this->uri->segment(4);

        if( ! $user_id )
        {
            $this->session->set_flashdata('message', "No user ID passed");
            redirect("admin/user/users", 'refresh');
        }

        if( $this->input->post() && $this->input->post('cancel') )
            redirect("/admin/user/manage_user/{$user_id}", 'refresh');


        if( $this->input->post() && $this->input->post('save') )
        {
            foreach($this->input->post() as $k => $v)
            {
                if( substr($k, 0, 5) == 'perm_' )
                {
                    $permission_id  =   str_replace("perm_","",$k);

                    if( $v == "X" )
                        $this->ion_auth_acl->remove_permission_from_user($user_id, $permission_id);
                    else
                        $this->ion_auth_acl->add_permission_to_user($user_id, $permission_id, $v);
                }
            }

            redirect("/admin/user/manage_user/{$user_id}", 'refresh');
        }

        $user_groups    =   $this->ion_auth_acl->get_user_groups($user_id);

        $this->mViewData['user_id']                =   $user_id;
        $this->mViewData['permissions']            =   $this->ion_auth_acl->permissions('full', 'perm_key');
        $this->mViewData['group_permissions']      =   $this->ion_auth_acl->get_group_permissions($user_groups);
        $this->mViewData['users_permissions']      =   $this->ion_auth_acl->build_acl($user_id);

        $this->render('user/admin/user_permissions');
    }

	// Admin Users CRUD
	public function admin_user()
	{
		$crud = $this->generate_crud('admin_users');
		$crud->columns('groups', 'username', 'first_name', 'last_name', 'active');
		$this->unset_crud_fields('ip_address', 'last_login');

		// cannot change Admin User groups once created
		if ($crud->getState()=='list')
		{
			$crud->set_relation_n_n('groups', 'admin_users_groups', 'admin_groups', 'user_id', 'group_id', 'name');
		}

		// only webmaster can reset Admin User password
		if ( $this->ion_auth->in_group(array('webmaster', 'admin')) )
		{
			$crud->add_action('Reset Password', '', $this->mModule.'/panel/admin_user_reset_password', 'fa fa-repeat');
		}
		
		// disable direct create / delete Admin User
		$crud->unset_add();
		$crud->unset_delete();

		$this->mPageTitle = 'Admin Users';
		$this->render_crud();
	}

	// Create Admin User
	public function admin_user_create()
	{
		// (optional) only top-level admin user groups can create Admin User
		//$this->verify_auth(array('webmaster'));

		$form = $this->form_builder->create_form();

		if ($form->validate())
		{
			// passed validation
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$additional_data = array(
				'first_name'	=> $this->input->post('first_name'),
				'last_name'		=> $this->input->post('last_name'),
			);
			$groups = $this->input->post('groups');

			// create user (default group as "members")
			$user = $this->ion_auth->register($username, $password, $email, $additional_data, $groups);
			if ($user)
			{
				// success
				$messages = $this->ion_auth->messages();
				$this->system_message->set_success($messages);
			}
			else
			{
				// failed
				$errors = $this->ion_auth->errors();
				$this->system_message->set_error($errors);
			}
			refresh();
		}

		$groups = $this->ion_auth->groups()->result();
		unset($groups[0]);	// disable creation of "webmaster" account
		$this->mViewData['groups'] = $groups;
		$this->mPageTitle = 'Create Admin User';

		$this->mViewData['form'] = $form;
		$this->render('panel/admin_user_create');
	}

	// Admin User Groups CRUD
	public function admin_user_group()
	{
		$crud = $this->generate_crud('admin_groups');
		$this->mPageTitle = 'Admin User Groups';
		$this->render_crud();
	}

	// Admin User Reset password
	public function admin_user_reset_password($user_id)
	{
		// only top-level users can reset Admin User passwords
		$this->verify_auth(array('webmaster'));

		$form = $this->form_builder->create_form();
		if ($form->validate())
		{
			// pass validation
			$data = array('password' => $this->input->post('new_password'));
			if ($this->ion_auth->update($user_id, $data))
			{
				$messages = $this->ion_auth->messages();
				$this->system_message->set_success($messages);
			}
			else
			{
				$errors = $this->ion_auth->errors();
				$this->system_message->set_error($errors);
			}
			refresh();
		}

		$this->load->model('admin_user_model', 'admin_users');
		$target = $this->admin_users->get($user_id);
		$this->mViewData['target'] = $target;

		$this->mViewData['form'] = $form;
		$this->mPageTitle = 'Reset Admin User Password';
		$this->render('panel/admin_user_reset_password');
	}

	// Account Settings
	public function account()
	{
		// Update Info form
		$form1 = $this->form_builder->create_form($this->mModule.'/panel/account_update_info');
		$form1->set_rule_group('panel/account_update_info');
		$this->mViewData['form1'] = $form1;

		// Change Password form
		$form2 = $this->form_builder->create_form($this->mModule.'/panel/account_change_password');
		$form1->set_rule_group('panel/account_change_password');
		$this->mViewData['form2'] = $form2;

		$this->mPageTitle = "Account Settings";
		$this->render('panel/account');
	}

	// Submission of Update Info form
	public function account_update_info()
	{
		$data = $this->input->post();
		if ($this->ion_auth->update($this->mUser->id, $data))
		{
			$messages = $this->ion_auth->messages();
			$this->system_message->set_success($messages);
		}
		else
		{
			$errors = $this->ion_auth->errors();
			$this->system_message->set_error($errors);
		}

		redirect($this->mModule.'/panel/account');
	}

	// Submission of Change Password form
	public function account_change_password()
	{
		$data = array('password' => $this->input->post('new_password'));
		if ($this->ion_auth->update($this->mUser->id, $data))
		{
			$messages = $this->ion_auth->messages();
			$this->system_message->set_success($messages);
		}
		else
		{
			$errors = $this->ion_auth->errors();
			$this->system_message->set_error($errors);
		}

		redirect($this->mModule.'/panel/account');
	}
	
	/**
	 * Logout user
	 */
	public function logout()
	{
		$this->ion_auth->logout();
		redirect($this->mConfig['login_url']);
	}
}
