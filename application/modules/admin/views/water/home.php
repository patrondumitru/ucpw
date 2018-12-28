<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon"><i class="fa fa-legal"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Yesterday Used</span>
                                    <span class="info-box-number">5.3 Mil Gallons</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">This week</span>
                                    <span class="info-box-number">75 Mil Gallons</span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Stations</span>
                                    <span class="info-box-number">8</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-shield"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Problems</span>
                                    <span class="info-box-number">2</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                 <h3 class="box-title"><?php echo anchor('admin/water/add_readings', '<i class="fa fa-plus"></i> '. lang('water_add_readings'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                                 <h3 class="box-title"><?php echo anchor('admin/water/import_readings', '<i class="fa fa-plus"></i> '. lang('water_import_readings'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo lang('water_tablerow_date');?></th>
                                            <th><?php echo lang('water_tablerow_location');?></th>
                                            <th><?php echo lang('water_tablerow_pump');?></th>
                                            <th><?php echo lang('water_tablerow_meter');?></th>
                                            <th><?php echo lang('water_tablerow_volume');?></th>
                                            <th><?php echo lang('water_tablerow_added_by');?></th>
                                            <th><?php echo lang('water_tablerow_added_at');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($data as $row): ?>
                                        
                                        <tr>
                                            <td><?php echo htmlspecialchars($row->date, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($locations[$row->location_id], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($pumps[$row->pump_id], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->meter, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->volume, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->user_id, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->create_date, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td width='15%'>
                                                <div class="btn-group-horizontal">
                                                  <button type="button" class="btn btn-info btn-flat"><i class="fa fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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