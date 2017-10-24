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
				<h3 class="panel-title">Edit Services Design Format
				  <div class="pull-right padding-bottom-20">
				  </div>
				</h3>
			</div>
				<?php $data= array();
			foreach ($rd as $temp)
			{
				$data[]=$temp->checklist_name;
				
			}
			
			$temp1=implode(",", $data);
			// print_r($temp1);
			?>
			<input type="hidden" value="<?php echo $temp1; ?>" name="hidden_value" id="hidden_value" class="hidden_value" />
			
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
						  <div class="col-md-12">
						  <!-- Example Multi-Select Public Methods -->
						  <div class="example-wrap">
							
							<div class="example">
								<?php $abc=explode(",",$temp1);?>
								<select class="multi-select-methods form-control" onchange="list();">
								 <?php  foreach($checklist as $item){ ?>
										<option name="<?php echo $item->checklist_id;?>" 
											value="<?php echo $item->checklist_id;?>"> <?php  echo $item->checklist_name?>
										</option>
								<?php } ?>
								                                               
							  </select>
							</div>
							<center> 
							<div class="example-buttons">
							  <a id="buttonDeselectAll" type="button"></a>
							</div> 
							<button type="submit" value="save" class="btn btn-primary "/>save</button>
							</center>
							
							
						  </div>
						  <!-- End Example Multi-Select Public Methods -->
						</div>
					</div>
					<div class="row">
						
						
					</div>
				</form>
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
$(document).ready(function(){
	test()
	$("#buttonDeselectAll").click();
	
});
var data=[];
function test(){	
	// $('.ms-selection .ms-list li.ms-selected').each(function(){
		// var data=[];
		// var val = $(this).text();
		// data=val;
	// });
	// var temp=$(#hidden_value).text()
	// var abc = temp.split(',');
	alert(abc);
}   


</script>
	