 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

 <div id='form_data'>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('project_info_form_detail') ;?></h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i> </button>
                <div class="btn-group">
                <?php         ?>
                 <a href="<?php echo site_url('admin/project/form_submit/'.$project_id.'/'.$form_id) ;?>" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add new</a>
                 <a href="<?php echo site_url('admin/project/exportprojectforms/'.$project_id.'/'.$form_id) ;?>" class="btn btn-default btn-sm"> <i class="fa fa-file-excel-o"></i> Export</a>
                 <a href="test" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Edit</a>
                 <a href="test" class="btn btn-default btn-sm"><i class="fa fa-trash-o"> Delete</i></a>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><a href="test"><i class="fa fa-chevron-left"></i></a></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <?php if ($table_column) {?>
                <table class="table table-hover table-striped">                  
                  <thead>
                  <th></th>    
                  <th>Status</th>
                  <th>Date</th>                
                  <?php foreach($table_column as $key=>$value) { ?>
                    <th><?echo $key;?></th>
                    <?php } ?>                  
                  </thead>
                  <tbody>
                  <?php 
                    $folder['open'] = 'fa-folder-open-o';
                    $folder['close'] = 'fa-folder-open';
                    
                   // debug($data);
                   // debug($completed_form);
                   // debug($table_column);
                    foreach($completed_form as $row) {?>
                      <tr>
                        <td><input type="checkbox" class='form_completed' id="<?php echo $row->form_comp_id;?>"></td>
                        <td class="mailbox-star"><a href="#"><i class="fa <?php echo $folder[$row->status]; ?>  text-yellow"></i></a></td>                    
                        <td class="mailbox-date"><?php echo anchor('admin/project/form_data/'.$row->form_comp_id, $row->date_created); ?></td>
                          <?php 
                              foreach($table_column as $name_column){
                                foreach($data[$row->form_comp_id] as $cell){                                
                                  if ($cell->str_field_name == $name_column) {
                                    echo '<td class="mailbox-name">'.$this->project->get_field_value($cell->structure_id, $cell->str_type, $cell->value).'</a></td>';
                                  }
                                }
                              }
                          ?>                    
                        
                      </tr>
                  <?php }?>
                  </tbody>
                </table>
                <?php }?>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                
                <div class="pull-right">
                  1-20/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->