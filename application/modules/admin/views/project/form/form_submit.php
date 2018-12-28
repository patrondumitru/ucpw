<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
 <div class="row">
        <div class="col-md-12">
        <div><?php 
        	$message = $pfbuilder->messages();
        	if(isset($message)) print_r($message);?></div>

			<?php 				
			//echo $form->set_id('form-create_registration');
			echo $pfbuilder->openhtmlform(); 
        	

        ?><!--
        <form role="form"> -->
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">      
        <?php 
        	$active = 'active';
        	foreach($pfbuilder->groups as $group){ 
        		echo '<li class="'.$active.'"><a href="#'.$group.'" data-toggle="tab">'.$group.'</a></li>'; 
        		$active = '';

        		} 
        ?>
        	</ul>
        	<div class="tab-content">
        	
        <?php	
        	$active = 'active';
        	$page = 0;
        	$total_page = count($pfbuilder->by_groups);
        	foreach($pfbuilder->by_groups as $g => $group){  
        		echo '<div class="tab-pane '.$active.'" id="'.$g.'">'; 
        		++$page;
        ?>

        		<div class="box box-solid">
       				<div class="box-body">
       					<div class="box-group" id="accordion">

        <?php
				foreach($group as $s => $subgroup){ 
		?>
								<div class="panel box box-primary"> 
									<div class="box-header with-border"><h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $g.$s;?>"><?php echo $s;?></a></h4></div>
	                  				<div id="<?php echo $g.$s;?>" class="panel-collapse collapse in">
	                    				<div class="box-body">
	                    					
	                    					<?php foreach($subgroup as $item){ echo $pfbuilder->generate_form_field($item);}?>
	                    				
	                    				</div> <!-- end box-body -->

	                  				</div> <!-- end panel-collapse -->
								</div> <!-- end panel box -->
		<?php
		        }// foreach $group	
		    echo $pfbuilder->generate_form_pagination($page);		
		?> 	

		        		</div> <!-- end box-group-->
		        	</div>  <!-- end box body-->
		        </div> <!-- end box box-solid-->
		<?php
		        echo '</div>';
		        $active = '';
		    } // foreach $pfbuilder->by_groups

		?>

			
        	</div>
			<!-- end tab-content -->


       	</div>	<!-- end nav-tabs-custom  -->
       	<!-- </form> --> 
       	<!-- end form --> <?php echo $pfbuilder->closehtmlform();?>
    </div><!-- end col-md-6  -->
</div><!-- end col-md-6  -->
      
    

    
      