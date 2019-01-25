<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#page_0" data-toggle="tab">Basic</a></li> 
              <button id="add-tab" class='btn btn-warning'>Add new page</button>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="page_0">

                <form class="form-horizontal">
              		<div class="box-body">
                		<div class="form-group">
		                	<label for="formname" class="col-sm-2 control-label">Name</label>
		                	<div class="col-sm-10"><input type="text" class="form-control" id="formname" placeholder="Enter form name"></div>
		                </div>
		                <div class="form-group">
		                  <label for="iconcolor" class="col-sm-2 control-label">Icon Color</label>
		                  <div class="col-sm-10"><select class="form-control" id="iconcolor">
		                    <option>red</option>
		                    <option>yellow</option>
		                    <option>aqua</option>
		                    <option>blue</option>
		                    <option>black</option>
		                    <option>light-blue</option>
		                    <option>green</option>
		                    <option>gray</option>
		                    <option>navy</option>
		                    <option>teal</option>
		                    <option>olive</option>
		                    <option>lime</option>
		                    <option>orange</option>
		                    <option>fuchsia</option>
		                    <option>purple</option>
		                    <option>maroon</option>                    
		                  </select>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label for="icon" class="col-sm-2 control-label">Icon</label>
		                  <div class="col-sm-10"><select class="form-control" id="icon">
		                    <option>red</option>
		                    <option>yellow</option>
		                    <option>aqua</option>
		                    <option>blue</option>
		                    <option>black</option>
		                    <option>light-blue</option>
		                    <option>green</option>
		                    <option>gray</option>
		                    <option>navy</option>
		                    <option>teal</option>
		                    <option>olive</option>
		                    <option>lime</option>
		                    <option>orange</option>
		                    <option>fuchsia</option>
		                    <option>purple</option>
		                    <option>maroon</option>                    
		                  </select>
		                  </div>
		                </div>
		              </div>
              			<!-- /.box-body -->
		              <div class="box-footer">
		                <button type="button" class="btn btn-default controlpage">Cancel</button>
		                <button type="button" id="basicnext" class="btn btn-info pull-right controlpage">Next</button>

		              </div>
              			<!-- /.box-footer -->
            	</form>
              </div>
              <!-- /.tab-pane -->
              
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

      </div>