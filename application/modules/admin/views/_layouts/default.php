<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

  <header class="main-header">
                <a href="<?php echo site_url('admin/home'); ?>" class="logo">
                    <span class="logo-mini"><?php echo $title_mini; ?></span>
                    <span class="logo-lg"><?php echo $title_lg; ?></span>
                </a>

             	<?php $this->load->view('_partials/navbar'); ?>
			
				
				
            </header>
			
	<?php $this->load->view('_partials/main_sidemenu'); ?>		
				
		<div class="content-wrapper">
		<section class="content-header">
			<h1><?php echo $page_title; ?></h1>
			<?php $this->load->view('_partials/breadcrumb'); ?>
		</section>
		<section class="content">
			<?php 
				echo $this->system_message->render();
				$this->load->view($inner_view); 
				$this->load->view('_partials/back_btn'); ?>
		</section>
	</div>
		
<?php if ($admin_prefs['ctrl_sidebar'] == TRUE) $this->load->view('_partials/control_sidebar'); ?>





