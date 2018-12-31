<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

      <div class="row">
        <div class="col-md-3">
          <?php echo anchor('admin/project/update/'.$project->prj_id, '<i class="fa fa-edit"></i> '. lang('project_info_edit_button'), array('class' => 'btn btn-primary btn-block margin-bottom')); ?>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('project_info_form_list')?></h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
              <?php foreach ($active_forms as $row){?>                    
                <li>
                  <a href="project/info/<?php echo $project->prj_id.'/'.$row->form_id;?>" class='form_list'><i class="fa <?php echo $row->form_icon.' text-'.$row->form_color ;?>"></i> <?php echo $row->form_name;?> 
                   <span class="label label-default pull-right" ><?php echo $this->project->count_completed_form($row->form_id,$project->prj_id);?></span>
                 </a>
                </li>
                    <?php }?>                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
          <!-- /.box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Attachements</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-file-word-o text-blue"></i> Word <span class="label label-default pull-right">4</span></a></li>
                <li><a href="#"><i class="fa fa-file-excel-o text-green"></i> Excel <span class="label label-success pull-right">8</span></a></li>
                <li><a href="#"><i class="fa fa-file-pdf-o text-red"></i> PDF <span class="label label-warning pull-right">13</span></a></li>
                <li><a href="#"><i class="fa fa-file-picture-o text-light-blue"></i> Picture <span class="label label-danger pull-right">6</span></a> </li>
                <li><a href="#"><i class="fa fa-file-video-o text-light-aqua"></i> Video <span class="label label-default pull-right">0</span></a></li>
                <li><a href="#"><i class="fa fa-file-archive-o text-light-orange"></i> Other  <span class="label label-info pull-right">7</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#" ><i class="fa fa-circle-o text-red "></i> Important</a>
                </li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> </a></li>
                <li><a href="#" class="drpdown-toogle" data-toggle="dropdown"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!-- /.col -->
        <div class="col-md-9" id='form_data'>
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
                 <a href="<?php echo site_url($module.'/'.$ctrler.'/form_submit/'.$project_id.'/'.$form_id) ;?>" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add new</a>
                 <a href="<?php echo site_url($module.'/'.$ctrler.'/exportprojectforms/'.$project_id.'/'.$form_id) ;?>" class="btn btn-default btn-sm"> <i class="fa fa-file-excel-o"></i> Export</a>
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
      </div>
      <!-- /.row -->

  <script>
    $(function(){

        $(".form_list").click(function(event)
        {          
            event.preventDefault();
            $.ajax(
                {
                    type:"post",
                    url: $(this).attr('href'),                    
                    success:function(response)
                    {
                        console.log(response);
                        $("#form_data").html(response);
                        $('#form_data').show();
                    }
                    
                }
            );
        });
    });
</script>  