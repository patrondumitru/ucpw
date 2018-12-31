<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
                    

                    
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                 <h3 class="box-title"><?php echo anchor('admin/project/add', '<i class="fa fa-plus"></i> '. lang('project_add'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                 <?php if(isset($messages)) print_r($messages);?>  
                            </div>
                            <div class="box-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo lang('project_tablerow_name');?></th>
                                            <th><?php echo lang('project_tablerow_engineer');?></th>
                                            <th><?php echo lang('project_tablerow_manager');?></th>
                                            <th><?php echo lang('project_tablerow_inspector');?></th>
                                            <th><?php echo lang('project_tablerow_location');?></th>
                                            <th><?php echo lang('project_tablerow_status');?></th>
                                            <th><?php echo lang('project_tablerow_added_at');?></th>
                                            <th><?php echo lang('project_tablerow_added_by');?></th>
                                            <th><?php echo lang('project_tablerow_action');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($data as $row): ?>
                                        
                                        <tr>
                                            <td><?php echo htmlspecialchars($row->prj_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($this->user->admin_name($row->prj_engineer), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($this->user->admin_name($row->prj_manager), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($this->user->admin_name($row->prj_inspector), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($this->project->location($row->prj_location_id), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($this->project->status($row->status_id), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->prj_date_created, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($this->user->admin_name($row->prj_created_user_id), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td width='15%'>
                                                <div class="btn-group-horizontal">
                                                    <a href="project/info/<?php echo $row->prj_id;?>" ><button type="button" class="btn btn-primary btn-flat"><i class="fa fa-file-text"></i></button></a>
                                                    <a href="project/update/<?php echo $row->prj_id;?>" ><button type="button" class="btn btn-info btn-flat"><i class="fa fa-edit"></i></button></a>
                                                    <a href="project/delete/<?php echo $row->prj_id;?>" ><button type="button" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
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