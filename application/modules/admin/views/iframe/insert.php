<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>



<div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo lang('water_insert_registration_title'); ?></h3>
                                    <?php if(isset($messages)) print_r($messages);?>                                    
                                </div>
                                <div class="box-body"><div><h1>
                                    <?php if(isset($message)) print_r($message);?></h1></div>

                                    <?php 	echo $form->set_id('form-create_registration');

                                    		echo $form->open(); //echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_user'));
                                            echo $form->b_text('iframe_tablerow_name', 'name');
                                            echo $form->b_text('iframe_tablerow_url_name', 'url_name');
                                            echo $form->b_text('iframe_tablerow_path', 'path');
                                            echo $form->b_text('iframe_tablerow_width', 'width');
                                            echo $form->b_text('iframe_tablerow_height', 'height');
                                            echo $form->b_dropdown('iframe_tablerow_status', 'status',array('1'=>'Visible','0'=>'Hide'));

											?>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo $form->bs3_submit(lang('actions_submit'), 'btn btn-primary btn-flat');  ?>
                                                    <?php echo $form->bs3_reset(lang('actions_reset'), 'btn btn-warning btn-flat');  ?>
                                                    
                                                    <?php echo anchor('admin/iframe', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo $form->close();?>
                                </div>
                            </div>
                         </div>
                    </div>


