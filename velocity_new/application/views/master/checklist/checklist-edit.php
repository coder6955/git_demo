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
				<br><br>
                <?php 
		
			foreach($checklist as $details){?>
                    <form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('checklist/update'); ?>" autocomplete="off" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-material">
                                    <label class="col-sm-2 control-label pull-left">Checklist Name : *</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="" name="txtname" value="<?php echo $details->checklist_name?>" required class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
						<br><br>
                        <input type="hidden" placeholder="" name="txtid" value="<?php echo $details->checklist_id;?>" required class="form-control" />
						<div class="modal-footer">
							<div class="pull-left"><div><a><button class="btn btn-primary  waves-effect waves-round waves-light" type="submit">Submit</button></a></div></div>
							<div class="pull-right"><div><a><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></a></div></div>
						</div>
                    </form>
					
                    <?php } ?>
                 
            </div>
        </div> 
    </div>
</div>
<!-- End Page -->

