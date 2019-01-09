<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
                    

                    
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                 <h3 class="box-title"><?php echo anchor('admin/project/addform', '<i class="fa fa-plus"></i> '. lang('project_addform'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                 <?php if(isset($messages)) print_r($messages);?>  
                            </div>
                            <div class="box-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo lang('project_tablerow_form_name');?></th>   
                                            <th><?php echo lang('project_tablerow_form_submited');?></th>                                        
                                            <th><?php echo lang('project_tablerow_form_status');?></th>                                            
                                            <th><?php echo lang('project_tablerow_added_at');?></th>
                                            <th><?php echo lang('project_tablerow_added_by');?></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $status = array('0'=>'Inactive', '1'=>'Active');
                                    foreach($data as $row): ?>                                        
                                        <tr>
                                            <td><i class="fa <?php echo $row->form_icon.' text-'.$row->form_color ;?>"></i> <?php echo htmlspecialchars($row->form_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo $this->project->count_completed_form($row->form_id);?></td>
                                            <td><?php echo htmlspecialchars($status[$row->status], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->date_created, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($this->user->admin_name($row->user_created), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td width='15%'>
                                                <div class="btn-group-horizontal">                                                  
                                                    <a href="project/form_info/<?php echo $row->form_id;?>" ><button type="button" class="btn btn-primary btn-flat"><i class="fa fa-file-text"></i></button></a>
                                                    <a href="project/form_update/<?php echo $row->form_id;?>" ><button type="button" class="btn btn-info btn-flat"><i class="fa fa-edit"></i></button></a>
                                                    <a href="project/form_delete/<?php echo $row->form_id;?>" ><button type="button" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                                                </div>
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>