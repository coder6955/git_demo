<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/multi-select.min.css">
<!-- Page -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/advanced.min.css">


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
				<center><h3 class="panel-title">Edit Services Design Format</center>
				<br>
				  <div class="pull-right padding-bottom-20">
				  </div>
				</h3>
			</div>
		
			
			<div class="panel-body container-fluid">
				<form class="form-horizontal col-sm-12" id="exampleStandardForm" method="POST" action="<?php echo site_url('')?>/service/update" autocomplete="off" enctype="multipart/form-data">
					<input type="hidden"  placeholder=""  name="txtid" value="<?php echo $edit_service[0]->service_id?>" class="form-control">
					<div class="row">
						<div class="col-sm-5">
							<div class="form-group form-material">
								<label class="col-sm-4 control-label">*Service Name  : </label>
								<div class="col-sm-8">
								  <input type="text" placeholder="" name="txtname" value="<?php echo $edit_service[0]->service_name?>"  class="form-control" "food_select_one(this.value)" readonly />
								</div>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="form-group form-material">
								<label class="col-sm-4 control-label">Services Realted Checklist : </label>
								<div class="col-sm-8">
								 <select class="multi-select-methods form-control" name= "checklist_id" id="checklist_id">
									   <option value="">Select</option>
									  <?php foreach($checklist as $ld1){?>
									  <option name="<?php echo $ld1->checklist_id;?>" value="<?php echo $ld1->checklist_id;?>" onclick="checklist(this.value)" >
									  <?php  echo $ld1->checklist_name?></option>	  
									  <?php }   ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="col-sm-12">
					<h4><u>Selected Checklist</u></h4>
					<?php 
						foreach($format as $data) 
						{	
							if($edit_service[0]->service_id == $data->service_id)
								{ ?>
									<div class=" col-sm-3 alert dark alert-primary alert-dismissible" role="alert" style="margin:10px 10px" > 
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true" >×</span>
										</button>	
										<?php foreach($checklist as $checklist1) 
										{
											if($data->checklist_id == $checklist1->checklist_id)
											{													
												echo $checklist1->checklist_name;
											}
										}
										?>
									</div>
						<?php 	}
						}
					?>
				</div>
						
					<div class="col-md-12">
						<div class="clearfix"></div>
						<br>
						<h4><u>Add More Checklist</u></h4>
						</br>
						<div id="checklist_id"></div>
					</div>

			</div>  
		</div>
	</div>
</div>

<!-- End Page -->


  
  
 

 
  
 


  <script src="<?php echo base_url(); ?>assets/js2/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js2/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js2/animsition/animsition.min.js"></script>

	  
  
<script src="<?php echo base_url(); ?>assets/js2/core.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/site.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-tokenfield.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-asRange.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-asSpinner.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-clockpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bloodhound.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/typeahead.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/b otstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/advanced.min.js"></script>

<script>

function checklist(id) 
{
	var sid=$('input[name="txtid"]').val();
	
	alert(sid);
		
	alert(id);
	
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('service/get_design_ID/') ?>",
		data: "id=" + id + "&sid=" + sid,
		success: function(data) 
		{
			alert(data);
			$('#checklist_id').empty();
			$('#checklist_id').append(data);

		},
		error: function() 
		{
			alert("error");
		}
	});

}

</script>
	