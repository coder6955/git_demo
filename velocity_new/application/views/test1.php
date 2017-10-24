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
								<select class="multi-select-methods form-control" onchange="list();">
								  <?php foreach($ld as $ld1){?>
								  <option name="<?php echo $ld1->checklist_id;?>"><?php  echo $ld1->checklist_name?></option>	  
								<?php }?>
							  </select>
							</div>
						
							  
							</div>
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


  
  	<div class="example-buttons">
							  <a id="buttonDeselectAll" type="button"></a>
							</div>
 

 
  
 


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
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/advanced.min.js"></script>

<script>
	$( document ).ready(function() 
	{
		
		$("#buttonDeselectAll").click();

	});
	
	function list(){
		// alert();
		$('.ms-selection .ms-list li.ms-selected').each(function(){
			var val = $(this).text();
			alert(val);
		
			
		});
	}
</script>
	<script>
	$( document ).ready(function() 
	{
		// alert();
	// $("#buttonDeselectAll").click();
	temp();
	});
	var lp=[];
	function temp()
	{
		$('.ms-selection .ms-list li span').each(function(){
			var val = $(this).text();
			 $(this).css("color","red");
			 alert(val);
			 
		
		// var abc = $('#abc').val();
		// var abcd= int[];
		// for($i=0; $i<10; $i++){
			// if($(this).text == bcd[$i]){
				// $(this).css("display:block");
				// $(this).addClass('ms-selected');
			// }
		// }
		// var val = $(this).text();
		
		
			
		// alert(val);
		});
			
			// $(".ms-selected").css("display","block");
		
	}
	
	function list(){
		// alert();
		$('.ms-selection .ms-list li.ms-selected').each(function(){
			var data=[];
			var val = $(this).text();
			lp=val;
		
		});
	}
</script>
<script>
	$( document ).ready(function() 
	{
	// $("#buttonDeselectAll").click();
	temp();
	});
	var lp=[];
	function temp()
	{
		$('.ms-selection .ms-list li span').each(function()
		{
			var abc = $(this).text();
			 $(this).css("color","red");
			 alert(abc);
		});
	}
	function list()
	{
		$('.ms-selection .ms-list li.ms-selected').each(function(){
			var data=[];
			var val = $(this).text();
			lp=val;
		});
	}
</script>