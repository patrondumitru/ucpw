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
                                            
                                    		echo $form->b_dropdown('water_tablerow_location', 'location_id',$locations);
                                            echo $form->b_dropdown('water_tablerow_pump', 'pump_id',$pumps);
											echo $form->b_text('water_tablerow_date', 'date');
											//echo $form->b_text('water_tablerow_volume', 'volume');
											echo $form->b_text('water_tablerow_meter', 'meter');

											?>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo $form->bs3_submit(lang('actions_submit'), 'btn btn-primary btn-flat');  ?>
                                                    <?php echo $form->bs3_reset(lang('actions_reset'), 'btn btn-warning btn-flat');  ?>
                                                    
                                                    <?php echo anchor('admin/water', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo $form->close();?>
                                </div>
                            </div>
                         </div>
                    </div>

<script type="text/javascript">// <![CDATA[
    $(document).ready(function() {
        $('#date').datepicker();

        $('#location_id').change(function() { 
                    var $pumps = $('#pump_id');
                    $pumps.empty().prop('disabled', true);
                    var location_id = $('#location_id').val(); 
                    $.ajax({
                        dataType: 'json',
                        type: "POST",
                        url: "http://localhost/master/admin/water/get_pump_json/" + location_id,
                        success: function(pumps){$.each(pumps, function(id, pump){$pumps.append('<option value=' + id + '>' + pump + '</option>').prop('disabled', false);});},
                        beforeSend: function() {}    
                    });

                });
            });
            // ]]>
        </script>
