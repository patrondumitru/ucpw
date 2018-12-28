<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library('multi_menu');		
		$this->load->model('admin/mainmenu_model','mainmenu');
		$this->load->model('admin/iframe_model','iframe');

		// id, parent(id), name(friendly name) , icon(img), slug(url), number(order), type(), show(1,0), protect(1,0 password)		
		$items = $this->mainmenu->get_menu_group('home');

		$config["nav_tag_open"]  = '<ul class="navbar-nav ml-auto">';		
		$config["item_tag_open"] = '<li class="nav-item">';			
		$config["item_anchor"]   = '<a class="nav-link js-scroll-trigger" href="%s">%s</a>';
		

		//if ($this->multi_menu->set_items($items)) exit("generated"); else exit("Notgenerated");
		$this->multi_menu->set_items($items);
		$this->multi_menu->initialize($config);	

		$iframe_items = $this->iframe->as_array()->get_all();
		
		$this->mViewData['iframe_items'] = $iframe_items;
		$this->mViewData['multi_menu'] = $this->multi_menu->items;

	}


	public function index()
	{

		$this->render('home');		

	}

	

}
