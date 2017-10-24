


<!-- Page -->
<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-header">
    <h1 class="page-title">SERVICE MASTER </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard'); ?>" class="icon md-home">Home</a></li>
      <li class="active">SERVICE MASTER </li>
    </ol>
    <div class="page-header-actions"> <a onclick="goBack();">
      <button class="btn btn-sm btn-primary btn-round waves-effect waves-light waves-round" type="button"> <i aria-hidden="true" class="icon md-mail-reply"></i> <span class="text hidden-xs">Back</span> </button>
      </a> </div>
  </div>
  <div class="page-content container-fluid">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Edit Services Design Format
          <div class="pull-right padding-bottom-20">
			
			
		
  
          </div>
        </h3>
      </div>

      <div class="panel-body container-fluid">
		<form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('')?>/service/update" autocomplete="off" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Service Name *</label>
						<div class="col-sm-8">
						  <input type="text" placeholder="" name="txtname" value="<?php echo $edit_service[0]->service_name?>" required class="form-control" />
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group form-material">
						<label class="col-sm-4 control-label">Prefix *</label>
						<div class="col-sm-8">
							<select name="txtprefix" class="form-control"  required>		
								<option value="<?php $edit_service[0]->category ?>" name="<?php $edit_service[0]->category ?>">
									<?php echo $edit_service[0]->category ?>
								</option>
				
								<option value="" name="">--Select--</option>
								<?php foreach($prefix as $prefix1){?>
								<option value="<?php echo $edit_service[0]->category ?>" name="<?php echo $edit_service[0]->category?>">
									<?php echo $prefix1->prefix_name; ?>
								</option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>
			
			</div>
		</form>
	   
	   
        </div>  
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Page -->



	  

	