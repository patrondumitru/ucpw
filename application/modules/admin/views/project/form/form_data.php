<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

      <div class="row">
        	<div class="col-md-4">
        	
        	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Details of Completed Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Field</th>
                  <th>Value</th>                  
                </tr>

                <?php  
                	$i = 1;
		        	foreach($data as $item){ ?>
		        		<tr>
		                  <td><?php echo $i;?></td>
		                  <td><?php echo $item->str_field_label;?></td>
		                  <td><?php echo $this->project->get_field_value($item->structure_id, $item->str_type, $item->value);?></td>
		                </tr>
		        <?php
		        		$i++;        
		        	}
		        ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div><!-- /.box -->


        	</div>
      </div>
      
    