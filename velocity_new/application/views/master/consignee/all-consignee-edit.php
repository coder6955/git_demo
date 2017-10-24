<!-- Page -->
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
    <div class="page-header">
        <h1 class="page-title">ORGANISATION MASTER</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>" class="icon md-home">Home</a></li>
            <li class="active">ORGANISATION MASTER</li>
        </ol>
        <div class="page-header-actions">
            <a onclick="goBack();">
                <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button">
                    <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
            </a>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Organisation &nbsp; 
          <div class="pull-right padding-bottom-20">
            <!--<a data-toggle="modal" data-target="#add">
            <button class="btn btn-sm btn-icon btn-primary waves-effect waves-light margin-bottom-5
			waves-effect waves-light"><i class="icon md-plus"></i> Add Teams</button>
            </a>
           <!--  <a target="_blank" href="<?php echo site_url('clients/exportToExcel'); ?>">
            <button class="btn btn-sm btn-icon btn-primary waves-effect waves-light
			margin-bottom-5 waves-effect waves-light"><i class="icon fa fa-file-excel-o"></i> Export to excel</button>
            </a>-->
          </div>
        </h3>
            </div>
            <div class="panel-body container-fluid">
				
                <?php 
		
			foreach($company as $details){?>
                    <form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('organisation/update'); ?>" autocomplete="off" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">Organization Name *</label>
                                    <div class="col-sm-8">
                                        <input type="text" placeholder="" name="txtname" value="<?php echo $details->company_name?>" required class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">Organization Address *</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" placeholder="" name="txtaddress" required><?php echo $details->company_address ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">Primary Email *</label>
                                    <div class="col-sm-8">
                                        <input type="text" placeholder="" name="txtemail1" class="form-control" value="<?php echo $details->company_alternate_email_id1; ?>"  required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">Alternate Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" placeholder="" name="txtemail2" class="form-control" value="<?php echo $details->company_alternate_email_id2; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">Branch </label>
                                    <div class="col-sm-8">
                                        <input type="text" placeholder="" name="txtbranch" value="<?php echo $details->company_branch?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">Telephone No.</label>
                                    <div class="col-sm-8">
                                        <input type="text" placeholder="" name="txtphone" value="<?php echo $details->company_telephone_no; ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">Country</label>
                                    <div class="col-sm-8">
                                        <select name="txtcountery" class="form-control select2-accessible" data-plugin="select2">
										
                                            <?php foreach($country as $country1){?>
												<?php if($country1->country_id == $details->country_id) {?>
												
                                                <option value="<?php echo $country1->country_id?>" name="<?php echo $country1->country_id?>">
                                                    <?php echo $country1->country_name; ?>
                                                </option>
											<?php } } ?>
												<option value="" name="">--Select--</option>
												    <?php foreach($country as $country1){?>
                                                <option value="<?php echo $country1->country_id?>" name="<?php echo $country1->country_id?>">
                                                    <?php echo $country1->country_name; ?>
                                                </option>
												<?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">State</label>
                                    <div class="col-sm-8">
                                        <select name="txtstate" class="form-control">

                                            <?php foreach($state as $state1){?>
												<?php if($state1->state_id == $details->state_id) {?>
                                                <option value="<?php echo $state1->state_id; ?>">
                                                    <?php echo $state1->state_name; ?>
                                                </option>
												<?php } }?>
												<option value="" name="">--Select--</option>
												<?php foreach($state as $state1){?>
												<option value="<?php echo $state1->state_id; ?>">
                                                    <?php echo $state1->state_name; ?>
                                                </option>
												<?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">City</label>
                                    <div class="col-sm-8">
                                        <select name="txtcity" class="form-control">
												<?php foreach($city as $city1){?>
												<?php if($city1->city_id == $details->city_id) {?>
                                                <option value="<?php echo $city1->city_id;?>">
                                                    <?php echo $city1->city_name; ?>
                                                </option>
												<?php } }?>
												<option value="" name="">--Select--</option>
												 <?php foreach($city as $city1){?>
                                                <option value="<?php echo $city1->city_id;?>">
                                                    <?php echo $city1->city_name; ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-material">
                                    <label class="col-sm-4 control-label">Category Name </label>
                                    <div class="col-sm-8">
                                        <select name="txtcategory" class="form-control">
                                            <?php foreach($category as $category1){?>
											<?php if($category1->category_id == $details->category_id) {?>
                                                <option value="<?php echo $category1->category_id;?>">
                                                    <?php echo $category1->category_name; ?>
                                                </option>
												<?php } }?>
												<option value="" name="">--Select--</option>
												 <?php foreach($category as $category1){?>
                                                <option value="<?php echo $category1->category_id;?>">
                                                    <?php echo $category1->category_name; ?>
                                                </option>
                                                <?php } ?>
												
                                        </select>
                                    </div>
                                </div>
                            </div>
						</div>
                            <input type="hidden" placeholder="" name="txtid" value="<?php echo $details->company_id;?>" required class="form-control" />

                            <div class="form-group form-material pull-right">
                                <div class="example example-buttons">
                                    <div>
                                        <a>
                                            <button class="btn btn-primary  waves-effect waves-round waves-light" type="submit">Submit</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                    </form>
                    <?php } ?>
                 
            </div>
        </div>
    </div>
</div>
<!-- End Page -->

<!-- Add Modal-->
<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Add Content</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('teams/add'); ?>" autocomplete="on" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group form-material">
                            <label class="col-sm-4 control-label">User Name *</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="" name="name" value="" required class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-material">
                            <label class="col-sm-4 control-label">Password *</label>
                            <div class="col-sm-8">
                                <input type="password" placeholder="" name="pass" value="" required class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-material">
                            <label class="col-sm-4 control-label">Email *</label>
                            <div class="col-sm-8">
                                <input type="email" placeholder="" name="email" value="" required class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group form-material">
                            <label class="col-sm-4 control-label">Roles *</label>
                            <div class="col-sm-8">
                                <?php foreach($menu as $role)
						{ ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="<?php echo $role->menu_id; ?>" name="role[]">
                                        <?php echo $role->menu_name; ?>
                                    </label>
                                    <br>
                                    <?php } ?>
                                        <!--<div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
            <input type="checkbox" id="inputCheckbox" name="remember">
            <label for="inputCheckbox">Remember me</label>
          </div>-->
                            </div>
                        </div>
                    </div>
                    <form>

                        <div class="form-group form-material pull-right">
                            <div class="example example-buttons">
                                <div>
                                    <a>
                                        <button class="btn btn-primary  waves-effect waves-round waves-light" type="submit">Submit</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>