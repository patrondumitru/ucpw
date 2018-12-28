<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon"><i class="fa fa-legal"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Submited Forms</span>
                                    <span class="info-box-number">5.3K</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">This week</span>
                                    <span class="info-box-number">102</span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Viewed</span>
                                    <span class="info-box-number">28</span>
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
                                 <h3 class="box-title"><?php echo anchor('admin/iframe/add', '<i class="fa fa-plus"></i> '. lang('iframe_add_iframe'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>                                 
                            </div>
                            <div class="box-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo lang('iframe_tablerow_name');?></th>
                                            <th><?php echo lang('iframe_tablerow_url_name');?></th>
                                            <th><?php echo lang('iframe_tablerow_path');?></th>
                                            <th><?php echo lang('iframe_tablerow_width');?></th>
                                            <th><?php echo lang('iframe_tablerow_height');?></th>
                                            <th><?php echo lang('iframe_tablerow_status');?></th>
                                            <th><?php echo lang('iframe_tablerow_created_by');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($data as $row): ?>
                                        
                                        <tr>
                                            <td><?php echo htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->url_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->path, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->width, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->height, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->status, ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($row->created_by, ENT_QUOTES, 'UTF-8'); ?></td>

                                        </tr>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>