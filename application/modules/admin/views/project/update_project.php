<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo lang('project_update_form_box_title'); ?></h3>
                                    <?php if(isset($messages)) print_r($messages);?>                                    
                                </div>
                                <div class="box-body"><div><h1>
                                    <?php if(isset($message)) print_r($message);?></h1></div>

                                    <?php 	$this->user->engineers();
                                            echo $form->set_id('form-update_registration');
                                    		echo $form->open(); //echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_user'));
                                            echo $form->b_text('project_tablerow_name', 'name', $project->prj_name);
                                            echo $form->b_dropdown('project_tablerow_engineer', 'engineer',$this->user->engineers(), $project->prj_engineer);
                                            echo $form->b_dropdown('project_tablerow_manager', 'manager',$this->user->managers(), $project->prj_manager);
                                            echo $form->b_dropdown('project_tablerow_inspector', 'inspector',$this->user->inspectors(), $project->prj_inspector);
                                            echo $form->b_dropdown('project_tablerow_location', 'location_id',$this->project->active_location(), $project->prj_location_id);
                                    		echo $form->b_dropdown('project_tablerow_status', 'status_id',$this->project->status_list(), $project->status_id);
                                            echo $form->b_hidden('prj_id', $project->prj_id);
											?>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo $form->bs3_submit(lang('actions_submit'), 'btn btn-primary btn-flat');  ?>
                                                    <?php echo $form->bs3_reset(lang('actions_reset'), 'btn btn-warning btn-flat');  ?>
                                                    
                                                    <?php echo anchor('admin/project', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo $form->close();?>
                                </div>
                            </div>
                         </div>
                    </div>